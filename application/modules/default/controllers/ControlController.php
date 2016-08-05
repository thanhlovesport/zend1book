<?php
    class ControlController extends Zend_Controller_Action{
        public function init(){
           
        }
        public function indexAction(){
           //var_dump(123);exit;
            echo "<br>".__METHOD__;
            $info = $this->getRequest();
            $arrParam = $this->_request->getParams();
            echo '<br/>';
            
            echo $arrParam['module'];
            echo "<pre>";
            print_r($arrParam);
            echo "</pre>";
            
            // Xóa các thông số trong infoURL
            $this->_request->clearParams();
            $arrParam1 = $this->_request->getParams();
            echo "<pre>";
            print_r($arrParam1);
            echo "</pre>";
            
        }
        public function index2Action(){
            //var_dump(123);exit;
            $arrParam = $this->_request->getParams();
            echo '<br/>';
            echo "<pre>";
            print_r($arrParam);
            echo "</pre>";
           
            //echo '<br>'.$this->_request->getModuleName();
            //echo "<br>".$this->_request->getControllerName();
            //echo "<br>".$this->_request->getActionName();
        }
        public function index3Action(){
            $value = $this->_request->getParam('action','none');
            echo '<br>'.$value;
        }
        public function postAction(){
            $arrParam = $this->_request->getParams();
            if($this->_request->isPost() == 1){
                echo 'Thông tin đã được gửi đi từ Post';
                echo "<pre>";
                print_r($arrParam);
                echo "</pre>";
            }else {
                'Vui lòng nhập dữ liệu ';
            }
            
        }
        public function getAction(){
            if($this->_request->isGet() == 1){
                echo 'Dữ liệu lấy được từ phương thức Get';
                $arrParam = $this->_request->getParams();
                echo "<pre>";
                print_r($arrParam);
                echo "</pre>";
            }else {
                echo 'Chưa nhận được dữ liệu từ phương thức Get';
            }
        }
        public function viewAction(){
            echo "<br>".__METHOD__;
            $this->_helper->viewRenderer->setNoRender();
            $modeldefault = new Default_Model_Test();
            $modeldefault->getItem();
            echo"<br/>";
            $modelshopping = new Shopping_Model_Test();
            $modelshopping->getItem();
        }
        public function index4Action(){
            echo '<br>'.$this->_request->module;
        }
        public function loginAction(){
            $arrParam = $this->_request->getParams();
            if ($this->_request->isPost() == 1){
                $username = $arrParam['username'];
                $password = $arrParam['password'];
                if ($username == 'admin' && $password == '123456'){
                    $url =('default/control/user');
                    $this->_redirect($url);
                }else {
                    $this->view->warn = 'Username hoặc password sai, vui lòng đăng nhập lại';
                }
            }else{
                $this->view->warn = 'Vui lòng nhập username, password';
            }
        }
        public function  userAction(){
            echo 'Login success';
            $this->_helper->viewRenderer->setNoRender();
            $this->_helper->layout()->disableLayout();
        }
    }