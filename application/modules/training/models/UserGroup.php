<?php
class Training_Model_UserGroup extends Zend_Db_Table{
    
    protected $_name = 'user_group';
    protected $_primary = 'id';
    
    public function getItem3(){
        $select = $this->select()
                       ->from('user_group',array('id','group_name','group_acp'))
                       ->where('group_acp = ?',1,INTEGER);
        echo $select;
        $result = $this->fetchAll($select)->toArray();
        return $result;
    }
    public function getItem4(){
        
       
        $select = $this->select(Zend_Db_Table::SELECT_WITHOUT_FROM_PART)
                       ->setIntegrityCheck(false) // Cho phép kết nối giữa nhiều bảng
                        ->from('user_group AS g',array('id','group_name','group_acp'))
                        ->join('users AS u','u.group_id = g.id',array('user_name'));
        echo $select;
        $result = $this->fetchAll($select)->toArray();
        return $result;
    }
    public function getItem5(){
    
        $db = Zend_Registry::get('connectDb');
        
        $select = $db->select()
                     ->from('users');
        $result = $db->fetchALl($select);
        return $result;
    }
    public function getItemPosition($position = null){
        $where = 'group_acp = 1';
        $order = 'id DESC';
        $result = $this->fetchAll($where,$order);
        $rowPosition = $result->seek($position);
        $result = $rowPosition->current()->toArray();
        return $result; 
    }
    public function getItem2(){
        $where = 'group_acp = 1';
        $order = 'id DESC';
        $result = $this->fetchRow($where,$order)->toArray();
        return $result;
    }
    public function listItem(){
        
        //   $result = $this->fetchAll($where,$order,$count,$offset): Count là số lượng phần từ, Offset là chỉ số
        $where = 'group_acp = 1 ';
        $order = 'group_name ASC';
        $result = $this->fetchAll($where,$order)->toArray();
        return $result;
    }
    
    // Lấy danh sách Record có điều kiện
    public function listItem2(){
        $count = '4';
        $offset = '2';
        $result = $this->fetchAll(null,null,$count,$offset)->toArray();
        return $result; 
    }
    // Tìm Record theo id
    public function findItem($id){
        $result = $this->find($id);
        return $result;
    }
    
    // Xóa Record theo id
    public function deleteItem($id){
        $where = 'id = '.$id;
        $this->delete($where);
    }
    
    // Thêm một dòng record
    public function addItem(){
        $data = array(
            'group_name'=>'BinhThuan',
            'avatar'=>'binhthuan.png',
            'ranking'=>'rbinhthuan.png',
            'group_acp'=>1,
            'group_default'=>0,
            'status'=>1,
            'order'=>10
        );
        $row = $this->createRow($data);
        $row->save();
    }
    public function addItem2(){
        $row = $this->fetchNew();
        $row->group_name = 'DaLat';
        $row->avatar = 'dalat.png';
        $row->ranking = 'rdalat.png';
        $row->group_acp = '1';
        $row->group_default = '0';
        $row->status = '1';
        $row->order = '11';
        
        $row->save();
       
        
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
    public function addItem3(){
        $data = array(
            'group_name'=>'VIP',
            'avatar'=>'vip.png',
            'ranking'=>'rvip.png',
            'group_acp'=>1,
            'group_default'=>0,
            'status'=>1,
            'order'=>13
        );
        $this->insert($data);
    }
    public function updateItem(){
        $data = array(
            'group_name'=>'Vinh',
            'group_default'=>1,
            'order'=>15
        );
        $where = 'id = 28';
        $this->update($data, $where);
    }
    // Phuong thuc ket hop giua FetchRow va Save
    public function updateItem2(){
        $where =  'id = 26';
        $row = $this->fetchRow($where);
        $row->group_name = 'Binh Thuan my country';
        $row->group_acp = 0;
        $row->save();
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
    public function test(){
        echo '<br>'.__METHOD__;
    }
    
}