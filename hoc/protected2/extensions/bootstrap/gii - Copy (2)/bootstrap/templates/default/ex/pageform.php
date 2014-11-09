<?php
//switch create|update
if($model->isNewRecord){
	$submit = 'Create';
	$heading = "Create a New Topic_facts ";
}else{
	$submit = 'Save';
	$heading = "Update a Topic_facts 'name' ";
}
?>


<?php
$this->widget(
	'booster.widgets.TbBreadcrumbs',
	array(
		'homeLink' => 'Home',
		'links' => array(
			'All Topicfacts' => $this->createUrl('admin'),
			'Topic_Facts'
		)
	)
);?>


<?php if(!$model->isNewRecord):?>
	<a class="create" href="<?php echo $this->createUrl('topicfacts/create') ?>"><i class="fa fa-plus-square"></i>Create A New Topic Facts</a>
<?php endif ?>

<div class="form">
	
<?php
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'topicFactsForm',
		'type' => 'horizontal',
		'htmlOptions' => array('class' => 'well stdAdminForm'), // for inset effect
	)
); ?>

<h1 class="crudTitle"><?php echo $heading ?></h1>

<?php
echo $form->textFieldGroup($model,'topic_id', array('class' => 'span3'));
echo $form->textFieldGroup($model,'subtopic_id', array('class' => 'span3'));
echo $form->textFieldGroup($model,'who_id', array('class' => 'span3'));
echo $form->textFieldGroup($model,'century', array('class' => 'span3'));
echo $form->textFieldGroup($model,'year', array('class' => 'span3'));
echo $form->textFieldGroup($model,'month', array('class' => 'span3'));
echo $form->textFieldGroup($model,'date', array('class' => 'span3'));
echo $form->textFieldGroup($model,'continent_id', array('class' => 'span3'));
echo $form->textFieldGroup($model,'country_id', array('class' => 'span3'));
echo $form->textFieldGroup($model,'region_id', array('class' => 'span3'));
echo $form->textFieldGroup($model,'created', array('class' => 'span3'));
echo $form->textFieldGroup($model,'modified', array('class' => 'span3'));
echo $form->textFieldGroup($model,'created_by', array('class' => 'span3'));
echo $form->textFieldGroup($model,'modified_by', array('class' => 'span3'));

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