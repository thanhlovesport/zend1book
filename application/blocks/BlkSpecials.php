<?php
class Block_BlkSpecials extends Zend_View_Helper_Abstract{
    
    public function blkspecials(){
        $view = $this->view;
        echo "<pre>";
        print_r($view->ImageURL);
        echo "</pre>";
        require_once (BLOCK_PATH.'/BlkSpecials/default.php');
    }
    
}