<?php
class Training_Model_UserMap extends Zend_Db_Table{
    
    protected $_name = 'users';
    protected $_primary = 'id';
    
    protected $_dependentTables = array('Training_Model_ProductsMap');
    
    // Quan he giua hai bang
    protected $_referenceMap = array(
        // Group is Rulekey, tu khoa chi su lien ket
        'Group'=>array(
            'columns' => array('group_id'),
            'refTableClass' => 'Training_Model_GroupMap',
            'refColumns' => array('id'),
            	
        )
    
    );
    
}