<?php
class AdminUserController extends Zendvn_Controller_Action{
    
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
        //$sessionfilte->unsetAll();
        if (empty($sessionfilte->col)){
            $sessionfilte->searchbox = ''; // Kieu truyen trong session, khai bao cac session
            $sessionfilte->col = 'u.id';
            $sessionfilte->order = 'DESC';
            $sessionfilte->group_id = 0;
            
        }
        
        $this->_arrParam['sessionfilter']['searchbox']  = $sessionfilte->searchbox;
        $this->_arrParam['sessionfilter']['col']        = $sessionfilte->col;
        $this->_arrParam['sessionfilter']['order']      = $sessionfilte->order; 
        $this->_arrParam['sessionfilter']['group_id']   = $sessionfilte->group_id;
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
        
        $this->view->Title = 'Member :: User manager :: List';
        $this->view->headTitle($this->view->Title,true);
        
        $tableuser = new Default_Model_User();
        $this->view->Items = $tableuser->listItem($this->_arrParam,array('task'=>'admin-list'));
        
        $tablegroup = new Default_Model_UserGroup();
        $this->view->selectboxgroup = $tablegroup->itemInSelectbox();
        
        // Phan trang
        $totalItems = $tableuser->countItem($this->_arrParam,null);
        echo $totalItems;
       
        $paginator = new Zendvn_Paginator();
        $this->view->paginator = $paginator->createPaginator($totalItems,$this->_paginator); 
         
     
    }
    public function addAction(){
        $this->view->Title = 'Member :: User manager :: Add';
        $this->view->headTitle($this->view->Title,true);
        

        $tablegroup = new Default_Model_UserGroup();
        $this->view->selectboxgroup = $tablegroup->itemInSelectbox();
        

         if($this->_request->isPost()){
            //var_dump(123);exit;
            $validator = new Default_Form_ValidateUser($this->_arrParam);
            if($validator->isError() == true){
                $this->view->messageError = $validator->getMessageError();
                $this->view->Items = $validator->getData();
            }else{                                              // Trường hợp khi tất cả dữ liệu thõa điều kiện
                $tableuser = new Default_Model_User();  
                $arrParam = $validator->getData(array('upload'=>true)); // Hàm getdata cho phép lấy hết tất cả trường hợp
                
                // In mảng arrayPram ra kiểm tra có phần tử user_avatar hay không
               /*  echo "<pre>";
                print_r($arrParam);
                echo "</pre>"; */
                $tableuser->addItem($arrParam,array('task'=>'admin-add'));
                $this->_redirect($this->_actionMain);
                
                //$tableuser->addItem();
            }
         }
                      
        /* if ($this->_request->isPost()){
         echo "<pre>";
         print_r($this->_arrParam);
         echo "</pre>";
         } */
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
         
        if ($this->_arrParam['type'] == 'slbgroup'){
            $sessionfilter->group_id     = $this->_arrParam['group_id']; // arrParam phần tử group_id ở đây là do mình nhấn select chọn, hk phải là gán
        } 
       
        /*   echo '<pre>';
         print_r($sessionfilter->getIterator());
         echo '</pre>';
         echo "<pre>";
         print_r($this->_arrParam);
         echo "</pre>";*/
         $this->redirect($this->_actionMain);
    }
    
    public function infoAction(){
        $this->view->Title = 'Member :: User manager :: Information';
        $this->view->headTitle($this->view->Title,true);
        $tableuser = new Default_Model_User();
        $this->view->Items = $tableuser->getItem($this->_arrParam,array('task'=>'admin-info'));
        echo '<pre>';
        print_r($this->view->Items);
        echo '</pre>';
    }
    
    public function editAction(){
        
        $this->view->Title = 'Member :: User manager :: Edit';
        $this->view->headTitle($this->view->Title,true);
        
        $tablegroup = new Default_Model_UserGroup();
        $this->view->selectboxgroup = $tablegroup->itemInSelectbox();
        
        $tableuser = new Default_Model_User();
        $this->view->Items = $tableuser->getItem($this->_arrParam,array('task'=>'admin-info'));
        

        if($this->_request->isPost()){
            $validator = new Default_Form_ValidateUser($this->_arrParam);
            if($validator->isError() == true){
                $this->view->messageError = $validator->getMessageError();
                $this->view->Items = $validator->getData();
            }else{                                              // Trường hợp khi tất cả dữ liệu thõa điều kiện
                $tableuser = new Default_Model_User();
                $arrParam = $validator->getData(array('upload'=>true)); // Hàm getdata cho phép lấy hết tất cả trường hợp
        
                $tableuser->addItem($arrParam,array('task'=>'admin-edit'));
                //$this->_redirect($this->_actionMain);
        
                //$tableuser->addItem();
            }
        }
    }
}