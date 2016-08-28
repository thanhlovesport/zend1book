<?php 
    // BaseURL tương đương baseUrl
    $linkProductManager =  $this->baseURL('/shopping/admin-item/index');
    // $linkGroupManage =  $this->baseURL('/admin-group/index'); vẫn hiểu do cấu hình module mặc định là default
    $linkPill           =  $this->baseUrl('/default/admin-bill/index');
    $searchbox       = 	$this->formText('searchbox','',array('class'=>'txtmedium'));
   
?>
<div id="submenu-box">
	<div style="border: 1px solid #CCCCCC; padding: 5px">
		<ul id="submenu">
		    <?php echo $this->baseURL();?>
			<li><a href="#" class="active">Category manager</a></li>
			<li><a href="<?php echo $linkProductManager;?>" >Product manager</a></li>
			<li><a href="<?php echo $linkPill;?>">Bills</a></li>
		</ul>
		<div class="clr"></div>
	</div>
	<?php //echo $searchbox;?>
</div>
