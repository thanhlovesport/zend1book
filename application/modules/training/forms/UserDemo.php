<?php
class Training_Form_UserDemo extends Zend_Form{
	
	public function __construct($arrParam = null, $options = null){
		parent::__construct();
		
		if($options['task'] == 'admin-edit'){
			$tblUser = new Default_Model_User();
			$item = $tblUser->getItem($arrParam,array('task'=>'admin-edit'));
		}
		$this->setMethod('post')
			->setEnctype('multipart/form-data')
			->setAction('')
			->setName('appForm');
			
		//=================user_name================
		$user_name = new Zend_Form_Element_Text('user_name');
		$user_name->setLabel('Username:')
				->setDescription('Nhap username vao o text box nay')
				->setAttrib('class','txtmedium');
				
		
		$img = new Zendvn_Form_Element_CmsImage('avatar-img');
		
		//=================current_user_avatar================ 
		$current_user_avatar = new Zend_Form_Element_Hidden('current_user_avatar');
	
				
		//=================user_avatar================
		$user_avatar = new Zend_Form_Element_File('user_avatar');
		$user_avatar->setLabel('Avatar:')
			 		->setDescription('Chon mot hinh anh de upload');

		//=================password================ 
		$password = new Zend_Form_Element_Password('password');
		$password->setLabel('Password:')
				->setDescription('Nhap password')
				->setAttrib('class','txtshort');			 		
		
		//=================email================
		$email = new Zend_Form_Element_Text('email');
		$email->setLabel('Email:')
				->setDescription('Nhap dia chi email cua ban vao day')
				->setAttrib('class','txtmedium');
	
		//=================group_id================ 
		$tblGroup = new Default_Model_UserGroup();
		$slbGroup = $tblGroup->itemInSelectbox();
		$group_id = new Zend_Form_Element_Select('group_id');
		$group_id->setLabel('Group name: ')
				->setAttrib('size','5')
				->setAttrib('style','width: 150px;')
				->setDescription('Chon mot nhom cho thanh vien')
				->addMultiOptions($slbGroup);

		//=================first_name================ 
		$first_name = new Zend_Form_Element_Text('first_name');
		$first_name->setLabel('First name:')
				->setDescription('Nhap First name vao o text box nay')
				->setAttrib('class','txtmedium');

		//=================last_name================ 
		$last_name = new Zend_Form_Element_Text('last_name');
		$last_name->setLabel('Last name:')
				->setDescription('Nhap Last name vao o text box nay')
				->setAttrib('class','txtmedium');
				
		//=================birthday================
		$birthday = new Zend_Form_Element_Text('birthday');
		$birthday->setLabel('Birthday:')
				->setDescription('Nhap ngay sinh vao o text box nay')
				->setAttrib('class','txtmedium');
		//=================status================
		$status = new Zend_Form_Element_Radio('status');
		$status->setLabel('Birthday:')
				->setDescription('Chon trang thai cho user')
				 ->setSeparator(' ')
				->addMultiOptions(array('Inactive','Active'));
		
		//=================Zendvn_Form_Element_Editor================ 			
		$sign = new Zendvn_Form_Element_Editor('sign');
		$sign->setLabel('Sign: ')
			 ->setOptions(array('form'=>true,'width'=>'100%','height'=>'250','toolbar'=>'Default'));
			 	
		$sumbit = new Zend_Form_Element_Submit('submit');
		$sumbit->setValue('Save now')
			 ->setAttrib('class','input');
			 
		//--Them gia tri vao cac input trong Form
		if($options['task'] == 'admin-edit'){
			$current_user_avatar->setValue($item['user_avatar']);
			$img->setValue(FILES_URL . '/users/img100x100/' . $item['user_avatar']);
			$user_name->setValue($item['user_name']);
			$email->setValue($item['email']);
			$group_id->setValue($item['group_id']);
			$first_name->setValue($item['first_name']);
			$last_name->setValue($item['last_name']);
			$birthday->setValue($item['birthday']);
			$status->setValue($item['status']);
			$sign->setValue($item['sign']); 
		}
			 
		//=================addElements================	
		$arrElements = 	array($user_name,$user_avatar,$email,
								$group_id,$first_name, $last_name,
								$birthday,$status, $sign,
								 $sumbit
								 );
		if($options['task'] == 'admin-edit'){
			$arrElements = 	array($user_name,$user_avatar,$img, $current_user_avatar, $email,
								$group_id,$first_name, $last_name,
								$birthday,$status, $sign,
								 $sumbit
								 );
		}
		$this->addElements($arrElements);			
	}
	
	public function uploadFile($arrParam = null){
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
			
			if($arrParam['action'] == 'edit'){
				$upload->removeFile($upload_dir . '/orignal/' . $arrParam['current_user_avatar']);
				$upload->removeFile($upload_dir . '/img100x100/' . $arrParam['current_user_avatar']);
				$upload->removeFile($upload_dir . '/img450x450/' . $arrParam['current_user_avatar']);
			}
		}else{
			if($arrParam['action'] == 'edit'){
				$fileName = $arrParam['current_user_avatar'];
			}
		}
		
		return $fileName;
	}
}
