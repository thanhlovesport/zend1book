<?php
class Training_Auth2Controller extends Zendvn_Controller_Action{
	
//Mang tham so nhan duoc o moi Action
	protected $_arrParam;
	
	//Duong dan cua Controller
	protected $_currentControlle;
	
	//Duong dan cua Action chinh
	protected $_actionMain;
	
	//Thong so phan trang
	protected $_paginator = array(
									'itemCountPerPage' => 5,
									'pageRange' => 3,
								  ); 
	protected $_namespace;
	
	public function init(){
		//Mang tham so nhan duoc o moi Action
		$this->_arrParam = $this->_request->getParams();
		
		//Duong dan cua Controller
		$this->_currentController = '/' . $this->_arrParam['module'] 
									 . '/' . $this->_arrParam['controller'];
		
		//Duong dan cua Action chinh		
		$this->_actionMain = '/' . $this->_arrParam['module'] 
							 . '/' . $this->_arrParam['controller']	. '/index';	

							 
		$this->_paginator['currentPage'] = $this->_request->getParam('page',1);
		$this->_arrParam['paginator'] = $this->_paginator;
		
		//Luu cac du lieu filter vao SESSION
		//Dat ten SESSION
		$this->_namespace = $this->_arrParam['module'] . '-' . $this->_arrParam['controller'];
		$ssFilter = new Zend_Session_Namespace($this->_namespace);
		//$ssFilter->unsetAll();
		if(empty($ssFilter->col)){
			$ssFilter->keywords 	= '';
			$ssFilter->col 			= 'g.id';
			$ssFilter->order 		= 'DESC';
		}
		$this->_arrParam['ssFilter']['keywords'] 	= $ssFilter->keywords;
		$this->_arrParam['ssFilter']['col'] 		= $ssFilter->col;
		$this->_arrParam['ssFilter']['order'] 		= $ssFilter->order;
		
		//Truyen ra view
		$this->view->arrParam = $this->_arrParam;
		$this->view->currentControlle = $this->_currentControlle;
		$this->view->actionMain = $this->_actionMain;
		
		$template_path = TEMPLATE_PATH . "/admin/system";
		$this->loadTemplate($template_path,'template.ini','template');
	}
	
	public function indexAction(){
		$auth = Zend_Auth::getInstance();
		if($auth->hasIdentity()){
			$link = $this->view->baseUrl('/training/auth2/logout');
			$this->view->note = 'Ban dang o trong tai khoan cua ban. 
								<a href="' . $link . '">Thoat.</a>
								';
		}else{
			$link = $this->view->baseUrl('/training/auth2/login');
			$this->view->note = 'Xin vui long dang nhap vao tai khoan cua ban.
								<a href="' . $link . '">Nhan vao day de dang nhap.</a>	
								 ';
		}
	
	}  
	
	public function loginAction(){
		
		if($this->_request->isPost()){
			$auth = new Zendvn_System_Auth();
			if($auth->login($this->_arrParam)){
				$this->_redirect($this->_actionMain);
			}else{
				echo $auth->getError();
			}
		}
	}
	
	public function logoutAction(){
	
		$auth = new Zendvn_System_Auth();
		$auth->logout();
		$this->_redirect($this->_actionMain);                 
		$this->_helper->viewRenderer->setNoRender();
	}
}