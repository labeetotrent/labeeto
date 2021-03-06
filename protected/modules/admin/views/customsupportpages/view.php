<div class="page-header">
    <h1><?php echo Yii::t('global', 'View'); ?> 
    <small><?php echo Yii::t('global', 'Custom Support Pages'); ?> #<?php echo $model->id; ?></small></h1>
</div>

<div class="row-fluid">
<div class="span12">
    <div class="head clearfix">
        <div class="isw-grid"></div>
        <h1><?php echo Yii::t('global', 'Custom Support Pages'); ?> #<?php echo $model->id; ?></small></h1>
        <ul class="buttons">
            <li><a class="isw-left tipb" href="javascript: history.back()" data-original-title="<?php echo Yii::t('global','Back')?>"></a></li>
        </ul> 
    </div>
    
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'alias',
		array(
            'name' => 'content',
            'type' => 'raw',
            'value'=> $model->content,
        ),
		array(
            'name'=>'dateposted',
            'label'=>Yii::t('global','Date Posted'),
        ),
		'authorid',
		array(
            'name'=>'last_edited_date',
            'label'=>Yii::t('global','Last Edited Date'),
        ),
        array(
            'name'=>'last_edited_author',
            'label'=>Yii::t('global','Last Edited Author'),
        ),
		array('name'=>'tags','cssClass'=>'fix-null'),
		'language',
        array('name'=>'metadesc','cssClass'=>'fix-null'),
        array('name'=>'metakeys','cssClass'=>'fix-null'),
        array('name'=>'visible','cssClass'=>'fix-null'),
        array('name'=>'status','cssClass'=>'fix-null'),
	),
)); ?>


</div>
</div>