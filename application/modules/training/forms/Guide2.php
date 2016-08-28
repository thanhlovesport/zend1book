<?php
class Training_Form_Guide2 extends Zend_Form{
	
	public function __construct($arrParam = null, $options = null){
		parent::__construct();
		
		$this->setMethod('post')
			->setEnctype('multipart/form-data')
			->setAction('')
			->setName('appForm');
			
		//=================Zend_Form_Element_Text================
		$username = new Zend_Form_Element_Text('username');
		$username->setLabel('Username:')
				->setDescription('Nhap username')
				->setAttrib('class','txtmedium')
				->setRequired(true)
				->addValidator('StringLength',true,array('min'=>3,'max'=>32))
				->addValidator('Db_NoRecordExists',true,array('table'=>'users','field'=>'user_name'));
				//Zendvn_Validate_ConfirmPassword
				/*->addValidator(new Zend_Validate_Db_NoRecordExists(
											array('table'=>'users',
						 						  'field'=>'user_name'))
								,true);*/
				//->addValidator(new Zend_Validate_StringLength(3,32),true)
				
				
		//=================Zend_Form_Element_File================
		$user_avatar = new Zend_Form_Element_File('user_avatar');
		$user_avatar->setLabel('Avatar:')
			 		->setDescription('User avatar')
			 		->addValidator(new Zend_Validate_File_Extension(array('jpg','png','gif')),true)
			 		->addValidator(new Zend_Validate_File_Size(array('min'=>'40kb','max'=>'500kb')))
			 		;

		
		//=================Zend_Form_Element_Captcha================ 		
		$captchaOption = array(
								'captcha'=>'Image',
								'imgDir'=>CAPTCHA_PATH . '/img',
								'imgUrl'=>CAPTCHA_URL . '/img',
								'wordlen'=>6,
								'font'=>CAPTCHA_PATH . '/font/vni-tekon.ttf',
								'fontSize'=>30,
								'width'=>240,
								'height'=>70,
								'timeout'=>100,
								);
		
		$options = array('label'=>'Security code:',
						 'captcha'=> $captchaOption );
		$captcha = new Zend_Form_Element_Captcha('captcha',$options);
		
		
		
		$sumbit = new Zend_Form_Element_Submit('submit');
		$sumbit->setValue('Save now')
			 ->setAttrib('class','input');
		//=================addElements================		
		$this->addElements(array($username,$user_avatar,$captcha,$sumbit
								 ));			
	}
}






