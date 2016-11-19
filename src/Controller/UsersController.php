<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Travels']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario gravado.'));

                return $this->redirect(['Controller'=>'users','action' => 'login']);
            } else {
                $this->Flash->error(__('Usuario nao gravado. Por favor, tenta denovo.'));
            }
        }
        $travels = $this->Users->Travels->find('list', ['limit' => 200]);
        $this->set(compact('user', 'travels'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Travels']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario gravado.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O usuario nao gravado. por favor, tenta de novo.'));
            }
        }
        $travels = $this->Users->Travels->find('list', ['limit' => 200]);
        $this->set(compact('user', 'travels'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('O usuario removido.'));
        } else {
            $this->Flash->error(__('O usuario nao removido. por favor, tenta de novo.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function login()
    {
        if($this->request->is('post'))
        {
            $user=$this->Auth->identify();
            if($user)
            {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else
            {
                $this->Flash->error('Dados invalido, por tenta novamente',['key'=>'auth']);
            }
        }
    }

    public function logout()
    {
        $this->Flash->success('Ja nao estas logado.');
        return $this->redirect($this->Auth->logout());
    }

    public function isAuthorize($user)
    {
        if(isset($user['role']) and $user['role']==='user')
        {
           if(in_array($this->request->action,['index','logout']))
           {
                return true;
           }
        }
        return parent::isAutorized($user);
    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add','login'],['Controller'=>'travels','action'=>'index']);
    }

}