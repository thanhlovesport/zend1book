<?php
class AdminController extends Zendvn_Controller_Action{
    public function init(){
        $templatePath = TEMPLATE_PATH."/admin/system";
        $this->loadTemplate(TEMPLATE_PATH."/admin/system",'template.ini','template');
    }
    public function indexAction(){
        echo '<br>'.__METHOD__;
    }
}