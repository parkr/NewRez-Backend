<div class="residents form">
<?php echo $this->Form->create('Resident');?>
	<fieldset>
		<legend><?php __('Edit Resident'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('photo_link');
		echo $this->Form->input('post_link');
		echo $this->Form->input('blurb');
		echo $this->Form->input('date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Resident.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Resident.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Residents', true), array('action' => 'index'));?></li>
	</ul>
</div>