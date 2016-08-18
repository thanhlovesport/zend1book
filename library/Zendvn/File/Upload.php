<?php
class Zendvn_File_Upload extends Zend_File_Transfer_Adapter_Http{
	
	public function upload($file_name,$upload_dir,$options = null,$prefix = 'file_'){  // Option = null thi khong doi ten file
	       
	    // DO exten tu Zend_File_Transfer_Adapter_Http nên không cần gọi upload, dùng từ khóa $this gọi tến các hàm kia luôn 
		if($options == null){
			$this->setDestination($upload_dir,$file_name);
			$info 			= $this->getFileInfo($file_name);
			$newFileName 	= $info[$file_name]['name'];
			$this->receive($file_name);
		}
		
		if($options['task'] == 'rename' ){
			$info = $this->getFileName($file_name);
			preg_match('#\.([^\.]+)$#',$info,$matches);
			$fileExtension  = $matches[1];
			$newFileName 	= $prefix . time() . '.' . $fileExtension;
		
			$options = array('target' => $upload_dir . '/' . $newFileName,'overwrite'=>true);
			$this->addFilter('Rename',$options,$file_name);
			$this->receive($file_name);
		}
		
		return $newFileName;
	}
}