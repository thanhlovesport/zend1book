<?php
class Shopping_Model_Items extends Zend_Db_Table{
    protected $_name = 'products';
    protected $_primary = 'id';
    
    public function listItem($arrParam = null,$option = null){
        
        $db = Zend_Registry::get('connectDb');
        
        $paginator = $arrParam['paginator'];
        
        if ($option['task'] == 'public-list'){
            
            $db = Zend_Registry::get('connectDb');
            
            $select = $db->select()
            ->from('products AS p',array('id','name','picture','price','selloff','cat_id'))
            ->join('product_category AS pc','pc.id = p.cat_id',array('name AS category_name'))
            ->where('p.special = 1')
            ->limit(8,0);
            //->order('RAND()');
            //echo $select;
            
            if ($paginator['itemCountPerPage'] > 0){
                $page = $paginator['currentPage'];
                $rowCount = $paginator['itemCountPerPage'];
                $select->limitPage($page,$rowCount);
            }
            //echo $select;
            
            $result = $db->fetchAll($select);
        }
        
        if ($option['task'] == 'public-category'){
            
            $db = Zend_Registry::get('connectDb');
            
            
            $select = $db->select()
            ->from('product_category AS pc',array('id','name','parents'))
            ->where('status = 1 AND parents != 0');
            $result = $db->fetchAll($select);
            //$system = new Zendvn_System_Recursive($result);
            //$resultcategory = $system->buildArray($arrParam['cid']);
            echo '<pre>';
            print_r($result);
            echo '</pre>';
            
        }
        
        return $result;
        
    }
    
    
    public function countItem($arrParam ,$option = null){
        $db = Zend_Registry::get('connectDb');
        
        if($option['task'] == 'public-index'){
            $select = $db->select()
            ->from('products AS p',array('COUNT(p.id) AS TotalItem'))                                               
            ->join('product_category AS pc','pc.id = p.cat_id')
            ->where('p.special = 1');
            
            $result = $db->fetchOne($select);
        }
        echo $select;
        return $result;
    }
  
    
}