<div class="form-registration">
    <div class="row">
        <div class="col-md-2 col-lg-2"></div>
        <div class="col-md-3 col-lg-3"></div>
        <div class="col-md-4 col-lg-4">
            <div class="register_title" style="color: red;"><?php echo Yii::t('global','Change Password') ?></div>
        </div>
        <div class="col-md-4 col-lg-4"></div>
    </div>
        <?php $this->widget('widgets.admin.notifications'); ?>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'enableAjaxValidation'=>false,
        )); ?>
        <?php echo $form->errorSummary($model); ?>
        
        <div class="row-fluid clearfix">
           <div class="row">
                <div class="form-add">
                    <div class="col-md-2 col-lg-2"></div>
                    <div class="col-md-3 col-lg-3"><?php echo $form->labelEx($model,'oldpassword')." *"; ?></div>
                    <div class="col-md-4 col-lg-4"><?php echo $form->passwordField($model,'oldpassword',array('size'=>40,'maxlength'=>40,'class'=>'validate[required]')); ?></div>
                    <div class="col-md-4 col-lg-4"><?php echo $form->error($model,'oldpassword'); ?></div>
                </div>
           </div>
        </div>
        
        <div class="row-fluid clearfix">
           <div class="row">
                <div class="form-add">
                    <div class="col-md-2 col-lg-2"></div>
                    <div class="col-md-3 col-lg-3"><?php echo $form->labelEx($model,'newpassword')." *"; ?></div>
                    <div class="col-md-4 col-lg-4"> <?php echo $form->passwordField($model,'newpassword',array('size'=>40,'maxlength'=>40,'class'=>'validate[required,minSize[8]]')); ?></div>
                    <div class="col-md-4 col-lg-4"><?php echo $form->error($model,'newpassword'); ?></div>
                </div>
           </div>
        </div>
        
        <div class="row-fluid clearfix">
           <div class="row">
                <div class="form-add">
                    <div class="col-md-2 col-lg-2"></div>
                    <div class="col-md-3 col-lg-3"><?php echo $form->labelEx($model,'newpasswordrepeat')." *"; ?></div>
                    <div class="col-md-4 col-lg-4"><?php echo $form->passwordField($model,'newpasswordrepeat',array('size'=>40,'maxlength'=>40,'class'=>'validate[required,equals[User_newpassword]')); ?></div>
                    <div class="col-md-4 col-lg-4"><?php echo $form->error($model,'newpasswordrepeat'); ?></div>
                </div>
           </div>
        </div>

    <div class="row-fluid clearfix">
       <div class="row">
           <div class="form-add">
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-md-3 col-lg-3"></div>
                <div class="col-md-4 col-lg-4"><?php echo CHtml::submitButton(Yii::t('global','Change Password'), array('class'=>' btn_login_now')); ?></div>
                <div class="col-md-4 col-lg-4"></div>
           </div>
       </div>
    </div>
        <?php $this->endWidget(); ?>

    </div><!-- form -->