<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RfidAntennas Controller
 *
 * @property \App\Model\Table\RfidAntennasTable $RfidAntennas
 *
 * @method \App\Model\Entity\RfidAntenna[] paginate($object = null, array $settings = [])
 */
class RfidAntennasController extends AppController
{
	public function ajaxData()
    {
    	$this->autoRender= False;
		$query = $this->RfidAntennas->find('all')->toArray();
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
            'contain' => ['Customers', 'RfidControllers']
        ];
        $rfidAntennas = $this->paginate($this->RfidAntennas);

        $this->set(compact('rfidAntennas'));
        $this->set('_serialize', ['rfidAntennas']);
		
		$headers =['Name','Description','Type','Model','Latitude','Longitude'];
        $this->set('headers',$headers);	
    }

    /**
     * View method
     *
     * @param string|null $id Rfid Antenna id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rfidAntenna = $this->RfidAntennas->get($id, [
            'contain' => ['Customers', 'RfidControllers']
        ]);

        $this->set('rfidAntenna', $rfidAntenna);
        $this->set('_serialize', ['rfidAntenna']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rfidAntenna = $this->RfidAntennas->newEntity();
        if ($this->request->is('post')) {
            $rfidAntenna = $this->RfidAntennas->patchEntity($rfidAntenna, $this->request->getData());
            $rfidAntenna['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->RfidAntennas->save($rfidAntenna)) {
                $this->Flash->success(__('The rfid antenna has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rfid antenna could not be saved. Please, try again.'));
        }
        $customers = $this->RfidAntennas->Customers->find('list', ['limit' => 200]);
        $rfidControllers = $this->RfidAntennas->RfidControllers->find('list', ['limit' => 200]);
        $this->set(compact('rfidAntenna', 'customers', 'rfidControllers'));
        $this->set('_serialize', ['rfidAntenna']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rfid Antenna id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rfidAntenna = $this->RfidAntennas->get($id, [
            'contain' => []
        ]);
		
		if($rfidAntenna['customer_id'] != $this->loggedinuser['customer_id'])
		{
			 echo '<script type="text/javascript">window.top.location.href = "/RfidAntennas"</script>';
			 $this->Flash->error(__('You are not Authorized.'));
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rfidAntenna = $this->RfidAntennas->patchEntity($rfidAntenna, $this->request->getData());
            if ($this->RfidAntennas->save($rfidAntenna)) {
                $this->Flash->success(__('The rfid antenna has been saved.'));

                echo '<script type="text/javascript">window.top.location.href = "/RfidAntennas"</script>';
                // return $this->redirect(['action' => 'index']);
            }else{
            	echo '<script type="text/javascript">window.top.location.href = "/RfidAntennas"</script>';
          	 	$this->Flash->error(__('The rfid antenna could not be saved. Please, try again.'));
			}
        }
        $customers = $this->RfidAntennas->Customers->find('list', ['limit' => 200]);
        $rfidControllers = $this->RfidAntennas->RfidControllers->find('list', ['limit' => 200]);
        $this->set(compact('rfidAntenna', 'customers', 'rfidControllers'));
        $this->set('_serialize', ['rfidAntenna']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rfid Antenna id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rfidAntenna = $this->RfidAntennas->get($id);
        if ($this->RfidAntennas->delete($rfidAntenna)) {
            $this->Flash->success(__('The rfid antenna has been deleted.'));
        } else {
            $this->Flash->error(__('The rfid antenna could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
