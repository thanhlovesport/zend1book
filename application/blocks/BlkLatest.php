<?php
class Block_BlkLatest extends Zend_View_Helper_Abstract{
    
    public function blklatest(){
        $view = $this->view;
        echo "<pre>";
        print_r($view->ImageURL);
        echo "</pre>";
        
        $db = Zend_Registry::get('connectDb');
        $select = $db->select()
        ->from('products AS p',array('id','name','picture','price','selloff','cat_id','hits','created'))
        ->join('product_category AS pc','pc.id = p.cat_id',array('name AS category_name'))
        ->limit(4,0)
        ->order('created DESC');
        //echo $select;
        $result = $db->fetchAll($select);
        
        require_once (BLOCK_PATH.'/BlkLatest/default.php');
    }
    
}