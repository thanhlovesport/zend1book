<?php
class AdminGroupController extends Zendvn_Controller_Action{
    
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
        
        echo "<pre>";
        print_r( $this->_arrParam);
        echo "</pre>";
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
        //$sessionfilte->unsetAll();
        if (empty($sessionfilte->col)){
            $sessionfilte->searchbox = ''; // Kieu truyen trong session, khai bao cac session
            $sessionfilte->col = 'g.id';
            $sessionfilte->order = 'DESC';
        }
        
        $this->_arrParam['sessionfilter']['searchbox']  = $sessionfilte->searchbox;
        $this->_arrParam['sessionfilter']['col']        = $sessionfilte->col;
        $this->_arrParam['sessionfilter']['order']      = $sessionfilte->order;
        /* echo '<pre>';
        print_r($sessionfilte->getIterator());
        echo '</pre>';
         */
        // Truyền ra view   
        
        $this->view->arrParam = $this->_arrParam;
        $this->view->currentControlle =  $this->_currentController;
        $this->view->actionMain = $this->_actionMain;
        
        $templatePath = TEMPLATE_PATH."/admin/system";
        $this->loadTemplate(TEMPLATE_PATH."/admin/system",'template.ini','template');
        
       
       
    }
    public function indexAction(){
        //echo '<br>'.$this->_currentController ;
        //echo '<br>'.$this->_actionMain;
        //var_dump(123);exit;
       
        
        $tablegroup = new Default_Model_UserGroup();
        $this->view->Items = $tablegroup->listItem($this->_arrParam,array('task'=>'admin-list'));
        $this->view->Title = 'Member :: Group manager :: List';
        $this->view->headTitle($this->view->Title,true);
                                                            
        // Phan trang
        $totalItems = $tablegroup->countItem($this->_arrParam,null);
        echo $totalItems;
        $paginator = new Zendvn_Paginator();
        $this->view->paginator = $paginator->createPaginator($totalItems,$this->_paginator);
       
        
    }
    public function filterAction(){
        //$this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        
        $sessionfilter = new Zend_Session_Namespace($this->_namespace);
        if ($this->_arrParam['type'] == 'search'){
            if ($this->_arrParam['key'] == 1){
                $sessionfilter->searchbox = $this->_arrParam['searchbox'];  // searchbox đây tên phần từ ô textbox
            }else {
                $sessionfilter->searchbox = '';
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
        $this->view->Title = 'Member :: Group manager :: Add';
        $this->view->headTitle($this->view->Title,true);
        
        if ($this->_request->isPost()){
            $tablegroup = new Default_Model_UserGroup();
            $this->view->Items = $tablegroup->addItem($this->_arrParam,array('task'=>'admin-add'));
            $this->redirect($this->_actionMain);
        }
     
        /* if ($this->_request->isPost()){
            echo "<pre>";
            print_r($this->_arrParam);
            echo "</pre>";
        } */
    }
    public function infoAction(){    
        $this->view->Title = 'Member :: Group manager :: Information';
        $this->view->headTitle($this->view->Title,true);
        $tablegroup = new Default_Model_UserGroup();
        $this->view->Item = $tablegroup->infoItem($this->_arrParam,array('task'=>'admin-info'));
    }
    public function editAction(){
        $this->view->Title = 'Member :: Group manager :: Edit';
        $this->view->headTitle($this->view->Title,true);
        $tablegroup = new Default_Model_UserGroup();
        $this->view->Item = $tablegroup->getItem($this->_arrParam,array('task'=>'admin-edit')); // Cho cái button edit thông tin một group
        if ($this->_request->isPost()){ // Cho cái nút submit form tên là Edit
            $tablegroup = new Default_Model_UserGroup();
            $tablegroup->addItem($this->_arrParam,array('task'=>'admin-edit'));
            $this->redirect($this->_actionMain);
        }
        
    }
    public function deleteAction(){
        $this->view->Title = 'Member :: Group manager :: Delete';
        $this->view->headTitle($this->view->Title,true);
        if ($this->_request->isPost()){
            $tablegroup = new Default_Model_UserGroup();
            $tablegroup->deleteItem($this->_arrParam,array('task'=>'admin-delete'));
            $this->redirect($this->_actionMain);
        }
    }
    public function statusAction(){
        $this->_helper->viewRenderer->setNoRender(true);
        $tablegroup = new Default_Model_UserGroup();
        $tablegroup->statusItem($this->_arrParam,null);
        $this->redirect($this->_actionMain);   
       
    }
    public function multyDeleteAction(){
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_request->isPost()){
            $tablegroup = new Default_Model_UserGroup();
            $tablegroup->deleteItem($this->_arrParam,array('task'=>'multy-delete'));
            $this->redirect($this->_actionMain);
        }
        
    }
    public function sortAction(){
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_request->isPost()){
            $tablegroup = new Default_Model_UserGroup();
            $tablegroup->sortItem($this->_arrParam,null);
            $this->redirect($this->_actionMain);
        }
    }
}