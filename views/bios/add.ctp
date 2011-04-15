<div class="bios form">
<?php echo $this->Form->create('Bio');?>
	<fieldset>
		<legend><?php __('Add Bio'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('controller');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bios', true), array('action' => 'index'));?></li>
	</ul>
</div>