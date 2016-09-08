<?php
class Block_BlkCart extends Zend_View_Helper_Abstract{
    
    public function blkcart(){
        $view = $this->view;
       /*  echo "<pre>";
        print_r($view->ImageURL);
        echo "</pre>"; */
        require_once (BLOCK_PATH.'/BlkCart/default.php');
    }
    
}