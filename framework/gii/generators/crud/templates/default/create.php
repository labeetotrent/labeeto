<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>

<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important;">
        <h1>
            <?php echo "<?php echo Yii::t('global', 'Create'); ?>"; ?>
            <small><?php echo "<?php echo Yii::t('global', '".$this->modelClass."'); ?>" ?></small>
        </h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
</div>