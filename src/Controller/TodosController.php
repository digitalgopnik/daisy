<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


/**
 * Todos Controller
 *
 * @property \App\Model\Table\TodosTable $Todos
 */
class TodosController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $user_id = $this->request->session()->read('user_id');
        if (!is_numeric($user_id)) {
            $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
        }
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('todos', $this->paginate($this->Todos));
        $this->set('_serialize', ['todos']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $todo = $this->Todos->newEntity();
        if ($this->request->is('post')) {
            $todo = $this->Todos->patchEntity($todo, $this->request->data);
            if ($this->Todos->save($todo)) {
                $this->Flash->success(__('The todo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The todo could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('todo'));
        $this->set('_serialize', ['todo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Todo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $todo = $this->Todos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $todo = $this->Todos->patchEntity($todo, $this->request->data);
            if ($this->Todos->save($todo)) {
                $this->Flash->success(__('The todo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The todo could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('todo'));
        $this->set('_serialize', ['todo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Todo id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $todo = $this->Todos->get($id);
        if ($this->Todos->delete($todo)) {
            $this->Flash->success(__('The todo has been deleted.'));
        } else {
            $this->Flash->error(__('The todo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
