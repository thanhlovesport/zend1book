<?php
    class Training_TableController extends Zendvn_Controller_Action{
        
        public function init(){
            
        }
        public function indexAction(){
           
            $tablegroup = new Training_Model_UserGroup();
            //$this->view->Items =  $tablegroup->find(2)->toArray();
            $this->view->Items = $tablegroup->deleteItem(25);
            
        }
        
    }
    