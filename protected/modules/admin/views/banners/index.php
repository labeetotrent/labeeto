<div class="container-fluid">

<div class="row-fluid">
<div class="span12">

<div class="containerHeadline tableHeadline">
    <h2><?php echo Yii::t('global', 'Banners'); ?></h2>
    <form>
        <div class="input-append">
            <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('banners/create') ?>'"><i class="icon-plus-sign" title="Create banners"></i></span>
            <span class="add-on add-on-middle add-on-mini minimizeTable"><i class="icon-caret-down"></i></span>
            <span class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></span>
        </div>
    </form>

</div>

<div class="floatingBox table">
<div class="container-fluid">
    <div class="row-fluid"><div class="span7">
            <?php
            $this->widget('application.extensions.PageSize.PageSize', array(
                'mGridId' => 'banners-grid',
                'mPageSize' => @$_GET['pageSize'],
                'mDefPageSize' => Yii::app()->params['defaultPageSize'],
                'mPageSizeOptions'=>Yii::app()->params['pageSizeOptions'],
            ));
            ?>
        </div><div class="span5"></div></div>
    <?php
    $BannerPosition = Lookup::items('BannerPosition');
    $BannerType = Lookup::items('BannerType');
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'banners-grid',
    'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'afterAjaxUpdate' => 'reinstallDatePicker',
    'columns'=>array(
    		'id',
		'name',
        array(
            'name'=>'position',
            'filter'=>$BannerPosition,
            'value' => 'Lookup::item("BannerPosition", $data->position)'
        ),
        array(
            'name'=>'type',
            'filter'=>$BannerType,
            'value' => 'Lookup::item("BannerType", $data->type)'
        ),
        array(
            'name'=>'is_active',
            'filter'=>array('1'=>Yii::t('global', 'Yes'),'0'=>Yii::t('global', 'No')),
            'value'=>'($data->is_active=="1")?Yii::t("global", "Yes"):Yii::t("global", "No")'
        ),
        array(
            'name' => 'created',
            'header'=>Yii::t('global', 'Created'),
            'htmlOptions'=> array('style' => 'text-align: center; width:135px;'),
            'filter' => $this->widget('CJuiDateTimePicker', array(
                        'model'=>$model,
                        'attribute'=>'created',
                        'mode'=>'date',
                        'options'=>array("dateFormat"=>Yii::app()->locale->getDateFormat('medium_js'), 'ampm' => false),
                        'language' => Yii::app()->language=='en'?'':Yii::app()->language,
                        'htmlOptions' => array(
                            'id' => 'datepicker_for_due_date',
                            'size' => '10',
                            'style' => 'text-align: center'
                        ),
                    ),
                    true)
        ),

        /*
        'content',
        'link',

        'is_login',
        'is_logout',
        'rank',
        */
    array(
        'class'=>'ButtonColumn',
        'template'=>'{view} {update} {delete}',
        'buttons'=>array
        (

        'view' => array
        (
        'label'=>'<span class="label cyan" ><i class="icon-info-sign info" title="'.Yii::t('adminlang', 'View banners').'"></i></span>',
        'options' => array( 'class' => 'tipb view-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'View banners'),
        'title'       => Yii::t('adminlang', 'View banners'), ),
        ),
        'update' => array
        (
        'label'=>'<span class="label green" ><i class="icon-pencil edit" title="'.Yii::t('adminlang', 'Edit banners').'"></i></span>',
        'options' => array( 'class' => 'tipb update-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'Edit banners'),
        'title'       => Yii::t('adminlang', 'Edit banners'), ),
        ),
        'delete' => array
        (
        'label'=>'<span class="label red" ><i class="icon-trash delete" title="'.Yii::t('adminlang', 'Delete banners').'"></i></span>',
        'options' => array( 'class' => 'tipb delete-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'Delete banners'),
        'title'       => Yii::t('adminlang', 'Delete banners') , ),
    ),
        ),
    ),
    ),
    )); ?>


</div>
</div>

</div>
</div>

</div>
<script>
    $('.update-icon-tooltip').tooltip({
    });
    $('.view-icon-tooltip').tooltip({
    });
    $('.delete-icon-tooltip').tooltip({
    });

</script>