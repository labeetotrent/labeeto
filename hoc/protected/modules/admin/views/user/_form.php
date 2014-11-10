
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','user'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'user-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                'enctype' => 'multipart/form-data',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'username'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>155, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'gender'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'gender', Lookup::items('Gender') ); ?>
                    </div>
                </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'verified'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->dropDownList($model,'verified', Utils::getStatusCommon() ); ?>
                </div>
            </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'career'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'career',array('size'=>60,'maxlength'=>100, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'email'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>155, 'class'=>'span10')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'ehtnicity'); ?></label>
                    <div class="controls">
                        <?php
                        $ehtnicity = CHtml::listData(Ethnicity::model()->findAll(''),'id','name');
                        echo $form->dropDownList($model,'ehtnicity',$ehtnicity); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'fname'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'fname',array('size'=>40,'maxlength'=>40, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'lname'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'lname',array('size'=>40,'maxlength'=>40, 'class'=>'span10')); ?>
                    </div>
                </div>

                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'photo'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->fileField($model,'photo'); ?>
                        <?php if ($model->photo):?>
                            <div style="margin:10px;"><a class="fancybox" <?php echo 'href="/uploads/avatar/'.$model->photo.'"'?> rel="group">
                                    <img class="img-polaroid" <?php echo 'src="/uploads/avatar/'.$model->photo.'"'?> style="height: 65px;"/>
                                </a></div>
                        <?php endif;?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'address'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>155, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'education'); ?>
</label>
                    <div class="controls">
                        <?php
                        $education = CHtml::listData(Education::model()->findAll(''),'id','name');
                        echo $form->dropDownList( $model, 'education', $education ); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'religion'); ?>
</label>
                    <div class="controls">
                        <?php
                        $religion = CHtml::listData(Religion::model()->findAll(''),'id','name');
                        echo $form->dropDownList( $model, 'religion', $religion); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'height'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'height',array('size'=>60,'maxlength'=>100, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'excercise'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'excercise',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'passion'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'passion',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'goal'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'goal',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'smoke'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'smoke',array('size'=>60,'maxlength'=>100, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'relations'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'relations',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'zipcode'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'zipcode',array('size'=>5,'maxlength'=>5, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'latitude'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'latitude',array('size'=>50,'maxlength'=>50, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'longtitude'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'longtitude',array('size'=>50,'maxlength'=>50, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'drink'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'drink',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'status'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'status', Lookup::items('StatusUser') ); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'Membership'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'membership', Lookup::items('Membership') ); ?>
                    </div>
                </div>
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