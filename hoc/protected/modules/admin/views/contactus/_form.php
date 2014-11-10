
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','Contact Us'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'contactus-form',
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
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'corporate_name'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->textField($model,'corporate_name',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                </div>
            </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'email'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'address'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'address1'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->textField($model,'address1',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'zip'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->textField($model,'zip',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'city'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'phone'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>100, 'class'=>'span10')); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'fax'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->textField($model,'fax',array('size'=>60,'maxlength'=>150, 'class'=>'span10')); ?>
                </div>
            </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'subject'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'content'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'Contactus[content]', 'value' => isset($model->content) ? $model->content : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                </div>


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