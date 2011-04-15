<div class="facilities form">
<?php echo $this->Form->create('Facility');?>
	<fieldset>
		<legend><?php __('Add Facility'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('info');
		echo $this->Form->input('banner_link');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Facilities', true), array('action' => 'index'));?></li>
	</ul>
</div>