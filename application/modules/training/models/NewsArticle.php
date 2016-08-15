<?php
class Training_Model_NewsArticle extends Zend_Db_Table{
	protected $_name = 'news_article';
	protected $_primary = 'id';
	
	protected $_dependentTables = array('Training_Model_NewsCategoryArticle');
	
	protected $_referenceMap = array(
			'User_Poster'=>array(
					'columns' => array('poster_id'),
					'refTableClass' => 'Training_Model_UserMap',
					'refColumns' => array('id'),
					),
			'User_Modified'=>array(
					'columns' => array('modified_by'),
					'refTableClass' => 'Training_Model_UserMap',
					'refColumns' => array('id'),
					)
	
		);
}