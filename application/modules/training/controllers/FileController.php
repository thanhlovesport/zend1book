<?php
class Training_FileController extends Zend_Controller_Action{

    public function init(){
        parent::init();
        $this->_helper->layout->disableLayout();
      
    }
    public function validateAction(){
        if($this->_request->isPost()){
            $upload = new Zend_File_Transfer_Adapter_Http();
            $upload->setDestination(FILES_PATH . '/photo');
            //Zend_Validate_File_Extension
            $options = array('jpg','gif','png','rar');
            $upload->addValidator('Extension',false,$options);
            if($upload->isValid()){
                $upload->receive();
            }else{
                $message = $upload->getMessages();
                echo current($message);
            }
            /*echo '<pre>';
             print_r($upload);
             echo '</pre>';*/
        }
    }
    public function validate2Action(){
        if($this->_request->isPost()){
            $upload = new Zend_File_Transfer_Adapter_Http();
            $upload->setDestination(FILE_PATH . '/images');
            	
            	
            $upload->addValidator('Extension',true,array('jpg','gif','png')); // true la kiem tra mot dieu kien
            //$upload->addValidator('Size',true,array('min'=> '20KB','max'=>'500KB'));
            $upload->addValidator('ImageSize',true,
                array(
                    'maxheight'=> 1000,'maxwidth'=>1000,
                    'minheight'=> 700,'minwidth'=>700,
                )
            );
            	
            	
            if($upload->isValid()){
                $upload->receive();
            }else{
                $message = $upload->getMessages();
                echo '<pre>';
                print_r($message);
                echo '</pre>';
                //echo current($message);
            }
            /*echo '<pre>';
             print_r($upload);
             echo '</pre>';*/
        }
    }
    public function validate3Action(){
        if($this->_request->isPost()){
            $upload = new Zend_File_Transfer_Adapter_Http();
            $upload->setDestination(FILES_PATH . '/photo');
            	
            	
            $upload->addValidator('ExcludeExtension',true,array('jpg','gif','png'));
            	
            if($upload->isValid()){
                $upload->receive();
            }else{
                $message = $upload->getMessages();
                echo '<pre>';
                print_r($message);
                echo '</pre>';
                //echo current($message);
            }
    
        }
    }
    public function validate4Action(){
        if($this->_request->isPost()){
            $upload = new Zend_File_Transfer_Adapter_Http();
            $upload->setDestination(FILE_PATH . '/images','picture'); // file picture luu vao images, filezip luu vao zip
            $upload->setDestination(FILE_PATH . '/zip','filezip');
            	
            $upload->addValidator('Extension',true,array('jpg','gif','png'),'picture');
            $upload->addValidator('Size',true,array('min'=>'100KB','max'=>'500KB'),'filezip');
            	
            if($upload->isValid()){
                $upload->receive();
            }else{
                $message = $upload->getMessages();
                echo '<pre>';
                print_r($message);
                echo '</pre>';
                //echo current($message);
            }
    
        }
    }
    public function validate5Action(){
        if($this->_request->isPost()){
            $upload = new Zend_File_Transfer_Adapter_Http();
            $upload->setDestination(FILES_PATH . '/photo','picture');
            $upload->setDestination(FILES_PATH . '/zip','filezip');
            	
            	
            $upload->addValidator('Extension',true,array('jpg','gif','png'),'picture');
            $upload->addValidator('Size',true,array('min'=>'100KB','max'=>'500KB'),'filezip');
            	
            $fileName = $upload->getFileName();
    
            foreach ($fileName as $key => $val){
                //echo  '<br>' . $key;
                if($upload->isValid($key)){
                    $upload->receive($key);
                }else{
                    $message = $upload->getMessages();
                    echo '<pre>';
                    print_r($message);
                    echo '</pre>';
                }
            }
            	
    
        }
    }
    public function filterAction(){
        if($this->_request->isPost()){
            $upload = new Zend_File_Transfer_Adapter_Http();
            //$upload->setDestination(FILES_PATH . '/photo','picture');
            $options = array('target' => FILE_PATH . '/images/picture_2.jpg');
            $upload->addFilter('Rename',$options,'picture');
            $upload->receive('picture');
        }
    }
    public function filter2Action(){
        if($this->_request->isPost()){
            $upload = new Zend_File_Transfer_Adapter_Http();
            $info = $upload->getFileName('picture');
            preg_match('#\.([^\.]+)$#',$info,$matches); // Lay phan mo rong dua vao bien matches
            $fileExtension  = $matches[1];
            $newFileName = 'pic_' . time() . '.' . $fileExtension;
    
            $options = array('target' => FILES_PATH . '/photo/' . $newFileName,'overwrite'=>true);
            $upload->addFilter('Rename',$options,'picture'); // Doi ten phan tu picture la options
            $upload->receive('picture');
        }
    }
    public function uploadAction(){
    
        if($this->_request->isPost()){
            $upload = new Zendvn_File_Upload();
            $upload->upload('picture',FILES_PATH,array('task'=>'rename'));
        }
    }
    public function upload2Action(){
    
        if($this->_request->isPost()){
            $upload = new Zendvn_File_Upload();
            $fileName = $upload->getFileName();
            foreach ($fileName as $key => $val){
                $upload->upload($key,FILES_PATH,array('task'=>'rename'),$key . '_');
            }
            	
        }
    }
    public function index2Action(){
        if ($this->_request->isPost()){
            $upload = new Zend_File_Transfer_Adapter_Http();
            $info = $upload->getFileInfo();
            $upload->setDestination(FILE_PATH.'/images');
            $upload->receive();
            echo "<pre>";
            print_r($info);
            echo "</pre>";
        }
    }
    public function index3Action(){
        if($this->_request->isPost()){
            $upload = new Zend_File_Transfer_Adapter_Http();
            $filesize = $upload->getFileSize();
            echo "<pre>";
            print_r($filesize);
            echo "</pre>";
        }
    }
    public function indexAction(){
        if($this->_request->isPost()){
            $upload = new Zend_File_Transfer_Adapter_Http();
            $upload->setDestination(FILE_PATH.'/music');
            if($upload->isValid()){
                $upload->receive();
            }else{
                echo 'chài ai, bị lỗi òi';
            }
        }
    }
    public function multiAction(){
        if($this->_request->isPost()){
            $upload = new Zend_File_Transfer_Adapter_Http();
            $info = $upload->getFileInfo('filerar');
            echo $filesize = $upload->getFileSize('filerar');
            echo $filename = $upload->getFileName('filerar');
            echo "<pre>";
            print_r($info);
            echo "</pre>";
        }
    }
    public function multi2Action(){
        if($this->_request->isPost()){
            $upload = new Zend_File_Transfer_Adapter_Http();
            //$info = $upload->getFileInfo('');
            $upload->setDestination(FILE_PATH.'/vanban');
            if($upload->isValid()){
                $upload->receive();
            }else{
                echo'Chài ai bị lỗi nửa rồi';
            }
           
        }
    }
    public function multi3Action(){
        if($this->_request->isPost()){
            $upload = new Zend_File_Transfer_Adapter_Http();
            //$info = $upload->getFileInfo('');
            $upload->setDestination(FILE_PATH.'/images','picture');
            $upload->setDestination(FILE_PATH.'/rar','filerar');
            $upload->receive();
        }
    }
    public function multi4Action(){
        if($this->_request->isPost()){
            $upload = new Zend_File_Transfer_Adapter_Http();
            //$info = $upload->getFileInfo('');
            $upload->setDestination(FILE_PATH.'/images','picture');
            $upload->setDestination(FILE_PATH.'/rar','filerar');
            $upload->receive('filerar');
    
        }
    }
    
}