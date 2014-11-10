<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <div class="containerHeadline tableHeadline">
                <h2><?php echo Yii::t('global', 'Change Password').' ['.$member->username.']'; ?></h2>
                <form>
                    <div class="input-append">
                        <span class="add-on add-on-middle add-on-mini minimizeTable"><i class="icon-caret-down"></i></span>
                        <span class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></span>
                    </div>
                </form>

            </div>

            <div class="floatingBox table">
                <div class="container-fluid">
    <?php $form=$this->beginWidget('CActiveForm', array(
        	'id'=>'validation',
        	'enableAjaxValidation'=>false,
        )); ?>
        
        	<?php echo $form->errorSummary($password); ?>
        
        	<div class="row-form clearfix">
        		<div class="span3">
                    <?php echo $form->labelEx($password,'npassword'); ?>
                </div>
        		<div class="span9">
                    <?php echo $form->passwordField($password,'npassword',array('class'=>'validate[minSize[8]]','size'=>60,'maxlength'=>155)); ?>
                    <?php echo $form->error($password,'npassword'); ?>
                </div>
        	</div>
        
        	<div class="row-form clearfix">
        		<div class="span3">
                    <?php echo $form->labelEx($password,'npassword2'); ?>
                </div>
        		<div class="span9">
                    <?php echo $form->passwordField($password,'npassword2'); ?>
                    <?php echo $form->error($password,'npassword2'); ?>
                </div>
        	</div>
        
            <div class="row-form clearfix">
                <input type="hidden" name="from_action" value="<?php echo isset($_GET['action'])?$_GET['action']:'' ?>" />
        		<?php echo CHtml::submitButton(Yii::t('global', 'Change Password'), array('name'=>'submit', 'class'=>'frontend_account btn btn-warning')); ?>
            </div>
        	
        
        <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>

</div></div>

