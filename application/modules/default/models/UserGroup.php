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
    
    }
}