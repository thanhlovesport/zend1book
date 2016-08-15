<?php
class Training_Model_ProductsMap extends Zend_Db_Table{
    
    protected $_name = 'products';
    protected $_primary = 'id';
    
    // Quan he giua hai bang
    protected $_referenceMap = array(
        // Group is Rulekey, tu khoa chi su lien ket
        'USER'=>array(
            'columns' => array('user_id'),
            'refTableClass' => 'Training_Model_UserMap',
            'refColumns' => array('id'),
        ),
        
        'USER_MODIFIEDBY'=>array(
            'columns' => array('modifiedby'),
            'refTableClass' => 'Training_Model_UserMap',
            'refColumns' => array('id'),
        )
    
    );
    
}