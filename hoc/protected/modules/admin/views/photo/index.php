<div class="container-fluid">

<div class="row-fluid">
<div class="span12">

<div class="containerHeadline tableHeadline">
    <h2><?php echo Yii::t('global', 'Photos'); ?></h2>
    <form>
        <div class="input-append">
            <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('photo/create') ?>'"><i class="icon-plus-sign" title="<?php echo Yii::t('adminlang', 'Create'); ?>" ></i></span>
            <span class="add-on add-on-middle add-on-mini minimizeTable"><i class="icon-caret-down"></i></span>
            <span class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></span>
        </div>
    </form>
    <form class="header-tab-view not-bor" action="/admin/photo/approval">
        <button type="submit">Approval all photo</button>
    </form>
</div>

<div class="floatingBox table">
<div class="container-fluid">
    <div class="row-fluid"><div class="span7">
            <?php
            $this->widget('application.extensions.PageSize.PageSize', array(
                'mGridId' => 'photo-grid',
                'mPageSize' => @$_GET['pageSize'],
                'mDefPageSize' => Yii::app()->params['defaultPageSize'],
                'mPageSizeOptions'=>Yii::app()->params['pageSizeOptions'],
            ));
            ?>
        </div><div class="span5"></div></div>
<form action="/admin/photo" method="post">	
    <?php
    $active_user = CHtml::listData(User::model()->findAll(),'id','username'); 
    $public = Photo::getPublicStatus();
    $approval = Photo::getApprovalStatus();
    $alluser = User::model()->getAllUser();
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'photo-grid',
    'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
    'dataProvider'=>$model->search(),
    'afterAjaxUpdate' => 'reinstallDatePicker',
    'filter'=>$model,
    'columns'=>array(
        array(
             'header'=>'Check',
            'class'=>'CDataColumn',
            'type'=>'raw',
            'htmlOptions'=>array('style'=>'text-align:center'),
            'value' => 'CHtml::checkBox("record[$data->id]", $data->id, array("value"=>$data->id,"id"=>"record_".$data->id))',
        ),
        array(
            'name'=> 'photo',
            'header'=> Yii::t('global', 'Photo'),
            'value'=> '$data->showAdminPhoto()',
            'type' => 'raw',
            'filter' => false,
        ),
        array(
            'name'=> 'is_public',
            'header'=> Yii::t('global', 'Public'),
            'value'=> '$data->getPublic($data->is_public)',
            'type' => 'raw',
            'filter' => $public,
        ),
        array(
            'name'=> 'user_id',
            'header'=> Yii::t('global', 'User'),
            'value'=> 'User::model()->getUser($data->user_id)',
            'type' => 'raw',
            'filter' =>$active_user ,
        ),
        array(
            'name' => 'date',
            'header'=>Yii::t('global', 'Date'),
            'htmlOptions'=> array('style' => 'text-align: center; width:135px;'),
            'filter' => $this->widget('CJuiDateTimePicker', array(
                        'model'=>$model,
                        'attribute'=>'date',
                        'mode'=>'date',
                        'options'=>array("dateFormat"=>Yii::app()->locale->getDateFormat('medium_js'), 'ampm' => false),
                        'language' => Yii::app()->language=='en'?'':Yii::app()->language,
                        'htmlOptions' => array(
                            'id' => 'datepicker_for_due_date_last',
                            'size' => '10',
                            'style' => 'text-align: center'
                        ),
                    ),
                    true)
        ),
        array(
            'name'=> 'is_approval',
            'header'=> Yii::t('global', 'Approval'),
            'value'=> '$data->getApproval($data->is_approval)',
            'type' => 'raw',
            'filter' => $approval,
        ),
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

<div class="footer tar">
		<select name="bulkoperations" style="margin-top: 7px;">
			<option value=""><?php echo Yii::t('global', '-- Choose Action --'); ?></option>
			<option value="bulkdelete"><?php echo Yii::t('global', 'Delete Selected'); ?></option>
            <option value="bulkapproval"><?php echo Yii::t('global', 'Approval Selected'); ?></option>
            <option value="bulkunapproval"><?php echo Yii::t('global', 'Un Approval Selected'); ?></option>
		</select>
		<?php echo CHtml::submitButton( Yii::t('global', 'Apply'), array( 'confirm' => Yii::t('global', 'Are you sure you would like to perform a bulk operation?'), 'class'=>'btn')); ?>
</div>
</form>
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