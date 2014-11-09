<div class="page-header">
	<h1><?php echo Yii::t('global','Manage') ?> <small><?php echo Yii::t('global','Photo') ?></small></h1>
</div>

<!-- Start .notifications -->
<?php $this->widget('widgets.admin.notifications'); ?>
<!-- End .notifications -->


<div class="row-fluid">
	<div class="span12">                    
		<div class="head clearfix">
			<div class="isw-mail"></div>
			<h1><?php echo Yii::t('global', 'Photo'); ?> (<?php echo Yii::app()->format->number($count); ?>)</h1>
		      <form class="header-tab-view not-bor" action="/admin/photo/approval">
                <button type="submit"><?php echo Yii::t('global', 'Approval all photo') ?></button>
            </form>
		</div>
		<div class="block-fluid">
			<?php echo CHtml::form(); ?>
			<table cellpadding="0" cellspacing="0" width="100%" class="table">
				<thead>
					<tr>
						<th style='width: 5%;'><input name="checkall" type="checkbox" /></th>
                       <th style='width: 10%;'><?php echo $sort->link('user_id', Yii::t('global', 'User'), array( 'class' => 'tipb', 'title' => Yii::t('global', 'Sort list by user') ) ); ?></th>
					   <th style='width: 6%;'><?php echo Yii::t('global', 'Photo'); ?></th>
                       <th style='width: 15%;'><?php echo $sort->link('is_public', Yii::t('global', 'Public'), array( 'class' => 'tipb', 'title' => Yii::t('global', 'Sort list by public') ) ); ?></th>
                       <th style='width: 15%;'><?php echo $sort->link('is_approval', Yii::t('global', 'Approval'), array( 'class' => 'tipb', 'title' => Yii::t('global', 'Sort list by approval') ) ); ?></th>
                       <th style='width: 15%;'><?php echo $sort->link('date', Yii::t('global', 'Created'), array( 'class' => 'tipb', 'title' => Yii::t('global', 'Sort list by date') ) ); ?></th>
					   <th style='width: 5%;'><?php echo Yii::t('global', 'Options'); ?></th>						
					</tr>
				</thead>
				<tbody>
					<?php if ($items): ?>
						<?php foreach ($items as $row): ?>
							<tr>
								<td>
                                    <span>
                                        <?php echo CHtml::checkbox( 'record[' . $row->id.']' ); ?>
                                    </span>
                                </td>
                                <td><?php echo User::model()->getUser($row->user_id) ?></td>
                                <td>
                                    <a class="fancybox" href="/uploads/photo/<?php echo $row->photo ?>" rel="group">
                                        <img class="img-polaroid fix_image_products" src="/uploads/photo/<?php echo $row->photo ?>" style="height: 40px;"/>
                                    </a>
                                </td>
                                <td><?php echo ($row->is_public == 1)? Yii::t('global', 'Public'): Yii::t('global', 'Not Public'); ?></td>
                                <td><?php echo ($row->is_approval == 1)? Yii::t('global', 'Approval'): Yii::t('global', 'Not Approval'); ?></td>
								<td class="tipb"><span><?php echo Yii::app()->dateFormatter->formatDateTime($row->date, 'long', 'short'); ?></span></td>
								<td>
                                    <a href="<?php echo $this->createUrl('photo/view', array( 'id' => $row->id )); ?>" class="tipb" data-original-title="<?php echo Yii::t('adminglobal', 'View this Photo!'); ?>"><img src="/assets/images/view.png" alt="<?php echo Yii::t('adminglobal','View') ?>" /></a>
                                    <a href="<?php echo $this->createUrl('photo/update', array( 'id' => $row->id )); ?>" class="tipb" data-original-title="<?php echo Yii::t('adminglobal', 'Update this Photo!'); ?>"><img src="/assets/images/update.png" alt="<?php echo Yii::t('adminglobal','Update') ?>" /></a>
									<a href="<?php echo $this->createUrl('photo/remove', array( 'id' => $row->id )); ?>" class="tipb" data-original-title="<?php echo Yii::t('adminglobal', 'Delete this Photo!'); ?>"><img src="/assets/images/delete.png" alt="<?php echo Yii::t('adminglobal','Delete') ?>" /></a>
								</td>
							</tr>
						<?php endforeach ?>
					<?php else: ?>	
						<tr>
							<td colspan='5' style='text-align:center;'><?php echo Yii::t('global', 'No newsletters found.'); ?></td>
						</tr>
					<?php endif; ?>                               
				</tbody>
			</table>
			<div class="footer tar">
					<select name="bulkoperations" style="margin-top: 7px;">
						<option value=""><?php echo Yii::t('global', '-- Choose Action --'); ?></option>
						<option value="bulkdelete"><?php echo Yii::t('global', 'Delete Selected'); ?></option>
                        <option value="bulkapproval"><?php echo Yii::t('global', 'Approval Selected'); ?></option>
                        <option value="bulkunapproval"><?php echo Yii::t('global', 'Un Approval Selected'); ?></option>
					</select>
					<?php echo CHtml::submitButton( Yii::t('global', 'Apply'), array( 'confirm' => Yii::t('global', 'Are you sure you would like to perform a bulk operation?'), 'class'=>'btn')); ?>
			</div>
			
			</div>
			<?php echo CHtml::endForm(); ?>
			<?php $this->widget('widgets.MyADPager', array('pages'=>$pages, 'htmlOptions'=>array('class'=>'paging') )); ?>
		</div>
	</div>   
</div>
<br/>

<script type="text/javascript">
    $(document).ready(function(){
        $("input[name=checkall]").click(function(){
            if(!$(this).is(':checked'))
                $(this).parents('table').find('span').removeClass('checked').find('input[type=checkbox]').attr('checked',false);
            else
                $(this).parents('table').find('span').addClass('checked').find('input[type=checkbox]').attr('checked',true);
                
        }); 
        
     }); 
</script>

