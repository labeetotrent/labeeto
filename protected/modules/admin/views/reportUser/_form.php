
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','report-user'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'report-user-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley'
                                )
                )); ?>

            <?php 
            $type_report = array(
                'Offensive Messaging' => 'Offensive Messaging',
                'Offensive Profile'=>'Offensive Profile',
                'Offensive Image'=>'Offensive Image',
                'Offensive Scamming'=>'Offensive Scamming');
            echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'user_id'); ?>
</label>
                    <div class="controls">
                        <?php
                        $user = CHtml::listData(User::model()->findAll(''),'id','username');
                        echo $form->dropDownList($model,'user_id',$user); 
                        ?>
                    </div>
                </div>
                    
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'blocked_user'); ?>
</label>
                    <div class="controls">
                        <?php
                        $user = CHtml::listData(User::model()->findAll(''),'id','username');
                        echo $form->dropDownList($model,'blocked_user',$user); 
                        ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'type_report'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->dropDownList($model, 'type_report', $type_report, array('prompt' => '--Select Option--')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'achievements_id'); ?>
</label>
                    <div class="controls">
                        <?php
                        $achievements = CHtml::listData(Achievements::model()->findAll(''),'id','id');
                        echo $form->dropDownList($model,'achievements_id',$achievements); 
                        ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'comment'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'ReportUser[content]', 'value' => isset($model->content) ? $model->content : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                </div>

                 <!-- <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'comment'); ?>
                 </label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'ReportUser[comment]', 'value' => isset($model->comment) ? $model->comment : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                                 </div> -->
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