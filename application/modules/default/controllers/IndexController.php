<?php
    class IndexController extends Zendvn_Controller_Action{
        public function init(){
            // Lấy các thông số mudule,controller,action trên URL
            $params = $this->_request->getParams();
            echo "<pre>";
            print_r($params);
            echo "</pre>";
            echo "<br>".__METHOD__;
        }
        public function indexAction(){
           //var_dump(123);exit;
            $this->test();
            echo "<br>".__METHOD__;
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
    }