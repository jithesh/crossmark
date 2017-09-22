<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dashboard Controller
 */
class DashboardController extends AppController
{
	
	public function ajaxData()
    {
    	$this->autoRender= False;
		$this->loadModel('Tracking');
		$query = $this->Tracking->find('all')->limit(10)->toArray();
        $data = array();
        foreach($query as $value){
        	$temparr=array();
			$temparr['id']=$value['id'];
			$temparr['rowid']=$value['id'];
			$temparr['unique number']=$value['unq'];
			$temparr['serial number']=$value['serialno'];
			$temparr['type']=$value['type'];
			$temparr['date']=$value['date'];
			$temparr['state']=$value['state'];
			array_push($data,$temparr);
		}
		 
		echo json_encode($data);		
	}
	public function index()
    {
		$headers =['Serial Number','Type','Date','State'];
        $this->set('headers',$headers);	
	}
	
}
    	