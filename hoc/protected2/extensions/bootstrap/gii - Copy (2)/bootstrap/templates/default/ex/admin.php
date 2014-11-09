
<?php
$this->widget(
	'booster.widgets.TbBreadcrumbs',
	array(
		'homeLink' => 'Home',
		'links' => array(
			'All Topicfacts' => $this->createUrl('admin')
		)
	)
);
?>
<h1 class="crudTitle"> MANAGE TOPICFACTS </h1>
<a class="create" href="<?php echo $this->createUrl('topicfacts/create') ?>"><i class="fa fa-plus-square"></i>Create A New Topic Facts</a>
   
<?php 
	$this->widget(
		'booster.widgets.TbExtendedGridView',
		array(
			'id'=>'topic-facts-grid',
			'dataProvider' => $model->search(),
			'filter'=>$model,
			'template' => "{items}{summary}",
			'enablePagination' => true,
			'bulkActions' => array(
				'actionButtons' => array(
					array(
						'buttonType' => 'button',
						'context' => 'danger',
						'size' => 'small',
						'label' => 'Delete',
						'click' => 'js:function(values){
							console.log(values);
						}',
						'htmlOptions'=>array('class'=>'preIcon del'),
						'id'=>'delete'
					),
					array(
						'buttonType' => 'button',
						'context' => 'primary',
						'size' => 'small',
						'label' => 'Publish',
						'click' => 'js:function(values){
							console.log(values);
						}',
						'htmlOptions'=>array('class'=>'preIcon pub'),
						'id'=>'publish'
					)
				),
				'checkBoxColumnConfig' => array(
					'name' => 'id'
				),
			),
			'columns' => array(
				'id',
				'topic_id',
				'subtopic_id',
				'who_id',
				'century',
				'year',
				array(
					'class'=>'booster.widgets.TbButtonColumn',
				),
			),
			'htmlOptions'=>array(
				'class'=>'stdTable'
			)
		)
	);
?>
