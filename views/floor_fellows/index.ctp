<div class="floorFellows index">
	<h2><?php __('Floor Fellows');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('floor');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('image_name');?></th>
			<th><?php echo $this->Paginator->sort('faculty_major');?></th>
			<th><?php echo $this->Paginator->sort('u_status');?></th>
			<th><?php echo $this->Paginator->sort('first_year_rez');?></th>
			<th><?php echo $this->Paginator->sort('ff_teaching');?></th>
			<th><?php echo $this->Paginator->sort('funny_prof');?></th>
			<th><?php echo $this->Paginator->sort('super_power');?></th>
			<th><?php echo $this->Paginator->sort('has_photo');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($floorFellows as $floorFellow):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $floorFellow['FloorFellow']['floor']; ?>&nbsp;</td>
		<td><?php echo $floorFellow['FloorFellow']['name']; ?>&nbsp;</td>
		<td><?php echo $this->Html->image("http://static.newrez.ca/ffs/".$floorFellow['FloorFellow']['image_name'], array('width'=>150, 'alt'=> $floorFellow['FloorFellow']['name'])); ?>&nbsp;</td>
		<td><?php echo $floorFellow['FloorFellow']['faculty_major']; ?>&nbsp;</td>
		<td><?php echo $floorFellow['FloorFellow']['u_status']; ?>&nbsp;</td>
		<td><?php echo $floorFellow['FloorFellow']['first_year_rez']; ?>&nbsp;</td>
		<td><?php echo $floorFellow['FloorFellow']['ff_teaching']; ?>&nbsp;</td>
		<td><?php echo $floorFellow['FloorFellow']['funny_prof']; ?>&nbsp;</td>
		<td><?php echo $floorFellow['FloorFellow']['super_power']; ?>&nbsp;</td>
		<td><?php echo $floorFellow['FloorFellow']['has_photo']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $floorFellow['FloorFellow']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $floorFellow['FloorFellow']['id'])); ?>
			<?php echo $this->Html->link(__('Edit Mini', true), array('action' => 'edit_mini', $floorFellow['FloorFellow']['id'])); ?>
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
	<h3><?php __('Blurb'); ?></h3>
	<p>
		Hey, so you can't add new ones on purpose: you have to update the floor fellow's info by floor each year. Why keep old records?
	</p>
</div>