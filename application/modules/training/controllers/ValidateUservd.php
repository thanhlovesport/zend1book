<?php
class Default_Form_ValidateUservd{
	
	//CHUA NHUNG THONG BAO LOI CUA FORM
	protected $_messagesError = null;
	
	//MANG CHUA DU LIEU SAU KHI KIEM TRA
	protected $_arrData;
	
	public function __construct($arrParam = array(),$options = null){
		/*echo '<pre>';
		print_r($arrParam);
		echo '</pre>';*/                          
		//========================================
		// KIEM TRA user_name
		//========================================
		$validator = new Zend_Validate();
		
		$options = array('table'=>'users','field'=>'user_name');
		$validator->addValidator(new Zend_Validate_NotEmpty(),true)
				  ->addValidator(new Zend_Validate_StringLength(3,32),true) // true la dung lai neu gap loi
				  ->addValidator(new Zend_Validate_Regex('#^[a-zA-Z0-9\-_\.\s]+$#'),true) // chap nhan khoang trang (s), xuat hien tu 1 den n lan (dau +), dung lai thong bao neu xay ra loi
				  ->addValidator(new Zend_Validate_Db_NoRecordExists($options),true);
		if(!$validator->isValid($arrParam['user_name'])){ // Neu xay ra loi khi nhap username, lay loi luu vao mang messageserror
			$message = $validator->getMessages();
			$this->_messagesError['user_name'] = 'User name: ' . current($message); 
			$arrParam['user_name'] = '';
		}		

		//========================================
		// KIEM TRA user_avatar
		//========================================
		$upload = new Zend_File_Transfer_Adapter_Http();
		$fileInfo = $upload->getFileInfo('user_avatar');
		$fileName = $fileInfo['user_avatar']['name'];
		
		if(!empty($fileName)){
		
			$upload->addValidator('Extension',true,array('jpg','gif','png'),'user_avatar');
			$upload->addValidator('Size',true,array('min'=>'2KB','max'=>'1000KB'),'user_avatar');
			if(!$upload->isValid('user_avatar')){
				$message = $upload->getMessages();
				$this->_messagesError['user_avatar'] = 'Avatar: ' . current($message);
				
			}
		}
		
		//========================================
		// KIEM TRA password
		//========================================
		
		$validator = new Zend_Validate();
		$validator->addValidator(new Zend_Validate_NotEmpty(),true)
				 ->addValidator(new Zend_Validate_StringLength(3,32),true)
				 ->addValidator(new Zend_Validate_Regex('#^[a-zA-Z0-9@\#\$%\^&\*\-\+]+$#'),true);
		if(!$validator->isValid($arrParam['password'])){
			$message = $validator->getMessages();
			$this->_messagesError['password'] = 'Password: ' . current($message);
		}	

		//========================================
		// KIEM TRA email
		//========================================
		
		$validator = new Zend_Validate();
		$options = array('table'=>'users','field'=>'email');
		$validator->addValidator(new Zend_Validate_NotEmpty(),true)
				  ->addValidator(new Zend_Validate_EmailAddress(),true)
				  ->addValidator(new Zend_Validate_Db_NoRecordExists($options),true);
		if(!$validator->isValid($arrParam['email'])){
			$message = $validator->getMessages();
			$this->_messagesError['email'] = 'Email: ' . current($message);
			$arrParam['email'] = '';
		}

		//========================================
		// KIEM TRA group_id
		//========================================
		if($arrParam['group_id'] == 0){
			$this->_messagesError['group_id'] = 'Group: Please select a group';
		}
		
		//========================================
		// KIEM TRA first_name
		//========================================
		
		$validator = new Zend_Validate();
		$validator->addValidator(new Zend_Validate_NotEmpty(),true)
				  ->addValidator(new Zend_Validate_StringLength(2),true);
		if(!$validator->isValid($arrParam['first_name'])){
			$message = $validator->getMessages();
			$this->_messagesError['first_name'] = 'First name: ' . current($message);
			$arrParam['first_name'] = '';
		}	
		
		//========================================
		// KIEM TRA last_name
		//========================================
		
		$validator = new Zend_Validate();
		$validator->addValidator(new Zend_Validate_NotEmpty(),true)
				  ->addValidator(new Zend_Validate_StringLength(2),true);
		if(!$validator->isValid($arrParam['last_name'])){
			$message = $validator->getMessages();
			$this->_messagesError['last_name'] = 'Last name: ' . current($message);
			$arrParam['last_name'] = '';
		}	
		
		//========================================
		// KIEM TRA birthday
		//========================================
		$validator = new Zend_Validate();
		$validator->addValidator(new Zend_Validate_NotEmpty(),true)
				 ->addValidator(new Zend_Validate_Date(array('format'=>'YYYY-mm-dd')),true);
		if(!$validator->isValid($arrParam['birthday'])){
			$message = $validator->getMessages();
			$this->_messagesError['birthday'] = 'Birthday: ' . current($message);
			$arrParam['birthday'] = '';
		}		

		//========================================
		// KIEM TRA status
		//========================================
		if(empty($arrParam['status']) || !isset($arrParam['status'])){
			$arrParam['status'] = 0;
		}
		
		//========================================
		// KIEM TRA sign
		//========================================
		$validator = new Zend_Validate();
		$validator->addValidator(new Zend_Validate_NotEmpty(),true)
				  ->addValidator(new Zend_Validate_StringLength(10),true);
		if(!$validator->isValid($arrParam['sign'])){
			$message = $validator->getMessages();
			$this->_messagesError['sign'] = 'Sign: ' . current($message);
			$arrParam['sign'] = '';
		}	
		
		//========================================
		// TRUYEN CAC GIA TRI DUNG VAO MANG $_arrData
		//========================================
		$this->_arrData = $arrParam;
	}
	
	//Kiem tra Error 
	//return true neu co loi xuat hien
	public function isError(){		
		if(count($this->_messagesError)>0){
			return true;
		}else{
			return false;
		}
	}
	
	//Tra ve mot mang cac loi
	public function getMessageError(){
		return $this->_messagesError;
	}
	
	//Tra ve mot mang du lieu sau khi kiem tra
	public function getData($options = null){
		if($options['upload'] == true){
			$this->_arrData['user_avatar'] = $this->uploadFile();
		}
		return $this->_arrData;
	}
	
	/*========================================
	* 1. Upload user_avatar
	* 2. Resize kich thuoc (100x100 va 450x450)
	* 3. Tra ve ten tap tin upload
	*========================================*/
	public function uploadFile(){
		//Duong dan den thu muc upload
		$upload_dir = FILES_PATH . '/users';
		
		//========================================
		// UPLOAD FILE $user_avatar
		//========================================
		
		$upload = new Zendvn_File_Upload();
		$fileInfo = $upload->getFileInfo('user_avatar');
		$fileName = $fileInfo['user_avatar']['name'];
		
		if(!empty($fileName)){
			$fileName = $upload->upload('user_avatar', $upload_dir . '/orignal',
							 array('task'=>'rename'),'user_');
			$thumb = Zendvn_File_Images::create($upload_dir . '/orignal/' . $fileName);
			$thumb->resize(100,100)->save($upload_dir . '/img100x100/' . $fileName);

			$thumb = Zendvn_File_Images::create($upload_dir . '/orignal/' . $fileName);
			$thumb->resize(450,450)->save($upload_dir . '/img450x450/' . $fileName);
		}
		
		return $fileName;
	}
	
	
	
}