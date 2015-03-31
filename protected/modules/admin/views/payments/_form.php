
<div class="block-fluid">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payments-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'name'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'full_name'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'full_name'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'card_number'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'card_number'); ?>
            <?php echo $form->error($model,'card_number'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'cvv_code'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'cvv_code',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'cvv_code'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'expires_from'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'expires_from'); ?>
            <?php echo $form->error($model,'expires_from'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'expires_to'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'expires_to'); ?>
            <?php echo $form->error($model,'expires_to'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'order_id'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'order_id'); ?>
            <?php echo $form->error($model,'order_id'); ?>
        </div>
	</div>

	<div class="footer tar">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'), array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->