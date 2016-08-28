<?php
class Zendvn_View_Helper_CmsImages extends Zend_View_Helper_Abstract{
	
	public function cmsEditor($name,$value= '',$attributes = null, $option = null ){
	    
	    $strAttribs = '';
	    if(count($attributes)>0){
	        foreach ($attributes as $keyAttribs => $valueAttribs){
	            $strAttribs .= $keyAttribs . '="' . $valueAttribs . '" ';
	        }
	    }
		
	    $xhtml = '<img id="'.$name.'" name = "'.$name.'"
	        src="'.$value.'" '.$attributes.'>';
	    
	    return $xhtml;
	}
}