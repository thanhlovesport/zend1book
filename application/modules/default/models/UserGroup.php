<?php
class Default_Model_UserGroup extends Zend_Db_Table{
    protected $_name = 'user_group';
    protected $_primary = 'id';
    
    public function listItem($arrParam = null,$option = null){
        if ($option['task'] == 'admin-list'){
            $result = $this->fetchAll()->toArray();
            return $result;
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
    }
}