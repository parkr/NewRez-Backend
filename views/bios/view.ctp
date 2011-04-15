<div class="bios view">
<h2><?php  __('Bio');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bio['Bio']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bio['Bio']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Controller'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $bio['Bio']['controller']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bio', true), array('action' => 'edit', $bio['Bio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Bio', true), array('action' => 'delete', $bio['Bio']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bio['Bio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bios', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bio', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
