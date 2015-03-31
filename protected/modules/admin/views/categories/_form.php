
<div class="row-fluid">
	<div class="span12">
		<div class="containerHeadline">
			<i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','Categories'); ?></h2>
			<div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
			<div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
		</div>

		<div class="floatingBox" style="display: block;">
			<div class="container-fluid">

				<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'categories-form',
						'enableAjaxValidation'=>false,
						'htmlOptions'=>array(
									'class'=>'form-horizontal contentForm',
									'data-validate'=>'parsley',
									)
					)); ?>

				<?php echo $form->errorSummary($model); ?>
					<div class="control-group">
						<label for="fullname" class="control-label"><?php echo $form->labelEx($model,'name'); ?></label>
						<div class="controls">
							<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255, 'class'=>'span10', 'data-required'=>'true')); ?>
						</div>
					</div>
					<div class="control-group">
						<label for="fullname" class="control-label"><?php echo $form->labelEx($model,'parent_id'); ?></label>
						<div class="controls">
							<?php
								$condition = array('parent_id' => 0);					            
								$criteria = new CDbCriteria(array('order' => 'name'));
								if ($model->id)
									$criteria->addCondition('id <> '.$model->id);					            					            
								$list = CHtml::listData(Categories::model()->findAllByAttributes($condition, $criteria ), 'id', 'name' ); 
								echo $form->dropDownList($model,'parent_id', $list, array('empty'=>array(0 => ''))); 
							?>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Create') : Yii::t('global','Save'), array('class'=>'btn btn-primary')); ?>
							<button class="btn" type="reset">Reset</button>
						</div>
					</div>
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>