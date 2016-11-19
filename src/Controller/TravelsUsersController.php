<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\TravelsController;

/**
 * TravelsUsers Controller
 *
 * @property \App\Model\Table\TravelsUsersTable $TravelsUsers
 */
class TravelsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Travels', 'Users']
        ];
        $travelsUsers = $this->paginate($this->TravelsUsers);

        $this->set(compact('travelsUsers'));
        $this->set('_serialize', ['travelsUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Travels User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $travelsUser = $this->TravelsUsers->get($id, [
            'contain' => ['Travels', 'Users']
        ]);

        $this->set('travelsUser', $travelsUser);
        $this->set('_serialize', ['travelsUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($travel_id)
    {
        $travelsUser = $this->TravelsUsers->newEntity();

        if(!$this->request->session()->read('if')){  
        if($this->request->session()->read('pagamento')){
            $travelsUser['volume']= $this->request->session()->read('vol');
            $travelsUser['weight']= $this->request->session()->read('peso');
            $travelsUser['total_price'] = 10;
            $travelsUser['travel_id']= $this->request->session()->read('viagem');
            $travelsUser['user_id']= $this->request->session()->read('id');
   
        if ($this->request->session()->read('numeros')==1) {

                if ($this->TravelsUsers->save($travelsUser)) {

                        $this->Flash->success(__('Bilhete gravado.'));

                    return $this->redirect(['Controller'=>'travels','action' => 'index']);
                } else {
                    $this->Flash->error(__('Bilhete nao comprado. Por favor, tenta de novo.'));
                }

                }else{
                    $travelsUser['space_number']=1;
                    $this->TravelsUsers->save($travelsUser);
                
                    for ($i=1; $i < $this->request->data['space_number']; $i++) {
                        $travelsUser = $this->TravelsUsers->newEntity();
                        $travelsUser['space_number']=1;
                        $travelsUser['travel_id']=$this->request->session()->read('viagem');
                        $travelsUser['user_id']= $this->request->session()->read('id');
                        $travelsUser['total_price'] = 10;
                        $travelsUser['volume']=0;
                        $travelsUser['weight']=0;
                                                
                        if ($this->TravelsUsers->save($travelsUser)) {

                        }else{
                            $this->Flash->error(__('Bilhete nao comprado. Por favor, tenta de novo.'));
                        }
                    }
                    $this->Flash->success(__($this->request->data['space_number'].' Bilhete gravado.'));
                     return $this->redirect(['Controller'=>'travels','action' => 'index']);
                }


        }else{

        $this->request->session()->write('vol',$this->request->data['volume']);
        $this->request->session()->write('peso',$this->request->data['weight']);
        $this->request->session()->write('numeros',$this->request->data['space_number']);
        $travels = $this->TravelsUsers->Travels->find('list', ['limit' => 200]);
        $users = $this->TravelsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('travelsUser', 'travels', 'users'));
        $this->set('_serialize', ['travelsUser']);

        }



    }else{

         $this->request->session()->write('viagem',$travel_id);
         //$this->request->session()->write('v_space',$travel_space);
         /**$this->request->session()->write('v_space_cost',$space_cost);
         $this->request->session()->write('v_volume',$volume);
         $this->request->session()->write('v_volume_cost',$volume_cost);
         $this->request->session()->write('v_weight',$weight);
         $this->request->session()->write('v_weight_cost',$weight_cost);**/

        $travels = $this->TravelsUsers->Travels->find('list', ['limit' => 200]);
        $users = $this->TravelsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('travelsUser', 'travels', 'users'));
        $this->set('_serialize', ['travelsUser']);

    }
    }

    /**
     * Edit method
     *
     * @param string|null $id Travels User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $travelsUser = $this->TravelsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $travelsUser = $this->TravelsUsers->patchEntity($travelsUser, $this->request->data);
            if ($this->TravelsUsers->save($travelsUser)) {
                $this->Flash->success(__('Bilhete gravado.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('bilhete nao gravado. Por favor, tenta novamente.'));
            }
        }
        $travels = $this->TravelsUsers->Travels->find('list', ['limit' => 200]);
        $users = $this->TravelsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('travelsUser', 'travels', 'users'));
        $this->set('_serialize', ['travelsUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Travels User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $travelsUser = $this->TravelsUsers->get($id);
        if ($this->TravelsUsers->delete($travelsUser)) {
            $this->Flash->success(__('O bilhete foi removido.'));
        } else {
            $this->Flash->error(__('O bilhete nao foi removido. Por favor, tenta novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
