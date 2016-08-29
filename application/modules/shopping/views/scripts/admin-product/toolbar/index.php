<?php 
    $linkAdd        = $this->baseUrl($this->currentControlle.'/add');
    $linkActive     = $this->baseUrl($this->currentControlle.'/status/type/1');
    $linkInActive   = $this->baseUrl($this->currentControlle.'/status/type/0');
    $linkmultyDelete = $this->baseUrl($this->currentControlle.'/multy-delete/');
    //$linkSort        = $this->baseUrl($this->currentControlle.'/sort');
    
       
?>
<div id="toolbar-box">
	<div class="t">
		<div class="t">
			<div class="t"></div>
		</div>
	</div>
	<div class="m">
		<div id="toolbar" class="toolbar">
                       
            
			<!-- 
			     <div class="toolbar-button">
				<a href="#"> <img
					src="<?php //echo $this->ImageURL?>/toolbar/icon-32-sort.png"> <br> Sort
				</a>
			</div>
			 -->
			<div class="toolbar-button">
				<a href="#" onclick="OnSubmitForm('<?php echo $linkActive;?>')"> <img
					src="<?php echo $this->ImageURL?>/toolbar/icon-32-active.png"> <br> Active Item
				</a>
			</div>
			<div class="toolbar-button">
				<a href="#" onclick="OnSubmitForm('<?php echo $linkInActive;?>')"> <img
					src="<?php echo $this->ImageURL?>/toolbar/icon-32-inactive.png"> <br> InActive Item
				</a>
			</div>
			<div class="toolbar-button">
				<a href="<?php echo $linkAdd;?>"> <img
					src="<?php echo $this->ImageURL?>/toolbar/icon-32-new.png"> <br> New
				</a>
			</div>
			<div class="toolbar-button">
				<a href="#"onclick="OnSubmitForm('<?php echo $linkmultyDelete;?>')" > <img
					src="<?php echo $this->ImageURL?>/toolbar/icon-32-delete.png"> <br>
					Delete
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