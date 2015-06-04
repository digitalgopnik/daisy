<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Notes Controller
 *
 * @property \App\Model\Table\NotesTable $Notes
 */
class NotesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->loadModel('Items');
        $this->set('items', $this->paginate($this->Items));
        $this->set('notes', $this->Notes->find()->where(['Notes.user_id' => $this->request->session()->read('user_id')]));
        $this->set('_serialize', ['notes']);
    }

    /**
     * View method
     *
     * @param string|null $id Note id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {

        $note = $this->Notes->get($id, [
            'contain' => []
        ]);
        if ($this->request->session()->read('user_id')!=$note->user_id) {
            $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
        }
        $this->set('note', $note);
        $this->set('_serialize', ['note']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $note = $this->Notes->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $this->request->session()->read('user_id');
            $note = $this->Notes->patchEntity($note, $this->request->data);
            if ($this->Notes->save($note)) {
                $this->Flash->success(__('The note has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The note could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('note'));
        $this->set('_serialize', ['note']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Note id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $note = $this->Notes->get($id, [
            'contain' => []
        ]);
        if ($this->request->session()->read('user_id')!=$note->user_id) {
            $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $note = $this->Notes->patchEntity($note, $this->request->data);
            if ($this->Notes->save($note)) {
                $this->Flash->success(__('The note has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The note could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('note'));
        $this->set('_serialize', ['note']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Note id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $note = $this->Notes->get($id);
        if ($this->Notes->delete($note)) {
            $this->Flash->success(__('The note has been deleted.'));
        } else {
            $this->Flash->error(__('The note could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
