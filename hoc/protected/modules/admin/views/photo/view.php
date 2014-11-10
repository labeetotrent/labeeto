
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'Photo'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'Photo'); ?> </h2>
                <form class="header-tab-view not-bor">
                    <div class="input-append">
                        <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('photo/update?id='.$model->id) ?>'"><i class="icon-edit" title="<?php echo Yii::t('adminlang', 'Edit'); ?>"></i></span>
                        <div class="add-on add-on-middle add-on-mini minimizeTable "><i class="icon-caret-down"></i></div>
                        <div class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></div>
                    </div>
                </form>
                
                
            </div>
            <div class="floatingBox table table-view-user">
                <div class="container-fluid">
                    <?php $this->widget('zii.widgets.CDetailView', array(
                    'htmlOptions' => array('class' => 'table-hover', 'style'=>'width:100% !important;'),
                    'data'=>$model,
                    'attributes'=>array(
                        array('name'=>'id'),
                        array(
                            'name' => 'photo',
                            'cssClass' => 'fix-null-img',
                            'type' => 'raw',
                            'value' => '<a class="fancybox" href="/uploads/photo/' . $model->photo . '" rel="group"><img class="img-polaroid fix_image_products" src="/uploads/photo/' . $model->photo . '" style="height: 120px;"></a>'
                        ),
                        array(
                            'name'=>'is_public',
                            'value'=>Photo::model()->getPublic($model->is_public),
                        ),
                        array(
                            'name'=>'user_id',
                            'value'=>User::model()->getUser($model->user_id)
                        ),
                        array('name'=>'date'),
                        array(
                            'name'=>'is_approval',
                            'value'=>Photo::model()->getApproval($model->is_approval),
                        ),
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