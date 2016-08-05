<?php
    class Shopping_IndexController extends Zend_Controller_Action{
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
            echo "<br>".__METHOD__;
        }
        public function viewAction(){
            echo "<br>".__METHOD__;
            $this->_helper->viewRenderer->setNoRender();
        }
    }