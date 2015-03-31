<style>
    .filters select{
        width: 150px;
    }
</style>
<div class="container-fluid">

<div class="row-fluid">
<div class="span12">

<div class="containerHeadline tableHeadline">
    <h2><?php echo Yii::t('global', 'Save Searches'); ?></h2>
    <form>
        <div class="input-append">
            <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('saveSearch/create') ?>'"><i class="icon-plus-sign" title="<?php echo Yii::t('adminlang', 'Create'); ?>" ></i></span>
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
                'mGridId' => 'user-grid',
                'mPageSize' => @$_GET['pageSize'],
                'mDefPageSize' => Yii::app()->params['defaultPageSize'],
                'mPageSizeOptions'=>Yii::app()->params['pageSizeOptions'],
            ));
            ?>
    </div><div class="span5"></div></div>
    <?php 
    $active_user   = CHtml::listData (User::model()->findAll(),'id','username');
    $active_edu    = CHtml::listData (Education::model()->findAll(),'id','name');
    $active_ethi   = CHtml::listData (Ethnicity::model()->findAll(),'id','name');
    $action_religi = CHtml::listData (Religion::model()->findAll(),'id','name');
    $active_child  = CHtml::listData (Children::model()->findAll(),'id','name');
    $gender        = Lookup::items('Gender');
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'save-search-grid',
    'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
    'dataProvider'=>$model->search(),
    'afterAjaxUpdate' => 'reinstallDatePicker',
    'filter'=>$model,
    'columns'=>array(
        array(
            'name'=>'id',
            'value'=>'$data->id',
            'htmlOptions'=>array('style'=>'width:35px;')
        ),
        array(
            
            'header'=>Yii::t('global','User'),
            'name'=>'user_id',
            'filter'=>$active_user,
            'value' => '$data->getUser($data->user_id)',
            'htmlOptions'=>array('style'=>'width:50px;')
        
        ),
    	array(
            'header'=>Yii::t('global','Username'),
            'name'=>'username',
            'value'=>'$data->username',
            'htmlOptions'=>array('style'=>'width:100px;')
        ),	
		
		array(
            'header'=>Yii::t('global','Gender'),
            'name'=>'gender',
            'type' => 'raw',
            'filter'=>$gender,
            'value' => '$data->checkGenderUser()',
            'htmlOptions'=>array('style'=>'width:35px;')
        
        ),  
		
        array(
            'header'=>Yii::t('global','Age From'),
            'name'=>'age_from',
            'value'=>'$data->age_from',
            'htmlOptions'=>array('style'=>'width:50px;')
        ),
        array(
            'header'=>Yii::t('global','Age To'),
            'name'=>'age_to',
            'value'=>'$data->age_to',
            'htmlOptions'=>array('style'=>'width:70px;')
        ),
        array(
            'header'=>Yii::t('global','Education'),
            'name'=>'age_from',
            'value'=>'$data->getEducation($data->education)',
            'filter'=>$active_edu,
            'htmlOptions'=>array('style'=>'width:70px;')
        ),

        array(
            'header'=>Yii::t('global','Ehtnicity'),
            'name'=>'age_from',
            'value'=>'$data->getEthnicty($data->ehtnicity)',
            'filter'=>$active_ethi,
            'htmlOptions'=>array('style'=>'width:50px;')
        ),

        /*array(
            'header'=>Yii::t('global','Religion'),
            'name'=>'age_from',
            'value'=>'$data->age_from',
            'filter'=>$action_religi,
            'htmlOptions'=>array('style'=>'width:50px;')
        ),

        array(
            'header'=>Yii::t('global','Children'),
            'name'=>'age_from',
            'value'=>'$data->age_from',
            'filter'=>$active_child,
            'htmlOptions'=>array('style'=>'width:50px;')
        ),*/

		
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
		'within_from',
		'within_to',
		'height_from',
		'height_to',
		'education',
		'ehtnicity',
		'religion',
		'children',
		'excercise',
		'drink',
		'smoke',
		'is_online',
		'verified',
		'created',
		'updated',
		*/
    array(
        'class'=>'ButtonColumn',
        'header' => Yii::t('global','Actions'),
        'template'=>'{view} {update} {delete}',
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