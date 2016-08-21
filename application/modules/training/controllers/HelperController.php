<?php
class Training_HelperController extends Zend_Controller_Action{
	
	public function init(){
		parent::init();
		$this->_helper->layout->disableLayout();
		//$this->_helper->viewRenderer->setNoRender();
	}
	
	public function fckAction(){
		echo '<br>' . __METHOD__;
	}
	
	 public function imgAction(){
		$filename = FILE_PATH . '/abcd.png';
		$thumb = Zendvn_File_Images::create($filename);
		$thumb->resizePercent(30);
		$thumb->save(FILE_PATH . '/images/abcd.png');
		$this->_helper->viewRenderer->setNoRender();
	}
	
	public function partialAction(){
	    echo '<br>' . __METHOD__;
	}
	
	public function partial2Action(){
	    echo '<br>' . __METHOD__;
	}
}