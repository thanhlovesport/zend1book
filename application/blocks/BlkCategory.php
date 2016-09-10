<?php
class Block_BlkCategory extends Zend_View_Helper_Abstract{
    
    public function blkcategory(){
        
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
        $this->recursiveMenu($sourcearray, $parent = 0,$newMenu,$viewObj);
        return $newMenu;
        //return str_replace('<ul></ul>','', $newMenu);
    }
    
   public function recursiveMenu($sourceArr,$parents = 0,&$newMenu,$viewObj){
		if(count($sourceArr)>0){
			$newMenu .= '<ul>';
			foreach ($sourceArr as $key => $value){                                                              
				if($value['parents'] == $parents){
				    //
				    if($value['parents'] == 0 || ($value['id'] == $value['parents'])){
				        $link = '#';
				        $newMenu .= '<li><a  href="'.$link.'">' . $value['name'].'</a><span class="down"></span>';
				    }else{
				        $link = $viewObj->baseURL('/shopping/index/category/'.$value['id'].'/'.$value['name']);
				        $newMenu .= '<li><a  href="'.$link.'">' . $value['name'].'</a>';
				        
				    }
					//$newMenu .= '<li><a  href="'.$link.'">' . $value['name'].'</a><span class="down"></span>';
					$newParents = $value['id'];
					unset($sourceArr[$key]);
					$this->recursiveMenu($sourceArr,$newParents,$newMenu,$viewObj);
					$newMenu .='</li>';
				}
			}
			$newMenu .= '</ul>';
		}
	}
	/* public function recursive1Menu($sourceArr,$parents = 0,&$newMenu){
	    if(count($sourceArr)>0){
	        $newMenu .= '<li class="category25">';
	        foreach ($sourceArr as $key => $value){
	            if($value['parents'] == $parents){
	                $newMenu .= '<a class="cuuchild" href="category.html">'.$value['name'].'</a> <span class="down"></span>';
	                $idofnewParents = $value['id'];
	                if($value['parents'] == $idofnewParents){
	                    $newMenu .= '<ul>
                                    <li class="category30"><a class="nochild " href="category.html">'.$value['name'].'</a></li> </ul>';
	                }
	                unset($sourceArr[$key]);
	                $this->recursive1Menu($sourceArr,$idofnewParents, $newMenu);
	            }
	        }
	        $newMenu .= '</ul>';
	    }
	} */
	
}