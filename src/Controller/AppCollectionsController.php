<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AppCollections Controller
 *
 * @property \App\Model\Table\AppCollectionsTable $AppCollections
 */
class AppCollectionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('appCollections', $this->paginate($this->AppCollections));
        $this->set('_serialize', ['appCollections']);
    }

    /**
     * View method
     *
     * @param string|null $id App Collection id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appCollection = $this->AppCollections->get($id, [
            'contain' => []
        ]);
        $this->set('appCollection', $appCollection);
        $this->set('_serialize', ['appCollection']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appCollection = $this->AppCollections->newEntity();
        if ($this->request->is('post')) {
            $appCollection = $this->AppCollections->patchEntity($appCollection, $this->request->data);
            if ($this->AppCollections->save($appCollection)) {
                $this->Flash->success(__('The app collection has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The app collection could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('appCollection'));
        $this->set('_serialize', ['appCollection']);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Collection id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appCollection = $this->AppCollections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appCollection = $this->AppCollections->patchEntity($appCollection, $this->request->data);
            if ($this->AppCollections->save($appCollection)) {
                $this->Flash->success(__('The app collection has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The app collection could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('appCollection'));
        $this->set('_serialize', ['appCollection']);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Collection id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appCollection = $this->AppCollections->get($id);
        if ($this->AppCollections->delete($appCollection)) {
            $this->Flash->success(__('The app collection has been deleted.'));
        } else {
            $this->Flash->error(__('The app collection could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
