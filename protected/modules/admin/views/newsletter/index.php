<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">

            <div class="containerHeadline tableHeadline">
                <h2><?php echo Yii::t('global', 'Newsletter Email'); ?></h2>
                <form>
                    <div class="input-append">
                        <span class="add-on add-on-middle add-on-mini minimizeTable"><i class="icon-caret-down"></i></span>
                        <span class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></span>
                    </div>
                </form>

            </div>

            <div class="floatingBox table">
                <div class="container-fluid">
                <?php $this->widget('widgets.admin.notifications'); ?>

			<?php echo CHtml::form(); ?>
			<table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
                       <th style='width: 5%;'><input name="checkall" type="checkbox" id="checkall" /></th>
					   <th style='width: 45%;'><?php echo $sort->link('email', Yii::t('global', 'Email'), array( 'class' => 'tipb', 'title' => Yii::t('adminnewsletters', 'Sort list by email') ) ); ?></th>
					   <th style='width: 45%;'><?php echo $sort->link('joined', Yii::t('global', 'Joined'), array( 'class' => 'tipb', 'title' => Yii::t('adminnewsletters', 'Sort list by joined date') ) ); ?></th>
					   <th style='width: 5%;'><?php echo Yii::t('newsletter', 'Options'); ?></th>						
					</tr>
				</thead>
				<tbody>
					<?php if ($items): ?>
						<?php foreach ($items as $row): ?>
							<tr>
                                <td><?php echo CHtml::checkbox( 'record[' . $row->id.']',false,array ('data-id'=> $row->id,'class'=>'checkbox1 checkbox-'.$row->id) ); ?></td>
								<td><?php echo CHtml::encode($row->email); ?></td>
								<td class="tipb"><span><?php echo Yii::app()->dateFormatter->formatDateTime($row->joined, 'long', 'short'); ?></span></td>
								<td>
									<a href="<?php echo $this->createUrl('newsletter/delete', array( 'id' => $row->id )); ?>" class="tipb" data-original-title="<?php echo Yii::t('adminglobal', 'Delete this newsletter!'); ?>">
                                        <span class="label red" ><i class="icon-trash delete" title="<?php echo Yii::t('adminlang', 'Delete'); ?>"></i></span>

									</a>
								</td>
							</tr>
						<?php endforeach ?>
					<?php else: ?>	
						<tr>
							<td colspan='5' style='text-align:center;'><?php echo Yii::t('newsletter', 'No newsletters found.'); ?></td>
						</tr>
					<?php endif; ?>                               
				</tbody>
			</table>
			<div class="footer tar">
								<select name="bulkoperations" style="margin-top: 7px;">
									<option value=""><?php echo Yii::t('global', '-- Choose Action --'); ?></option>
									<option value="bulkdelete"><?php echo Yii::t('global', 'Delete Selected'); ?></option>
								</select>
								<?php echo CHtml::submitButton( Yii::t('global', 'Apply'), array( 'confirm' => Yii::t('newsletter', 'Are you sure you would like to perform a bulk operation?'), 'class'=>'btn btn-primary')); ?>
						</div>
			

			<?php echo CHtml::endForm(); ?>
			<?php $this->widget('widgets.MyADPager', array('pages'=>$pages, 'htmlOptions'=>array('class'=>'paging') )); ?>
		</div>
	</div>
</div>


                <div class="row-fluid">
                    <div class="span12">

                        <div class="containerHeadline tableHeadline">
                            <h2><?php echo Yii::t('global', 'Add Subscriber'); ?></h2>
                            <form>
                                <div class="input-append">
                                    <span class="add-on add-on-middle add-on-mini minimizeTable"><i class="icon-caret-down"></i></span>
                                    <span class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></span>
                                </div>
                            </form>

                        </div>

                        <div class="floatingBox table">
                            <div class="container-fluid">
			<?php echo CHtml::form(); ?>

			<div class="row-form clearfix">
				<?php echo CHtml::activeLabel($model, 'email'); ?>
				<?php echo CHtml::activeTextField($model, 'email', array( 'class' => 'text-input medium-input', 'data-required'=>'true' )); ?>
				<?php echo CHtml::error($model, 'email', array( 'class' => 'input-notification errorshow png_bg' )); ?>
			</div>                         
			
			<div class="footer tar">
				<?php echo CHtml::submitButton(Yii::t('adminglobal', 'Submit'), array('class'=>'btn btn-primary', 'name'=>'submit')); ?>
			</div>                 
			<?php echo CHtml::endForm(); ?> 	
			
		</div>

	</div>
</div>
                    </div>

<?php echo CHtml::form(); ?>
            <div class="row-fluid">
                <div class="span12">

                    <div class="containerHeadline tableHeadline">
                        <h2><?php echo Yii::t('global', 'Send Newsletter'); ?></h2>


                    </div>

                    <div class="floatingBox table">
                        <div class="container-fluid">
        <div class="block-fluid" id="wysiwyg_container">
			<!--<div class="row-form clearfix">
				<div class="span3"><?php /*echo CHtml::label(Yii::t('g', 'Template'), ''); */?></div>
				<div class="span9"><?php /*echo CHtml::dropDownList('template_id', null, CHtml::listData(EmailTemplates::model()->findAllByAttributes(array('language' => Yii::app()->language)),'id','name'), array('empty' => '')); */?></div>
			</div>-->
            <div class="row-form clearfix">
				<div class="span3"><?php echo CHtml::label(Yii::t('newsletter', 'Subject'), ''); ?></div>
				<div class="span9"><?php echo CHtml::textField('subject', 'Newsletter', array( 'class' => 'text-input medium-input' )); ?></div>
			</div>

			<?php $this->widget('application.widgets.ckeditor.CKEditor', array( 'name' => 'content', 'value' => isset($_POST['content']) ? $_POST['content'] : '', 'editorTemplate' => 'full' )); ?>
		
			<div class="footer tar">
				
			<?php echo CHtml::submitButton(Yii::t('adminglobal', 'Send!'), array('class'=>'btn btn-primary', 'name'=>'sendnewsletter')); ?>
			<?php echo CHtml::submitButton(Yii::t('adminglobal', 'Preview!'), array('class'=>'btn', 'name'=>'preview')); ?>
				</div>  
        </div>
	</div>
</div>
                    </div>
                </div>
            </div>
</div>
<?php echo CHtml::endForm(); ?>	

<script type="text/javascript">
    $('#checkall').click(function(event) {
        if(this.checked) {
            $('.checkbox1').each(function() {
                this.checked = true;
            });
        }else{
            $('.checkbox1').each(function() {
                this.checked = false;
            });
        }
    });

    $('#template_id').change(function(){
    $.get('/admin/emailTemplates/load?id=' + this.value, function(reponse){
        reponse = eval('(' + reponse + ')' );
        $('#subject').val(reponse.email_subject);
        CKEDITOR.instances.content.setData(reponse.email_content);
    })
})
</script>
<style>
    #Newsletter_email{
        width: 650px !important;
    }
    #template_id{
        width: 350px !important;
    }
    #subject{
        width: 650px !important;
    }
</style>