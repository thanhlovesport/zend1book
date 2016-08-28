<?php
class Training_FormController extends Zendvn_Controller_Action{
	
//Mang tham so nhan duoc o moi Action
	protected $_arrParam;
	
	//Duong dan cua Controller
	protected $_currentControlle;
	
	//Duong dan cua Action chinh
	protected $_actionMain;
	
	
	public function init(){
		//Mang tham so nhan duoc o moi Action
		$this->_arrParam = $this->_request->getParams();
		
		//Duong dan cua Controller
		$this->_currentControlle = '/' . $this->_arrParam['module'] 
									 . '/' . $this->_arrParam['controller'];
		
		//Duong dan cua Action chinh		
		$this->_actionMain = '/' . $this->_arrParam['module'] 
							 . '/' . $this->_arrParam['controller']	. '/index';							 
		
		
		//Truyen ra view
		$this->view->arrParam = $this->_arrParam;
		$this->view->currentControlle = $this->_currentControlle;
		$this->view->actionMain = $this->_actionMain;
		
		$template_path = TEMPLATE_PATH . "/admin/system";
		$this->loadTemplate($template_path,'template.ini','template');
	}
	
	public function decorator2Action(){
		$form = new Training_Form_Decorator3();
		if($this->_request->isPost()){
			$formData = $this->_request->getPost();
			if(!$form->isValid($formData)){
				
			}
		}
		
		$this->view->form = $form;
	}
	public function  demoAction(){
		
	}
	public function decoratorAction(){
		$form = new Training_Form_Decorator2();
		if($this->_request->isPost()){
			$formData = $this->_request->getPost();
			if(!$form->isValid($formData)){
				
			}
		}
		echo '<pre>';
		print_r($form);
		echo '</pre>';
		$this->view->form = $form;
	}
	
	public function editAction(){
		$form = new Training_Form_User($this->_arrParam,array('task'=>'admin-edit'));
		$this->view->form = $form;
		if($this->_request->isPost()){
			$formData = $this->_request->getPost();
			if($form->isValid($formData)){
				$this->_arrParam['user_avatar'] = $form->uploadFile($this->_arrParam);
				$tblUser = new Default_Model_User();
				$tblUser->saveItem($this->_arrParam,array('task'=>'admin-edit'));
			}
		}
		$this->view->form = $form;
	}
	
	public function addAction(){
		$form = new Training_Form_User();
	
		if($this->_request->isPost()){
			$formData = $this->_request->getPost();
			if($form->isValid($formData)){   // Nếu không có lỗi lưu vào database
				$this->_arrParam['user_avatar'] = $form->uploadFile();
				$tblUser = new Default_Model_User();
				$tblUser->saveItem($this->_arrParam,array('task'=>'admin-add'));
			}
		}
		$this->view->form = $form;
	}
	
	public function indexAction(){
		echo '<br>' . __METHOD__;
		$this->view->form = new Training_Form_Guide();
	}
	
	public function validateAction(){
		echo '<br>' . __METHOD__;
		$form = new Training_Form_Guide2();
		if($this->_request->isPost()){
		
			$formData = $this->_request->getPost(); // Lấy tất cả dữ liệu
			if($form->isValid($formData)){
				echo '<br>Khong co loi xay ra<br>Sava database';
				
			}
		}
		
		$this->view->form = $form;
	}
}







