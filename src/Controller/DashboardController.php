<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

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
		 
		// echo json_encode($data);
		
		$this->response->type('json');
		$this->response->body(json_encode($data));		
	}
	public function index()
    {
		$headers =['Serial Number','Type','Date','State'];
        // $this->set('headers',$headers);	
		
		$rfidTagTable = TableRegistry::get('RfidTags');
		$query=$rfidTagTable->find('All')->where (['activated' => TRUE])->andwhere(['EXTRACT(month from lastdetectedtime) = EXTRACT(month from date(now()))'])
								->andwhere(['EXTRACT(year from lastdetectedtime) = EXTRACT(year from date(now()))']);
		(isset($query)) ? $bagsprocessedcount=$query->count() : $bagsprocessedcount="";
		
		$query=$rfidTagTable->find('All')->where (['exited' => TRUE])->andwhere(['EXTRACT(month from lastdetectedtime) = EXTRACT(month from date(now()))'])
								->andwhere(['EXTRACT(year from lastdetectedtime) = EXTRACT(year from date(now()))']);
		(isset($query)) ? $bagsexitedcount=$query->count() : $bagsexitedcount="";
		
		//daily graph
		$var = "'7 days'";
		$query=$rfidTagTable->find('All')->where(['lastdetectedtime > (date(now()) - INTERVAL  '.$var.')']);
		(isset($query)) ? $dailybagscount=$query->count() : $dailybagscount="";
		
		$var = "'7 days'";
		$query=$rfidTagTable->find('All')->where(['lastdetectedtime > (date(now()) - INTERVAL  '.$var.')'])->andwhere(['activated' => TRUE]);
		(isset($query)) ? $dailybagsprocessedcount=$query->count() : $dailybagsprocessedcount="";
		
		$var = "'7 days'";
		$query=$rfidTagTable->find('All')->where(['lastdetectedtime > (date(now()) - INTERVAL  '.$var.')'])->andwhere(['exited' => TRUE]);
		(isset($query)) ? $dailybagsexitedcount=$query->count() : $dailybagsexitedcount="";
		
		//weekly graph
		$var = "'5 weeks'";
		$query=$rfidTagTable->find('All')->where(['lastdetectedtime > (date(now()) - INTERVAL  '.$var.')']);
		(isset($query)) ? $weeklybagscount=$query->count() : $weeklybagscount="";
		
		$var = "'5 weeks'";
		$query=$rfidTagTable->find('All')->where(['lastdetectedtime > (date(now()) - INTERVAL  '.$var.')'])->andwhere(['activated' => TRUE]);
		(isset($query)) ? $weeklybagsprocessedcount=$query->count() : $weeklybagsprocessedcount="";
		
		$var = "'5 weeks'";
		$query=$rfidTagTable->find('All')->where(['lastdetectedtime > (date(now()) - INTERVAL  '.$var.')'])->andwhere(['exited' => TRUE]);
		(isset($query)) ? $weeklybagsexitedcount=$query->count() : $weeklybagsexitedcount="";
		
		//monthly graph
		$var = "'12 months'";
		$query=$rfidTagTable->find('All')->where(['lastdetectedtime > (date(now()) - INTERVAL  '.$var.')']);
		(isset($query)) ? $monthlybagscount=$query->count() : $monthlybagscount="";
		
		$var = "'12 months'";
		$query=$rfidTagTable->find('All')->where(['lastdetectedtime > (date(now()) - INTERVAL  '.$var.')'])->andwhere(['activated' => TRUE]);
		(isset($query)) ? $monthlybagsprocessedcount=$query->count() : $monthlybagsprocessedcount="";
		
		$var = "'12 months'";
		$query=$rfidTagTable->find('All')->where(['lastdetectedtime > (date(now()) - INTERVAL  '.$var.')'])->andwhere(['exited' => TRUE]);
		(isset($query)) ? $monthlybagsexitedcount=$query->count() : $monthlybagsexitedcount="";
		  
		$this->set(compact('headers','bagsprocessedcount','bagsexitedcount','dailybagscount','dailybagsprocessedcount','dailybagsexitedcount',
		'weeklybagscount','weeklybagsprocessedcount','weeklybagsexitedcount','monthlybagscount','monthlybagsprocessedcount','monthlybagsexitedcount'));
		
	}
	public function getDailyChartData()
	{
     	
		$this->autoRender= false;		
		$rfidTagTable = TableRegistry::get('RfidTags');
		$conn = ConnectionManager::get('default');
		$resultSet = $conn->execute("SELECT public.getDailyChartData()")->fetchAll('assoc');
			
		$date=[];
		$count=[];
		foreach ($resultSet as $result) {
			//removing special character "()"
			$result['getdailychartdata']=str_replace('(', '',$result['getdailychartdata']);
			$result['getdailychartdata']=str_replace(')', '',$result['getdailychartdata']);
			//splitting date and count
			if( strpos( $result['getdailychartdata'], "," ) !== false ) {
				$splits =  explode(",",$result['getdailychartdata']);
				
				try {
  					$time = strtotime($splits[0]);
					$date[] = date('d M Y',$time);
				}
				catch(Exception $e) {
  					$date[] = $splits[0];
				}
				
				$count[] = $splits[1]; 
			}   				
		}
		$chartarray = [
    			"date" => $date,
    			"count" => $count,
			];

		$this->response->body(json_encode($chartarray));
	    return $this->response;
	}
	public function getWeeklyChartData()
	{
     	
		$this->autoRender= false;		
		$rfidTagTable = TableRegistry::get('RfidTags');
		$conn = ConnectionManager::get('default');
		$resultSet = $conn->execute("SELECT public.getweeklychartdata()")->fetchAll('assoc');
			
		
		$count=[];
		
		$week=[];
		foreach ($resultSet as $result) {
			$sdate="";$edate="";
			//removing special character "()"
			$result['getweeklychartdata']=str_replace('(', '',$result['getweeklychartdata']);
			$result['getweeklychartdata']=str_replace(')', '',$result['getweeklychartdata']);
			//splitting date and count
			if( strpos( $result['getweeklychartdata'], "," ) !== false ) {
				$splits =  explode(",",$result['getweeklychartdata']);
				
				try {
  					$time = strtotime($splits[0]);
					$sdate = date('d M Y',$time);
					$time = strtotime($splits[1]);
					$edate = date('d M Y',$time);
				}
				catch(Exception $e) {
  					$sdate = $splits[0];
					$edate = $splits[1];
				}
				
				$count[] = $splits[2]; 
				$week[] = $sdate.";". $edate ; 
			}   				
		}
		$chartarray = [
    			"date" => $week,
    			"count" => $count,
			];

		$this->response->body(json_encode($chartarray));
	    return $this->response;
	}
	public function getMonthlyChartData()
	{     	
		$this->autoRender= false;		
		$rfidTagTable = TableRegistry::get('RfidTags');
		$conn = ConnectionManager::get('default');
		$resultSet = $conn->execute("SELECT public.getmonthlychartdata()")->fetchAll('assoc');
			
		$date=[];
		$count=[];
		foreach ($resultSet as $result) {
			//removing special character "()"
			$result['getmonthlychartdata']=str_replace('(', '',$result['getmonthlychartdata']);
			$result['getmonthlychartdata']=str_replace(')', '',$result['getmonthlychartdata']);
			//splitting date and count
			if( strpos( $result['getmonthlychartdata'], "," ) !== false ) {
				$splits =  explode(",",$result['getmonthlychartdata']);
				
				try {
  					$time = strtotime($splits[0]);
					$date[] = date('M Y',$time);
				}
				catch(Exception $e) {
  					$date[] = $splits[0];
				}
				
				$count[] = $splits[1]; 
			}   				
		}
		$chartarray = [
    		"date" => $date,
    		"count" => $count,
		];

		$this->response->body(json_encode($chartarray));
	    return $this->response;
		
	}	
}
    	