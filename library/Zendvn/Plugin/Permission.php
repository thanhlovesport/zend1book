<?php
class Zendvn_Plugin_Permission extends Zend_Controller_Plugin_Abstract{
 
	public function preDispatch(Zend_Controller_Request_Abstract $request){
		//echo '<br>' . __METHOD__;
		//var_dump(123);exit;
	
		$auth = Zend_Auth::getInstance();
		
		$moduleName = $this->_request->getModuleName();
		$controllerName  = $this->_request->getControllerName();
		
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
			    
				if($auth->hasIdentity() == false){
				    
					$this->_request->setModuleName('default');
					$this->_request->setControllerName('public');
					$this->_request->setActionName('login');
				}else{
					$info = new Zendvn_System_Info();
					$group_acp = $info->getGroupInfo('group_acp');
					
					if($group_acp != 1){
						$this->_request->setModuleName('default');
						$this->_request->setControllerName('public');
						$this->_request->setActionName('no-access');
					}
					
				}
			}
			
			
			//----------END-KIEM TRA QUYEN TRUY CAP VAO ADMIN -------------
		}
    }
}

