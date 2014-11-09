<div class="container-fluid">
    <div class="page-header">
        <h1><?php echo "<?php echo Yii::t('global', 'Update'); ?>"; ?>
            <small>
                <?php echo "<?php echo Yii::t('global', '".$this->modelClass."'); ?>".
                    "# <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?>        </small>
        </h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?></div>