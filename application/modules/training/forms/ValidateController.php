<?php
class Training_ValidateController extends Zend_Controller_Action{
	
	public function init(){
		parent::init();
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender();
	}
	
	public function foneAction(){
		
		$validator = new Zendvn_Validate_Phone();
		$input = '084-08-38.111333123213'; //XXX-XX-XX.XXXXXX
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
	}
	
	public function passAction(){
		
		if($this->_request->isPost()){
			$password 		= $this->_request->getParam('password','');
			$passConfirm 	= $this->_request->getParam('passConfirm','');
			$validator = new Zendvn_Validate_ConfirmPassword($password);
			
			if(!$validator->isValid($passConfirm)){
				$messages = $validator->getMessages();
				echo current($messages);
			/*	echo '<pre>';
				print_r($messages);
				echo '</pre>';*/
			}
		}
	}
	
	public function  multiAction(){
		//1. Textbox khong duoc rong
		//2. Do dai tu 3-32 ki tu
		//3. Tap hop ky tu cho phep [a-zA-Z0-9\-_\.]
		//4. user_name khong duoc ton tai trong database
		
		if($this->_request->isPost()){
			$pattern =  '#^[a-zA-Z0-9\-_\.]+$#';
			echo '<br>' . $input = $this->_request->getParam('user_name','');
			
			$options = array('table'=>'users','field'=>'user_name');
		
			$validator = new Zend_Validate();
			$validator->addValidator(new Zend_Validate_NotEmpty(),true)
					  ->addValidator(new Zend_Validate_StringLength(3,32),true)
					  ->addValidator(new Zend_Validate_Regex($pattern),true)
					  ->addValidator(new Zend_Validate_Db_NoRecordExists($options),true);
					  
			if(!$validator->isValid($input)){
				$messages = $validator->getMessages();
				echo current($messages);
			/*	echo '<pre>';
				print_r($messages);
				echo '</pre>';*/
			}
					 
		}
		
		
		
		
	}
	
	public function regexAction(){
		$pattern = '#^084-[0-9]{2}-[0-9]{2}\.[0-9]{6}$#';
		$validator = new Zend_Validate_Regex($pattern);
		$validator->setMessage("'%value%' does not match against pattern 'XXX-XX-XX.XXXXXX'",'regexNotMatch');
		
		$input = '084-08-38.1113331';
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
	}
	
	public function record3Action(){
		$clause = ' id != 1';
		$options = array(
						 'table'=>'users',
						 'field'=>'user_name',
						 'exclude' => $clause
						);
		$validator = new Zend_Validate_Db_NoRecordExists($options);
		
		$input = 'KhanhPham';
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
		
	}
	
	
	public function record2Action(){
		$options = array(
						 'table'=>'users',
						 'field'=>'user_name',
						 'exclude' => array(
						 					'field'=>'id',
											'value'=> 1
											)
						 
						);
		$validator = new Zend_Validate_Db_NoRecordExists($options);
		
		$input = 'KhanhPham';
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
		
	}
	
	public function recordAction(){
		//VD: Kiem tra xem email co ton tai trong database khong
		$options = array('table'=>'users','field'=>'email');
		$validator = new Zend_Validate_Db_RecordExists($options);
		
		$input = 'vukhanh2212@gmail.com.vn';
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
		
	}
	
	public function intAction(){
		$validator = new Zend_Validate_Int();
		
		$input = 2015;
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
	}
	
	public function arrayAction(){
		
		$arr = array('apple','foo','banana');
		
		$validator = new Zend_Validate_InArray($arr);
		
		$input = 'apple1';
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
		
	}
	public function lessAction(){
		$validator = new Zend_Validate_LessThan(20);
		
		$input = 120;
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
		
	}
	
	public function greaterAction(){
		$validator = new Zend_Validate_GreaterThan(20);
		
		$input = 12;
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
		
	}
	
	public function dateAction(){
		$validator = new Zend_Validate_Date();
		$validator->setFormat('dd-mm-YYYY');
		
		//$input = "12/10/2009";
		//$input = "2009/10/12";
		$input = "12:12:2009";
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
	}
	
	public function digitAction(){
		$validator = new Zend_Validate_Digits();
		
		$input = 100;
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
	}
	
	public function betweenAction(){
		$validator = new Zend_Validate_Between(10,100);
		$input = 9;
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
	}
	
	public function emailAction(){
		
		$validator = new Zend_Validate_EmailAddress();
		$input = 'asdsadsa@yahoo.com.vn.us';
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
		
	}
	
	public function emptyAction(){
		//2. Kiem tra du lieu dua vao co rong hay khong
		$input = '';
		$validator = new Zend_Validate_NotEmpty();
		
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
	}
	
	
	public function indexAction(){
		//Kiem tra chieu dai cua mot chuoi
		$input = "This";
		$validator = new Zend_Validate_StringLength(10);
		
		if($validator->isValid($input)){
			echo 'Thoa dieu kien dua vao';
		}else{
			echo 'Khong thoa dieu kien';
		}
		
	}
	
	public function index2Action(){
		//Kiem tra chieu dai cua mot chuoi
		$input = "Happy  life";
		$validator = new Zend_Validate_StringLength(5,10);
		
		if($validator->isValid($input)){
			echo 'Thoa dieu kien dua vao';
		}else{
			echo 'Khong thoa dieu kien';
		}
		
	}
	
	public function index3Action(){
		//Kiem tra chieu dai cua mot chuoi
		$input = "Happy life";
		$validator = new Zend_Validate_StringLength(5,10);
		
		if($validator->isValid($input)){
			echo 'Thoa dieu kien dua vao';
		}else{
			$messages = $validator->getMessages();
			echo current($messages);
			/*echo '<pre>';
			print_r($messages);
			echo '</pre>';*/
		}
		
	}
	
	public function index4Action(){
		//Kiem tra chieu dai cua mot chuoi
		$input = "Happ";
		$validator = new Zend_Validate_StringLength(5,10);
		
		$validator->setMessages(array(
									Zend_Validate_StringLength::TOO_SHORT => 'Chuoi nay thi qua ngan',
									Zend_Validate_StringLength::TOO_LONG => 'Chuoi nay thi qua dai'
									)
								);
		
		if($validator->isValid($input)){
			echo 'Thoa dieu kien dua vao';
		}else{
			$messages = $validator->getMessages();
			echo current($messages);
			/*echo '<pre>';
			print_r($messages);
			echo '</pre>';*/
		}
		
	}
	
	public function index5Action(){
		//Kiem tra chieu dai cua mot chuoi
		$input = "Happ asdkjasd askldlasd ";
		$validator = new Zend_Validate_StringLength(5,10);
		
		$validator->setMessages(array(
									Zend_Validate_StringLength::TOO_SHORT => 
											'Chuoi \'%value%\' nay thi qua ngan. Yeu cau phai tu %min% ky tu tro len',
									Zend_Validate_StringLength::TOO_LONG => 
											"Chuoi '%value%' nay thi qua dai. Yeu cau phai nho hon %max%"
									)
								);
		
		if($validator->isValid($input)){
			echo 'Thoa dieu kien dua vao';
		}else{
			$messages = $validator->getMessages();
			echo current($messages);
			/*echo '<pre>';
			print_r($messages);
			echo '</pre>';*/
		}
		
	}
	
	public function index6Action(){
		//Kiem tra chieu dai cua mot chuoi
		$input = "Happy";
		
		$validator = new Zend_Validate_StringLength(5,10);
		
		if(!$validator->isValid($input)){
			$messages = $validator->getMessages();
			echo current($messages);
		}
		
	}
	
	
	
}