<?php
class Zendvn_Controller_Action extends Zend_Controller_Action{
    
    public function init(){
        //$templatePath = TEMPLATE_PATH."/admin/system";
        //$this->loadTemplate(TEMPLATE_PATH."/admin/system",'template.ini','template');
       
    }
    protected function loadTemplate($template_Path, $fileConfig = 'template.ini',$sectionconfig = 'template'){
        
        $this->view->headTitle()->set('');
        $this->view->headMeta()->getContainer()->exchangeArray(array());
        $this->view->headLink()->getContainer()->exchangeArray(array());
        $this->view->headScript()->getContainer()->exchangeArray(array());
       
        $filename = $template_Path."/".$fileConfig;
        $section = $sectionconfig;
        $config = new Zend_Config_Ini($filename,$section);
        $config = $config->toArray();
       
        
        
        /*  $request = $this->_request;
         echo "<pre>";
         print_r($request);
         echo "</pre>"; */
        $baseURL = $this->_request->getBaseUrl();   
        
        //echo'<br>'.$templateURL = $baseURL."/".$config['url'];
        $templateURL = $baseURL."/".$config['url'];
        $CssURL = $templateURL.$config['dirCss'];
        $JsURL = $templateURL.$config['dirJs'];
        $ImageURL = $templateURL.$config['dirImg'];
        
        // Nạp title
         $this->view->headTitle($config['title']);
         if(count($config['metaHttp']) > 0){
             foreach ($config['metaHttp'] as $key=>$value){
             $tmp = explode("|",$value);
             $this->view->headMeta()->appendHttpEquiv($tmp['0'],$tmp['1']);
             }
         } 
        
         // Nạp thẻ Meta
         if(count($config['metaName']) > 0){
             foreach ($config['metaName'] as $key=>$value){
                 $tmp = explode("|",$value);
                 $this->view->headMeta()->appendHttpEquiv($tmp['0'],$tmp['1']);
             }
         }
         
         // Nạp file css
         if(count($config['fileCss']) > 0){
             foreach ($config['fileCss'] as $key => $css){
                 $this->view->headLink()->appendStylesheet($CssURL.$css,'screen');
             }
         }
         
         // Nạp file js 
         if(count($config['fileJs']) > 0){
             foreach ($config['fileJs'] as $key => $js){
                 $this->view->headScript()->appendFile($JsURL.$js,'text/javascript');
             }
         }
         
         // Thêm hình vô
         if(count($config['fileJs']) > 0){
             foreach ($config['fileJs'] as $key => $js){
                 $this->view->headScript()->appendFile($JsURL.$js,'text/javascript');
             }
         }
         
          $this->view->templateURL = $templateURL;
          $this->view->CssURL =    $CssURL;
          $this->view->JsURL =  $JsURL;
          $this->view->ImageURL = $ImageURL;
          
          /* echo '<pre>';
          print_r($config);
          echo '</pre>'; 
         */
        $option = array('layoutPath'=>$template_Path,'layout'=>'index');
        Zend_Layout::startMvc($option);
       // echo '<br>'.__METHOD__;
        
    }
    public function test() {
        echo '<br>'.__METHOD__;
        
    }
}
