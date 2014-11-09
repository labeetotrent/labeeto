<?php $nameurl = strtolower(str_replace('-', '', $this->class2id($this->modelClass))) ?>
<h1 class="crudTitle"> View <?php echo $this->modelClass; ?> at #<?php echo '<?php '?>echo $model->id ?> </h1>
<?php echo '<?php' ?>

$this->widget(
	'booster.widgets.TbBreadcrumbs',
	array(
		'homeLink' => 'Home',
		'links' => array(
			'All <?php echo $this->modelClass; ?>' => $this->createUrl('admin'),
			'View'
		)		
	)
);
?>

<a class="create" href="<?php echo '<?php' ?> echo $this->createUrl('<?php echo $nameurl ?>/create') ?>">
	<i class="fa fa-plus-square"></i>Create A New <?php echo $this->modelClass; ?>

</a>

<?php echo '<?php' ?>

	$this->widget(
		'booster.widgets.TbEditableDetailView',
		array(
			'id'   => '<?php echo $this->class2id($this->modelClass); ?>-details',
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