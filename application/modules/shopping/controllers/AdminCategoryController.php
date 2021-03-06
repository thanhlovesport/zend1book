<?php
class Shopping_AdminCategoryController extends Zendvn_Controller_Action{
    
    
    // Mảng tham số nhận được ở mỗi Action
    protected $_arrParam;
    
    // Đường dẫn của Controller hiện tại
    protected  $_currentController;
    
    // Đường dẫn của Action chính
    protected $_actionMain;
    
    protected $_paginator = array(
        'itemCountPerPage' => 5,
        'pageRange' => 3,
    );
    
    // Khai báo namespace chứa Session
    protected $_namespace;
     
    public function init(){
        
        // Mảng tham số nhận được ở mỗi Action
        $this->_arrParam = $this->_request->getParams();
        
       
        // Đường dẫn của Controller
        $this->_currentController = '/'.$this->_arrParam['module'].
                                    '/'.$this->_arrParam['controller'];
        
        // Đường dẫn đến Action chính: 
        $this->_actionMain = '/'.$this->_arrParam['module'].
                                    '/'.$this->_arrParam['controller'].
                                    '/index';
        
        $this->_paginator['currentPage'] = $this->_request->getParam('page',1); // neu khong co mac dinh se la 1
        $this->_arrParam['paginator']    = $this->_paginator; // them phan tu cho mang tham so _arrParam
        
        // Lưu các dữ liệu Filter vào Session , namespace lưu trữ tên session 
        // Đặt tên SESSION
        $this->_namespace = $this->_arrParam['module'].'-'.$this->_arrParam['controller'];
        $sessionfilte = new Zend_Session_Namespace($this->_namespace);
        $sessionfilte->unsetAll();
         if (empty($sessionfilte->col)){
            $sessionfilte->searchbox2 = ''; // Kieu truyen trong session, khai bao cac session
            $sessionfilte->col = 'u.id';    
            $sessionfilte->order = 'DESC';
            
        }
                                                                                                
        $this->_arrParam['sessionfilter']['searchcategory']  = $sessionfilte->searchbox2;
        $this->_arrParam['sessionfilter']['col']             = $sessionfilte->col;
        $this->_arrParam['sessionfilter']['order']           = $sessionfilte->order;
        
        
        // Truyền ra view   
        
        $this->view->arrParam = $this->_arrParam;
        $this->view->currentControlle =  $this->_currentController;
        $this->view->actionMain = $this->_actionMain;
        
        $templatePath = TEMPLATE_PATH."/admin/system";
        $this->loadTemplate(TEMPLATE_PATH."/admin/system",'template.ini','template');
        
        
       
    }
    public function indexAction(){
        //$this->_helper->layout->disableLayout();
        //$this->_helper->viewRenderer->setNoRender(true);        
        $this->view->Title = 'Product :: Category manager :: List';
        $this->view->headTitle($this->view->Title,true);
        $tablecategory = new Shopping_Model_Category();
        $this->view->Items = $tablecategory->listItem($this->_arrParam,array('task'=>'admin-list'));
        
        /* echo '<pre>';
        print_r($this->view->Items);
        echo '</pre>'; */
        
        
        
        
    }
    public function filterAction(){
        //$this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        
        $sessionfilter = new Zend_Session_Namespace($this->_namespace);
        if ($this->_arrParam['type'] == 'search'){
            if ($this->_arrParam['key'] == 1){
                $sessionfilter->searchbox2 = $this->_arrParam['searchbox'];  // searchbox đây tên phần từ ô textbox
                //var_dump($sessionfilter->searchbox1);exit;
            }else {
                $sessionfilter->searchbox2 = '';    
            }
        }
         if ($this->_arrParam['type'] == 'order'){
           $sessionfilter->col      = $this->_arrParam['col'];
           $sessionfilter->order    = $this->_arrParam['by'];
        } 
       
        
        
      /*   echo '<pre>';
        print_r($sessionfilter->getIterator());
        echo '</pre>';
        echo "<pre>";
        print_r($this->_arrParam);
        echo "</pre>";*/
        $this->redirect($this->_actionMain); 
    }
    public function addAction(){
      echo '<h3 style = "color:red;font-weight:bold">'. __METHOD__.'</h3>';
      $this->view->Title = 'Product :: Category manager :: Add';
      $this->view->headTitle($this->view->Title,true);
      $tablecategory = new Shopping_Model_Category();
      //$this->view->Items = $tablecategory->listItem();
      $this->view->slbCategory = $tablecategory->itemInSelectbox();
     
      if($this->_request->isPost()){
          $tablecategory->addItem($this->_arrParam,array('task'=>'admin-add'));
          $this->_redirect($this->_actionMain);
      }
      
    }
    public function infoAction(){    
       $this->view->Title = 'Product :: Category Manager :: InfoItem';
        $this->view->headTitle($this->view->Title,true);
        $tablecategory = new Shopping_Model_Category();
        $this->view->Items = $tablecategory->infoItem($this->_arrParam,array('task'=>'admin-info'));
    }
    public function editAction(){
        $this->view->Title = 'Product :: Category Manager :: Edit';
        $this->view->headTitle($this->view->Title,true);
        $tablecategory = new Shopping_Model_Category();
        $this->view->Items = $tablecategory->getItem($this->_arrParam,array('task'=>'admin-edit')); // Cho cái button edit thông tin một group
        $this->view->slbCategory = $tablecategory->itemInSelectbox($this->_arrParam,array('task'=>'admin-edit'));
        if ($this->_request->isPost()){ // Cho cái nút submit form tên là Edit
        if($this->_request->isPost()){
			$tablecategory->addItem($this->_arrParam,array('task'=>'admin-edit'));
			$this->_redirect($this->_actionMain);
		}
        } 
        
    }
    public function deleteAction(){
		echo '<br>' . __METHOD__;
		$this->view->Title = 'Product :: Category manager :: Delete';
		$this->view->headTitle($this->view->Title,true);
		if($this->_request->isPost()){
			$tabelcategory = new Shopping_Model_Category();
			$tabelcategory->deleteItem($this->_arrParam,array('task'=>'admin-delete'));
			$this->_redirect($this->_actionMain);
		}
		//$this->_helper->viewRenderer->setNoRender();
		 
	}
   
    public function statusAction(){
        $this->_helper->viewRenderer->setNoRender(true);
        $tabelcategory = new Shopping_Model_Category();
        $tabelcategory->statusItem($this->_arrParam,null);
        $this->redirect($this->_actionMain);   
       
    }
     public function multyDeleteAction(){
       if($this->_request->isPost()){
			$tblCategory = new Shopping_Model_Category();
			$tblCategory->deleteItem($this->_arrParam,array('task'=>'admin-multi-delete'));
			$this->_redirect($this->_actionMain);
		}
		$this->_helper->viewRenderer->setNoRender();
    } 
    public function sortAction(){
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_request->isPost()){
            $tabelcategory = new Shopping_Model_Category();
            $tabelcategory->sortItem($this->_arrParam,null);
            $this->redirect($this->_actionMain);
        }
    }
}