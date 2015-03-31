
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','News Comments'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'news-comments-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'news_id'); ?>
</label>
                    <div class="controls">
                        <?php
                        $listNews  = CHtml::listData(News::model()->findAll(),'id','title');
                        echo $form->dropDownList($model,'news_id', $listNews);
                        ?>

                    </div>
                </div>
            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'parent_id'); ?>
</label>
                    <div class="controls">
                        <?php
                               $condition = array('parent_id' => 0);
                               $criteria = new CDbCriteria(array('order' => 'subject'));
                               if ($model->id){
                                  $criteria->addCondition('id <> '.$model->id);
                               }
                               $list = CHtml::listData(NewsComments::model()->findAllByAttributes($condition, $criteria ), 'id', 'subject' );
                               echo $form->dropDownList($model,'parent_id', $list, array('empty'=>array(0 => ''))); ?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'author'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'content'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'NewsComments[content]', 'value' => isset($model->content) ? $model->content : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'is_active'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->checkBox($model,'is_active'); ?>
                    </div>
                </div>

           <!-- <?php /*if(CCaptcha::checkRequirements()): */?>
                <div class="control-group">
                    <div class="controls new-captcha">
                        <?php /*$this->widget('CCaptcha'); */?>
                        <?php /*echo $form->textField($model,'verifyCode',array('size'=>60,'maxlength'=>12, 'class'=>'form-control','data-validation-minlength'=>'0','data-trigger'=>'change','data-required'=>'true')); */?>
                    </div>
                </div>
            --><?php /*endif; */?>

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