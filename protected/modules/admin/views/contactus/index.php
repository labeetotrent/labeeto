<div class="container-fluid">

<div class="row-fluid">
<div class="span12">

<div class="containerHeadline tableHeadline">
    <h2><?php echo Yii::t('global', 'Contactuses'); ?></h2>
    <form>
        <div class="input-append">
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
            'mGridId' => 'contactus-grid',
            'mPageSize' => @$_GET['pageSize'],
            'mDefPageSize' => Yii::app()->params['defaultPageSize'],
            'mPageSizeOptions'=>Yii::app()->params['pageSizeOptions'],
        ));
        ?>
    </div><div class="span5"></div></div>
    <?php
    $active_contact = Contactus::getActiveContact();
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'contactus-grid',
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
            'name'=>'name',
            'value'=>'$data->getDataByStatus($data->name)',
            'type'=>'raw',
        ),
        array(
            'name'=>'email',
            'value'=>'$data->getDataByStatus($data->email)',
            'type'=>'raw',
        ),
        array(
            'name'=>'subject',
            'value'=>'$data->getDataByStatus($data->subject)',
            'type'=>'raw',
        ),
		array(
            'name'=>'sread',
            'header' => Yii::t('global','Status'),
            'value'=>'$data->getStatus()',
            'filter'=> $active_contact,
            'type'=>'html',
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
		'created',
		'updated',
		*/
    array(
        'class'=>'ButtonColumn',
        'template'=>'{view} {update} {delete}',
        'buttons'=>array
        (

        'view' => array
        (
        'label'=>'<span class="label cyan" ><i class="icon-info-sign info" title="'.Yii::t('adminlang', 'View contactus').'"></i></span>',
        'options' => array( 'class' => 'tipb view-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'View contactus'),
        'title'       => Yii::t('adminlang', 'View contactus'), ),
        ),
        'update' => array
        (
        'label'=>'<span class="label green" ><i class="icon-pencil edit" title="'.Yii::t('adminlang', 'Edit contactus').'"></i></span>',
        'options' => array( 'class' => 'tipb update-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'Edit contactus'),
        'title'       => Yii::t('adminlang', 'Edit contactus'), ),
        ),
        'delete' => array
        (
        'label'=>'<span class="label red" ><i class="icon-trash delete" title="'.Yii::t('adminlang', 'Delete contactus').'"></i></span>',
        'options' => array( 'class' => 'tipb delete-icon-tooltip',
        'data-original-title' => Yii::t('adminlang', 'Delete contactus'),
        'title'       => Yii::t('adminlang', 'Delete contactus') , ),
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
        width: 110px !important;
    }
</style>