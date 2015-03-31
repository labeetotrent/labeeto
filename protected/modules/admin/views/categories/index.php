<div class="container-fluid">

<div class="row-fluid">
<div class="span12">

<div class="containerHeadline tableHeadline">
    <h2><?php echo Yii::t('global', 'Categories'); ?></h2>
    <form>
        <div class="input-append">
            <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('categories/create') ?>'"><i class="icon-plus-sign"></i></span>
            <span class="add-on add-on-middle add-on-mini minimizeTable"><i class="icon-caret-down"></i></span>
            <span class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></span>
        </div>
    </form>

</div>

<div class="floatingBox table">
<div class="container-fluid">

    <?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'categories-grid',
    'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
    'dataProvider'=>$model->search(),
    'afterAjaxUpdate' => 'reinstalltoltipactions',
    'filter'=>$model,
    'columns'=>array(
    	'id',
		'name',
        array(
            'header' => Yii::t('global', 'Parent'),
            'name' => 'parent.name'
        ),
		'alias',
        array(
        'class'=>'ButtonColumn',
        'header' => 'Actions',
        'template'=>'{view} {update} {delete}',
        'buttons'=>array
        (

        'view' => array
        (
        'label'=>'<span class="label cyan" ><i class="icon-info-sign info"></i></span>',
        'options' => array( 'class' => 'tipb view-icon-tooltip',
        'data-original-title' => 'View categories',
        'title'       => 'View categories', ),
        ),
        'update' => array
        (
        'label'=>'<span class="label green" ><i class="icon-pencil edit"></i></span>',
        'options' => array( 'class' => 'tipb update-icon-tooltip',
        'data-original-title' => 'Edit categories',
        'title'       => 'Edit categories', ),
        ),
        'delete' => array
        (
        'visible'=>'$data->checkCategory($data->id)',
        'label'=>'<span class="label red" ><i class="icon-trash delete"></i></span>',
        'options' => array( 'class' => 'tipb delete-icon-tooltip',
        'data-original-title' => 'Delete categories',
        'title'       => 'Delete categories', ),
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
<?php
    Yii::app()->clientScript->registerScript('re-install-toltip-actions', "

        reinstalltoltipactions();
        
        function reinstalltoltipactions(){            
            jQuery('.update-icon-tooltip').tooltip({
                title: 'Edit categories'
            });
            jQuery('.view-icon-tooltip').tooltip({
                title: 'View categories'
            });
            jQuery('.delete-icon-tooltip').tooltip({
                title: 'Delete categories'
            });
        }
    ");
?>
