<?php
class Training_NewsController extends Zendvn_Controller_Action {

	protected $_acl;
	public function init(){
		parent::init();
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender();
		
		$acl  = new Zend_Acl();
		
		//Khai bao cac nhom (Role)
		$acl->addRole(new Zend_Acl_Role('Guest'))
			->addRole(new Zend_Acl_Role('Member'),'Guest')
			->addRole(new Zend_Acl_Role('Manager'),'Member')
			->addRole(new Zend_Acl_Role('Administrator'));

		//Khai bao cac resource  (News - Blog - Products)
		$acl->addResource(new Zend_Acl_Resource('news'))
			->addResource(new Zend_Acl_Resource('blog'))
			->addResource(new Zend_Acl_Resource('products'));
			
		//Khai bao danh sach cac action ma nhom co quyen truy cap
		$guestPrivileges = array('index','view');
		$memberPrivileges = array('add');
		$managerPrivileges = array('edit','delete');
		
		//Cap quyen truy cap cho cac nhom vao NewsController
		$acl->allow('Guest','news', $guestPrivileges);
		$acl->allow('Member','news', $memberPrivileges);
		$acl->allow('Manager','news', $managerPrivileges);
		$acl->allow('Administrator');
		
		
		//Cap quyen truy cap cho cac nhom BlogController
		$acl->allow('Guest','blog', $guestPrivileges);
		$acl->allow('Member','blog', $memberPrivileges);
		$acl->allow('Manager','blog', $managerPrivileges);
		$acl->allow('Administrator');
		
		// Cam nhom truy cap
		//acl->deny('Manager',null,array('add'));
		
		
		// News - Blogs - Product
		echo '<br>Nhom: ' . $role = 'Guest';
		echo '<br>Action: ' . $privilege = 'add';
		echo '<br>Controller: ' . $resource = 'blog';
		
		if($acl->isAllowed($role, $resource, $privilege)){
			echo '<br> Ban duoc quyen truy cap vao Action nay';
		}else{
			echo '<br> Ban khong duoc quyen truy cap vao Action nay';
		}
		

	}
	
	public function indexAction(){
		echo '<br>' . __METHOD__;
		
		
	}
	
	public function addAction(){
		echo '<br>' . __METHOD__;
	}
	
	public function viewAction(){
		echo '<br>' . __METHOD__;
	}
	
	public function editAction(){
		echo '<br>' . __METHOD__;
	}
	
	public function deleteAction(){
		echo '<br>' . __METHOD__;
	}
	
}	