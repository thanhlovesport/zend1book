<?php
class Default_Model_UserGroup extends Zend_Db_Table{
    protected $_name = 'user_group';
    protected $_primary = 'id';
    
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
        
        $paginator = $arrParam['paginator'];
        
        $ssfilte = $arrParam['sessionfilter'];
        
        //$db = Zend_Db::factory($adapter,$config);
        if ($option['task'] == 'admin-list'){
            
            $select = $db->select()
                           ->from('user_group AS g',array('id','group_name','status','group_acp','order'))
                           ->joinLeft('users AS u','g.id = u.group_id','COUNT(u.id) AS members')
                           ->group('g.id');
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
                @$select->where('g.group_name LIKE ?',$keywords);
            }
            echo $select;
            echo '<br>';
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
        if ($option['task'] == 'admin-add'){
            $row = $this->fetchNew();
            $row->group_name = $arrParam['group_name'];
            $row->avatar     = $arrParam['avatar'];
            $row->ranking 		= $arrParam['ranking'];
            $row->group_acp 	= $arrParam['group_acp'];
            $row->group_default = $arrParam['group_default'];
            $row->created 		= date("Y-m-d");
            $row->created_by 	= 1;
            $row->status 		= $arrParam['status'];
            $row->order 		= $arrParam['order'];
            
            $row->save();
        }
        if ($option['task'] == 'admin-edit'){
           
            $where = 'id = '.$arrParam['id'];
            $row = $this->fetchRow($where);
            $row->group_name = $arrParam['group_name'];
            $row->avatar     = $arrParam['avatar'];
            $row->ranking 		= $arrParam['ranking'];
            $row->group_acp 	= $arrParam['group_acp'];
            $row->group_default = $arrParam['group_default'];
            $row->modified 		= date("Y-m-d");        
            $row->modified_by 	= 1;
            $row->status 		= $arrParam['status'];
            $row->order 		= $arrParam['order'];
             
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
            $where = 'id = '.$arrParam['id'];
            $this->delete($where);
        }
        if($option['task'] == 'multy-delete'){
            $cid = $arrParam['cid'];
            if (count($cid) > 0){
                $dayid = implode(',', $cid);
                $where = 'id IN ('.$dayid.') ';
                $this->delete($where);
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