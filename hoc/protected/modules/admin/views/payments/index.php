<div class="page-header">
    <h1><?php echo Yii::t('global', 'Manage'); ?> 
    <small><?php echo Yii::t('global', 'Payments'); ?></small></h1>
</div>

<div class="row-fluid"><div class="span12">
<div class="head clearfix">
    <div class="isw-grid"></div>
    <h1><?php echo Yii::t('global', 'Payments'); ?></h1>
</div>
<div class="block-fluid table-sorting">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'payments-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'full_name',
		'card_number',
		'cvv_code',
		'expires_from',
        'expires_to',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
</div></div>