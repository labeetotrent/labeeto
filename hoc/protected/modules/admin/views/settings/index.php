<div class="container-fluid">
<div class="page-header" style="border-bottom: 0px solid !important">
	<h1><?php echo Yii::t('global', 'Configure')?> <small><?php echo Yii::t('global', 'Settings')?></small></h1>
</div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
<!-- Start .notifications -->
<?php $this->widget('widgets.admin.notifications'); ?>
<!-- End .notifications -->

<?php  echo CHtml::form(); ?>
<div class="row-fluid  form-seting-site">
	<div class="span12">
        <div class="containerHeadline">
            <i class="icon-edit"></i><h2><?php echo Yii::t('global', 'General Settings')?></h2>
            <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
            <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
        </div>
        <div class="floatingBox">
            <div class="container-fluid">
				<?php if( count($cat1) ): ?>
					<?php foreach ($cat1 as $row): ?>
						<div class="control-group clearfix">
							<div class="span3">
								<label <?php if( CHtml::encode($row->description) ): ?> class="tipb" data-original-title='<?php echo Yii::t('global', $row->description); ?>'<?php endif; ?>>
									<?php echo Yii::t('global', $row->title); ?>
									<?php if( $row->value && $row->default_value != $row->value ): ?><span style='color:red;'><?php echo Yii::t('adminsettings', '(Setting Changed)'); ?></span><?php endif; ?>
								</label>
							</div>
							<div class="span9">
								<?php $this->parseSetting( $row );?>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td style='text-align:center;'><?php echo Yii::t('adminsetings', 'No Settings Added Yet.'); ?></td>
					</tr>
				<?php endif; ?>
			<?php if( count($cat1) ): ?>
			<div class="footer tar">

			</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<div class="row-fluid  form-seting-site">
	<div class="span12">
        <div class="containerHeadline">
            <i class="icon-list"></i><h2><?php echo Yii::t('global', 'System Settings')?></h2>
            <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
            <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
        </div>
        <div class="floatingBox">
            <div class="container-fluid">

				<?php if( count($cat3) ): ?>
					<?php foreach ($cat3 as $row): ?>
						<div class="row-form clearfix">
							<div class="span3">
								<label<?php if( CHtml::encode($row->description)): ?> class="tipb" data-original-title='<?php echo CHtml::encode($row->description); ?>'<?php endif; ?>>
									<?php echo Yii::t('global', $row->title); ?>

									<?php if( $row->value && $row->default_value != $row->value ): ?><span style='color:red;'><?php echo Yii::t('adminsettings', '(Setting Changed)'); ?></span><?php endif; ?>
								</label>
							</div>
							<div class="span9">
								<?php $this->parseSetting( $row ); ?>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td style='text-align:center;'><?php echo Yii::t('adminsetings', 'No Settings Added Yet.'); ?></td>
					</tr>
				<?php endif; ?>
			<?php if( count($cat1) ): ?>
			<div class="footer tar">

			</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>
    <div class="control-group"><?php echo CHtml::submitButton(Yii::t('adminglobal', 'Save'), array( 'name' => 'submit', 'class'=>'btn btn-primary')); ?></div>
</div>



<?php echo CHtml::endForm();
?>