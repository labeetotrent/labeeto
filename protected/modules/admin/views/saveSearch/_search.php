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
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>155, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'age_from'); ?>
		<?php echo $form->textField($model,'age_from', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'age_to'); ?>
		<?php echo $form->textField($model,'age_to', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'within_from'); ?>
		<?php echo $form->textField($model,'within_from', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'within_to'); ?>
		<?php echo $form->textField($model,'within_to', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'height_from'); ?>
		<?php echo $form->textField($model,'height_from', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'height_to'); ?>
		<?php echo $form->textField($model,'height_to', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'education'); ?>
		<?php echo $form->textField($model,'education',array('size'=>40,'maxlength'=>40, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ehtnicity'); ?>
		<?php echo $form->textField($model,'ehtnicity',array('size'=>30,'maxlength'=>30, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'religion'); ?>
		<?php echo $form->textField($model,'religion',array('size'=>40,'maxlength'=>40, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'children'); ?>
		<?php echo $form->textField($model,'children', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'excercise'); ?>
		<?php echo $form->textField($model,'excercise',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'drink'); ?>
		<?php echo $form->textField($model,'drink',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'smoke'); ?>
		<?php echo $form->textField($model,'smoke',array('size'=>60,'maxlength'=>100, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_online'); ?>
		<?php echo $form->textField($model,'is_online', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'verified'); ?>
		<?php echo $form->textField($model,'verified', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated'); ?>
		<?php echo $form->textField($model,'updated', array('class'=>'span10')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->