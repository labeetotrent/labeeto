<?php $form=$this->beginWidget('CActiveForm', array(
 'id'=>'user-form',
 'enableAjaxValidation'=>false,
)); ?>
 <?php echo $form->errorSummary($model); ?>
   <div class="row-fluid clearfix">
       <div class="row">
            <div class="form-add">
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-md-2 col-lg-2"><?php echo $form->labelEx($model,'firstname'); ?></div>
                <div class="col-md-4 col-lg-4"><?php echo $form->textField($model,'firstname',array('size'=>40,'maxlength'=>255)); ?></div>
                <div class="col-md-4 col-lg-4"><?php echo $form->error($model,'firstname'); ?></div>
            </div>
       </div>
    </div>
    
    <div class="row-fluid clearfix">
       <div class="row">
            <div class="form-add">
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-md-2 col-lg-2"><?php echo $form->labelEx($model,'lastname'); ?></div>
                <div class="col-md-4 col-lg-4"><?php echo $form->textField($model,'lastname',array('size'=>40,'maxlength'=>255)); ?></div>
                <div class="col-md-4 col-lg-4"><?php echo $form->error($model,'lastname'); ?></div>
            </div>
       </div>
    </div>
    
    <div class="row-fluid clearfix">
       <div class="row">
            <div class="form-add">
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-md-2 col-lg-2"><?php echo $form->labelEx($model,'email'); ?></div>
                <div class="col-md-4 col-lg-4"><?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>155,'class'=>'validate[custom[email]]')); ?></div>
                <div class="col-md-4 col-lg-4"><?php echo $form->error($model,'email'); ?></div>
            </div>
       </div>
    </div>
    
    <div class="row-fluid clearfix">
       <div class="row">
            <div class="form-add">
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-md-2 col-lg-2"><?php echo $form->labelEx($model,'password'); ?></div>
                <div class="col-md-4 col-lg-4"><?php echo $form->passwordField($model,'password',array('size'=>40,'maxlength'=>40,'class'=>'validate[required,minSize[8]]')); ?></div>
                <div class="col-md-4 col-lg-4"><?php echo $form->error($model,'password'); ?></div>
            </div>
       </div>
    </div>

    <div class="row-fluid clearfix">
       <div class="row">
            <div class="form-add">
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-md-2 col-lg-2"><?php echo $form->labelEx($model,'password2'); ?></div>
                <div class="col-md-4 col-lg-4"><?php echo $form->passwordField($model,'password2',array('size'=>40,'maxlength'=>40,'class' => 'validate[required,equals[User_password] ')); ?></div>
                <div class="col-md-4 col-lg-4"><?php echo $form->error($model,'password2'); ?></div>
            </div>
       </div>
    </div>
    
    <div class="row-fluid clearfix">
       <div class="row">
           <div class="form-add">
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-md-4 col-lg-4"><?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Register now') : Yii::t('global','Save'), array('class'=>' btn_register_now')); ?></div>
                <div class="col-md-4 col-lg-4"></div>
           </div>
       </div>
    </div>

<?php $this->endWidget(); ?>