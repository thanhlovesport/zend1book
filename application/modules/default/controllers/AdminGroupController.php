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
        //var_dump(123);
        $tablegroup = new Default_Model_UserGroup();
        $this->view->Items = $tablegroup->listItem($this->_arrParam,array('task'=>'admin-list'));
        $this->view->Title = 'Member :: Group manager :: List';
        $this->view->headTitle($this->view->Title,true);
        
        // Phan trang
        $totalItems = $tablegroup->countItem();
        echo $totalItems;
        $paginator = new Zendvn_Paginator();
        $this->view->paginator = $paginator->createPaginator($totalItems,$this->_paginator);
       
        
    }
    public function filterAction(){
        //$this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        echo "<pre>";
        print_r($this->_arrParam);
        echo "</pre>";
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
        $this->view->Item = $tablegroup->getItem($this->_arrParam,array('task'=>'admin-edit'));
        if ($this->_request->isPost()){
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