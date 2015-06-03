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

use App\Controller\DropboxesController;
use App\Controller\Component\DropboxComponent;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Session;

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

        //$this->Auth->allow(['login', 'logout', 'dashboard']);

        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        //$this->Auth->allow(['login', 'logout', 'dashboard']);
    }

    public function login()
    {
        $server = "ldapk5.tu-bs.de";

        if ($this->request->is(['post', 'put'])) {

            $ldap = ldap_connect($server);

            $username = $this->request->data['username'];
            $password = $this->request->data['password'];

            $dn = "uid=$username,ou=people,dc=tu-bs,dc=de";

            ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

            $bind = ldap_bind($ldap, $dn, $password);

            if ($bind) {
                $hashed_username = md5($username);
                $hashed_password = md5($username."password");
                $user = $this->Users->find()->where(['username' => $hashed_username])->first();
                if (!$user) {
                    $new_user_entity = [
                        'username' => $hashed_username,
                        'password' => $hashed_password,
                        'role' => 'student'
                    ];
                    $user_entity = $this->Users->newEntity($new_user_entity);
                    $user = $this->Users->save($user_entity);
                }
                $this->set('user', $user);
                $this->request->session()->write('user_id', $user->id);
                $this->request->session()->write('user_role', $user->role);
                $this->redirect(['action' => 'dashboard']);
            } else {
                $this->Flash->error(__('Benutzername oder Passwort nicht korrekt.'));
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

        $this->set('items', $this->Items->find('all'));

        if ($this->request->session()->read('user_id')) {
            $user = $this->Users->get($this->request->session()->read('user_id'));
            $this->set('user', $user);

        }

    }

    public function test_dropbox() {
        $dropbox_controller = new DropBoxesController();

        $dropbox_controller->index();
    }

}
