<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
   
   /*  protected function _initFoo(){
        $value = 'Hello Welcome to Vietnam';
        Zend_Registry::set('helloletter', $value);
        
        $language = array('English','France','American');
        Zend_Registry::set('language', $language);
    } */
    
    protected function _initDb(){
        $optionResource = $this->getOption('resources');
//         echo "<pre>";
//         print_r($optionResource);
//         echo "</pre>";
        $dbOption = $optionResource['db'];
        $dbOption['params']['username'] = 'root';
        $dbOption['params']['password'] = '';
        $dbOption['params']['dbname'] = 'shop';
        
        
        /* echo "<pre>";
        print_r($dbOption);
        echo "</pre>"; */
        $adapter = $dbOption['adapter'];
        $config  = $dbOption['params'];
        ///////
        $db = Zend_Db::factory($adapter,$config);
        $db->setFetchMode(Zend_Db::FETCH_ASSOC);
        $db->query("SET NAMES 'utf8'");
        $db->query("SET CHARACTER SET 'utf8'");
        
        Zend_Registry::set('connectDb', $db);
        Zend_Db_Table::setDefaultAdapter($db);
        /* echo "<pre>";
        print_r($db);
        echo "</pre>"; */
    }
    
    // Khi khoi tao ham nay, phan cau hinh trong tap tin application.ini se bi ghi de
      public function _initfrontcontroller(){
        $front = Zend_Controller_Front::getInstance();// goi den ham khoi tao
        $front->addModuleDirectory(APPLICATION_PATH.'/modules');
        $front->setDefaultModule('default');
        //$front->registerPlugin(new Zendvn_Plugin_Test());
        $errors = new Zend_Controller_Plugin_ErrorHandler(array('module'=>'default','controller'=>'public','action'=>'error'));
        $front->registerPlugin($errors);
        return $front;
    }  
    
}
