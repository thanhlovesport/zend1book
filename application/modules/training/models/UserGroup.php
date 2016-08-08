<?php
class Training_Model_UserGroup extends Zend_Db_Table{
    
    protected $_name = 'user_group';
    protected $_primary = 'id';
    
    public function listItem(){
        
        //   $result = $this->fetchAll($where,$order,$count,$offset): Count là số lượng phần từ, Offset là chỉ số
        $where = 'group_acp = 1 ';
        $order = 'group_name ASC';
        $result = $this->fetchAll($where,$order)->toArray();
        return $result;
    }
    
    public function listItem2(){
        $count = '4';
        $offset = '2';
        $result = $this->fetchAll(null,null,$count,$offset)->toArray();
        return $result;
    }
    
    public function findItem($id){
        $result = $this->find($id);
        return $result;
    }
    public function deleteItem($id){
        $where = 'id = '.$id;
        $this->delete($where);
    }
    public function test(){
        echo '<br>'.__METHOD__;
    }
}