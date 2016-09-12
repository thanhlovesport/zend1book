<?php
class Shopping_Form_ValidateProduct{
	
	//CHUA NHUNG THONG BAO LOI CUA FORM
	protected $_messagesError = null;
	
	//MANG CHUA DU LIEU SAU KHI KIEM TRA
	protected $_arrData;
	
	public function __construct($arrParam = array(),$options = null){
	    
	  
		/* echo '<pre>';
		print_r($arrParam);
		echo '</pre>';  
		var_dump(123);exit; */
		//========================================
		// KIEM TRA SportName
		//========================================
		
	    

	    if($arrParam['action'] == 'add'){
	        $options = array('table'=>'products','field'=>'name');
	    }else if($arrParam['action'] == 'edit'){
	        $clause = ' id !=' . $arrParam['id'];
	        $options = array('table'=>'products','field'=>'name','exclude'=>$clause);
	    } 
	    
		$validator = new Zend_Validate();
		
		$validator->addValidator(new Zend_Validate_NotEmpty(),true)
				  ->addValidator(new Zend_Validate_StringLength(3,32),true) // true la dung lai neu gap loi
				  //->addValidator(new Zend_Validate_Regex('#^[a-zA-Z0-9\-_\.\s]+$#'),true) // chap nhan khoang trang (s), xuat hien tu 1 den n lan (dau +), dung lai thong bao neu xay ra loi
				  ->addValidator(new Zend_Validate_Db_NoRecordExists($options),true);
		if(!$validator->isValid($arrParam['name'])){ // Neu xay ra loi khi nhap username, lay loi luu vao mang messageserror
			$message = $validator->getMessages();
			$this->_messagesError['name'] = 'Name : ' . current($message); 
			$arrParam['name'] = '';
		}		
		

		//========================================
		// KIEM TRA Picture
		//========================================
		$upload = new Zend_File_Transfer_Adapter_Http();
		$fileInfo = $upload->getFileInfo('picture');
		$fileName = $fileInfo['picture']['name'];
		
		if(!empty($fileName)){
		
		    $upload->addValidator('Extension',true,array('jpg','gif','png'),'picture');// true dung lai khi gap loi
		    $upload->addValidator('Size',true,array('min'=>'2KB','max'=>'1000KB'),'picture');
		    if(!$upload->isValid('picture')){
		        $message = $upload->getMessages();
		        $this->_messagesError['picture'] = 'Picture: ' . current($message);
		
		    }
		}
		
		
		
		//========================================
		// KIEM TRA Price
		//========================================
		$validator = new Zend_Validate();
		$validator->addValidator(new Zend_Validate_NotEmpty(),true)
		->addValidator(new Zend_Validate_GreaterThan(1),true);
		if(!$validator->isValid($arrParam['price'])){
		    $message = $validator->getMessages();
		    $this->_messagesError['price'] = 'Price: ' . current($message);
		    $arrParam['price'] = '';
		}
		    //========================================
	    // KIEM TRA SellOFF
	    //========================================
	    $validator = new Zend_Validate();
	    $validator->addValidator(new Zend_Validate_NotEmpty(),true);
	    //->addValidator(new Zend_Validate_GreaterThan(1),true);
	    if(!$validator->isValid($arrParam['selloff'])){
	        $message = $validator->getMessages();
	        $this->_messagesError['selloff'] = 'SellOFF: ' . current($message);
	        $arrParam['selloff'] = '';
	    }
	    
	    //========================================
	    // KIEM TRA Order
	    //========================================
	    $validator = new Zend_Validate();
	    $validator->addValidator(new Zend_Validate_NotEmpty(),true)
	    ->addValidator(new Zend_Validate_GreaterThan(0),true);
	    if(!$validator->isValid($arrParam['order'])){
	        $message = $validator->getMessages();
	        $this->_messagesError['order'] = 'Order: ' . current($message);
	        $arrParam['order'] = '';
	    }
		//========================================
		// KIEM TRA email
		//========================================
		
		/* if($arrParam['action'] == 'add'){
		    $options = array('table'=>'users','field'=>'email');
		}else if($arrParam['action'] == 'edit'){
		    $clause = ' id !=' . $arrParam['id'];
		    $options = array('table'=>'users','field'=>'email','exclude'=>$clause);
		}
		
		$validator = new Zend_Validate();
		$validator->addValidator(new Zend_Validate_NotEmpty(),true)
		->addValidator(new Zend_Validate_EmailAddress(),true)
		->addValidator(new Zend_Validate_Db_NoRecordExists($options),true);
		if(!$validator->isValid($arrParam['email'])){
		    $message = $validator->getMessages();
		    $this->_messagesError['email'] = 'Email: ' . current($message);
		    $arrParam['email'] = '';
		} */
		
		//========================================
		// KIEM TRA Category, nguoi dung co chon Category hay khong
		//========================================
		if($arrParam['category'] == 0){
		    $this->_messagesError['category'] = 'Group: Please select a Category';
		}
		
		//========================================
		// KIEM TRA first_name
		//========================================
		
		/* $validator = new Zend_Validate();
		$validator->addValidator(new Zend_Validate_NotEmpty(),true)
		->addValidator(new Zend_Validate_StringLength(2),true);
		if(!$validator->isValid($arrParam['first_name'])){
		    $message = $validator->getMessages();
		    $this->_messagesError['first_name'] = 'First name: ' . current($message);
		    $arrParam['first_name'] = '';
		} */
		
		//========================================
		// KIEM TRA last_name
		//========================================
		
		/* $validator = new Zend_Validate();
		$validator->addValidator(new Zend_Validate_NotEmpty(),true)
		->addValidator(new Zend_Validate_StringLength(2),true);
		if(!$validator->isValid($arrParam['last_name'])){
		    $message = $validator->getMessages();
		    $this->_messagesError['last_name'] = 'Last name: ' . current($message);
		    $arrParam['last_name'] = '';
		} */
		
		
		
		//========================================
		// KIEM TRA status
		//========================================
		if(empty($arrParam['status']) || !isset($arrParam['status'])){
		    $arrParam['status'] = 0;
		}
		//========================================
		// KIEM TRA special
		//========================================
		if(empty($arrParam['special']) || !isset($arrParam['special'])){
		    $arrParam['special'] = 0;
		}
		//========================================
		// KIEM TRA sign
		//========================================
		
		/* $validator = new Zend_Validate();
		$validator->addValidator(new Zend_Validate_NotEmpty(),true)
		->addValidator(new Zend_Validate_StringLength(10),true);
		if(!$validator->isValid($arrParam['sign'])){
		    $message = $validator->getMessages();
		    $this->_messagesError['sign'] = 'Sign: ' . current($message);
		    $arrParam['sign'] = '';
		}
		 */
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
	        $this->_arrData['picture'] = $this->uploadFile();
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
	    $upload_dir = FILE_PATH . '/products';
	
	    //========================================
	    // UPLOAD FILE $user_avatar
	    //========================================
	
	    $upload = new Zendvn_File_Upload();
	    $fileInfo = $upload->getFileInfo('picture');
	    $fileName = $fileInfo['picture']['name'];
	    
	    // Nếu như tồn tại filename
	    if(!empty($fileName)){
            $fileName = $upload->upload('picture', $upload_dir . '/origin',
	            array('task'=>'rename'),'product_');
 	        $thumb = Zendvn_File_Images::create($upload_dir . '/origin/' . $fileName);
	        $thumb->resize(100,100)->save($upload_dir . '/img100x100/' . $fileName);
	
        $thumb = Zendvn_File_Images::create($upload_dir . '/origin/' . $fileName); 
        $thumb->resize(450,450)->save($upload_dir . '/img450x450/' . $fileName);
        
        if($this->_arrData['action'] == 'edit'){
            $upload->removeFile($upload_dir . '/origin/' . $this->_arrData['current_picture']);
            $upload->removeFile($upload_dir . '/img100x100/' . $this->_arrData['current_picture']);
            $upload->removeFile($upload_dir . '/img450x450/' . $this->_arrData['current_picture']);
        }
	    }else{
	        if($this->_arrData['action'] == 'edit'){
	            $fileName = $this->_arrData['current_picture'];
	        }
	    }
	
	    return $fileName;
	}
	
	
}