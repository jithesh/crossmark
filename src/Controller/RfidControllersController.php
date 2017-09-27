<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RfidControllers Controller
 *
 * @property \App\Model\Table\RfidControllersTable $RfidControllers
 *
 * @method \App\Model\Entity\RfidController[] paginate($object = null, array $settings = [])
 */
class RfidControllersController extends AppController
{
	public function ajaxData()
    {
    	$this->autoRender= False;
		$query = $this->RfidControllers->find('all')->toArray();
        $data = array();
        foreach($query as $value){
        	$temparr=array();
			$temparr['id']=$value['id'];
			$temparr['rowid']=$value['id'];
			$temparr['name']=$value['name'];
			$temparr['description']=$value['description'];
			$temparr['latitude']=$value['lat'];
			$temparr['longitude']=$value['lon'];
			$temparr['type']=$value['type'];
			$temparr['model']=$value['model'];
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
            'contain' => ['Zones', 'Customers']
        ];
        $rfidControllers = $this->paginate($this->RfidControllers);

        $this->set(compact('rfidControllers'));
        $this->set('_serialize', ['rfidControllers']);
		
		$headers =['Name','Description','Type','Model','Latitude','Longitude'];
        $this->set('headers',$headers);	
    }

    /**
     * View method
     *
     * @param string|null $id Rfid Controller id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rfidController = $this->RfidControllers->get($id, [
            'contain' => ['Zones', 'Customers']
        ]);

        $this->set('rfidController', $rfidController);
        $this->set('_serialize', ['rfidController']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rfidController = $this->RfidControllers->newEntity();
        if ($this->request->is('post')) {
            $rfidController = $this->RfidControllers->patchEntity($rfidController, $this->request->getData());
            if ($this->RfidControllers->save($rfidController)) {
                $this->Flash->success(__('The rfid controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfid controller could not be saved. Please, try again.'));
        }
        $zones = $this->RfidControllers->Zones->find('list', ['limit' => 200]);
        $customers = $this->RfidControllers->Customers->find('list', ['limit' => 200]);
        $this->set(compact('rfidController', 'zones', 'customers'));
        $this->set('_serialize', ['rfidController']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rfid Controller id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rfidController = $this->RfidControllers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rfidController = $this->RfidControllers->patchEntity($rfidController, $this->request->getData());
            if ($this->RfidControllers->save($rfidController)) {
                $this->Flash->success(__('The rfid controller has been saved.'));

                echo '<script type="text/javascript">window.top.location.href = "/RfidControllers"</script>';
            }else{
            	$this->Flash->error(__('The rfid controller could not be saved. Please, try again.'));
				echo '<script type="text/javascript">window.top.location.href = "/RfidControllers"</script>';
            }
        }
        $zones = $this->RfidControllers->Zones->find('list', ['limit' => 200]);
        $customers = $this->RfidControllers->Customers->find('list', ['limit' => 200]);
        $this->set(compact('rfidController', 'zones', 'customers'));
        $this->set('_serialize', ['rfidController']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rfid Controller id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rfidController = $this->RfidControllers->get($id);
        if ($this->RfidControllers->delete($rfidController)) {
            $this->Flash->success(__('The rfid controller has been deleted.'));
        } else {
            $this->Flash->error(__('The rfid controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function deleteSelected(){
     	
 		if($this->request->is('ajax')) {
 				
 			$this->autoRender=false;
 			$rfidTag = $this->RfidControllers->get($this->request->data["value"]);
 			if ($this->RfidControllers->delete($rfidTag)) {
 				$this->response->body("success");
 	    		return $this->response;
 			}else{
 				$this->response->body("error");
 	    		return $this->response;
 			}
 		}			
 	}
}
