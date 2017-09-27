<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Zones Controller
 *
 * @property \App\Model\Table\ZonesTable $Zones
 *
 * @method \App\Model\Entity\Zone[] paginate($object = null, array $settings = [])
 */
class ZonesController extends AppController
{
	public function ajaxData()
    {
    	$this->autoRender= False;
		$query = $this->Zones->find('all')->toArray();
        $data = array();
        foreach($query as $value){
        	$temparr=array();
			$temparr['id']=$value['id'];
			$temparr['rowid']=$value['id'];
			$temparr['name']=$value['name'];
			$temparr['description']=$value['description'];
			$temparr['latitude']=$value['lat'];
			$temparr['longitude']=$value['lon'];
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
        $zones = $this->paginate($this->Zones);

        $this->set(compact('zones'));
        $this->set('_serialize', ['zones']);
		
		$headers =['Name','Description','Latitude','Longitude'];
        $this->set('headers',$headers);	
    }

    /**
     * View method
     *
     * @param string|null $id Zone id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $zone = $this->Zones->get($id, [
            'contain' => ['Terminals', 'RfidReaders']
        ]);

        $terminals = $this->Zones->Terminals->find('list', ['limit' => 200]);
        $this->set(compact('zone', 'terminals'));
        $this->set('_serialize', ['zone']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $zone = $this->Zones->newEntity();
        if ($this->request->is('post')) {
            $zone = $this->Zones->patchEntity($zone, $this->request->getData());
            if ($this->Zones->save($zone)) {
                $this->Flash->success(__('The zone has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The zone could not be saved. Please, try again.'));
        }
        $terminals = $this->Zones->Terminals->find('list', ['limit' => 200]);
        $this->set(compact('zone', 'terminals'));
        $this->set('_serialize', ['zone']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Zone id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $zone = $this->Zones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zone = $this->Zones->patchEntity($zone, $this->request->getData());
            if ($this->Zones->save($zone)) {
                $this->Flash->success(__('The zone has been saved.'));

                echo '<script type="text/javascript">window.top.location.href = "/Zones"</script>';
                //return $this->redirect(['action' => 'index']);
            }else{
            	echo '<script type="text/javascript">window.top.location.href = "/Zones"</script>';
            	$this->Flash->error(__('The zone could not be saved. Please, try again.'));
            }
            
        }
        $terminals = $this->Zones->Terminals->find('list', ['limit' => 200]);
        $this->set(compact('zone', 'terminals'));
        $this->set('_serialize', ['zone']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Zone id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zone = $this->Zones->get($id);
        if ($this->Zones->delete($zone)) {
            $this->Flash->success(__('The zone has been deleted.'));
        } else {
            $this->Flash->error(__('The zone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function deleteSelected(){
    	
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;
			$keyVal = $this->Zones->get($this->request->data["value"]);
			if ($this->Zones->delete($keyVal)) {
				$this->response->body("success");
	    		return $this->response;
			}else{
				$this->response->body("error");
	    		return $this->response;
			}
		}			
	}
}
