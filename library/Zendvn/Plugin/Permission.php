<?php
class Zendvn_Plugin_Permission extends Zend_Controller_Plugin_Abstract{
    
    public function preDispatch(Zend_Controller_Request_Abstract $request){
        echo '<br>'.__METHOD__;

        //$module = $params['module'];
        $auth = Zend_Auth::getInstance();
        
        $controllername = $this->_request->getControllerName();
        echo '<br>'.$controllername.'<br>';
        
        /* $flagAdmin = false;
        if($controllername == 'admin')
        {
            $flagAdmin == true;                                             
        }else{
            $tmp = explode('-', $controllername);
            if($tmp['0'] == 'admin'){
                $flagAdmin == true;
            }
        }
        
        if($flagAdmin == true){
            if($auth->hasIdentity()){
                $this->_request->setModuleName('default');
                $this->_request->setControllerName('public');
                $this->_request->setActionName('login');
            }
           
        } */
        if($auth->hasIdentity()){
            $this->_request->setModuleName('default');
            $this->_request->setControllerName('public');
            $this->_request->setActionName('login');
        } 
         
         
    }
}