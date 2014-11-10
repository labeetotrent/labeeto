
<div class="block-fluid">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'themes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'type'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'type'); ?>
            <?php echo $form->error($model,'type'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'choose_file'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'choose_file',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'choose_file'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'is_active'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'is_active'); ?>
            <?php echo $form->error($model,'is_active'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'created'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'created'); ?>
            <?php echo $form->error($model,'created'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'updated'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'updated'); ?>
            <?php echo $form->error($model,'updated'); ?>
        </div>
	</div>

	<div class="footer tar">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'), array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->