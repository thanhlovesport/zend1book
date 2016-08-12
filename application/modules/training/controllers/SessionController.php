<?php
class Training_SessionController extends Zend_Controller_Action{
    public function init(){
        parent::init();
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }
    

    public function indexAction(){
        $db = Zend_Registry::get('connectDb');
        /*echo '<pre>';
         print_r($db);
        echo '</pre>';*/
        $ns = new Zend_Session_Namespace('cart');
        $ns->mahang = 'Tivi';
        $ns->laptop = array('HP','Dell','IBM');
        $ns->number = 1000;
        $ns->db = $db;
    
        echo '<pre>';
        print_r($ns->getIterator());
        echo '</pre>';
    }
    
    public function index2Action(){
        $ss = new Zend_Session_Namespace('cart');
        echo '<br>' . $ss->mahang;
        echo '<br>' . $ss->number;
        echo '<pre>';
        print_r($ss->getIterator());
        echo '</pre>';
    }
    
    public function index3Action(){
        $ss = new Zend_Session_Namespace('cart');
        unset($ss->db);
        echo '<pre>';
        print_r($ss->getIterator());
        echo '</pre>';
    }
    
    public function index4Action(){
        $ns = new Zend_Session_Namespace('time');
        $ns->today = 'Sunday';
        $ns->setExpirationSeconds(5,today);
    }
    
    public function index5Action(){
        $ns = new Zend_Session_Namespace('time');
        echo '<br>' . $ns->today;
    }
    
    public function index6Action(){
    
        $ns = new Zend_Session_Namespace('cart123');
        $ns->mahang = 'Tivi';
        $ns->laptop = array('HP','Dell','IBM');
        $ns->number = 1000;
        $ns->setExpirationSeconds(5);
    
    
        echo '<pre>';
        print_r($ns->getIterator());
        echo '</pre>';
    }
    
    public function index7Action(){
        $ns = new Zend_Session_Namespace('cart123');
        echo '<pre>';
        print_r($ns->getIterator());
        echo '</pre>';
    }
    
    public function index8Action(){
    
        $ns = new Zend_Session_Namespace('cart123');
        $ns->mahang = 'Tivi';
        $ns->laptop = array('HP','Dell','IBM');
        $ns->number = 1000;
        $count = $ns->apply('count');
        echo $count;
        echo '<pre>';
        print_r($ns->getIterator());
        echo '</pre>';
    }
    
    public function index9Action(){
    
        $ns = new Zend_Session_Namespace('cart123');
        $ns->mahang = 'Tivi';
        $ns->laptop = array('HP','Dell','IBM');
        $ns->number = 1000;
        $ns->lock();
    
        if($ns->isLocked()){
            $ns->unlock();
        }
        $ns->number123 = 2000;
        echo '<pre>';
        print_r($ns->getIterator());
        echo '</pre>';
    
    }
}