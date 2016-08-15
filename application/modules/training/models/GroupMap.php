<?php
class Training_Model_GroupMap extends Zend_Db_Table{
    
    protected $_name = 'user_group';
    protected $_primary = 'id';
    protected $_dependentTables = array('Training_Model_UserMap');
}