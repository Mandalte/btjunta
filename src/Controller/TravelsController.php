<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Travels Controller
 *
 * @property \App\Model\Table\TravelsTable $Travels
 */
class TravelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public function index()
    {
        if($this->request->is('post')){
                               // $this->Flash->success($this->request->data['hora']);
                               // pr($this->request->data);
            $query=null;
            if(($this->request->data['lpartida'])!=='' and ($this->request->data['destino'])!=='' and ($this->request->data['hora'])!==null){
                $this->Flash->success('hora partida e destino');
                     $query = $this->Travels->find('all', [
                    'conditions' =>[ 'and'=>['travels.local_to_start LIKE' => '%'.$this->request->data['lpartida'].'%',
                    'travels.destination LIKE' => '%'.$this->request->data['destino'].'%','travels.time_to_go LIKE' => '%'.$this->request->data['hora'].'%']]]);

            }elseif(($this->request->data['lpartida'])!=='' and ($this->request->data['destino'])!==''){
                $this->Flash->success('partida e destino');
                     $query = $this->Travels->find('all', ['conditions' =>[ 'and'=>['travels.local_to_start LIKE' => '%'.$this->request->data['lpartida'].'%','travels.destination LIKE' => '%'.$this->request->data['destino'].'%']]]);

            }elseif(($this->request->data['hora'])!=='' and ($this->request->data['lpartida'])!==''){
                $this->Flash->success('hora e partida');
                     $query = $this->Travels->find('all', [
                    'conditions' =>[ 'and'=>['travels.local_to_start LIKE' => '%'.$this->request->data['lpartida'].'%','travels.time_to_go LIKE' => '%'.$this->request->data['hora'].'%']]]);
            
            }elseif(($this->request->query('hora'))!=='' and ($this->request->data['destino'])!==''){
                $this->Flash->success('hora e destino');
                     $query = $this->Travels->find('all', [
                    'conditions' =>[ 'and'=>['travels.destination LIKE' => '%'.$this->request->data['destino'].'%','travels.time_to_go LIKE' => '%'.$this->request->data['hora'].'%']]]);

            }elseif (($this->request->data['destino'])!=='') {
                $this->Flash->success('destino');
                     $query = $this->Travels->find('all', [
                    'conditions' =>['travels.destination LIKE' => '%'.$this->request->data['destino'].'%']]);
            }elseif (($this->request->data['lpartida'])!=='') {
                $this->Flash->success('partida');
                     $query = $this->Travels->find('all', [
                        'conditions' =>['travels.local_to_start LIKE' => '%'.$this->request->data['lpartida'].'%']]);
            }elseif(($this->request->data['hora'])!==''){
                $this->Flash->success('hora'.$this->request->data['hora']);
                    $query = $this->Travels->find('all', [
                        'conditions' =>['travels.time_to_go >=' => $this->request->data['hora']]]);
                

            }
            $travels = $this->paginate($query);
        }else{
            $travels = $this->paginate($this->Travels);
            }

        $this->set(compact('travels'));
        $this->set('_serialize', ['travels']);

    }

    /**
     * View method
     *
     * @param string|null $id Travel id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $travel = $this->Travels->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('travel', $travel);
        $this->set('_serialize', ['travel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $travel = $this->Travels->newEntity();
        if ($this->request->is('post')) {
            $travel = $this->Travels->patchEntity($travel, $this->request->data);
            $travel['user_id']= $this->request->session()->read('id');
            if ($this->Travels->save($travel)) {
                $this->Flash->success(__('The travel has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The travel could not be saved. Please, try again.'));
            }
        }
        $users = $this->Travels->Users->find('list', ['limit' => 200]);
        $this->set(compact('travel', 'users'));
        $this->set('_serialize', ['travel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Travel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $travel = $this->Travels->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $travel = $this->Travels->patchEntity($travel, $this->request->data);
            if ($this->Travels->save($travel)) {
                $this->Flash->success(__('The travel has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The travel could not be saved. Please, try again.'));
            }
        }
        $users = $this->Travels->Users->find('list', ['limit' => 200]);
        $this->set(compact('travel', 'users'));
        $this->set('_serialize', ['travel']);
    }

     public function get($id = null)
    {
        $travel = $this->Travels->get(1, [
            'contain' => ['Users']
        ]);
        return $travel;
    }

    /**
     * Delete method
     *
     * @param string|null $id Travel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $travel = $this->Travels->get($id);
        if ($this->Travels->delete($travel)) {
            $this->Flash->success(__('The travel has been deleted.'));
        } else {
            $this->Flash->error(__('The travel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
