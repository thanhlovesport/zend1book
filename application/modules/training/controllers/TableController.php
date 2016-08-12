<?php
    class Training_TableController extends Zendvn_Controller_Action{
        
        public function init(){
            
        }
        public function indexAction(){
           
            $tablegroup = new Training_Model_UserGroup();
            //$this->view->Items =  $tablegroup->find(2)->toArray();
            //$this->view->Items = $tablegroup->deleteItem(25);
            //$this->view->Items = $tablegroup->addItem3();
//             $info =  $tablegroup->info('cols');
//             echo "<pre>";
//             print_r($info);
//             echo "</pre>";
            //$this->view->Items = $tablegroup->getItemPosition(3);
            $this->view->Items = $tablegroup->getItem5();
           /*  echo "<pre>";
            print_r( $this->view->Items );
            echo "</pre>";; */
            
        }
        
    }
    