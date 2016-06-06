<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


/**
 * Favorites Controller
 *
 * @property \App\Model\Table\FavoritesTable $Favorites
 */
class FavoritesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->loadModel('Favorites');
        $this->loadModel('Items');
        $this->loadModel('Users');

        $user_id = $this->request->session()->read('user_id');
        if (!is_numeric($user_id)) {
            $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
        }
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($item_id = null)
    {
        $this->viewBuilder()->layout("ajax");
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $new_favorite = [
                'user_id' => $this->request->session()->read('user_id'),
                'item_id' => $item_id
            ];
            $favorite = $this->Favorites->newEntity($new_favorite);
            $this->Favorites->save($favorite);

        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Favorite id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($item_id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->viewBuilder()->layout("ajax");
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $favorite = $this->Favorites->find()->where(['user_id' => $this->request->session()->read('user_id'), 'item_id' => $item_id])->first();
            $this->Favorites->delete($favorite);
        }
    }

    public function dashboard() {

        if ($this->request->session()->read('user_id')) {
            $user = $this->Users->get($this->request->session()->read('user_id'));

            $favorites = $this->Favorites->find()->select('Favorites.item_id')->where(['Favorites.user_id' => $user->id]);
            $this->set('favorites', $favorites);
            $this->set('items', $this->Items->find('all')->where(['Items.id IN' => $favorites]));

            $this->set('user', $user);

        }

        $this->loadModel('Configurations');

        $configuration = $this->Configurations->get('1');

        $this->set('host_server', $configuration->host);

    }
}


