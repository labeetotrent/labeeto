
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','verify-profile'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'verify-profile-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                            'enctype' => 'multipart/form-data',
                            'class'=>'form-horizontal contentForm',
                            'data-validate'=>'parsley',
                    )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'photo'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->fileField($model,'photo'); ?>
                        <?php if ($model->photo): ?>
                        <a class="fancybox" <?php echo 'href="/uploads/photoVerify/' . $model->photo . '"' ?> rel="group">
                            <img class="img-polaroid" <?php echo 'src="/uploads/photoVerify/' . $model->photo . '"' ?>
                                 style="height: 50px;"/>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'user_id'); ?>
</label>
                    <div class="controls">
                        <?php $alluser = User::model()->getAllUser(); ?>
                        <?php echo $form->dropDownList($model,'user_id', $alluser); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'code'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'code',array('size'=>10,'maxlength'=>10, 'class'=>'span10')); ?>
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