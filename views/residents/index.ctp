<div class="residents index">
	<h2><?php __('Residents');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('photo_link');?></th>
			<th><?php echo $this->Paginator->sort('post_link');?></th>
			<th><?php echo $this->Paginator->sort('blurb');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($residents as $resident):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $resident['Resident']['name']; ?>&nbsp;</td>
		<td><?php echo $resident['Resident']['photo_link']; ?>&nbsp;</td>
		<td><?php echo $resident['Resident']['post_link']; ?>&nbsp;</td>
		<td><?php echo $resident['Resident']['blurb']; ?>&nbsp;</td>
		<td><?php echo $resident['Resident']['date']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $resident['Resident']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $resident['Resident']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $resident['Resident']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resident['Resident']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Resident', true), array('action' => 'add')); ?></li>
	</ul>
</div>