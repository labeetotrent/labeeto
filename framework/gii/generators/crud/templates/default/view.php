
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php echo "<?php  echo Yii::t('global','View'); ?>"; ?> <small>
       <small><?php echo "<?php echo Yii::t('global', '".$this->modelClass."'); ?> #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo "<?php echo Yii::t('global', '".$this->modelClass."'); ?> "; ?></h2>
                <form class="header-tab-view not-bor">
                    <div class="input-append">
                        <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo "<?php echo \$this->createUrl('".$this->class2id($this->modelClass)."/update?id='.\$model->".$this->tableSchema->primaryKey.") ?>" ?>'"><i class="icon-edit" title="<?php echo "<?php echo Yii::t('adminlang', 'Edit'); ?>"; ?>"></i></span>
                        <div class="add-on add-on-middle add-on-mini minimizeTable "><i class="icon-caret-down"></i></div>
                        <div class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></div>
                    </div>
                </form>
            </div>
            <div class="floatingBox table table-view-user">
                <div class="container-fluid">
                    <?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
                    'htmlOptions' => array('class' => 'table-hover', 'style'=>'width:100% !important;'),
                    'data'=>$model,
                    'attributes'=>array(
                    <?php
                    foreach($this->tableSchema->columns as $column)
                        echo "array('name'=>'".$column->name."'),\n";
                    ?>
                    ),
                    )); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .content{
        font-size: 14px !important;
    }
</style>