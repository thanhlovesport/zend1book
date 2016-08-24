<?php

class  Training_SomethingController extends Zend_Controller_Action{
    
    
    // Thu tu chay cac ham se la init pre index post
    public function init(){
        echo '<br>'.__METHOD__;
         $this->_helper->viewRenderer->setNoRender();
    }
    public function postDispatch(){
        echo '<br>'.__METHOD__;
    
    }
    public function preDispatch(){
        echo '<br>'.__METHOD__;
    }
    public function somethingAction(){
        echo '<br>'.__METHOD__;
        
    }
    public function indexAction(){
        echo '<br>'.__METHOD__;
        
    }
    
}