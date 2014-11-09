<h1 class="crudTitle"> MANAGE TOPICFACTS </h1>
<?php
$this->widget(
	'booster.widgets.TbBreadcrumbs',
	array(
		'homeLink' => 'Home',
		'links' => array(
			'All Topicfacts' => $this->createUrl('admin'),
			'View'
		)		
	)
);
?>

<a class="create" href="<?php echo $this->createUrl('topicfacts/create') ?>">
	<i class="fa fa-plus-square"></i>Create A New Topic Facts
</a>

<?php
	$this->widget(
		'booster.widgets.TbEditableDetailView',
		array(
			'id'   => 'topicfacts-details',
			'data' => $model,
			'url'  =>'#',
			'attributes' => array(
				'id',
				'topic_id',
				'subtopic_id',
				'who_id',
				'century',
				'year',
				'month',
				'date',
				'continent_id',
				'country_id',
				'region_id',
				//'created',
				//'modified',
				'created_by',
				'modified_by',
			)
		)
	);
?>