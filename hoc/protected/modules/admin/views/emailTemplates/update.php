<div class="container-fluid">
    <div class="page-header">
        <h1><?php echo Yii::t('global', 'Update'); ?>            <small>
                <?php echo Yii::t('global', 'EmailTemplates'); ?># <?php echo $model->id; ?>        </small>
        </h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>