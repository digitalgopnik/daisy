<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Session;
use App\Controller\AppController;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->loadModel('Users');
        $this->loadModel('Items');
        $this->loadModel('Notes');
        $this->loadModel('Groups');
        $this->loadModel('FileUploads');
        $this->loadModel('Favorites');
        $this->loadModel('WordsItems');
        $this->loadModel('Words');

        //$this->Auth->allow(['login', 'logout', 'dashboard']);

        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        //$this->Auth->allow(['login', 'logout', 'dashboard']);
    }

    public function _checkClient() {

        $this->loadModel('Configurations');

        $configuration = $this->Configurations->get('1');

        $ip_address = $_SERVER['REMOTE_ADDR'];

        if ($ip_address==$configuration->ip) {
            return true;
        } else {
            return false;
        }
    }

    public function login()
    {
        $server = "ldapk5.tu-bs.de";

        if ($this->request->is(['post', 'put'])) {

            $ldap = @ldap_connect($server);

            $username = $this->request->data['username'];
            $password = $this->request->data['password'];

            $dn = "uid=$username,ou=people,dc=tu-bs,dc=de";

            $config = "ou=people,dc=tu-bs,dc=de";

            $requested_email = $username."@tu-bs.de";

            @ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
            @ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

            $bind = @ldap_bind($ldap, $dn, $password);

            if ($bind) {

                $search = @ldap_search($ldap, $config, "uid=");

                if ($search) {
                    $result = @ldap_get_entries($ldap, $search);
                }

                $hashed_username = md5($username);
                $hashed_password = md5($username."password");
                $user = $this->Users->find()->where(['username' => $hashed_username])->first();
                if (!$user) {

                    $user_folder = "files/". md5("1".$this->request->data['username']);
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
                $this->set('user', $user);
                $this->request->session()->write('user_id', $user->id);
                $this->request->session()->write('user_role', $user->role);
                $this->redirect(['action' => 'dashboard']);
            } else {
                $this->Flash->error(__('Benutzername / Passwort falsch.'));
                $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }

        }
    }


    public function logout() {
        $this->request->session()->destroy();
        $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
    }

    public function edit($user_id = null) {
        $user = $this->Users->get($user_id);

        if ($this->request->is(['post', 'put'])) {
            $patch_user = [
                'role' => $this->request->data['role']
            ];
            $user = $this->Users->patchEntity($user, $patch_user);
            $this->Users->save($user);
            $this->redirect(['controller' => 'Users', 'action' => 'edit', $user_id]);
        }
    }

    public function dashboard() {


        $this->set('favorites', $this->Favorites->find('all')->where(['user_id' => $this->request->session()->read('user_id')]));
        $this->set('items', $this->Items->find('all'));

        if ($this->request->session()->read('user_id')) {
            $user = $this->Users->get($this->request->session()->read('user_id'));
            $this->set('user', $user);

        }

        $this->loadModel('Configurations');

        $configuration = $this->Configurations->get('1');

        $this->set('host_server', $configuration->host);

    }

    public function app_view($url) {

        $bla = true;
        if ($bla==true) {
            $this->layout = "app";
            $this->set('groups', $this->Groups->find()->all());
            $this->set('item', $this->Items->find()->where(['Items.url' => $url])->first());
            $this->set('url', $url);

        } else {
            $this->Flash->error(__('Keinen Zugriff.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
        }
    }

    public function test_dropbox() {
        $dropbox_controller = new DropBoxesController();

        $dropbox_controller->index();
    }

    public function help() {

    }

    public function app_filter($filter = null) {

        $this->loadModel('Configurations');

        $configuration = $this->Configurations->get('1');

        $this->set('host_server', $configuration->host);

        if ($this->request->is(['post', 'put', 'ajax'])) {
            $filter = "%".$filter."%";
            var_dump($filter);
            $items_text = $this->Items->find()->where(['OR' => [['Items.name LIKE' => $filter], ['Items.help_text LIKE' => $filter]]])->hydrate(false);
            $words = $this->Words->find()->select(['Words.id'])->where(['Words.name LIKE' => $filter])->hydrate(false);
            $words_items = $this->WordsItems->find()->where(['WordsItems.word_id IN' => $words])->hydrate(false);
            var_dump($words_items);
            var_dump("test");
            die();
            $items = $this->Items->find()->where(['OR' => [['Items.id IN' => $words_items], ['Items.id IN' => $items_text]]]);
            foreach ($items as $item) {
                var_dump($item);
                die();
            }

            die();
        }
    }

    public function upload_file()
    {
        if ($this->request->is(['post', 'put', 'ajax'])) {
            $file = $this->request->data['file'];
            var_dump($this->request->data);
            die();
            if (isset($this->request->data['group_id']) && $this->request->data['group_id'] != '') {
                $group_id = $this->request->data['group_id'];
                $group_folder = $this->Groups->get($group_id);
            } else {
                $group_id = "";
                $user_folder = $this->Users->get($this->request->session()->read('user_id'));
            }
            if (isset($group_folder)) {
                $destination = $group_folder->folder_path . "/" . $file['name'];
            } else {
                $destination = $user_folder->user_path . "/" . $file['name'];
            }

            $url = $this->request->data['url'];
            unset($this->request->data);
            $new_file_upload = [
                'user_id' => $this->request->session()->read('user_id'),
                'group_id' => $group_id,
                'src' => $destination,
                'filename' => $file['name'],
                'type' => $file['type']
            ];
            $file_upload = $this->FileUploads->newEntity($$new_file_upload);
            $file_upload_save = $this->FileUploads->save($file_upload);
            if ($file_upload_save) {

                $destination_path = WWW_ROOT . $destination;
                move_uploaded_file($file['tmp_name'], $destination_path);
                $this->redirect(['controller' => 'Users', 'action' => 'app_view', $url]);
            }
        }
    }

    public function add_note() {
        if ($this->request->is('post')) {
            $note = $this->request->data['note'];
            $url = $this->request->data['url'];
            $this->loadModel('Items');
            $item = $this->Items->find()->where(['Items.url' => $url])->first();
            $note_entity = [
                'user_id' => $this->request->session()->read('user_id'),
                'item_id' => $item->id,
                'content' => $note
            ];
            $new_note = $this->Notes->newEntity($note_entity);
            $this->Notes->save($new_note);
            return $this->redirect(['controller' => 'Users', 'action' => 'app_view', $url]);
        }
    }

    public function filter() {

        $this->set('words', $this->Words->find()->all());

    }

    public function show_filter() {

        $this->loadModel('Configurations');

        $configuration = $this->Configurations->get('1');

        $this->set('host_server', $configuration->host);

        if ($this->request->is(['post', 'put', 'ajax'])) {
            $filters_array = array();
            foreach ($this->request->data['filter'] as $filter) {
                if ($filter!='0') {
                    $filters_array[$filter] = $filter;
                }
            }

            $this->set('favorites', $this->Favorites->find('all')->where(['user_id' => $this->request->session()->read('user_id')]));
            $item_words = $this->WordsItems->find()->select(['WordsItems.item_id'])->where(['WordsItems.word_id IN' => $filters_array])->hydrate(false);
            $items = $this->Items->find()->where(['Items.id IN' => $item_words]);
            $this->set('items', $items);

            if ($this->request->session()->read('user_id')) {
                $user = $this->Users->get($this->request->session()->read('user_id'));
                $this->set('user', $user);

            }

        }
    }

}
