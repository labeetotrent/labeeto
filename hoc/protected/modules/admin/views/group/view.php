<div class="page-header">
    <h1><?php echo Yii::t('global', 'View'); ?> 
    <small><?php echo Yii::t('global', 'Group'); ?> #<?php echo $model->id; ?></small></h1>
</div>

<div class="row-fluid">
<div class="span12">
    <div class="head clearfix">
        <div class="isw-grid"></div>
        <h1><?php echo Yii::t('global', 'Group'); ?> #<?php echo $model->id; ?></small></h1>
        <ul class="buttons">
            <li><a class="isw-left tipb" href="javascript: history.back()" data-original-title="Back"></a></li>
        </ul> 
    </div>
    
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		array(
            'name'=>'product_name',
            'value'=>CHtml::link($model->product->id.' - '.$model->product->name,array('/admin/products/view',"id"=>$model->product->id)),
            'type'=>'raw'
        ),
		'group_name',
        'alias',
		'description',
		'created',
		'updated',
	),
)); ?>


</div>
</div>