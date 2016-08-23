<?php
class Training_CaptchaController extends Zendvn_Controller_Action{
	
//Mang tham so nhan duoc o moi Action

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
        
        //1. Khoi tao doi tuong Captcha
        $captcha = new Zend_Captcha_Image();
        
        //2. Thiet lap duong dan den thu muc chua hinh anh se duoc tao
        $captcha->setImgDir(CAPTCHA_PATH . '/img');
        
        //3. Thiet lap duong dan URL den thu muc chua hinh anh
        $captcha->setImgUrl(CAPTCHA_URL . '/img');
        
        //4. Thiet lap chieu dai chuoi hien thi trong hinh
        $captcha->setWordlen(6);
        
        //5. Thiet lap duong dan den FONT hien thi trong CAPTCHA
        $captcha->setFont(CAPTCHA_PATH . '/font/vni-tekon.ttf');
        
        //6. Thiet lap kich co cua FONT
        $captcha->setFontSize(30);
        
        //7. Thiet lap kich thuoc cho hinh duoc tao ra
        $captcha->setWidth(240);
        $captcha->setHeight(70);
        
        //8. Tao ra CAPTCHA , tạo ra hình có tên gióng tên id
        $captcha->generate();
        
        //9.Truy gia tri cua CAPTCHA ra VIEW
        $this->view->captcha = $captcha->render($this->view);
        $this->view->captcha_id = $captcha->getId();
        $captchaSession = new Zend_Session_Namespace('Zend_Form_Captcha_' . $captcha->getId());
        $captchaSession->word = $captcha->getWord();
        
        if ($this->_request->isPost()){
            
            $captchaID = $this->_arrParam['captchaID'];
            $captchaSession = new Zend_Session_Namespace('Zend_Form_Captcha_' . $captchaID);
            $file  = CAPTCHA_PATH . '/img/' . $captchaID . $captcha->getSuffix();
            if($captchaSession->word == $this->_arrParam['captcha']){
                echo '<br>Ban da nhap dung CAPTCHA';
            }else{
                echo '<br>Xin vui long nhap lai CAPTCHA';
            }
            unlink($file);
            
            echo "<pre>";
            print_r($this->_arrParam);
            echo "</pre>";
            
        }
    }
    
    public function index2Action(){
        $captcha = new Zendvn_Captcha_Image();
        //9.Truy gia tri cua CAPTCHA ra VIEW
        $this->view->captcha = $captcha->render($this->view);
        $this->view->captcha_id = $captcha->getId();
    
        if($this->_request->isPost()){
            	
            $captchaID = $this->_arrParam['captchaID'];
            $valueCaptcha = $this->_arrParam['captcha'];
            $validator = new Zendvn_Validate_Captcha($captchaID);
            if(!$validator->isValid($valueCaptcha)){
                $errors = $validator->getMessages();
                echo '<br>' . current($errors);
            }
            $captcha->removeImg($captchaID);
        }
    }
}










