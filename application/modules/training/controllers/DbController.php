<?php
class Training_DbController extends Zendvn_Controller_Action{
    
    public function init(){
        parent::init();
        $this->_helper->layout()->disableLayout();
         $this->_helper->viewRenderer->setNoRender();
    }
    public function indexAction(){
        echo '<br>'.__METHOD__;
    }
}