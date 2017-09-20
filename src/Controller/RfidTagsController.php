<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RfidTags Controller
 *
 * @property \App\Model\Table\RfidTagsTable $RfidTags
 *
 * @method \App\Model\Entity\RfidTag[] paginate($object = null, array $settings = [])
 */
class RfidTagsController extends AppController
{
	public function ajaxData()
    {
    	$this->autoRender= False;
		$query = $this->RfidTags->find('all')->toArray();
        $data = array();
        foreach($query as $value){
        	$temparr=array();
			$temparr['id']=$value['id'];
			$temparr['rowid']=$value['id'];
			$temparr['name']=$value['name'];
			$temparr['description']=$value['description'];
			$temparr['activated']=$value['activated'];
			$temparr['archived']=$value['archived'];
			$temparr['latitude']=$value['lat'];
			$temparr['longitude']=$value['lon'];
			$temparr['type']=$value['type'];
			$temparr['make']=$value['make'];
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
            'contain' => ['Terminals']
        ];
        $rfidTags = $this->paginate($this->RfidTags);

        $this->set(compact('rfidTags'));
        $this->set('_serialize', ['rfidTags']);
		
		$headers =['Name','Description','Activated','Archived','Type','Make','Latitude','Longitude'];
        $this->set('headers',$headers);
    }

    /**
     * View method
     *
     * @param string|null $id Rfid Tag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rfidTag = $this->RfidTags->get($id, [
            'contain' => ['Terminals']
        ]);

        $terminals = $this->RfidTags->Terminals->find('list', ['limit' => 200]);
        $this->set(compact('rfidTag', 'terminals'));
        $this->set('_serialize', ['rfidTag']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rfidTag = $this->RfidTags->newEntity();
        if ($this->request->is('post')) {
            $rfidTag = $this->RfidTags->patchEntity($rfidTag, $this->request->getData());
            if ($this->RfidTags->save($rfidTag)) {
                $this->Flash->success(__('The rfid tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfid tag could not be saved. Please, try again.'));
        }
        $terminals = $this->RfidTags->Terminals->find('list', ['limit' => 200]);
        $this->set(compact('rfidTag', 'terminals'));
        $this->set('_serialize', ['rfidTag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rfid Tag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rfidTag = $this->RfidTags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rfidTag = $this->RfidTags->patchEntity($rfidTag, $this->request->getData());
            if ($this->RfidTags->save($rfidTag)) {
                $this->Flash->success(__('The rfid tag has been saved.'));

                echo '<script type="text/javascript">window.top.location.href = window.top.location.href;</script>';
                //return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfid tag could not be saved. Please, try again.'));
        }
        $terminals = $this->RfidTags->Terminals->find('list', ['limit' => 200]);
        $this->set(compact('rfidTag', 'terminals'));
        $this->set('_serialize', ['rfidTag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rfid Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rfidTag = $this->RfidTags->get($id);
        if ($this->RfidTags->delete($rfidTag)) {
            $this->Flash->success(__('The rfid tag has been deleted.'));
        } else {
            $this->Flash->error(__('The rfid tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function deleteSelected(){
    	
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;
			$rfidTag = $this->RfidTags->get($this->request->data["value"]);
			if ($this->RfidTags->delete($rfidTag)) {
				$this->response->body("success");
	    		return $this->response;
			}else{
				$this->response->body("error");
	    		return $this->response;
			}
		}			
	}
		   
			   
}
