<?php
class AdminCategoryoneController extends Zendvn_Controller_Action{
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
}