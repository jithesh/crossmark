<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RfidReaders Controller
 *
 * @property \App\Model\Table\RfidReadersTable $RfidReaders
 *
 * @method \App\Model\Entity\RfidReader[] paginate($object = null, array $settings = [])
 */
class RfidReadersController extends AppController
{
	public function ajaxData()
    {
    	$this->autoRender= False;
		$query = $this->RfidReaders->find('all')->toArray();
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
            'contain' => ['Zones']
        ];
        $rfidReaders = $this->paginate($this->RfidReaders);

        $this->set(compact('rfidReaders'));
        $this->set('_serialize', ['rfidReaders']);
		
		$headers =['Name','Description','Type','Model','Latitude','Longitude'];
        $this->set('headers',$headers);	
    }

    /**
     * View method
     *
     * @param string|null $id Rfid Reader id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rfidReader = $this->RfidReaders->get($id, [
            'contain' => ['Zones']
        ]);

        $zones = $this->RfidReaders->Zones->find('list', ['limit' => 200]);
        $this->set(compact('rfidReader', 'zones'));
        $this->set('_serialize', ['rfidReader']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rfidReader = $this->RfidReaders->newEntity();
        if ($this->request->is('post')) {
            $rfidReader = $this->RfidReaders->patchEntity($rfidReader, $this->request->getData());
            if ($this->RfidReaders->save($rfidReader)) {
                $this->Flash->success(__('The rfid reader has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfid reader could not be saved. Please, try again.'));
        }
        $zones = $this->RfidReaders->Zones->find('list', ['limit' => 200]);
        $this->set(compact('rfidReader', 'zones'));
        $this->set('_serialize', ['rfidReader']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rfid Reader id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rfidReader = $this->RfidReaders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rfidReader = $this->RfidReaders->patchEntity($rfidReader, $this->request->getData());
            if ($this->RfidReaders->save($rfidReader)) {
                $this->Flash->success(__('The rfid reader has been saved.'));

                echo '<script type="text/javascript">window.top.location.href = window.top.location.href;</script>';
                //return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfid reader could not be saved. Please, try again.'));
        }
        $zones = $this->RfidReaders->Zones->find('list', ['limit' => 200]);
        $this->set(compact('rfidReader', 'zones'));
        $this->set('_serialize', ['rfidReader']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rfid Reader id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rfidReader = $this->RfidReaders->get($id);
        if ($this->RfidReaders->delete($rfidReader)) {
            $this->Flash->success(__('The rfid reader has been deleted.'));
        } else {
            $this->Flash->error(__('The rfid reader could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function deleteSelected(){
    	
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;
			$keyVal = $this->RfidReaders->get($this->request->data["value"]);
			if ($this->RfidReaders->delete($keyVal)) {
				$this->response->body("success");
	    		return $this->response;
			}else{
				$this->response->body("error");
	    		return $this->response;
			}
		}			
	}
}
