<?php 
    echo $linkCancel = $this->baseUrl($this->currentControlle.'/index');
    $linkDelete   =   $this->baseUrl($this->currentControlle.'/delete/id/'.$this->arrParam['id']);
?>
<div id="toolbar-box">
	<div class="t">
		<div class="t">
			<div class="t"></div>
		</div>
	</div>
	<div class="m">
		<div id="toolbar" class="toolbar">
            
            <div class="toolbar-button">
				<a href="#" onclick="OnSubmitForm('<?php echo $linkDelete;?>')"> <img
					src="<?php echo $this->ImageURL?>/toolbar/icon-32-accept.png"> <br> Accept
				</a>
			</div>
			<div class="toolbar-button">
				<a href="<?php echo $linkCancel;?>"> <img
					src="<?php echo $this->ImageURL?>/toolbar/icon-32-cancel.png"> <br> Cancel
				</a>
			</div>
			
            
			<div class="clr"></div>
		</div>
		<div class="header icon-48-install"><?php echo $this->Title;?></div>

		<div class="clr"></div>
	</div>
	<div class="b">
		<div class="b">
			<div class="b"></div>
		</div>
	</div>
</div>