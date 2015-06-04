<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Email\Email;

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
        $this->layout = "ajax";
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

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->loadModel('GroupsUsers');
        $this->loadModel('Users');
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

                        $accept_link = "http://localhost/uni/teamproject/Accept/".$token;

                        $email = new email('default');
                        $email->helpers(array('html', 'text'));
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
                }
                $new_group_user = [
                    'user_id' => $this->request->session()->read('user_id'),
                    'group_id' => $new_group->id,
                    'is_admin' => '1',
                    'accepted' => '1'
                ];
                $group_user = $this->GroupsUsers->newEntity($new_group_user);
                $this->GroupsUsers->save($group_user);

                $this->Flash->success(__('The group has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group could not be saved. Please, try again.'));
            }
        }
        $users = $this->Users->find()->where(['Users.id !=' => $this->request->session()->read('user_id')]);
        $this->set('users', $users);
        $this->set(compact('group'));
        $this->set('_serialize', ['group']);
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
                $this->Flash->success(__('The group has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group could not be saved. Please, try again.'));
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
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
