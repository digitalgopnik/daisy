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
    public function add()
    {
        $favorite = $this->Favorites->newEntity();
        if ($this->request->is('post')) {
            $favorite = $this->Favorites->patchEntity($favorite, $this->request->data);
            if ($this->Favorites->save($favorite)) {
                $this->Flash->success(__('The favorite has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The favorite could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('favorite'));
        $this->set('_serialize', ['favorite']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Favorite id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $favorite = $this->Favorites->get($id);
        if ($this->Favorites->delete($favorite)) {
            $this->Flash->success(__('The favorite has been deleted.'));
        } else {
            $this->Flash->error(__('The favorite could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function dashboard() {

        if ($this->request->session()->read('user_id')) {
            $user = $this->Users->get($this->request->session()->read('user_id'));

            $favorites = $this->Favorites->find()->select('Favorites.item_id')->where(['Favorites.user_id' => $user->id]);

            $this->set('items', $this->Items->find('all')->where(['Items.id IN' => $favorites]));

            $this->set('user', $user);

        }

    }
}


