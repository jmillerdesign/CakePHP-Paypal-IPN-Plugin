<div class="paypalItems index">
<h1><?php echo __d('paypal_ipn', 'PaypalItems');?></h1>
<p>
<?php
echo $this->Paginator->counter(array(
	'format' => __d('paypal_ipn', 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('item_name', __d('paypal_ipn', 'Item Name'));?></th>
	<th><?php echo $this->Paginator->sort('item_number', __d('paypal_ipn', 'Item Number'));?></th>
	<th><?php echo $this->Paginator->sort('quantity', __d('paypal_ipn', 'Quantity'));?></th>
	<th><?php echo $this->Paginator->sort('mc_gross', __d('paypal_ipn', 'Mc Gross'));?></th>
	<th><?php echo $this->Paginator->sort('created', __d('paypal_ipn', 'Created'));?></th>
	<th class="actions"><?php echo __d('paypal_ipn', 'Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($paypalItems as $paypalItem):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $paypalItem['PaypalItem']['item_name']; ?>
		</td>
		<td>
			<?php echo $paypalItem['PaypalItem']['item_number']; ?>
		</td>
		<td>
			<?php echo $paypalItem['PaypalItem']['quantity']; ?>
		</td>
		<td>
			<?php echo $this->Number->currency($paypalItem['PaypalItem']['mc_gross']); ?>
		</td>
		<td>
			<?php echo $this->Time->niceShort($paypalItem['PaypalItem']['created']); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__d('paypal_ipn', 'View'), array('action' => 'view', $paypalItem['PaypalItem']['id'])); ?>
			<?php echo $this->Html->link(__d('paypal_ipn', 'Edit'), array('action' => 'edit', $paypalItem['PaypalItem']['id'])); ?>
			<?php echo $this->Html->link(__d('paypal_ipn', 'Delete'), array('action' => 'delete', $paypalItem['PaypalItem']['id']), null, __d('paypal_ipn', 'Are you sure you want to delete # %s?', $paypalItem['PaypalItem']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $this->Paginator->prev('<< ' . __d('paypal_ipn', 'previous'), array(), null, array('class' => 'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__d('paypal_ipn', 'next') . ' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__d('paypal_ipn', 'New PaypalItem'), array('action' => 'add')); ?></li>
	</ul>
</div>
