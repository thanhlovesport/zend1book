<?php 
    // BaseURL tương đương baseUrl
    $linkMembeManage =  $this->baseUrl('/default/admin-user/index');
    $linkGroupManage =  $this->baseURL('/default/admin-group/index');
    // $linkGroupManage =  $this->baseURL('/admin-group/index'); vẫn hiểu do cấu hình module mặc định là default
    $linkPermission  =  $this->baseUrl('/default/admin-permission/index');
    $searchbox       = 	$this->formText('searchbox','',array('class'=>'txtmedium'));
   
    
?>
<div id="submenu-box">
	<div style="border: 1px solid #CCCCCC; padding: 5px">
		<ul id="submenu">
		    <?php echo $this->baseURL();?>
			<li><a href="<?php echo $linkGroupManage; ?>" >Group manager</a></li>
			<li><a href="#" class="active">Member manager</a></li>
			<li><a href="<?php echo $linkPermission;?>">Permission</a></li>
		</ul>
		<div class="clr"></div>
	</div>
	<?php //echo $searchbox;?>
</div>
