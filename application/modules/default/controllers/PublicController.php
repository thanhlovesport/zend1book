<?php
class PublicController extends Zendvn_Controller_Action{
    // Mảng tham số nhận được ở mỗi Action
    protected $_arrParam;
    
    // Đường dẫn của Controller hiện tại
    protected  $_currentControlle;
    
    // Đường dẫn của Action chính
    protected $_actionMain;
    

    public function init(){
        // Mảng tham số nhận được ở mỗi Action
        $this->_arrParam = $this->_request->getParams();
    
        // Đường dẫn của Controller
        $this->_currentControlle = '/'.$this->_arrParam['module'].
        '/'.$this->_arrParam['controller'];
    
        // Đường dẫn đến Action chính:
        $this->_actionMain = '/'.$this->_arrParam['module'].
        '/'.$this->_arrParam['controller'].
        '/index';
    
        // Truyền ra view
    
        $this->view->arrParam = $this->_arrParam;
        $this->view->currentControlle =  $this->_currentControlle;
        $this->view->actionMain = $this->_actionMain;
    
        $templatePath = TEMPLATE_PATH."/admin/system";
        $this->loadTemplate(TEMPLATE_PATH."/admin/system",'template.ini','public');
        
    }
    public function errorAction(){
        $this->view->Title = 'ERROR !';
        $this->view->headTitle($this->view->Title,true);
        $errors[] = 'Chức năng này không tồn tại';
        $this->view->messageError = $errors;
        
    }
    public function noaccessAction(){
      
        $this->view->Title = 'Not Permission';
        $this->view->headTitle($this->view->Title,true);
        $errors[] = 'Khong Co Quyen Truy Cap Chuc Nang Nay';
        $this->view->messageError = $errors;
       
        //$this->_helper->viewRenderer('error.phtml');
    }
    public function loginAction(){
        $this->view->Title = 'Login To The SysTem';
        $this->view->headTitle($this->view->Title,true);
        
        if($this->_request->isPost()){
            $auth = new Zendvn_System_Auth();
            if($auth->login($this->_arrParam)){
                $info = new Zendvn_System_Info();
				$info->createInfo();    // Tạo ra Session Info
				//$abc = $info->getMemberInfo();
				
			
				$this->redirect('/default/admin-group/index');
            }else{
                $errors[] = $auth->getError();
                $this->view->messageError = $errors;
            }
        }
    }
    public function logoutAction(){
        $this->view->Title = 'Logout the system';
        $this->view->headTitle($this->view->Title,true);
        $auth = new Zendvn_System_Auth();
        $auth->logout();
        
        $info = new Zendvn_System_Info();
        $info->destroyInfo();
        
        $link = $this->view->baseUrl('/default/public/login');
        $this->view->Notes = 'Ban da thoat he thong.
							<a href="' . $link . '">Nhan vao day</a> de qua lai trang dang nhap
						';
        
        //$this->_helper->viewRenderer('error');
    }
    
    
    
    
}
