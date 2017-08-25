<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OperatingStations Controller
 *
 * @property \App\Model\Table\OperatingStationsTable $OperatingStations
 *
 * @method \App\Model\Entity\OperatingStation[] paginate($object = null, array $settings = [])
 */
class OperatingStationsController extends AppController
{
	public function ajaxData()
    {
    	$this->autoRender= False;
		$query = $this->OperatingStations->find('all')->toArray();
        $data = array();
        foreach($query as $value){
        	$temparr=array();
			$temparr['id']=$value['id'];
			$temparr['rowid']=$value['id'];
			$temparr['name']=$value['name'];
			$temparr['description']=$value['description'];
			$temparr['latitude']=$value['lat'];
			$temparr['longitude']=$value['lon'];
			$temparr['customer_id']=$value['customer_id'];
			array_push($data,$temparr);
		}
		 
		echo json_encode($data);		
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $operatingStations = $this->paginate($this->OperatingStations);

        $this->set(compact('operatingStations'));
        $this->set('_serialize', ['operatingStations']);
		
		$headers =['Name','Description','Latitude','Longitude'];
        $this->set('headers',$headers);	
    }

    /**
     * View method
     *
     * @param string|null $id Operating Station id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operatingStation = $this->OperatingStations->get($id, [
            'contain' => ['Customers']
        ]);

        $customers = $this->OperatingStations->Customers->find('list', ['limit' => 200]);
        $this->set(compact('operatingStation', 'customers'));
        $this->set('_serialize', ['operatingStation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operatingStation = $this->OperatingStations->newEntity();
        if ($this->request->is('post')) {
            $operatingStation = $this->OperatingStations->patchEntity($operatingStation, $this->request->getData());
            if ($this->OperatingStations->save($operatingStation)) {
                $this->Flash->success(__('The operating station has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The operating station could not be saved. Please, try again.'));
        }
        $customers = $this->OperatingStations->Customers->find('list', ['limit' => 200]);
        $this->set(compact('operatingStation', 'customers'));
        $this->set('_serialize', ['operatingStation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Operating Station id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operatingStation = $this->OperatingStations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operatingStation = $this->OperatingStations->patchEntity($operatingStation, $this->request->getData());
            if ($this->OperatingStations->save($operatingStation)) {
                $this->Flash->success(__('The operating station has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The operating station could not be saved. Please, try again.'));
        }
        $customers = $this->OperatingStations->Customers->find('list', ['limit' => 200]);
        $this->set(compact('operatingStation', 'customers'));
        $this->set('_serialize', ['operatingStation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Operating Station id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operatingStation = $this->OperatingStations->get($id);
        if ($this->OperatingStations->delete($operatingStation)) {
            $this->Flash->success(__('The operating station has been deleted.'));
        } else {
            $this->Flash->error(__('The operating station could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function deleteSelected(){
    	
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;
			$rfidTag = $this->OperatingStations->get($this->request->data["value"]);
			if ($this->OperatingStations->delete($rfidTag)) {
				$this->response->body("success");
	    		return $this->response;
			}else{
				$this->response->body("error");
	    		return $this->response;
			}
		}			
	}
}
