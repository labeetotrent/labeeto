<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>

    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo "<?php echo Yii::t('global','".$this->class2id($this->modelClass)."'); ?>"; ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
                    'id'=>'".$this->class2id($this->modelClass)."-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>\n"; ?>

            <?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>
            <?php
            foreach($this->tableSchema->columns as $column)
            {
                if($column->isPrimaryKey)
                    continue;
            ?>
                <div class="control-group">
                    <label for="fullname" class="control-label"><?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n"; ?></label>
                    <div class="controls">
                        <?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
                    </div>
                </div>
            <?php } ?>
                <div class="control-group">
                    <div class="controls">
                        <?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'), array('class'=>'btn btn-primary')); ?>\n"; ?>
                        <button class="btn" type="reset"><?php echo "<?php echo Yii::t('global','Reset'); ?>"; ?></button>
                    </div>
                </div>
            <?php echo "<?php \$this->endWidget(); ?>\n"; ?>
        </div>
    </div>

</div>
    </div>