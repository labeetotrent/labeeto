<div class="form-registration">
    <div class="row">
            <div class="col-md-2 col-lg-2"></div>
            <div class="col-md-2 col-lg-2"></div>
            <div class="col-md-4 col-lg-4">
                <div class="register_title" style="color: red;"><?php echo Yii::t('global','Login') ?></div>
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
                    <div class="col-md-2 col-lg-2"><?php echo $form->labelEx($model,'email'); ?></div>
                    <div class="col-md-4 col-lg-4"><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>155,'class'=>'validate[custom[email]]')); ?></div>
                    <div class="col-md-4 col-lg-4"><?php echo $form->error($model,'email'); ?></div>
                </div>
           </div>
        </div>

        <div class="row-fluid clearfix">
           <div class="row">
                <div class="form-add">
                    <div class="col-md-2 col-lg-2"></div>
                    <div class="col-md-2 col-lg-2"><?php echo $form->labelEx($model,'password'); ?></div>
                    <div class="col-md-4 col-lg-4"><?php echo $form->passwordField($model,'password',array('size'=>40,'maxlength'=>40)); ?></div>
                    <div class="col-md-4 col-lg-4"><?php echo $form->error($model,'password'); ?></div>
                </div>
           </div>
        </div>

    <div class="row-fluid clearfix">
       <div class="row">
           <div class="form-add">
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-md-4 col-lg-4"><?php echo CHtml::submitButton(Yii::t('global','Login now'), array('class'=>'btn_login_now')); ?></div>
                <div class="col-md-4 col-lg-4"></div>
           </div>
       </div>
    </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->