
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','Role user'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'role-user-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'name'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>

                            <div class="control-group">
                    <div class="controls">
                        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'), array('class'=>'btn btn-primary')); ?>
                        <button class="btn" type="reset"><?php echo Yii::t('global','Reset'); ?></button>
                    </div>
                </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>

</div>
    </div>