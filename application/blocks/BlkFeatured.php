<?php
class Block_BlkFeatured extends Zend_View_Helper_Abstract{
    
    public function blkfeatured(){
        $view = $this->view;
       /*  echo "<pre>";
        print_r($view->arrParam);
        echo "</pre>"; */
        $db = Zend_Registry::get('connectDb');
        $select = $db->select()
        ->from('products AS p',array('id','name','picture','price','selloff','cat_id'))
        ->join('product_category AS pc','pc.id = p.cat_id',array('name AS category_name'))
        ->where('p.special = 1')
        //->limit(8,0)                                           
        ->order('RAND()');
        //echo $select;
        $result = $db->fetchAll($select);
                
        require_once (BLOCK_PATH.'/BlkFeatured/default.php');
    }
    
}