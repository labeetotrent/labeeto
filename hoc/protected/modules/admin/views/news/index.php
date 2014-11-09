<div class="container-fluid">

<div class="row-fluid">
<div class="span12">

<div class="containerHeadline tableHeadline">
    <h2><?php echo Yii::t('global', 'News'); ?></h2>
    <form>
        <div class="input-append">
            <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('news/create') ?>'"><i class="icon-plus-sign" title="Create news"></i></span>
            <span class="add-on add-on-middle add-on-mini minimizeTable"><i class="icon-caret-down"></i></span>
            <span class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></span>
        </div>
    </form>

</div>

<div class="floatingBox table">
<div class="container-fluid">

    <?php
    $catNews    	    = NewsCategorys::getAllCategory();
    $active_news 	    = News::getActiveNews();
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'news-grid',
    'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'afterAjaxUpdate' => 'reinstallDatePicker',
    'columns'=>array(
        array(
            'name'=>'id',
            'value'=>'$data->id',
            'htmlOptions'=>array('style'=>'width:35px;')
        ),
        array(
            'name'=>'image',
            'header'=>Yii::t('global','Image'),
            'type' => 'raw',
            'filter'=>'',
            'value' => '$data->showAdminImage()',
            'htmlOptions'=>array('style'=>'width:80px;')
        ),
		'title',
        array(
            'name'=>'category_id',
            'header'=>Yii::t('global', 'Category'),
            'type' => 'raw',
            'filter'=>$catNews,
            'value' => '$data->getNewsCategory($data->category_id)',
            'htmlOptions'=>array('style'=>'width:100px;')
        ),
        //'pdf',
        array(
            'name'=>'is_active',
            'header'=>Yii::t('global','Home News'),
            'type' => 'raw',
            'filter'=>$active_news,
            'value' => '$data->getStatusNews($data->is_active)',
            'htmlOptions'=>array('style'=>'width:90px;')
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
		'pdf',
		'external_link',
		'video',
		'is_active'
		'updated',
		*/
    array(
        'class'=>'ButtonColumn',
        'template'=>'{view} {update} {delete}',
        'buttons'=>array
        (

        'view' => array
        (
        'label'=>'<span class="label cyan" ><i class="icon-info-sign info" title="'.Yii::t('adminlang', 'View news').'"></i></span>',
        'options' => array( 'class' => 'tipb view-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'View news'),
        'title'       => Yii::t('adminlang', 'View news'), ),
        ),
        'update' => array
        (
        'label'=>'<span class="label green" ><i class="icon-pencil edit" title="'.Yii::t('adminlang', 'Edit news').'"></i></span>',
        'options' => array( 'class' => 'tipb update-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'Edit news'),
        'title'       => Yii::t('adminlang', 'Edit news'), ),
        ),
        'delete' => array
        (
        'label'=>'<span class="label red" ><i class="icon-trash delete" title="'.Yii::t('adminlang', 'Delete news').'"></i></span>',
        'options' => array( 'class' => 'tipb delete-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'Delete news'),
        'title'       => Yii::t('adminlang', 'Delete news') , ),
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
<style>
    select{
        width: 150px !important;
    }
</style>