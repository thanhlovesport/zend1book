<?php
class Block_BlkFeatured extends Zend_View_Helper_Abstract{
    
    public function blkfeatured(){
        $view = $this->view;
        echo "<pre>";
        print_r($view->ImageURL);
        echo "</pre>";
        require_once (BLOCK_PATH.'/BlkFeatured/default.php');
    }
    
}