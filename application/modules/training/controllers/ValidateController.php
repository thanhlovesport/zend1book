<?php
class Training_ValidateController extends Zend_Controller_Action{
    public function init(){
        $this->_helper->layout()->disableLayout();
        //$this->_helper->viewRenderer->setNoRender();
    }
    public function indexAction(){
        $validate = new Zend_Validate_StringLength(19); // Chiều dài tối thiểu của một chuỗi
        
        $inputtest = 'A world freedom';
        if ($validate->isValid($inputtest)){
            echo 'Hợp lệ';
        }else{
            echo 'False';
        }
        
    }
    public function index2Action(){
        $validate = new Zend_Validate_StringLength(10,20); // Chiều dài from a to b kí tự
    
        $inputtest = 'freedom';
        if ($validate->isValid($inputtest)){
            echo 'Hợp lệ';
        }else{
            echo 'False';
        }
    
    }
    public function index3Action(){
        $validate = new Zend_Validate_StringLength(10,20); // Chiều dài from a to b kí tự
    
        $inputtest = 'freedom';
        if ($validate->isValid($inputtest)){
            echo 'Hợp lệ';
        }else{
            $message = $validate->getMessages();
            echo current($message);
        }
    
    }
    public function index4Action(){
        $validate = new Zend_Validate_StringLength(10,20); // Chiều dài from a to b kí tự
    
        $inputtest = 'freedom';
        $validate->setMessages(array(
                Zend_Validate_StringLength::TOO_SHORT => 'Chuỗi ngắn hơn mức qui định',
                Zend_Validate_StringLength::TOO_LONG => 'Chuỗi dài hơn mức cho phép'
        ));
        if ($validate->isValid($inputtest)){
            echo 'Hợp lệ';
        }else{
            $message = $validate->getMessages();
            echo current($message);
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
        $input = "Hap";
    
        $validator = new Zend_Validate_StringLength(5,10);
    
        if(!$validator->isValid($input)){
            $messages = $validator->getMessages();
            echo current($messages);
        }
    
    }
    
    // Kiểm tra dữ liệu đầu vào có rỗng hay không
    public function emptyAction(){
        
        $validate = new Zend_Validate_NotEmpty();
        
        $input = '';
        if (!$validate->isValid($input)){
            $message = $validate->getMessages();
            echo current($message);
        }
        
    }
    public function emailAction(){
    
        $validate = new Zend_Validate_EmailAddress();
    
        $input = 'thanh@';
        if (!$validate->isValid($input)){
            $message = $validate->getMessages();
            echo current($message);
        }
    
    }
    
    public function betweenAction(){
    
        $validate = new Zend_Validate_Between(5,10);
    
        $input = 'thanh@';
        if (!$validate->isValid($input)){
            $message = $validate->getMessages();
            echo current($message);
        }
    
    }
    
    // Kiểm tra một số có phải là số nguyên hay không
    public function digitAction(){
    
        $validate = new Zend_Validate_Digits();
    
        $input = 'thanh@';
        if (!$validate->isValid($input)){
            $message = $validate->getMessages();
            echo current($message);
        }
    
    }
    public function dateAction(){
    
        $validate = new Zend_Validate_Date();
        $validate->setFormat('dd-mm-yyyy');
        
    
        $input = '30/0988/1994';
        if (!$validate->isValid($input)){
            $message = $validate->getMessages();
            echo current($message);
        }
    
    }
    public function greaterAction(){
    
        $validate = new Zend_Validate_GreaterThan(15);
        
        $input = 10;                                        
        if (!$validate->isValid($input)){
            $message = $validate->getMessages();
            echo current($message);
        }
    
    }
    public function lessthanAction(){
    
        $validate = new Zend_Validate_LessThan(18);
        
        $input = 19;
        if (!$validate->isValid($input)){
            $message = $validate->getMessages();
            echo current($message);
        }
    
    }
    public function arrayAction(){
        
        $array = array('chuoi','dudu','saurieng');
    
        $validate = new Zend_Validate_InArray($array);
    
        $input = 'muop';
        if (!$validate->isValid($input)){
            $message = $validate->getMessages();
            echo current($message);
        }
    
    }
    public function intAction(){
    
        //$validate = new Zend_Validate_GreaterThan(0);
    
        $validate = new Zend_Validate_Int();
    
        $input = 'mit';
        if (!$validate->isValid($input)){
            $message = $validate->getMessages();
            echo current($message);
        }
    
    }
    public function recordexitAction(){
    
        $options = array('table'=>'users','field'=>'email');
    
        $validate = new Zend_Validate_Db_RecordExists($options);
    
        $input = 'vukhanh2212@gmail.com12';
        if (!$validate->isValid($input)){
            $message = $validate->getMessages();
            echo current($message);
        }
        
    
    }
    public function notrecordexitAction(){
        
        $options = array(
            'table'=>'users',
            'field'=>'email',
            'exclude'=>array(
                'field'=>'id',
                'value'=>1
            )
        );
    
        $validate = new Zend_Validate_Db_NoRecordExists($options);
    
        $input = 'vukhanh2212@gmail.com';   // Tên này tồn tại, báo lỗi do exclude id là 1 ra mà tên này có id bằng 1 nên hk báo gì
        if (!$validate->isValid($input)){
            $message = $validate->getMessages();
            echo current($message);
        }
    
    }
    public function notrecordexit1Action(){ // Khó hiểu
        
        $valueexclude = 'id = 1';
        $options = array(
            'table'=>'users',
            'field'=>'email',
            'exclude'=> $valueexclude
        );
    
        $validate = new Zend_Validate_Db_NoRecordExists($options);
    
        $input = 'vukhanh2212@gmail.com';   // Tên này tồn tại, báo lỗi do exclude id là 1 ra mà tên này có id bằng 1 nên hk báo gì
        if (!$validate->isValid($input)){
            $message = $validate->getMessages();
            echo current($message);
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
    public function multyAction(){
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
    public function passAction(){
        if($this->_request->isPost()){
            $password = $this->_request->getParam('password','');
            $confirmpassword = $this->_request->getParam('passConfirm','');
            $validate = new Zendvn_Validate_ConfirmPassword($password);
            if(!$validate->isValid($confirmpassword)){
                $messages = $validate->getMessages();
                echo current($messages);
                
            }
        }
    }
    public function phoneAction(){
        $validator = new Zendvn_Validate_Phone();
        $input = '084-08-38.111333123213'; //XXX-XX-XX.XXXXXX
        if(!$validator->isValid($input)){
            $messages = $validator->getMessages();
            echo current($messages);
        }
    }
}