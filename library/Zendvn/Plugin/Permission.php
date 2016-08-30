<?php
class Zendvn_Plugin_Permission extends Zend_Controller_Plugin_Abstract{
 
	public function preDispatch(Zend_Controller_Request_Abstract $request){
		
		$auth = Zend_Auth::getInstance();
		
		$moduleName = $this->_request->getModuleName();
	
		$controllerName  = $this->_request->getControllerName();
		//echo'<br>'.$controllerName;
		//echo'<br>'.$moduleName;
		
		/* if($controllerName == 'admin'){
		    if($auth->hasIdentity() == false){
		        $this->_request->setModuleName('default');
		        $this->_request->setControllerName('public');
		        $this->_request->setActionName('login');
		    }
		    
		}else{
		   
		    $tamp = explode('-', $controllerName);
		    echo $tamp[0];
		    if($tamp[0] == 'admin'){
		        if($auth->hasIdentity() == false){
		            $this->_request->setModuleName('default');
		            $this->_request->setControllerName('public');
		            $this->_request->setActionName('login');
		        }
		       
		    }
		} */
			 if($moduleName != 'training'){
		
			//----------START-KIEM TRA QUYEN TRUY CAP VAO ADMIN -------------
			$flagAdmin = false;
			if($controllerName == 'admin'){
				$flagAdmin = true;
			}else{
				$tmp = explode('-',$controllerName);
				if($tmp[0] == 'admin'){
					$flagAdmin = true;
				}
			}
			
			if($flagAdmin == true){
			    //var_dump(123);exit;
				if($auth->hasIdentity() == false){
					$this->_request->setModuleName('default');
		            $this->_request->setControllerName('public');
		            $this->_request->setActionName('login');
				}else{
					$info = new Zendvn_System_Info();
					$group_acp = $info->getGroupInfo('group_acp');
					/* echo "<pre>";
					print_r($group_acp);
					echo "</pre>"; */
					
					 if($group_acp != 1){
					    //var_dump(123);exit;
						$this->_request->setModuleName('default');
						$this->_request->setControllerName('public');
						$this->_request->setActionName('noaccess');
					}
					
				}
			} 
			
			
			//----------END-KIEM TRA QUYEN TRUY CAP VAO ADMIN -------------
		} 
    }
}

