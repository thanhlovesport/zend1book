<?php
class Training_Form_Guide extends Zend_Form{
	
	public function __construct($arrParam = null, $options = null){
		parent::__construct();
		
		$this->setMethod('post')
			->setEnctype('multipart/form-data')
			->setAction('')
			->setName('appForm');
			
		//=================Zend_Form_Element_Text================
		$textbox = new Zend_Form_Element_Text('textbox');
		$textbox->setLabel('Text box:')
				->setDescription('Hien thi o textbox bang Zend Form')
				->setValue('This is a test')
				->setAttrib('class','txtmedium')
				->setAttribs(array('onchange'=>'onSumbmit',
									'style'=>'border: solid 1px #ccc'));
		//=================Zend_Form_Element_File================
		$file = new Zend_Form_Element_File('upload');
		$file->setLabel('File upload:')
			 ->setDescription('Hien thi o file upload bang Zend Form');

		//=================Zend_Form_Element_Password================ 
		$password = new Zend_Form_Element_Password('password');
		$password->setLabel('Password:')
				->setDescription('Hien thi o password bang Zend Form')
				->setAttrib('class','txtshort');
		
		//=================Zend_Form_Element_Checkbox================ 
		$checkbox = new Zend_Form_Element_Checkbox('checkbox');
		$checkbox->setLabel('Checkbox: ')
				 ->setCheckedValue('php')
				 ->setChecked('true')				 
				 ->setDescription('Hien thi o checkbox bang Zend Form');

		//=================Zend_Form_Element_MultiCheckbox================ 
		$multiCheckbox = new Zend_Form_Element_MultiCheckbox('multiCheckbox');
		$multiCheckbox->setLabel('Multi Checkbox: ')
					 ->setValue(array('php','jsp'))
					 ->addMultiOptions(array('php'=>'PHP script','asp'=>'ASP script','jsp'=>'JSP Script'))
					 ->setDescription('Hien thi o Multi Checkbox bang Zend Form')
					 ->setSeparator(' ');
		
		//=================Zend_Form_Element_Select================ 
		$select = new Zend_Form_Element_Select('select');
		$select->setLabel('Select box: ')
				->setAttrib('size','5')
				->setAttrib('style','width: 150px;')
				->setDescription('Hien thi Selectbox bang Zend Form')
				->addMultiOptions(array('php'=>'PHP script','asp'=>'ASP script','jsp'=>'JSP Script'))
				->setValue('jsp')
				;
		//=================Zend_Form_Element_Multiselect================ 	
		$multiSelect = new Zend_Form_Element_Multiselect('multiSelect');
		$multiSelect->setLabel('Multi Select box: ')
				->setAttrib('size','5')
				->setAttrib('style','width: 150px;')
				->setDescription('Hien thi multiSelect bang Zend Form')
				->addMultiOptions(array('php'=>'PHP script','asp'=>'ASP script','jsp'=>'JSP Script'))
				->setValue(array('php','jsp'))
				;
		//=================Zend_Form_Element_Textarea================ 
		$textarea = new Zend_Form_Element_Textarea('textarea');
		$textarea->setLabel('Textarea: ')
				->setDescription('Hien thi Textarea bang Zend Form')
				->setAttribs(array('rows'=>6,'cols'=>60))
				->setAttrib('class','input');
				
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
		
		//=================Zendvn_Form_Element_Editor================ 			
		$editor = new Zendvn_Form_Element_Editor('content');
		$editor->setLabel('Fckeditor: ')
			 ->setOptions(array('form'=>true,'width'=>'100%','height'=>'250','toolbar'=>'Basic'));
		
		//=================Zendvn_Form_Element_CmsSelect================ 
		$cmsSelect = new Zendvn_Form_Element_CmsSelect('menu');
		$cmsSelect->setLabel('Select box: ')
				->setAttrib('size','5')
				->setAttrib('style','width: 150px;')
				->setDescription('Hien thi CmsSelec bang Zend Form')
				;
		
		$sumbit = new Zend_Form_Element_Submit('submit');
		$sumbit->setValue('Save now')
			 ->setAttrib('class','input');
		//=================addElements================		
		$this->addElements(array($textbox,$file,$password,$checkbox,
								 $multiCheckbox,$select,$multiSelect,$textarea,
								 $captcha,$editor,$cmsSelect,$sumbit
								 ));			
	}
}






