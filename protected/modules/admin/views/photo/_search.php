<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'photo'); ?>
		<?php echo $form->textField($model,'photo',array('size'=>60,'maxlength'=>500, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_public'); ?>
		<?php echo $form->textField($model,'is_public', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_approval'); ?>
		<?php echo $form->textField($model,'is_approval', array('class'=>'span10')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->