
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1>View <small>
       <small><?php echo Yii::t('global', 'Banners'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'Banners'); ?> </h2>
                <form class="header-tab-view not-bor">
                    <div class="input-append">
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

                        array('name'=>'name'),
                        array(
                            'name'=>'position',
                            'value'=>Lookup::item("BannerPosition", $model->position)
                        ),
                        array(
                            'name'=>'type',
                            'value'=>Lookup::item("BannerType", $model->type)
                        ),
                        array(
                            'name'=>'is_active',
                            'value'=>($model->is_active=="1")?Yii::t("global", "Yes"):Yii::t("global", "No")
                        ),
                        array(
                            'name'=>'content',
                            'label'=>Yii::t('global','Image'),
                            'value'=>Banners::model()->getDataType( $model->type, $model->filename ) ,
                            'cssClass'=>'fix-null',
                            'type' => 'raw'
                        ),
                        array(
                            'name'=>'link',
                            'value'=>$model->link,
                            'cssClass'=>'fix-null'
                        ),
                        array(
                            'name'=>'created',
                            'value'=>$model->created,
                            'cssClass'=>'fix-null'
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