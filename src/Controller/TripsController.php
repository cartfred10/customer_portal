<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Trips Controller
 *
 * @property \App\Model\Table\TripsTable $Trips
 */
class TripsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $trips = $this->paginate($this->Trips);

        $this->set(compact('trips'));
        $this->set('_serialize', ['trips']);
    }

    /**
     * View method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */



    public function view($id = null)
    {
        $trip = $this->Trips->get($id, [
            'contain' => ['Passengers']
        ]);

        $this->set('trip', $trip);
        $this->set('_serialize', ['trip']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trip = $this->Trips->newEntity();
        if ($this->request->is('post')) {
            $trip = $this->Trips->patchEntity($trip, $this->request->getData());
            if ($this->Trips->save($trip)) {
                $this->Flash->success(__('The trip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trip could not be saved. Please, try again.'));
        }
        $passengers = $this->Trips->Passengers->find('list', ['limit' => 200]);
        $this->set(compact('trip', 'passengers'));
        $this->set('_serialize', ['trip']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trip = $this->Trips->get($id, [
            'contain' => ['Passengers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trip = $this->Trips->patchEntity($trip, $this->request->getData());
            if ($this->Trips->save($trip)) {
                $this->Flash->success(__('The trip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trip could not be saved. Please, try again.'));
        }
        $passengers = $this->Trips->Passengers->find('list', ['limit' => 200]);
        $this->set(compact('trip', 'passengers'));
        $this->set('_serialize', ['trip']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trip = $this->Trips->get($id);
        if ($this->Trips->delete($trip)) {
            $this->Flash->success(__('The trip has been deleted.'));
        } else {
            $this->Flash->error(__('The trip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
