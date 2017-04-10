<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Passengers Controller
 *
 * @property \App\Model\Table\PassengersTable $Passengers
 */
class PassengersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public $paginate = [
        'order' => ['Passengers.surname' => 'ASC'],
    ];
    public function index()
    {
        $passengers = $this->paginate($this->Passengers);

        $this->set(compact('passengers'));
        $this->set('_serialize', ['passengers']);
    }

    /**
     * View method
     *
     * @param string|null $id Passenger id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $passenger = $this->Passengers->get($id, [
            'contain' => ['Trips']
        ]);

        $this->set('passenger', $passenger);
        $this->set('_serialize', ['passenger']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $passenger = $this->Passengers->newEntity();
        if ($this->request->is('post')) {
            $passenger = $this->Passengers->patchEntity($passenger, $this->request->getData());
            if ($this->Passengers->save($passenger)) {
                $this->Flash->success(__('The passenger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The passenger could not be saved. Please, try again.'));
        }
        $trips = $this->Passengers->Trips->find('list', ['limit' => 200]);
        $this->set(compact('passenger', 'trips'));
        $this->set('_serialize', ['passenger']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Passenger id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $passenger = $this->Passengers->get($id, [
            'contain' => ['Trips']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $passenger = $this->Passengers->patchEntity($passenger, $this->request->getData());
            if ($this->Passengers->save($passenger)) {
                $this->Flash->success(__('The passenger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The passenger could not be saved. Please, try again.'));
        }
        $trips = $this->Passengers->Trips->find('list', ['limit' => 200]);
        $this->set(compact('passenger', 'trips'));
        $this->set('_serialize', ['passenger']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Passenger id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $passenger = $this->Passengers->get($id);
        if ($this->Passengers->delete($passenger)) {
            $this->Flash->success(__('The passenger has been deleted.'));
        } else {
            $this->Flash->error(__('The passenger could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
