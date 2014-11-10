<div class="container-fluid">
    <div class="page-header">
        <h1><?php echo Yii::t('global', 'Update'); ?>            <small>
                <?php echo Yii::t('global', 'Question'); ?># <?php echo $model->id; ?>        </small>
        </h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','question'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'question-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'question'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textArea($model,'question',array('rows'=>6, 'cols'=>50, 'class'=>'span10')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'user_id'); ?>
</label>
                    <div class="controls">
                        <?php $user = User::model()->getAllUser(); ?>
                        <?php echo $form->dropDownList($model,'user_id', $user, array('class'=>'span10')); ?>
                    </div>
                </div>
                            <!--<div class="control-group">
                    <label for="fullname" class="control-label"><?php //echo $form->labelEx($model,'default'); ?>
</label>
                    <div class="controls">
                        <?php //echo $form->textField($model,'default', array('class'=>'span10')); ?>
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
</div>