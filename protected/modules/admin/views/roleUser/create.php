
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important;">
        <h1>
            <?php echo Yii::t('global', 'Create'); ?>            <small><?php echo Yii::t('global', 'RoleUser'); ?></small>
        </h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?></div>