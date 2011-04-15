<script type="text/javascript"> 
    var _featherLoaded = false; 
	var save_committed = false;

    Feather_APIKey = '41edc11155ceafd36cbc871b07c59016'; 
    Feather_Theme = 'bluesky'; 
    Feather_EditOptions = 'all'; 
    Feather_OpenType = 'float'; 
    Feather_CropSizes = '60x60,100x100,200x200'; 

    Feather_OnSave = function(id, url) { 
        var e = document.getElementById(id); 
        e.src = url; 
        aviaryeditor_close(); 
		save_committed = true;
    } 

    Feather_OnLoad = function() { 
        _featherLoaded = true; 
    } 

    function launchEditor(imageid) { 
        if (_featherLoaded) { 
            var src = document.getElementById(imageid).src; 
            aviaryeditor(imageid, src); 
        } 
    } 
	
	function saveToMyServer(id){
		if(id==null){
			alert("Hooplah. Internal server error.");
		}else{
			if(save_committed){
				var e = document.getElementById('EditMini');
				var url = '/add/floor_fellows/steal_mini/id:'+id+'/'+e.src.substr(7);
				alert(url);
				window.location = url;
			}else{
				alert("You have to save it or make adjustments first!")
			}
		}
	}
</script> 
<script type="text/javascript" src="http://feather.aviary.com/js/feather.js"></script>
<div class="floorFellows view">
<h2><?php  __('Floor Fellow');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $floorFellow['FloorFellow']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $floorFellow['FloorFellow']['image_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mini Image'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->image("http://static.newrez.ca/ffs/".$floorFellow['FloorFellow']['mini_image_name'], array('alt'=> $floorFellow['FloorFellow']['name'], 'id'=>'EditMini')); ?>
			&nbsp;
			<p><input type="image" src="http://www.aviary.com/images/feather/edit-photo.png" value="Edit Photo" onclick="launchEditor('EditMini'); return false;" style="width:100px;" /></p>
		</dd>
	</dl>
	PRESS ME: <h1 style='font-size:30px;'><a href="#" onclick='saveToMyServer("<?php echo $floorFellow['FloorFellow']['id']; ?>")'>SAVE TO THE SERVER</a></h1>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Floor Fellow', true), array('action' => 'edit', $floorFellow['FloorFellow']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Floor Fellows', true), array('action' => 'index')); ?> </li>
	</ul>
</div>
