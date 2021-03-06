<?php
class Shopping_IndexController extends Zendvn_Controller_Action{
    
        // Mảng tham số nhận được ở mỗi Action
        protected $_arrParam;
        
        // Đường dẫn của Controller hiện tại
        protected  $_currentController;
        
        // Đường dẫn của Action chính
        protected $_actionMain;
        
        protected $_paginator = array(
            'itemCountPerPage' => 15,
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
        
            $templatePath = TEMPLATE_PATH."/public/sports";
            $this->loadTemplate(TEMPLATE_PATH."/public/sports",'template.ini','template');
            
            
        
        }
        public function indexAction(){
           //var_dump(123);exit;
           $tableproducts = new Shopping_Model_Items();
           $this->view->Items = $tableproducts->listItem($this->_arrParam,array('task'=>'public-list'));
           
           //var_dump(4566);exit;
           $totalItems = $tableproducts->countItem($this->_arrParam,array('task'=>'public-index'));
           $paginator = new Zendvn_Paginator();
           $this->view->paginator = $paginator->createPaginator($totalItems,$this->_paginator);
           
           echo "<br>".__METHOD__;
          
           //$this->_helper->layout()->disableLayout();
           
            
        }
        public function categoryAction(){
            $tableproducts = new Shopping_Model_Items();
            $this->view->Items = $tableproducts->listItem($this->_arrParam,array('task'=>'public-category'));
            
            $totalItems = $tableproducts->countItem($this->_arrParam,array('task'=>'public-category'));
            echo '<br>'.$totalItems;
            $paginator = new Zendvn_Paginator();
            $this->view->paginator = $paginator->createPaginator($totalItems,$this->_paginator);
           
        }
        public function detailAction(){
            
            $tableproduct = new Shopping_Model_Items();
            $this->view->Items = $tableproduct->getItem($this->_arrParam,array('task'=>'product-info'));
            
            $this->view->ItemsRelate = $tableproduct->getItem($this->_arrParam,array('task'=>'relate-info'));
            $this->view->Title = $this->view->Items['name'];
            $this->view->headTitle($this->view->Title,true);
            
           /*  echo '<pre>';
            print_r($this->view->Items);
            echo '</pre>';
            exit;
            echo '<br>'.__METHOD__; */
           
        }
        public function viewAction(){
            echo "<br>".__METHOD__;
            $this->_helper->viewRenderer->setNoRender();
        }
        public function viewCartAction(){
            
        }
        public function addCartAction(){
            echo "<pre>";
            print_r($this->_arrParam);
            echo "</pre>";
            echo'<br>'.var_dump(123);exit;
            $this->_helper->viewRenderer->setNoRender();
        }
}