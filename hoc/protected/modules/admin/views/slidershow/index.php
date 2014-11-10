<div class="container-fluid">

<div class="row-fluid">
<div class="span12">

<div class="containerHeadline tableHeadline">
    <h2><?php echo Yii::t('global', 'Slidershows'); ?></h2>
    <form>
        <div class="input-append">
            <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('slidershow/create') ?>'"><i class="icon-plus-sign" title="Create slidershow"></i></span>
            <span class="add-on add-on-middle add-on-mini minimizeTable"><i class="icon-caret-down"></i></span>
            <span class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></span>
        </div>
    </form>

</div>

<div class="floatingBox table">
<div class="container-fluid">

    <?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'slidershow-grid',
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
		'name',
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
		'rank',
		'updated',
		*/
    array(
        'class'=>'ButtonColumn',
        'template'=>'{view} {update} {delete} {up} {down}',
        'buttons'=>array
        (

        'view' => array
        (
        'label'=>'<span class="label cyan" ><i class="icon-info-sign info" title="'.Yii::t('adminlang', 'View').'"></i></span>',
        'options' => array( 'class' => 'tipb view-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'View'),
        'title'       => Yii::t('adminlang', 'View'), ),
        ),
        'update' => array
        (
        'label'=>'<span class="label green" ><i class="icon-pencil edit" title="'.Yii::t('adminlang', 'Edit').'"></i></span>',
        'options' => array( 'class' => 'tipb update-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'Edit'),
        'title'       => Yii::t('adminlang', 'Edit'), ),
        ),
        'delete' => array
        (
        'label'=>'<span class="label red" ><i class="icon-trash delete" title="'.Yii::t('adminlang', 'Delete').'"></i></span>',
        'options' => array( 'class' => 'tipb delete-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'Delete'),
        'title'       => Yii::t('adminlang', 'Delete') , ),
        ),
        'up' => array
        (
                'label'=>'<span class="label cyan" ><i class="icon-arrow-up delete" title="'.Yii::t('adminlang', 'Up').'"></i></span>',
                'options' => array( 'class' => 'tipb up-icon-tooltip',
                'data-original-title' => Yii::t('adminlang', 'Up'),
                'title'       => Yii::t('adminlang', 'Up') , ),
                'url'=>'$data->id',
                'click'=>'function(){
                            setUpBanner($(this).attr("href"));
                            return false;
                        }',
         ),
         'down' => array
         (
                'label'=>'<span class="label cyan" ><i class="icon-arrow-down delete" title="'.Yii::t('adminlang', 'Down').'"></i></span>',
                'options' => array( 'class' => 'tipb down-icon-tooltip',
                'data-original-title' => Yii::t('adminlang', 'Down'),
                'title'       => Yii::t('adminlang', 'Down') , ),
                'url'=>'$data->id',
                'click'=>'function(){
                            setDownBanner($(this).attr("href"));
                            return false;
                        }',
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
    $('.up-icon-tooltip').tooltip({
    });
    $('.down-icon-tooltip').tooltip({
    });
    function setUpBanner(id){
        $.get('/admin/slidershow/setUp?id='+id, function(html) {
            window.location.reload();
        });
    }
    function setDownBanner(id){
        $.get('/admin/slidershow/setDown?id='+id, function(html) {
            window.location.reload();
        });
    }
</script>
<style>
    #product-comments-grid_c1, .image-product .table.tablesorter th, .table.tablesorter th.button-column{
        width: 190px !important;
    }
</style>