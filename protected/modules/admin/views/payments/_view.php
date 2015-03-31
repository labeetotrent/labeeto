<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('full_name')); ?>:</b>
	<?php echo CHtml::encode($data->full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('card_number')); ?>:</b>
	<?php echo CHtml::encode($data->card_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cvv_code')); ?>:</b>
	<?php echo CHtml::encode($data->cvv_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expires_from')); ?>:</b>
	<?php echo CHtml::encode($data->expires_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expires_to')); ?>:</b>
	<?php echo CHtml::encode($data->expires_to); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::encode($data->order_id); ?>
	<br />

	*/ ?>

</div>