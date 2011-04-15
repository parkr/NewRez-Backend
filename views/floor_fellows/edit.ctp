<div class="floorFellows form">
<?php echo $this->Form->create('FloorFellow', array('enctype' => 'multipart/form-data'));?>
	<fieldset>
		<legend><?php __('Edit Floor Fellow'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->file('image');
		echo $this->Form->hidden('image_name');
		echo $this->Form->input('faculty_major');
		echo $this->Form->input('u_status');
		echo $this->Form->hidden('floor');
		echo $this->Form->input('first_year_rez');
		echo $this->Form->input('ff_teaching');
		echo $this->Form->input('funny_prof');
		echo $this->Form->input('super_power');
		echo $this->Form->input('has_photo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Floor Fellows', true), array('action' => 'index'));?></li>
	</ul>
</div>