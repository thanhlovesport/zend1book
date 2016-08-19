<?php
class Training_FileController extends Zend_Controller_Action{

    public function init(){
        parent::init();
        $this->_helper->layout->disableLayout();
      
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