
    <div class="row-fluid">

<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','Banners'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'banners-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                'enctype' => 'multipart/form-data',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'name'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>512, 'class'=>'span10', "data-required"=>"true")); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'position'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'position', Lookup::items('BannerPosition')); ?>
                    </div>
                </div>
                            <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'type'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'type', Lookup::items('BannerType'), array('empty' => Yii::t('global', '--- Please choose ---'))); ?>
                    </div>
                </div>

            <div class="control-group" id="image_flash_type" style="display: none;">
                <label for="fullname" class="control-label">
                    <?php echo Yii::t('banner','Name') ?>
                </label>
                <div class="controls">
                    <?php echo $form->fileField($model,'filename',array('size'=>60,'maxlength'=>512)); ?>
                    <?php echo $form->error($model,'filename'); ?>
                    <?php echo ($model->isNewRecord) ? '' : '<a class="see_demo" target="_blank" href="/"> '.Yii::t("global","See demo").' </a> ' ?>
                </div>
                <div class="controls">
                    <?php if ($model->filename && ($model->type == Banners::TYPE_IMAGE || $model->type == Banners::TYPE_FLASH)){
                        $source = Yii::app()->basePath."/../uploads/banner/$model->filename";
                        if (is_file($source)){
                            if ($model->type == Banners::TYPE_IMAGE):?>
                                <a class="fancybox" href="/uploads/banner/<?php echo $model->filename?>" rel="group">
                                    <img class="img-polaroid" src="/uploads/banner/<?php echo $model->filename?>" style="height:50px" />
                                </a>
                            <?php else:
                                list($width, $height) = getimagesize($source);
                                if ($height > 100){
                                    $scare = $height/100;
                                    $height = ceil($height/$scare);
                                    $width = ceil($width/$scare);
                                }

                                ?>
                                <object width="500px" height="<?php echo $height?>" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
                                        codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0">
                                    <param name="src" value="/uploads/banner/<?php echo $model->filename?>" />
                                    <embed src="/uploads/banner/<?php echo $model->filename?>" width="500px" height="<?php echo $height?>" />
                                </object>

                            <?php endif;
                        }
                    }?>
                </div>
            </div>

            <div class="control-group" id="content_type" style="display: none;">
                <label for="fullname" class="control-label">
                    <?php echo $form->labelEx($model,'content'); ?>
                </label>
                <div class="controls">
                    <?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'Banners[content]', 'value' => isset( $_POST['Banners']['content'] ) ? $_POST['Banners']['content'] : $model->content, 'editorTemplate' => 'full' )); ?>
                    <?php echo ($model->isNewRecord) ? '' : '<a class="see_demo" target="_blank" href="/"> '.Yii::t("global","See demo").' </a> ' ?>
                    <?php echo $form->error($model,'content'); ?>
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
                    <label for="fullname" class="control-label"><?php echo $form->labelEx($model,'link'); ?>
</label>
                    <div class="controls">
                        <?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>512, 'class'=>'span10')); ?>
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
    <script type="text/javascript">
            jQuery('#image_flash_type').hide();
            jQuery('#content_type').hide();
            jQuery('#Banners_type').change(function(){
                if (this.value == <?php echo Banners::TYPE_FLASH?> || this.value == <?php echo Banners::TYPE_IMAGE?>){
                    jQuery('#image_flash_type').show();
                    jQuery('#content_type').hide();
                }
                else if( this.value == <?php echo Banners::TYPE_CONTENT; ?>  ){
                    jQuery('#image_flash_type').hide();
                    jQuery('#content_type').show();
                }
                else{
                    jQuery('#image_flash_type').hide();
                    jQuery('#content_type').hide();
                }
            })
            <?php if ($model->id):?>
            jQuery('#Banners_type').change();
            <?php endif;?>
    </script>