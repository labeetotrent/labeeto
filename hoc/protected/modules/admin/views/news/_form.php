
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','News'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'news-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'enctype' => 'multipart/form-data',
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'title'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'description'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'News[description]', 'value' => isset($model->description) ? $model->description : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'grip'); ?>
</label>
                    <div class="controls">
                        <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'News[grip]', 'value' => isset($model->grip) ? $model->grip : '', 'editorTemplate' => 'full' )); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'image'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->fileField($model,'image'); ?>
                        <?php echo $form->error($model,'image'); ?>
                        <?php if ($model->image):?>
                            <div style="margin:10px;"><a class="fancybox" <?php echo 'href="/uploads/news/'.$model->image.'"'?> rel="group">
                                    <img class="img-polaroid" <?php echo 'src="/uploads/news/'.$model->image.'"'?> style="height: 65px;"/>
                                </a></div>
                        <?php endif;?>
                     </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'category_id'); ?>
</label>
                    <div class="controls">
                        <?php
                        $listCategories  = CHtml::listData(NewsCategorys::model()->findAll('parent_id != 0'),'id','name');
                        echo $form->dropDownList($model,'category_id', $listCategories);
                        ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'pdf'); ?>
</label>
                    <div class="controls">
                        <?php
                        echo $form->fileField($model,'pdf');

                        $lenghtNum = 20;
                        $pdfLeght 	= strlen($model->pdf);
                        if($pdfLeght>$lenghtNum){
                            $pdfStart 	= $pdfLeght - $lenghtNum;
                            $pdfName 	= substr( $model->pdf , $pdfStart, $lenghtNum);
                            $pdfName 	= '... '.$pdfName;
                        }
                        else{
                            $pdfName = $model->pdf;
                        }

                        if($model->pdf):
                            echo "<a style='padding-left:20px;color:#616161;' href='/uploads/news/pdf/".$model->pdf."' >".$pdfName."</a>";
                        endif;
                        ?>
                    </div>
                </div>
            <div class="control-group">
                <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'is_active'); ?>
                </label>
                <div class="controls">
                    <?php echo $form->checkBox($model,'is_active'); ?>
                </div>
            </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'external_link'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'external_link',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'video'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'video',array('size'=>60,'maxlength'=>255, 'class'=>'span10')); ?>
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