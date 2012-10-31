<div class="paypalItems form">
	<h1><?php echo __d('paypal_ipn', 'Add/Edit PaypalItem'); ?></h1>
	<?php echo $this->Form->create('PaypalItem'); ?>
	<fieldset>
		<?php
		echo $this->Form->input('id', array('label' => __d('paypal_ipn', 'Id')));
		echo $this->Form->input('instant_payment_notification_id', array('label' => __d('paypal_ipn', 'Instant Payment Notification Id')));
		echo $this->Form->input('item_name', array('label' => __d('paypal_ipn', 'Item Name')));
		echo $this->Form->input('item_number', array('label' => __d('paypal_ipn', 'Item Number')));
		echo $this->Form->input('quantity', array('label' => __d('paypal_ipn', 'Quantity')));
		echo $this->Form->input('mc_gross', array('label' => __d('paypal_ipn', 'Mc Gross')));
		echo $this->Form->input('mc_shipping', array('label' => __d('paypal_ipn', 'Mc Shipping')));
		echo $this->Form->input('mc_handling', array('label' => __d('paypal_ipn', 'Mc Handling')));
		echo $this->Form->input('tax', array('label' => __d('paypal_ipn', 'Tax')));
		?>
	</fieldset>
	<?php echo $this->Form->end(__d('paypal_ipn', 'Submit')); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__d('paypal_ipn', 'List PaypalItems'), array('action' => 'index')); ?></li>
	</ul>
</div>
