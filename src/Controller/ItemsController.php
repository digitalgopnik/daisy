<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 */
class ItemsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('items', $this->paginate($this->Items));
        $this->set('_serialize', ['items']);
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        $this->set('item', $item);
        $this->set('_serialize', ['item']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $item = $this->Items->newEntity();
        if ($this->request->is('post')) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('item'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Words');
        $this->loadModel('WordsItems');
        $words_items = $this->WordsItems->find()->select(['WordsItems.word_id'])->where(['WordsItems.item_id' => $id])->hydrate(false);
        $this->set('selected_words', $this->Words->find()->where(['Words.id IN' => $words_items]));
        $this->set('words', $this->Words->find()->where(['Words.id NOT IN' => $words_items]));
        $this->set(compact('item'));
        $this->set('_serialize', ['item']);
    }

    public function save_words() {
        $this->loadModel('WordsItems');
        if ($this->request->is(['post', 'put'])) {
            foreach($this->request->data['words'] as $word) {
                if (isset($word['0']) && $word['0']!='') {
                    $new_word_item = [
                        'word_id' => $word['0'],
                        'item_id' => $this->request->data['item_id']
                    ];

                    $new_word = $this->WordsItems->newEntity($new_word_item);
                    $this->WordsItems->save($new_word);
                }
            }
            $this->Flash->success(__('Die Wörter wurden gespeichert.'));
            return $this->redirect(['action' => 'edit', $this->request->data['item_id']]);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
