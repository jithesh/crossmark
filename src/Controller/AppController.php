<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    protected $loggedinuser;
	public $daytimeFormat=1;
	/**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        //dateformat
		$dtfd_id=$this->request->session()->read('sessionuser')['dateformat'];
		if($dtfd_id==1){
			$this->daytimeFormat=1;
		}else{
			$this->daytimeFormat=2;
		}	
		$table = TableRegistry::get($this->modelClass);	//debug($this->modelClass);
		$table->addBehavior("Dateformat",[$this->daytimeFormat]);
		
		
		//also load datetime behaviour for associated models
		$assModels=$table->associations()->keys();
	   	foreach($assModels as $asskeys){
		   	$table->$asskeys->addBehavior("Dateformat",[$this->daytimeFormat]);
	   	}
		
        $this->loadComponent('Auth', [
        	'authorize' => ['Controller'], // Added this line
        	'loginRedirect' => [
            	'controller' => 'Dashboard',
            	'action' => 'index'
        	],
        	'logoutRedirect' => [
            	'controller' => 'Users',
            	'action' => 'login',
        	],
        	'unauthorizedRedirect' => [
            	'controller' => 'Customers',
            	'action' => 'index',
        	]
    	]);
    }
	public function isAuthorized($user)
	{
		$userrole=$this->request->session()->read('sessionuser')['role']; 
		
		switch ($this->name) {
        	case 'Users':
        		
            	return false;
            	break;              
        	case 'Test':
            	return false;
           		break;
			default:
		
		
		if (isset($user['role'])) {
			
			$this->set('username', $user['username']);
			$this->set('userid', $user['id']);   
			$this->set('dateformat', $user['dateformat']);  
			$this->set('customer_id', $user['customer_id']);   
			  
			$this->request->session()->write('sessionuser', $user);
			$this->loggedinuser=$user;
			return true;
		}
		break;
		}			  
		return false;
	}
	public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
		
	}
	public function mptlFormatDate($value){
		if($this->daytimeFormat==1){
			$output=explode($val,"-");
			$fnl=$output[2]. "-" . $output[1] . "-". $output[0];
		}else{
			$output=explode($val,"-");
			$fnl=$output[1]. "-" . $output[2] . "-". $output[0];	
		}
		return $fnl;
	}
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
    	if($this->daytimeFormat==1){
			$mptldateformat='d/m/Y';
		}else{
			$mptldateformat='m/d/Y';
		}
		$this->set('mptldateformat', $mptldateformat);
		 
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
