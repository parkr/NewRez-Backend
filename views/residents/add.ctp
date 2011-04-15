<div class="residents form">
<?php echo $this->Form->create('Resident');?>
	<fieldset>
		<legend><?php __('Add Resident'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Residents', true), array('action' => 'index'));?></li>
	</ul>
</div>