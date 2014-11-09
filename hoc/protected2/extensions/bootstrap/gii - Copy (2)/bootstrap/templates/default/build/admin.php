<?php $label = $this->pluralize($this->class2name($this->modelClass)); ?>
<?php echo "<?php"; ?> 
$this->widget(
	'booster.widgets.TbBreadcrumbs',
	array(
		'homeLink' => 'Home',
		'links' => array(
			'All <?php echo $this->modelClass; ?>' => $this->createUrl('admin'),
			'admin'
		)
	)
); ?>
<?php $url = '<?php echo $this->createUrl(\''.$this->class2id($this->modelClass).'/create\') ?>' ?>
<h1 class="crudTitle">Manage <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>
<a class="create" href="<?php echo $url ?>" >
	<i class="fa fa-plus-square"></i>Create A New <?php echo $this->pluralize($this->class2name($this->modelClass)); ?>
</a>
   
<?php echo "<?php"; ?>  
	$this->widget(
		'booster.widgets.TbExtendedGridView',
		array(
			'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
			'dataProvider' => $model->search(),
			'filter'=>$model,
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
