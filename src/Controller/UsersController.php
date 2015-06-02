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
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['login', 'display']);
    }

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    public function login()
    {
        // TODO: if post
        $server = "ldapk5.tu-bs.de";

        // TODO: LDAP Request

        if ($this->request->is(['post', 'put'])) {

            $ldap = ldap_connect($server);

            $username = $this->request->data['username'];
            $password = $this->request->data['password'];

            $dn = "uid=$username,ou=people,dc=tu-bs,dc=de";

            ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

            $bind = ldap_bind($ldap, $dn, $password);

            if ($bind) {
                $users = TableRegistry::get('users');
                $hashed_username = md5($username);
                $user = $users->find()->where(['hashed_username' => $hashed_username])->first();
                if ($user) {
                    $this->request->session()->write('user_id', $user->id);
                    $this->set('user_id', $this->request->session()->read('user_id'));
                } else {
                    $new_user_entity = [
                        'hashed_username' => $hashed_username,
                        'role' => 'student'
                    ];
                    $user_entity = $users->newEntity($new_user_entity);
                    $user = $users->save($user_entity);
                    $this->request->session()->write('user_id', $user->id);
                    $this->set('user_id', $this->request->session()->read('user_id'));
                }
                $this->redirect(['controller' => 'Pages', 'action' => 'display', 'logged_home']);
            } else {
                $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }

        }
    }

    public function logout() {
    }

    public function edit($user_id = null) {
        $users = TableRegistry::get('users');
        $user = $users->get($user_id);

        if ($this->request->is(['post', 'put'])) {
            $patch_user = [
                'role' => $this->request->data['role']
            ];
            $user = $users->patchEntity($user, $patch_user);
            $users->save($user);
            $this->redirect(['controller' => 'Users', 'action' => 'edit', $user_id]);
        }
    }

}
