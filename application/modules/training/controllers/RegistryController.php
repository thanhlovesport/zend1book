<?php
class Training_RegistryController extends Zendvn_Controller_Action{

    public function init(){
        parent::init();
//         $var1 = 'Hello Welcome to Vietnamese';
//         $var2 = array('Member','Guest','Admin');
//         Zend_Registry::_unsetInstance();
//         $registry = new Zend_Registry(array('bar'=>$var1,'bum'=>$var2));
//         Zend_Registry::setInstance($registry);
    }
    public function indexAction(){
       // echo '<br>'.__METHOD__;
        /* $val = Zend_Registry::get('helloletter');
        echo '<br>'.$val;
        
        $ngonngu = Zend_Registry::get('language');
        echo "<pre>";
        print_r($ngonngu);
        echo "</pre>";
        
        $registry = Zend_Registry::getInstance();
        echo "<pre>";
        print_r($registry);
        echo "</pre>"; */
        
        $connect = Zend_Registry::get('connectDb');
        echo "<pre>";
        print_r($connect);
        echo "</pre>";
        
    }
    
    public function index2Action(){

//         $registry = Zend_Registry::getInstance();
//         echo "<pre>";
//         print_r($registry);
//         echo "</pre>";
    }
    
}