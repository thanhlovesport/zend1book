<?php
class Block_BlkLatest extends Zend_View_Helper_Abstract{
    
    public function blklatest(){
        $view = $this->view;
        echo "<pre>";
        print_r($view->ImageURL);
        echo "</pre>";
        require_once (BLOCK_PATH.'/BlkLatest/default.php');
    }
    
}