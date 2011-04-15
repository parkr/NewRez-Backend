<div class="councillors form">
<?php echo $this->Form->create('Councillor');?>
	<fieldset>
		<legend><?php echo "Edit ".$this->Form->value('Councillor.position') ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->hidden('position');
		echo $this->Form->input('name');
		echo $this->Form->input('faculty_major');
		echo $this->Form->input('u0_u1_status');
		echo $this->Form->input('theme_song');
		echo $this->Form->input('grow_up');
		echo $this->Form->input('meaning_of_life');
		echo $this->Form->input('million_dollars');
		echo $this->Form->input('has_photo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Councillors', true), array('action' => 'index'));?></li>
	</ul>
</div>