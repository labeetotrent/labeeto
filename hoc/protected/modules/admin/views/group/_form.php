
<div class="block-fluid">

<?php 
    $id_product = isset($_GET['id'])?$_GET['id']:0;
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <!--<div class="row-form clearfix">
		<div class="span3">
            <?php /*echo $form->labelEx($model,'product_id'); */?>
        </div>
		<div class="span9">
            <?php /*  $product_name = Products::model()->findAll(' 1 ORDER BY id DESC ');
                    foreach ($product_name as $key=>$name){
                        $product_name1[$name['id']] =  $name['name'];
                    } */?>
            <?php /*echo $form->dropDownList( $model, 'product_id', $product_name1, array('options'=>array( $id_product =>array('selected'=>'selected'))) ); */?>
            <?php /*echo $form->error($model,'product_id'); */?>
        </div>
	</div> -->

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'group_name'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textField($model,'group_name',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'group_name'); ?>
        </div>
	</div>

	<div class="row-form clearfix">
		<div class="span3">
            <?php echo $form->labelEx($model,'description'); ?>
        </div>
		<div class="span9">
            <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'description'); ?>
        </div>
	</div>

    <?php /*
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
	</div> */ ?>

	<div class="footer tar">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'), array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->