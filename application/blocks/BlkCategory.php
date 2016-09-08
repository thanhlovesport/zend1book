<?php
class Block_BlkCategory extends Zend_View_Helper_Abstract{
    
    public function blkcategory(){
        $view = $this->view;
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
      
        require_once (BLOCK_PATH.'/BlkCategory/default.php');
        
    }
    
    public function createMenu($sourcearray,$parent = 0,$viewObj){
        
        //$newMenu = ''; 
        $this->recursiveMenu($sourcearray, $parent = 0,$newMenu);
        return $newMenu;
        //return str_replace('<ul></ul>','', $newMenu);
        
    }
    
   public function recursiveMenu($sourceArr,$parents = 0,&$newMenu){
		if(count($sourceArr)>0){
			$newMenu .= '<ul>';
			foreach ($sourceArr as $key => $value){                                                              
				if($value['parents'] == $parents){
					$newMenu .= '<li><a class="cuuchild " href="#">' . $value['name'].'</a><span class="down"></span>';
					$newParents = $value['id'];
					unset($sourceArr[$key]);
					$this->recursiveMenu($sourceArr,$newParents, $newMenu);
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