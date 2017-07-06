<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Music Controller
 *
 * @property \App\Model\Table\MusicTable $Music
 */
class MusicController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        
        $this->loadComponent('Flash');/**Add flash component **/
    }

    
    public function index()
    {
        $this ->set ('music', $this->Music->find('all'));
        $music = $this->paginate($this->Music);

        $this->set(compact('music'));
        $this->set('_serialize', ['music']);
    }

    /**
     * View method
     *
     * @param string|null $id Music id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article= $this->Music->get($id);
        $this->set(compact('music'));
        
        $music = $this->Music->get($id, [
            'contain' => []
        ]);

        $this->set('music', $music);
        $this->set('_serialize', ['music']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $music = $this->Music->newEntity();
        if ($this->request->is('post')) {
            $music = $this->Music->patchEntity($music, $this->request->data);
            if ($this->Music->save($music)) {
                $this->Flash->success(__('The music has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The music could not be saved. Please, try again.'));
        }
        $this->set(compact('music'));
        $this->set('_serialize', ['music']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Music id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $music = $this->Music->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $music = $this->Music->patchEntity($music, $this->request->data);
            if ($this->Music->save($music)) {
                $this->Flash->success(__('The music has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The music could not be saved. Please, try again.'));
        }
        $this->set(compact('music'));
        $this->set('_serialize', ['music']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Music id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        
        $music = $this->Music->get($id);
        if ($this->Music->delete($music)) {
            $this->Flash->success(__('The music has been deleted.'));
        } else {
            $this->Flash->error(__('The music could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
