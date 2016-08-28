<?php
class Training_Form_User extends Zend_Form{

    public function __construct($arrParam = null, $options = null){
        
        parent::__construct();
        
        if($options['task'] == 'admin-edit'){
            echo '<pre>';
            print_r($arrParam);
            echo '</pre>';
            $tblUser = new Default_Model_User();
            $item = $tblUser->getItem($arrParam,array('task'=>'admin-edit'));
        }
        $this->setMethod('post')
        ->setEnctype('multipart/form-data')
        ->setAction('')
        ->setName('appForm');
        	
        //=================Username================
        

       $username = new Zend_Form_Element_Text('username');
       $username->setLabel('UserName: ')
                ->setDescription('Nhap username vao day')
                
                ->setAttrib('class', 'txtmedium');
       
       $img = new Zendvn_Form_Element_CmsImages('avatar-img');
       
       
       //=================current_user_avatar================
       $current_user_avatar = new Zend_Form_Element_Hidden('current_user_avatar');
       
       
       //=================Zend_Form_Element_Password================
       $password = new Zend_Form_Element_Password('password');
       $password->setLabel('Password:')
       ->setDescription('Nhap Password')
       ->setAttrib('class','txtshort');
       
       //=================Email ================
       
       
       $email = new Zend_Form_Element_Text('email');
       $username->setLabel('Email: ')
       ->setDescription('Nhap Email')
       
       ->setAttrib('class', 'txtmedium');

       //=================Group ID================
       $tblgroup = new Default_Model_UserGroup();
       $slbgroup = $tblgroup->itemInSelectbox();
       $groupid = new Zend_Form_Element_Select('group_id');
       $groupid->setLabel('Select Group: ')
       ->setAttrib('size','5')
       ->setAttrib('style','width: 150px;')
       ->setDescription('Chon mot group')
       ->addMultiOptions($slbgroup)
       ->setValue('jsp') ;

       //=================first_name================
       $first_name = new Zend_Form_Element_Text('first_name');
       $first_name->setLabel('First name:')
       ->setDescription('Nhap First name vao o text box nay')
       ->setAttrib('class','txtmedium');
       
       //=================last_name================
       $last_name = new Zend_Form_Element_Text('last_name');
       $last_name->setLabel('Last name:')
       ->setDescription('Nhap Last name vao o text box nay: ')
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
       $sign = new Zendvn_View_Helper_CmsEditor('sign');
       $sign->setLabel('Sign: ')
       ->setOptions(array('form'=>true,'width'=>'100%','height'=>'250','toolbar'=>'Default'));
       	
       $sumbit = new Zend_Form_Element_Submit('submit');
       $sumbit->setValue('Save now')
       ->setAttrib('class','input');
       
       
       //=================Zend_Form_Element_File================
       $useravatar = new Zend_Form_Element_File('user_avatar');
       $useravatar->setLabel('File upload:')
       ->setDescription('Choose a file to upload');
       
       //=================Submit================
       
       $submit = new Zend_Form_Element_Submit('submit');
       $submit->setValue('Save Now')
              ->setAttrib('class', 'input');
     

       //--Them gia tri vao cac input trong Form
       if($options['task'] == 'admin-edit'){
           $current_user_avatar->setValue($item['user_avatar']);
           $img->setValue(FILE_URL . '/users/img100x100/' . $item['user_avatar']);
           $username->setValue($item['user_name']);
           $email->setValue($item['email']);
           $groupid->setValue($item['group_id']);
           $first_name->setValue($item['first_name']);
           $last_name->setValue($item['last_name']);
           $birthday->setValue($item['birthday']);
           $status->setValue($item['status']);
           $sign->setValue($item['sign']);
       }
       
        //=================addElements================
        $arrElements = 	array($username,$useravatar,$email,
								$groupid,$first_name, $last_name,
								$birthday,$status, $sign,
								 $sumbit
								 );
		if($options['task'] == 'admin-edit'){
			$arrElements = 	array($username,$useravatar,$img, $current_user_avatar, $email,
								$group_id,$first_name, $last_name,
								$birthday,$status, $sign,
								 $sumbit
								 );
		}
		$this->addElements($arrElements);		
    }
    
    public function uploadFile($arrParam = null){
        //Duong dan den thu muc upload
        $upload_dir = FILE_PATH . '/users';
    
        //========================================
        // UPLOAD FILE $user_avatar
        //========================================
    
        $upload = new Zendvn_File_Upload();
        $fileInfo = $upload->getFileInfo('user_avatar');
        $fileName = $fileInfo['user_avatar']['name'];
         
        // Nếu như tồn tại filename
        if(!empty($fileName)){
            $fileName = $upload->upload('user_avatar', $upload_dir . '/origin',
                array('task'=>'rename'),'user_');
            $thumb = Zendvn_File_Images::create($upload_dir . '/origin/' . $fileName);
            $thumb->resize(100,100)->save($upload_dir . '/img100x100/' . $fileName);
    
            $thumb = Zendvn_File_Images::create($upload_dir . '/origin/' . $fileName);
            $thumb->resize(450,450)->save($upload_dir . '/img450x450/' . $fileName);
    
            if($this->$arrParam['action'] == 'edit'){
                $upload->removeFile($upload_dir . '/origin/' . $this->$arrParam['current_user_avatar']);
                $upload->removeFile($upload_dir . '/img100x100/' . $this->$arrParam['current_user_avatar']);
                $upload->removeFile($upload_dir . '/img450x450/' . $this->$arrParam['current_user_avatar']);
            }
        }else{
            if($this->$arrParam['action'] == 'edit'){
                $fileName = $this->$arrParam['current_user_avatar'];
            }
        }
    
        return $fileName;
    }
}






