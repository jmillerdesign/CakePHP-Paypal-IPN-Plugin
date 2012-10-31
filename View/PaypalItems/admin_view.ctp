<div class="paypalItems view">
<h1><?php echo __d('paypal_ipn', 'PaypalItem'); ?></h1>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('paypal_ipn', 'Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paypalItem['PaypalItem']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('paypal_ipn', 'Instant Payment Notification Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($paypalItem['PaypalItem']['instant_payment_notification_id'], array('admin' => true, 'plugin' => 'paypal_ipn', 'controller' => 'instant_payment_notifications', 'action' => 'view', 'id' => $paypalItem['PaypalItem']['instant_payment_notification_id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('paypal_ipn', 'Item Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paypalItem['PaypalItem']['item_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('paypal_ipn', 'Item Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paypalItem['PaypalItem']['item_number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('paypal_ipn', 'Quantity'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paypalItem['PaypalItem']['quantity']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('paypal_ipn', 'Mc Gross'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paypalItem['PaypalItem']['mc_gross']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('paypal_ipn', 'Mc Shipping'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paypalItem['PaypalItem']['mc_shipping']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('paypal_ipn', 'Mc Handling'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paypalItem['PaypalItem']['mc_handling']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('paypal_ipn', 'Tax'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paypalItem['PaypalItem']['tax']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('paypal_ipn', 'Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paypalItem['PaypalItem']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('paypal_ipn', 'Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $paypalItem['PaypalItem']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__d('paypal_ipn', 'Edit PaypalItem'), array('action' => 'edit', $paypalItem['PaypalItem']['id'])); ?> </li>
		<li><?php echo $html->link(__d('paypal_ipn', 'Delete PaypalItem'), array('action' => 'delete', $paypalItem['PaypalItem']['id']), null, __d('paypal_ipn', 'Are you sure you want to delete # %s?', $paypalItem['PaypalItem']['id'])); ?> </li>
		<li><?php echo $html->link(__d('paypal_ipn', 'List PaypalItems'), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__d('paypal_ipn', 'New PaypalItem'), array('action' => 'add')); ?> </li>
	</ul>
</div>
