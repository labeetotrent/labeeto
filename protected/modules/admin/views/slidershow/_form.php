
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','Slider Show'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'slidershow-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'enctype' => 'multipart/form-data',
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'name'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'image'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->fileField($model,'image'); ?>
                        <?php echo $form->error($model,'image'); ?>
                        <?php if ($model->image):?>
                            <div style="margin:10px;"><a class="fancybox" <?php echo 'href="/uploads/animation/'.$model->image.'"'?> rel="group">
                                    <img class="img-polaroid" <?php echo 'src="/uploads/animation/'.$model->image.'"'?> style="height: 65px;"/>
                                </a></div>
                        <?php endif;?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'content'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'Slidershow[content]', 'value' => isset($model->content) ? $model->content : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'link'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                        <?php /*    <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'position'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'position', array('class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'rank'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'rank', array('class'=>'span10')); ?>
                    </div>
                </div> */ ?>

                            <div class="control-group">
                    <div class="controls">
                        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'), array('class'=>'btn btn-primary')); ?>
                        <button class="btn" type="reset">Reset</button>
                    </div>
                </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>

</div>
    </div>