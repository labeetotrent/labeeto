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
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>155, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'career'); ?>
		<?php echo $form->textField($model,'career',array('size'=>60,'maxlength'=>100, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>155, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'joined'); ?>
		<?php echo $form->textField($model,'joined', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'role'); ?>
		<?php echo $form->textField($model,'role',array('size'=>30,'maxlength'=>30, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ehtnicity'); ?>
		<?php echo $form->textField($model,'ehtnicity',array('size'=>30,'maxlength'=>30, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fname'); ?>
		<?php echo $form->textField($model,'fname',array('size'=>40,'maxlength'=>40, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lname'); ?>
		<?php echo $form->textField($model,'lname',array('size'=>40,'maxlength'=>40, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birthday'); ?>
		<?php echo $form->textField($model,'birthday', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'photo'); ?>
		<?php echo $form->textField($model,'photo',array('size'=>60,'maxlength'=>155, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>155, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'education'); ?>
		<?php echo $form->textField($model,'education',array('size'=>40,'maxlength'=>40, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'religion'); ?>
		<?php echo $form->textField($model,'religion',array('size'=>40,'maxlength'=>40, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'height'); ?>
		<?php echo $form->textField($model,'height',array('size'=>60,'maxlength'=>100, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'excercise'); ?>
		<?php echo $form->textField($model,'excercise',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'passion'); ?>
		<?php echo $form->textField($model,'passion',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'goal'); ?>
		<?php echo $form->textField($model,'goal',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'smoke'); ?>
		<?php echo $form->textField($model,'smoke',array('size'=>60,'maxlength'=>100, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'relations'); ?>
		<?php echo $form->textField($model,'relations',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zipcode'); ?>
		<?php echo $form->textField($model,'zipcode',array('size'=>5,'maxlength'=>5, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'latitude'); ?>
		<?php echo $form->textField($model,'latitude',array('size'=>50,'maxlength'=>50, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'longtitude'); ?>
		<?php echo $form->textField($model,'longtitude',array('size'=>50,'maxlength'=>50, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'drink'); ?>
		<?php echo $form->textField($model,'drink',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_logged'); ?>
		<?php echo $form->textField($model,'last_logged', array('class'=>'span10')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'language'); ?>
		<?php echo $form->textField($model,'language',array('size'=>10,'maxlength'=>10, 'class'=>'span10')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->