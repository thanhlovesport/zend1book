<?php 
    $linkMembeManage =  $this->baseUrl('/default/admin-user/index');
    $linkPermission  =  $this->baseUrl('/default/admin-permission/index');
?>
<div id="submenu-box">
	<div style="border: 1px solid #CCCCCC; padding: 5px">
		<ul id="submenu">
			<li><a href="#" class="active">Group manager</a></li>
			<li><a href="<?php echo $linkMembeManage;?>">Member manager</a></li>
			<li><a href="<?php echo $linkPermission;?>">Permission</a></li>
		</ul>
		<div class="clr"></div>
	</div>
</div>
