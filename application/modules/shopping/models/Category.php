<?php
class Shopping_Model_Category extends Zend_Db_Table{
    protected $_name = 'product_category';
    protected $_primary = 'id';
    
    public function itemInSelectbox($arrParam = null,$option = null){
        $db = Zend_Registry::get('connectDb');
        if ($option == null){
            $select = $db->select()
            ->from('product_category AS pc',array('id','name','status','parents','order','created'))
            ->order('pc.order ASC');
            
            $result = $db->fetchAll($select);
            
            
        }
        
        if($option['task'] == 'admin-edit'){
            $id = $arrParam['id'];
            $select = $db->select()
            ->from('product_category AS pc',array('id','name','status','parents','order','created_by'))
            ->where('id != ?', $id, @INTEGER )
            ->order('pc.order ASC');
            	
            $result  = $db->fetchAll($select);
            	
        }
        
        $sapxepcay = new Zendvn_System_Recursive($result); // Goi den thu vien sap xep lai cay
        $result = $sapxepcay->buildArray(0); // Lay het tat ca nhung gi co trong category
        
        $tmp = array('id'=>0,'name'=>'Root category','level'=>1,'order'=>1,'parents'=>0);
        array_unshift($result,$tmp);
        
        return $result;
    }
    public function categoryInSelectbox($arrParam = null,$option = null){
        
        $db = Zend_Registry::get('connectDb');
        if ($option == null){
            $select  = $db->select()
            ->from('product_category',array('id','name'));
        
            $result = $db->fetchPairs($select); // fetchParis trả về một mảng, cột đầu tiên là khóa, cột thứ 2 là value
            $result['0'] = '--Select a item--';
            ksort($result); // Sắp xếp các phần tử trong mảng theo chiều tăng dần của keys
            //var_dump(123);exit;
            
        }
        return $result;
       
        
    }
    public function recursive($sourceArr,$parents = 0,$level = 1,&$resultArr){
		if(count($sourceArr)>0){
			foreach ($sourceArr as $key => $value){
				if($value['parents'] == $parents){
					$value['level'] = $level;
					$resultArr[] = $value;
					$newParents = $value['id'];
					unset($sourceArr[$key]);
					$this->recursive($sourceArr,$newParents, $level + 1,$resultArr);
				}
			}
		}
		return $resultArr;
	}
    public function countItem($arrParam = null,$option = null){
        $db = Zend_Registry::get('connectDb');
        
        $ssfilte = $arrParam['sessionfilter'];
        
        
        $select = $db->select()
                     ->from('user_group AS g',array('COUNT(g.id) AS TotalItem'));
        
        if(!empty($ssfilte['searchbox'])){
            //var_dump(123);exit;
            $keywords = '%'.$ssfilte['searchbox'].'%';
            @$select->where('g.group_name LIKE ?',$keywords,STRING);
        }
        //echo $select;
        $result = $db->fetchOne($select);
        return $result;
    }
    
    public function listItem($arrParam = null,$option = null){
        $db = Zend_Registry::get('connectDb');
        
        //$paginator = $arrParam['paginator'];
        
        $ssfilte = $arrParam['sessionfilter'];
        
        //$db = Zend_Db::factory($adapter,$config);
        if ($option['task'] == 'admin-list'){
            // id,name,status,parent,order,created,created_by
            $select = $db->select()
                           ->from('product_category AS pc',array('id','name','status','parents','order','created'))
                           ->joinLeft('users AS u','u.id = pc.created_by',array('user_name'))
                           ->order('pc.order');
           
            /* if(!empty($ssfilte['searchbox'])){
                //var_dump(123);exit;
                $keywords = '%'.$ssfilte['searchbox'].'%';
                @$select->where('g.group_name LIKE ?',$keywords);
            } */
            
            $result = $db->fetchAll($select);
            $sapxepcay = new Zendvn_System_Recursive($result); // Goi den thu vien sap xep lai cay
            $result = $sapxepcay->buildArray(0); // Lay het tat ca nhung gi co trong category
            
            
        }
        return $result;
    }
    public function filterItem($arrParam = null,$option = null){
        $db = Zend_Registry::get('connectDb');
        
    }
    public function sortItem($arrParam = null,$option = null){
        echo '<h3 style = "color:red;font-weight:bold">'. __METHOD__.'</h3>';
        $cid = $arrParam['cid'];
        $order = $arrParam['order'];
        if(count($cid) > 0){
            foreach ($cid as $key=>$value){
                $data = array('order'=>$order[$value]);
                $where = 'id ='.$value;
                $this->update($data, $where);
            }
        }
        
        
    }
    public function addItem($arrParam = null,$option = null){
        
    
		if($option['task'] == 'admin-add'){
			$info =  new Zendvn_System_Info();
			$created_by = $info->getMemberInfo('id');
			
			$row =  $this->fetchNew();
			$row->name 			= $arrParam['name'];
			$row->status 		= $arrParam['status'];
			$row->parents 		= $arrParam['parents'];
			$row->order 		= $arrParam['order'];
			$row->picture 		= $arrParam['picture'];
			
			$row->created 		= date("Y-m-d H:s:i");
			$row->created_by 	= $created_by;
			
			$row->save();
		}
		
		if($option['task'] == 'admin-edit'){
			$where = 'id = ' . $arrParam['id'];
			
			$row =  $this->fetchRow($where);
			$row->name 			= $arrParam['name'];
			$row->status 		= $arrParam['status'];
			$row->parents 		= $arrParam['parents'];
			$row->order 		= $arrParam['order'];
			$row->picture 		= $arrParam['picture'];
			
			$row->modified 		= date("Y-m-d H:s:i");
			$row->modified_by 	= $created_by;
			
			$row->save();
		}
		
    
    }
    public function infoItem($arrParam = null,$option = null){
       /*  echo "<pre>";
        print_r($arrParam);
        echo "</pre>";
        echo "<pre>";
        print_r($option);
        echo "</pre>"; */
        if($option['task'] == 'admin-info'){
            $where = 'id = '.$arrParam['id'];
            $result = $this->fetchRow($where)->toArray();
        }
        return $result;
    }
    public function getItem($arrParam = null,$option = null){
        if($option['task'] == 'admin-info' || $option['task'] == 'admin-edit'){
            $where = 'id = '.$arrParam['id'];
            $result = $this->fetchRow($where)->toArray();
        }
        return $result;
    }
    public function deleteItem($arrParam = null,$option = null){
      
         if($option['task'] == 'admin-delete'){
			$db = Zend_Registry::get('connectDb');
			$id = $arrParam['id'];
			$select = $db->select()
					 	  ->from('product_category AS pc',array('id','name','status','parents','order','created_by'));
			$result  = $db->fetchAll($select);		
			$system = new Zendvn_System_Recursive($result);		
			$resultfinal = $system->buildArray($id);	 
			array_unshift($resultfinal,array('id'=> $id));
			
			foreach($resultfinal as $key => $val){
				$where = ' id = ' . $val['id'];
				$this->delete($where);
			}
		}
	   
		if($option['task'] == 'admin-multi-delete'){
		    $cid = $arrParam['cid'];
		    
		    if(count($cid)>0){ // Hàm count đếm số phần tử có trong mảng
		
		        $db = Zend_Registry::get('connectDb');
		        $id = $arrParam['id'];
		        $select = $db->select()
		        ->from('product_category AS pc',array('id','name','status','parents','order','created_by'));
		        $result  = $db->fetchAll($select);
		
		        $newArray = array();
		        foreach ($cid as $key => $val){
		            $id = $val;
		            $newArray[] = array('id'=>$id);
		            $system = new Zendvn_System_Recursive($result);
		            $tmp = $system->buildArray($id);
		            foreach ($tmp as $keyTmp => $valTmp){
		                $newArray[] = $valTmp;
		            }
		        }
		
		        if(count($newArray)>0){
		            foreach($newArray as $keyNew => $valNew){
		                $where = ' id = ' . $valNew['id'];
		                $this->delete($where);
		            }
		        }
		    }
		}
		
    }
    public function statusItem($arrParam = null,$option = null){
            $cid = $arrParam['cid'];
            if (count($cid) > 0){
                if ($arrParam['type'] == 1){
                    $status = 1;
                }else{
                    $status = 0;
                }
                
                $dayid  = implode(',', $cid);
                $data   = array('status'=>$status);
                $where  = 'id IN ('.$dayid.')';
                $this->update($data, $where);
                // update from user_group set status = 1 whe id in (day id)
            }
            
            if (count($arrParam['id']) > 0) {
                if ($arrParam['type'] == 1){
                    $status = 1;
                }else{
                    $status = 0;
                }
                
                $data   = array('status'=>$status);
                $where  = 'id ='.$arrParam['id'];
                $this->update($data, $where);
            }
            if (count($arrParam['idacp']) > 0) {
                if ($arrParam['type'] == 1){
                   $group_acp = 1;
                }else{
                    $group_acp = 0;
                }
            
                $data   = array('group_acp'=>$group_acp);
                $where  = 'id ='.$arrParam['idacp'];
                $this->update($data, $where);
            }
    }
    
}