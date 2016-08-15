<?php
class Training_Model_NewsCategory extends Zend_Db_Table{
	
	protected $_name = 'news_category';
	protected $_primary = 'id';
	protected $_dependentTables = array('Training_Model_NewsCategoryArticle');
}