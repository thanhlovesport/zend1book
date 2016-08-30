<?php
class Shopping_AdminProductController extends Zendvn_Controller_Action{
    
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
            $sessionfilte->searchbox1 = ''; // Kieu truyen trong session, khai bao cac session
            $sessionfilte->col = 'u.id';
            $sessionfilte->order = 'DESC';
            
        }
        
        $this->_arrParam['sessionfilter']['searchproduct']  = $sessionfilte->searchbox1;
        $this->_arrParam['sessionfilter']['col']            = $sessionfilte->col;
        $this->_arrParam['sessionfilter']['order']          = $sessionfilte->order;
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
        
        echo '<br>'.__METHOD__;
        
        $this->view->Title = 'Product :: Product manager :: List';
        $this->view->headTitle($this->view->Title,true);
        

        $tableproducts = new Shopping_Model_Product();                                                                                   
        $this->view->Items = $tableproducts->listItem($this->_arrParam,array('task'=>'admin-list'));
        
        
        //$tablecategory  = new Shopping_Model_Category();
        //$this->view->selectboxgroup = $tablecategory->categoryInSelectbox();
        
        
        // Phan trang
        $totalItems = $tableproducts->countItem($this->_arrParam,null);
        
         
        $paginator = new Zendvn_Paginator();
        $this->view->paginator = $paginator->createPaginator($totalItems,$this->_paginator);
     
    }
    public function addAction(){
        
        echo '<br>'.__METHOD__;
        $this->view->Title = 'Product :: Product manager :: Add';
        $this->view->headTitle($this->view->Title,true);
        
       $tablecategory = new Shopping_Model_Category();
       $this->view->slbCategory = $tablecategory->itemInSelectbox();
        

         if($this->_request->isPost()){
             
          $validator = new Shopping_Form_ValidateProduct($this->_arrParam);
          if($validator->isError() == true){
              $this->view->messageError = $validator->getMessageError();
              $this->view->Items = $validator->getData();
          }else{                                              // Trường hợp khi tất cả dữ liệu thõa điều kiện
                $tableproduct = new Shopping_Model_Product();  
                $arrParam = $validator->getData(array('upload'=>true)); // Hàm getdata cho phép lấy hết tất cả trường hợp
                
                // In mảng arrayPram ra kiểm tra có phần tử user_avatar hay không
               
                $tableproduct->addItem($arrParam,array('task'=>'admin-add'));
                $this->_redirect($this->_actionMain);
                
                //$tableuser->addItem();
            }
           
         }
                      
        
    }
    public function filterAction(){
        //$this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    
        $sessionfilter = new Zend_Session_Namespace($this->_namespace);
        if ($this->_arrParam['type'] == 'search'){
            if ($this->_arrParam['key'] == 1){
                $sessionfilter->searchbox1 =  $this->_arrParam['searchbox'];  // searchbox đây tên phần từ ô textbox
            }else {
                $sessionfilter->searchbox1 = '';
            }
        }
        if ($this->_arrParam['type'] == 'order'){
            $sessionfilter->col      = $this->_arrParam['col'];
            $sessionfilter->order    = $this->_arrParam['by'];
        }
         
        if ($this->_arrParam['type'] == 'slbcate'){
            $sessionfilter->cate_id     = $this->_arrParam['cate_id']; // arrParam phần tử group_id ở đây là do mình nhấn select chọn, hk phải là gán
        } 
       
        
         
         $this->redirect($this->_actionMain);
    }
    
    public function infoAction(){
        $this->view->Title = 'Product :: Product manager :: Information';
        $this->view->headTitle($this->view->Title,true);
        $tableproduct = new Shopping_Model_Product();
        $this->view->Items = $tableproduct->getItem($this->_arrParam,array('task'=>'admin-info'));
        echo '<pre>';
        print_r($this->view->Items);
        echo '</pre>';
    }
    
    public function editAction(){
        
        $this->view->Title = 'Product :: Product manager :: Edit';
        $this->view->headTitle($this->view->Title,true);
        
        $tablecategory = new Shopping_Model_Category();
        $this->view->slbCategory = $tablecategory->itemInSelectbox($this->_arrParam,array('task'=>'admin-edit'));
        
        $tableproduct = new Shopping_Model_Product();
        $this->view->Items = $tableproduct->getItem($this->_arrParam,array('task'=>'admin-info'));
                    
        if($this->_request->isPost()){
            $validator = new Shopping_Form_ValidateProduct($this->_arrParam);
            if($validator->isError() == true){
                $this->view->messageError = $validator->getMessageError();
                $this->view->Items = $validator->getData();
            }else{                                              // Trường hợp khi tất cả dữ liệu thõa điều kiện
                
                $tableproduct = new Shopping_Model_Product();
                $arrParam = $validator->getData(array('upload'=>true)); // Hàm getdata cho phép lấy hết tất cả trường hợp
                            
                $tableproduct->addItem($arrParam,array('task'=>'admin-edit'));
                $this->_redirect($this->_actionMain);
        
                //$tableuser->addItem();
            }
        }
    }
    
    public function deleteAction(){
        $this->view->Title = 'Member :: User manager :: Delete';
        $this->view->headTitle($this->view->Title,true);
        if ($this->_request->isPost()){
            $tableuser = new Default_Model_User();
            $tableuser->deleteItem($this->_arrParam,array('task'=>'admin-delete'));
            $this->redirect($this->_actionMain);
        }
    }
    
    // Thay doi trang thai cua member
    public function statusAction(){
        $tableproducts = new Shopping_Model_Product();  
        $tableproducts->statusItem($this->_arrParam,null);
        $this->_redirect($this->_actionMain);
        $this->_helper->viewRenderer->setNoRender(true);
    }
    public function multyDeleteAction(){
    
        if($this->_request->isPost()){
            $tableproducts = new Shopping_Model_Product(); 
            $tableproducts->deleteItem($this->_arrParam,array('task'=>'admin-multi-delete'));
            $this->_redirect($this->_actionMain);
        }
        $this->_helper->viewRenderer->setNoRender();
    }
    public function sortAction(){
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_request->isPost()){
            $tabelproduct = new Shopping_Model_Product();
            $tabelproduct->sortItem($this->_arrParam,null);
            $this->redirect($this->_actionMain);
        }
    }
}