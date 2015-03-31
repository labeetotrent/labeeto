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
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'grip'); ?>
		<?php echo $form->textArea($model,'grip',array('rows'=>6, 'cols'=>50, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>250, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pdf'); ?>
		<?php echo $form->textField($model,'pdf',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'external_link'); ?>
		<?php echo $form->textField($model,'external_link',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'video'); ?>
		<?php echo $form->textField($model,'video',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active', array('class'=>'span10')); ?>
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