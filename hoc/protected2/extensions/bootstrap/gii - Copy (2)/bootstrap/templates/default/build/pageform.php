<?php $nameurl = strtolower(str_replace('-', '', $this->class2id($this->modelClass))) ?>
<?php echo '<?php;' ?>

if($model->isNewRecord){
	$submit = 'Create';
	$heading = 'Create a New <?php echo $this->modelClass; ?> ';
}else{
	$submit = 'Save';
	$heading = "Update a <?php echo $this->modelClass; ?> #".$model->id;
}
?>

<?php echo '<?php' ?>
$this->widget(
	'booster.widgets.TbBreadcrumbs',
	array(
		'homeLink' => 'Home',
		'links' => array(
			'All <?php echo $this->modelClass; ?>' => $this->createUrl('admin'),
			'<?php echo $this->modelClass; ?>'
		)
	)
);?>

<?php echo '<?php' ?> if(!$model->isNewRecord):?>
	<a class="create" href="<?php echo '<?php' ?> echo $this->createUrl('<?php echo $nameurl ?>/create') ?>">
		<i class="fa fa-plus-square"></i>Create A New <?php echo $this->modelClass; ?>
	</a>
<?php echo '<?php' ?> endif ?>

<div class="form">
	
<?php echo '<?php' ?>
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => '<?php echo $this->class2id($this->modelClass); ?>-form',
		'type' => 'horizontal',
		'htmlOptions' => array('class' => 'well stdAdminForm'),
	)
); ?>

<h1 class="crudTitle"><?php echo '<?php' ?> echo $heading ?></h1>

<?php foreach ($this->tableSchema->columns as $column):
	if ($column->autoIncrement) {
		continue;
	}
	?>
	<?php echo "<?php echo " . $this->generateActiveGroup($this->modelClass, $column) . "; ?>\n"; ?>

<?php endforeach ?>

<?php echo '<?php' ?>
echo '<div class="btnPanel">';
$this->widget('booster.widgets.TbButton',array(
	'buttonType' => 'submit',
	'label' => $submit,
	'htmlOptions'=>array('class'=>'btn-primary')
));
echo '</div>';
$this->endWidget();
unset($form);
?>
</form>