<?php
class Block_BlkCategorydemo extends Zend_View_Helper_Abstract{
    
    public function blkcategorydemo(){
        
        $view = $this->view;        // View ở đây là một zend View Helper
        /* echo "<pre>";
        print_r($view->ImageURL);
        echo "</pre>"; */
        
        $db = Zend_Registry::get('connectDb');
        $select = $db->select()
                     ->from('product_category',array('id','name','parents'))
                     ->where('status = 1')
                     ->order('order ASC');
        $result = $db->fetchAll($select);
       
        $strMenu = $this->createMenu($result,0,$view);
        // Đường dẫn đúng /zendmulty/shopping/index/category/5/name
        
        require_once (BLOCK_PATH.'/BlkCategory/default.php');   // Quan Trọng
        
    }

    public function createMenu($sourcearray,$parent = 0,$viewObj){
        
        //$newMenu = ''; 
        $this->showCategories($sourcearray,$parent = 0,$char = '');
       
        //return str_replace('<ul></ul>','', $newMenu);
    }
    
public function showCategories($categories, $parent_id = 0, $char = '')
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parents'] == $parent_id)
        {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }
     
    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child)
    {
        echo '<ul>';
        foreach ($cate_child as $key => $item)
        {
            // Hiển thị tiêu đề chuyên mục
            echo '<li>'.$item['name'];
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            $this->showCategories($categories, $item['id'], $char.'|---');
            echo '</li>';
        }
        echo '</ul>';
    }
}
	
	
}