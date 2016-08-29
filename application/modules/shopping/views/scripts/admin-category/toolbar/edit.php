<?php 

    $linkCancel = $this->baseUrl($this->currentControlle.'/index');
    echo $linkEdit   =   $this->baseUrl($this->currentControlle.'/edit/id/'.$this->arrParam['id']);
    echo '<br>';
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
				<a href="#" onclick="OnSubmitForm('<?php echo $linkEdit;?>')"> <img
					src="<?php echo $this->ImageURL?>/toolbar/icon-32-save.png"> <br> Edit
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