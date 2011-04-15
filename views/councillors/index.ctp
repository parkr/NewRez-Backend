<div class="councillors index">
	<h2><?php __('Councillors');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('position');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('faculty_major');?></th>
			<th><?php echo $this->Paginator->sort('u0_u1_status');?></th>
			<th><?php echo $this->Paginator->sort('theme_song');?></th>
			<th><?php echo $this->Paginator->sort('grow_up');?></th>
			<th><?php echo $this->Paginator->sort('meaning_of_life');?></th>
			<th><?php echo $this->Paginator->sort('million_dollars');?></th>
			<th><?php echo $this->Paginator->sort('has_photo');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($councillors as $councillor):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $councillor['Councillor']['position']; ?>&nbsp;</td>
		<td><?php echo $councillor['Councillor']['name']; ?>&nbsp;</td>
		<td><?php echo $councillor['Councillor']['faculty_major']; ?>&nbsp;</td>
		<td><?php echo $councillor['Councillor']['u0_u1_status']; ?>&nbsp;</td>
		<td><?php echo $councillor['Councillor']['theme_song']; ?>&nbsp;</td>
		<td><?php echo $councillor['Councillor']['grow_up']; ?>&nbsp;</td>
		<td><?php echo $councillor['Councillor']['meaning_of_life']; ?>&nbsp;</td>
		<td><?php echo $councillor['Councillor']['million_dollars']; ?>&nbsp;</td>
		<td><?php echo ($councillor['Councillor']['has_photo'] == 1) ? "Yes" : "No"; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $councillor['Councillor']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $councillor['Councillor']['id'])); ?>
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
	<h3><?php __('Blurbs'); ?></h3>
	<p>
		Hey, so you can't add new ones on purpose: you have to update the floor fellow's info by floor each year. Why keep old records?
	</p>
</div>