<?php

class Default_Model_User extends Zend_Db_Table{
    
    protected $_name = 'users';
    protected $_primary = 'id';
    
    public function countItem($arrParam = null,$option = null){
        $db = Zend_Registry::get('connectDb');
    
        $ssfilte = $arrParam['sessionfilter'];
    
    
        $select = $db->select()
        ->from('users AS u',array('COUNT(u.id) AS TotalItem'));
    
        if(!empty($ssfilte['searchbox'])){
            //var_dump(123);exit;
            $keywords = '%'.$ssfilte['searchbox'].'%';
            @$select->where('u.user_name LIKE ?',$keywords,STRING);
        }
        
        if($ssfilte['group_id'] > 0){
            @$select->where('u.group_id = ?', $ssfilte['group_id'],INTEGER);
        }
        
        //echo $select;
        $result = $db->fetchOne($select);
        return $result;
    }
    
    public function listItem($arrParam = null,$option = null){
        $db = Zend_Registry::get('connectDb');
    
        $paginator = $arrParam['paginator'];
    
        $ssfilte = $arrParam['sessionfilter'];
        
        
        //$db = Zend_Db::factory($adapter,$config);
        if ($option['task'] == 'admin-list'){
        
            $select = $db->select()
            ->from('users AS u',array('id','user_name','status','email','register_date'))
            ->joinLeft('user_group AS g','g.id = u.group_id','group_name');
            //->group('g.id');
           if (!empty($ssfilte['col']) && !empty($ssfilte['order'])){
                @$select->order($ssfilte['col'],$ssfilte['order']);
                
            } 
            if ($paginator['itemCountPerPage'] > 0){
                $page = $paginator['currentPage'];
                $rowCount = $paginator['itemCountPerPage'];
                $select->limitPage($page,$rowCount);
            }  
  
            if(!empty($ssfilte['searchbox'])){
                //var_dump(123);exit;
                $keywords = '%'.$ssfilte['searchbox'].'%';
                @$select->where('u.user_name LIKE ?',$keywords,STRING);
            } 
            if($ssfilte['group_id'] > 0){
                @$select->where('u.group_id = ?', $ssfilte['group_id'],INTEGER);
            }
            echo $select;
           /* echo '<br>'; */
            $result = $db->fetchAll($select);
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
            echo "<pre>";
            print_r($arrParam);
            echo "</pre>";
        if ($option['task'] == 'admin-add'){
            
            $row = $this->fetchNew();
            
            $encode  = new Zendvn_Encode();
            $row->user_name 	= $arrParam['user_name'];
            $row->password 		= $encode->password($arrParam['password']); // Gọi đến hàm password trong thư viện encode của Zendvn Encode
            $row->email 		= $arrParam['email'];
            $row->group_id 		= $arrParam['group_id'];
            $row->first_name 	= $arrParam['first_name'];
            $row->last_name 	= $arrParam['last_name'];
            $row->birthday 		= $arrParam['birthday'];
            $row->status 		= $arrParam['status'];
            $row->user_avatar   = $arrParam['user_avatar'];
            $row->sign 			= $arrParam['sign'];
            $row->register_date	= date("Y-m-d");
            $row->register_ip	= $_SERVER['REMOTE_ADDR'];
            $row->save();
        }
        if ($option['task'] == 'admin-edit'){
            echo '<br>'.__METHOD__;
            echo "<pre>";
            print_r($arrParam);
            echo "</pre>";
            $where = 'id = '.$arrParam['id'];
            $row = $this->fetchRow($where);

            $encode  = new Zendvn_Encode();
            $row->user_name 	= $arrParam['user_name'];
            if (!empty($arrParam['password'])){
                $row->password 		= $encode->password($arrParam['password']); // Gọi đến hàm password trong thư viện encode của Zendvn Encode
            }
            $row->email 		= $arrParam['email'];
            $row->group_id 		= $arrParam['group_id'];
            $row->first_name 	= $arrParam['first_name'];
            $row->last_name 	= $arrParam['last_name'];
            $row->birthday 		= $arrParam['birthday'];
            $row->status 		= $arrParam['status'];
            $row->user_avatar   = $arrParam['user_avatar'];
            $row->sign 			= $arrParam['sign'];
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
        if($option['task'] == 'admin-infouser'){
           $db = Zend_Registry::get('connectDb');
           $select = $db->select()
                         ->from('users AS u')
                         ->joinLeft('user_group AS g','u.group_id = g.id',array('group_name'))
                         ->where('u.id = ?',$arrParam['id'],INTEGER);
            $result = $this->fetchRow($select);
        }
        return $result;
    }
    
    // Lay thong tin mot group hay user
    public function getItem($arrParam = null,$option = null){
        /* if($option['task'] == 'admin-info' || $option['task'] == 'admin-edit'){
            $db = Zend_Registry::get('connectDb');
            $select = $db->select()
                         ->from('users AS u')
                         ->joinLeft('user_group AS g','u.group_id = g.id',array('group_name'))
                         ->where('u.id = ?',$arrParam['id'],INTEGER);
            $result = $this->fetchRow($select);
        }
        return $result; */
        if($option['task'] == 'admin-info' || $option['task'] == 'admin-edit'){
            $db = Zend_Registry::get('connectDb');
            //$db = Zend_Db::factory($adapter,$config);
            $select = $db->select()
            ->from('users as u')
            ->joinLeft('user_group as g','u.group_id = g.id',array('group_name'))
            ->where('u.id = ?', $arrParam['id'], @INTEGER );
            	
            $result = $db->fetchRow($select);
        }
        if($option['task'] == 'delete'){
			$where  = 'id = ' . $arrParam['id'];
			$result = $this->fetchRow($where)->toArray();
		}
        return $result;
    }
    public function deleteItem($arrParam = null,$option = null){
        
        if($option['task'] == 'admin-delete'){
            	
            //----------LAY TEN HINH ANH user_avatar --------------
            $row = $this->getItem($arrParam,array('task'=>'delete'));
            echo "<pre>";
            print_r($row);
            echo "</pre>";
            //--------------XOA user_avatar -----------------------
            // load ra su dung file URL Khi xoa hoac upload su dung filepath
            $upload_dir = FILE_PATH . '/users';
            $upload = new Zendvn_File_Upload();
            $upload->removeFile($upload_dir . '/origin/' . $row['user_avatar']); // Xoa hinh anh di
            $upload->removeFile($upload_dir . '/img100x100/' . $row['user_avatar']);
            $upload->removeFile($upload_dir . '/img450x450/' . $row['user_avatar']);
            	
            $where = ' id = ' . $arrParam['id'];
            $this->delete($where);
        }
        
        if($option['task'] == 'admin-multi-delete'){
            $cid = $arrParam['cid'];
            	
            if(count($cid)>0){
                if($arrParam['type'] == 1){
                    $status = 1;
                }else{
                    $status = 0;
                }
        
                foreach ($cid as $key){
                    echo '<br>'.$key;
                    $arrParam['id'] = $key;
                    	
                    //----------LAY TEN HINH ANH user_avatar --------------
                    $row = $this->getItem($arrParam,array('task'=>'delete'));
                    	
                    //--------------XOA user_avatar -----------------------
                    $upload_dir = FILES_PATH . '/users';
                    $upload = new Zendvn_File_Upload();
                    $upload->removeFile($upload_dir . '/origin/' . $row['user_avatar']);
                    $upload->removeFile($upload_dir . '/img100x100/' . $row['user_avatar']);
                    $upload->removeFile($upload_dir . '/img450x450/' . $row['user_avatar']);
                }
                $ids = implode(',',$cid);
                $where = 'id IN (' . $ids . ')';
                $this->delete($where);
            }
        }
    }
    // Thay doi trang thai member
   
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