
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','chat'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'chat-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'to'); ?>
</label>
                    <div class="controls">
                        <?php
                            $user = CHtml::listData(User::model()->findAll(''),'id','username');
                            echo $form->dropDownList($model,'to',$user);
                        ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'from'); ?>
</label>
                    <div class="controls">
                        <?php
                            $user = CHtml::listData(User::model()->findAll(''),'id','username');
                            echo $form->dropDownList($model,'from',$user);
                        ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'message'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'Chat[message]', 'value' => isset($model->message) ? $model->message : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                </div>
                            <!--<div class="control-group">
                    <label for="fullname" class="control-label"><?php /*echo $form->labelEx($model,'is_read'); */?>
</label>
                    <div class="controls">
                        <?php /*echo $form->textField($model,'is_read', array('class'=>'span10')); */?>
                    </div>
                </div>-->

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