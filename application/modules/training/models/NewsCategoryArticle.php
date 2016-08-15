<?php
class Training_Model_NewsCategoryArticle extends Zend_Db_Table{
	protected $_name = 'news_category_artilce';
	protected $_primary = array('category_id','article_id');
	
	protected $_referenceMap = array(
			'Article'=>array(
					'columns' => array('article_id'),
					'refTableClass' => 'Training_Model_NewsArticle',
					'refColumns' => array('id'),
					'onDelete' => self::CASCADE,
					),
			'Category'=>array(
					'columns' => array('category_id'),
					'refTableClass' => 'Training_Model_NewsCategory',
					'refColumns' => array('id'),
					'onDelete' => self::CASCADE,
					)
	
		);
}