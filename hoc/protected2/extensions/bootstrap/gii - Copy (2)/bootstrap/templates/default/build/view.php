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

<?php echo '<?php' ?>s
	$this->widget(
		'booster.widgets.TbEditableDetailView',
		array(
			'id'   => 'topicfacts-details',
			'data' => $model,
			'url'  =>'#',
			'attributes' => array(
				<?php
				$count = 0;
				foreach ($this->tableSchema->columns as $column) {
					if (++$count == 7) {
						echo "\t\t\t\t/*\n";
					}
					echo "\t\t\t\t'" . $column->name . "',\n";
				}
				if ($count >= 7) {
					echo "\t\t\t\t*/\n";
				}
				?>
			)
		)
	);
?>