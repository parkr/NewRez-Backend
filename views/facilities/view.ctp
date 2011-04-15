<div class="facilities view">
<h2><?php  __('Facility');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $facility['Facility']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $facility['Facility']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Info'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $facility['Facility']['info']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Banner Link'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $facility['Facility']['banner_link']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Facility', true), array('action' => 'edit', $facility['Facility']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Facility', true), array('action' => 'delete', $facility['Facility']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $facility['Facility']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Facilities', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Facility', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
