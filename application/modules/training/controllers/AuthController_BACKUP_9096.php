<?php
class Training_AuthController extends Zendvn_Controller_Action{
	
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

        //1. Goi ket noi voi Zend Db, kết nối với database từ trong Bootstrap
        $db = Zend_Registry::get('connectDb');
        
        //2.Khoi tao Zend Auth
        $auth = Zend_Auth::getInstance();
        
        //3
        $authAdapter = new Zend_Auth_Adapter_DbTable($db);
        //Zend_Db_Adapter_Abstract $zendDb = null, $tableName = null, $identityColumn = null,
        //                        $credentialColumn = null, $credentialTreatment = null)
        $authAdapter->setTableName('users')
                    ->setIdentityColumn('user_name') // Cột chứa tài khoản
                    ->setCredentialColumn('password'); // Cột chứa password
        $select = $authAdapter->getDbSelect(); // Gọi đến ZendbSelect
        $select->where('status = 1');
        //->where('active_code = ?','',STRING);
        
        echo '<pre>';
        print_r($authAdapter);
        echo '</pre>';

        if($this->_request->isPost()){
            echo "<pre>";
            print_r($this->_arrParam);
            echo "</pre>";
            $encode  = new Zendvn_Encode();
            $user_name = $this->_arrParam['user_name'];
            $password = $encode->password($this->_arrParam['password']);
            $authAdapter->setIdentity($user_name);  // Lấy cái này với cái ở dưới so sánh với 2 cái ở trên
            $authAdapter->setCredential($password);
            	
            //Lay ket qua truy van cua Zend_Auth
            $result = $auth->authenticate($authAdapter);
            if(!$result->isValid()){
                $error = $result->getMessages();
                echo '<br>' . current($error);
            }else{
                echo 'Ban login thanh cong';
                //Lay thong tin cua tai khoan dua vao session cua Zend Auth
                //$returnColumns = null, $omitColumns = null
                //$returnscolumn = array('id','user_name','password');
                //$data = $authAdapter->getResultRowObject($returnscolumn);
                $omitColumns = array('password'); // loại bỏ những giá trị nào không lấy ra ngoài
                $data = $authAdapter->getResultRowObject(null,$omitColumns); // Lấy dữ liệu trong kết quả tìm được
                $auth->getStorage()->write($data); // Có dữ liệu đưa vào một session, lấy seeesion đưa vào dữ liệu $data
                
                /*
                 echo $info->user_name;
                 echo '<pre>';
                 print_r($auth->getIdentity());
                 echo '</pre>'; */
                
                
            }
            	 
        }
    }
    public function loginAction(){
<<<<<<< HEAD
        
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){ // Phương thức này xác nhận được hay chưa
=======
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){
>>>>>>> 581e1545200153d455350dc52d724a79c60d5acd
            echo 'ban da login roi';
        }else{
            echo 'Ban chua login vao he thong';
        }
        $this->_helper->viewRenderer->setNoRender();
    }
    public function logoutAction(){
<<<<<<< HEAD
        
=======
>>>>>>> 581e1545200153d455350dc52d724a79c60d5acd
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        $this->_redirect($this->_actionMain);
        $this->_helper->viewRenderer->setNoRender();
    }
}