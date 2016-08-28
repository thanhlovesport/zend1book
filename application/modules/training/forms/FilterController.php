<?php
class Training_FilterController extends Zend_Controller_Action{
	
	public function init(){
		parent::init();
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender();
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/> ";
	}
	
	public function testAction(){
		$str = '       Khóa học_Zend  _  _          Framework. cung cấp những_ kiến. thức cơ      bản về ZF';
		
		$filter = new Zend_Filter_Word_DashToSeparator();
		
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	public function trimAction(){
		$str = '         I LOVE ZEND FRAMEWORK             ';
		
		$filter = new Zend_Filter_StringTrim();
		
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	
	public function upperAction(){
		$str = 'I LOVE ZEND FRAMEWORK';
		$str = 'Khóa học Zend Framework cung cấp những kiến thức cơ bản về ZF';
		$filter = new Zend_Filter_StringToUpper(array('encoding'=>'UTF-8'));
		
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	public function lowerAction(){
		$str = 'I LOVE ZEND FRAMEWORK';
		$str = 'Khóa học Zend Framework cung cấp những kiến thức cơ bản về ZF';
		$filter = new Zend_Filter_StringToLower(array('encoding'=>'UTF-8'));
		//$filter->setEncoding('UTF-8');
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	public function dirAction(){
		$str = 'http://framework.zend.com/manual/en/zend.filter.set.html';
		$filter = new Zend_Filter_Dir();
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	public function digitsAction(){
		$str = '0123.456';
		$filter = new Zend_Filter_Digits();
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	public function callbackAction(){
		$str = 'I love Zend Framework';
		$filter = new Zend_Filter_Callback('strrev');
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	public function baseAction(){
		$str = 'http://framework.zend.com/manual/en/zend.filter.set.html';
		$filter = new Zend_Filter_BaseName();
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	public function alphaAction(){
		$str = 'asdasd \#$%@&*!)(&^^%#123jasd';
		$filter = new Zend_Filter_Alpha(true);
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
	public function alnumAction(){
		$str = 'asdasd \#$%@&*!)(&^^%#123jasd';
		$filter = new Zend_Filter_Alnum(true);
		$result = $filter->filter($str);
		
		echo '<br>Source: ' . $str;
		echo '<br>Filter: ' . $result;
	}
	
}