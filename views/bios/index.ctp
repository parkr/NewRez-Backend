<div class="bios index">
	<h2><?php __('Bios');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($bios as $bio):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Html->link(__($bio['Bio']['name'], true), array('controller' => $bio['Bio']['controller'])); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3><?php __('Welcome'); ?></h3>
	<p>
		Hey! So welcome to the back-end editor for the website people and places.
	</p>
	<p>
		To begin, click a link on the right.
	</p>
	<br />
	<ul>
		<li><?php echo $this->Html->link(__('NewRez.ca', true), 'http://www.newrez.ca/'); ?> </li>
	</ul>
</div>