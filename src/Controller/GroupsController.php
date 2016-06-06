<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Log\Log;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 */
class GroupsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->loadModel('GroupsUsers');
        $group_ids = $this->GroupsUsers->find()->select(['group_id'])->where(['user_id' => $this->request->session()->read('user_id')])->hydrate(false);
        $this->set('groups', $this->paginate($this->Groups->find()->where(['Groups.id IN' => $group_ids])));
        $this->set('_serialize', ['groups']);
    }

    /**
     * Invite method
     *
     * @param string|null $id Group id.
     * @return void
     */
    public function invite($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        $this->set('group', $group);
        $this->set('_serialize', ['group']);
    }

    /**
     * Accept method
     *
     * @param string\null $token Accept token
     * @return void
     */
    public function accept()
    {
        $this->loadModel('GroupsUsers');
        $this->viewBuilder()->layout("ajax");
        $this->autoRender = false;
        //var_dump($this->request);
        $token = explode('/', base64_decode($this->request->params['pass']['0']));
        $accept_group = [
            'accepted' => '1'
        ];
        $accept_group_user = $this->GroupsUsers->find()->where(['user_id' => $token['0'], 'group_id' => $token['1'], 'token' => $token['2']])->first();
        $accept_user = $this->GroupsUsers->patchEntity($accept_group_user, $accept_group);
        $this->GroupsUsers->save($accept_user);

        $this->loadModel('Users');
        $user = $this->Users->get($token['0']);
        $this->request->session()->write('user_id', $user->id);
        $this->request->session()->write('user_role', $user->role);
        $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);



    }

    public function check_user() {

        if ($this->request->is('post')) {

            $server = "ldapk5.tu-bs.de";

            $ldap = @ldap_connect($server);

            $this->loadModel('Users');

            $current_user = $this->Users->get($this->request->session()->read('user_id'));
            $email_user = explode('@', $current_user->email);
            $username = $email_user['0'];

            $password = $this->request->data['password'];

            $dn = "uid=$username,ou=people,dc=tu-bs,dc=de";

            $config = "ou=people,dc=tu-bs,dc=de";

            @ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
            @ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

            $bind = @ldap_bind($ldap, $dn, $password);

            if ($bind) {

                $this->request->session()->write('check_user_password', $this->request->data['password']);

                /*$users_array = array();

                $this->loadModel('Tubs');

                $counter = 10;
                $end = 9999999;
                while ($counter <= $end) {
                    $counter += 1;
                    var_dump($counter);
                    if (strlen($counter)==1) {
                        $user = "y"."000000".$counter;
                    } elseif (strlen($counter)==2) {
                        $user = "y"."00000".$counter;
                    } elseif (strlen($counter)==3) {
                        $user = "y"."0000".$counter;
                    } elseif (strlen($counter)==4) {
                        $user = "y"."000".$counter;
                    } elseif (strlen($counter)==5) {
                        $user = "y"."00".$counter;
                    } elseif (strlen($counter)==6) {
                        $user = "y"."0".$counter;
                    } else {
                        $user = "y".$counter;
                    }
                    var_dump($user);
                    $search = @ldap_search($ldap, $config, "uid=$user");
                    $result = @ldap_get_entries($ldap, $search);
                    if ($result['count']!='0') {
                        $tubs_entity = [
                            'y_nummer' => $result['0']['uid']['0'],
                            'name' => $result['0']['cn']['0'],
                            'email' => $result['0']['mail']['0'],
                            'extra' => $result['0']['physicaldeliveryofficename']['0'],
                            'mat_nr' => $result['0']['matrikelnummer']['0'],
                        ];

                        $new_tubs_entity = $this->Tubs->newEntity($tubs_entity);
                        $this->Tubs->save($new_tubs_entity);
                        //$users_array[$counter] = $result;
                    }
                }

                die();

                //$search = @ldap_search($ldap, $config, "uid=");

                if ($search) {
                    $result = @ldap_get_entries($ldap, $search);
                    var_dump($result);
                    die();
                }


                $hashed_username = md5($username);
                $hashed_password = md5($username . "password");
                $user = $this->Users->find()->where(['username' => $hashed_username])->first();
                if (!$user) {

                    $user_folder = "files/" . md5("1" . $this->request->data['username']);
                    $user_path = WWW_ROOT . $user_folder;

                    if (!is_dir($user_path)) {
                        mkdir($user_path, 0777, true);
                    }

                    $new_user_entity = [
                        'username' => $hashed_username,
                        'password' => $hashed_password,
                        'user_path' => $user_folder,
                        'role' => 'student',
                        'email' => $requested_email
                    ];

                    $user_entity = $this->Users->newEntity($new_user_entity);
                    $user = $this->Users->save($user_entity);
                }
                $this->set('user', $user); */
                $this->Flash->success(__('Erfolgreich authentifiziert.'));
                return $this->redirect(['action' => 'add']);
            } else {
                $this->Flash->error(__('Authentifizierung fehlgeschlagen.'));
            }
        }
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->loadModel('GroupsUsers');
        $this->loadModel('Users');
        $this->loadModel('Configurations');
        $configuration = $this->Configurations->get('1');
        if ($this->request->is('post')) {

            $selected_users = $this->request->data['users'];
            unset($this->request->data['users']);

            $group = $this->Groups->newEntity();

            $group_folder = "files/". md5("1".$this->request->data['name']);
            $group_path = WWW_ROOT . $group_folder;

            if (!is_dir($group_path)) {
                mkdir($group_path, 0777, true);
            }
            $this->request->data['folder_path'] = $group_folder;
            $group = $this->Groups->patchEntity($group, $this->request->data);
            $new_group = $this->Groups->save($group);
            if ($new_group) {

                foreach ($selected_users as $user) {
                    if (isset($user['0']) && $user['0']!='') {
                        $user_entity = $this->Users->get($user['0']);
                        // TODO: erzeuge Token
                        $new_token = substr(str_shuffle(strtolower('abcdefghijklmnopqrstuvwxyz1234567889')), 0, 6);
                        $token = base64_encode($user['0'] . "/" . $new_group->id . "/" . $new_token);
                        $group_user_entity = [
                            'user_id' => $user['0'],
                            'group_id' => $new_group->id,
                            'is_admin' => '0',
                            'token' => $new_token
                        ];
                        // TODO: get Configurations HOST
                        $accept_link = $configuration->host."/Accept/".$token;

                        $email = new email('default');
                        $email->helpers(array('text'));
                        $email->viewvars(
                            array(
                                'group_name' => $new_group->name,
                                'accept_link' => $accept_link
                            )
                        );
                        $email->template('group_accept');
                        $email->emailformat('html', 'text');
                        $email->from(array('wi2@tu-bs.de' => 'Gruppenverwaltung'));
                        $email->to(array($user_entity->email));
                        $email->subject('Neue Einladung zur Gruppe '. $new_group->name);
                        $email->send();

                        $group_user = $this->GroupsUsers->newEntity($group_user_entity);
                        $group_user_saved = $this->GroupsUsers->save($group_user);

                    }

                    foreach ($this->request->data['new_user'] as $new_user) {
                        if (isset($new_user) && $new_user!='') {
                            $context = "";
                            $context_string = "";
                            if (substr($new_user, 0, 1)=='y') {
                                $context = "uid";
                                $context_string = $new_user;
                            } elseif (strpos($new_user,'@') !== false) {
                                $context = "mail";
                                $context_string = $new_user;
                            } else {
                                $context = "cn";
                                $context_string = $new_user;
                            }

                            $server = "ldapk5.tu-bs.de";

                            $ldap = @ldap_connect($server);

                            $current_user = $this->Users->get($this->request->session()->read('user_id'));
                            $email_user = explode('@', $current_user->email);
                            $username = $email_user['0'];

                            $password = $this->request->session()->read('check_user_password');
                            $this->request->session()->delete('check_user_password');

                            $dn = "uid=$username,ou=people,dc=tu-bs,dc=de";


                            $config = "ou=people,dc=tu-bs,dc=de";

                            @ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
                            @ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

                            $bind = @ldap_bind($ldap, $dn, $password);


                            if ($bind) {

                                $context_search = $context . "=" . $context_string;

                                $search = @ldap_search($ldap, $config, "$context_search");
                                $result = @ldap_get_entries($ldap, $search);

                                if ($result) {

                                    $user_folder = "files/". md5("1".$username);
                                    $user_path = WWW_ROOT . $user_folder;

                                    if (!is_dir($user_path)) {
                                        mkdir($user_path, 0777, true);
                                    }

                                    // Undefined offset 0 on Line 307, 311
                                    $new_user_entity = [
                                        'username' => md5($result[0]['uid'][0]),
                                        'password' =>  md5($username."password"),
                                        'user_path' => $user_folder,
                                        'role' => 'student',
                                        'email' => $result[0]['uid'][0]."@tu-braunschweig.de"
                                    ];

                                    Log::debug('username');
                                    Log::debug($result[0]);
                                    Log::debug($result[0]['uid'][0]);
                                    Log::debug('email');
                                    Log::debug($result[0]);
                                    Log::debug($result[0]['uid'][0]);

                                    $user_entity = $this->Users->newEntity($new_user_entity);
                                    $user_entity = $this->Users->save($user_entity);

                                    $new_token = substr(str_shuffle(strtolower('abcdefghijklmnopqrstuvwxyz1234567889')), 0, 6);
                                    $token = base64_encode($user_entity->id . "/" . $new_group->id . "/" . $new_token);
                                    $group_user_entity = [
                                        'user_id' => $user_entity->id,
                                        'group_id' => $new_group->id,
                                        'is_admin' => '0',
                                        'token' => $new_token
                                    ];
                                    // TODO: get Configurations-HOST
                                    $accept_link = $configuration->host."/Accept/" . $token;

                                    $email = new email('default');
                                    $email->helpers(array('text'));
                                    $email->viewvars(
                                        array(
                                            'group_name' => $new_group->name,
                                            'accept_link' => $accept_link
                                        )
                                    );
                                    $email->template('group_accept');
                                    $email->emailformat('html', 'text');
                                    $email->from(array('wi2@tu-bs.de' => 'Gruppenverwaltung'));
                                    $email->to(array($user_entity->email));
                                    $email->subject('Neue Einladung zur Gruppe ' . $new_group->name);
                                    $email->send();

                                    $group_user = $this->GroupsUsers->newEntity($group_user_entity);
                                    $group_user_saved = $this->GroupsUsers->save($group_user);
                                } else {
                                    continue;
                                }

                            }

                        }
                    }
                }
                $new_group_user = [
                    'user_id' => $this->request->session()->read('user_id'),
                    'group_id' => $new_group->id,
                    'is_admin' => '1',
                    'accepted' => '1'
                ];
                $group_user = $this->GroupsUsers->newEntity($new_group_user);
                $this->GroupsUsers->save($group_user);

                $this->Flash->success(__('Die Gruppe wurde erstellt.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Die Gruppe wurde nicht erstellt.'));
            }
        }

        $server = "ldapk5.tu-bs.de";

        $ldap = @ldap_connect($server);

        $current_user = $this->Users->get($this->request->session()->read('user_id'));
        $email_user = explode('@', $current_user->email);
        $username = $email_user['0'];

        $password = $this->request->session()->read('check_user_password');

        $dn = "uid=$username,ou=people,dc=tu-bs,dc=de";

        $config = "ou=people,dc=tu-bs,dc=de";

        @ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        @ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

        $bind = @ldap_bind($ldap, $dn, $password);

        if ($bind) {

            $users_array = array();
            $users = $this->Users->find()->where(['Users.id !=' => $this->request->session()->read('user_id')]);
            foreach ($users as $user) {

                $user_entity = explode('@', $user->email);
                $uid = $user_entity[0];
                $search = @ldap_search($ldap, $config, "uid=$uid");
                $result = @ldap_get_entries($ldap, $search);
                if (isset($result[0]) && isset($result[0]['cn'])) {
                    $users_array[$user->id] = $result[0]['cn'][0];
                } else {
                    continue;
                }
            }
            $this->set('users_array', $users_array);
            $this->set(compact('group'));
            $this->set('_serialize', ['group']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('GroupsUsers');
        $this->loadModel('Users');
        $is_admin = $this->GroupsUsers->find()->where(['group_id' => $id, 'user_id' => $this->request->session()->read('user_id'), 'is_admin' => '1'])->first();

        if ($is_admin) {
            $this->set('is_admin', true);
        }

        $groups_users = $this->GroupsUsers->find()->select(['user_id'])->where(['group_id' => $id]);
        $this->set('groups_users', $groups_users);
        $users = $this->Users->find()->where(['Users.id IN' => $groups_users]);
        $this->set('users', $users);
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('Die Gruppe wurde gespeichert.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Die Gruppe wurde nicht gespeichert.'));
            }
        }
        $this->set(compact('group'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel('GroupsUsers');
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        $group_user = $this->GroupsUsers->find()->where(['group_id' => $id, 'user_id' => $this->request->session()->read('user_id'), 'is_admin' => '1'])->first();
        if ($group_user) {
            if ($this->Groups->delete($group)) {
                $this->Flash->success(__('Die Gruppe wurde gelöscht.'));
            } else {
                $this->Flash->error(__('Die Gruppe wurde nicht gelöscht.'));
            }
        } else {
            $this->Flash->error(__('Fehlende Berechtigung.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
