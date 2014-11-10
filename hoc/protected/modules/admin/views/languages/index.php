<div class="container-fluid">
<div class="page-header" style="border-bottom: 0px solid !important;">
	<h1>Manage <small><?php echo Yii::t('global', 'Languages')?></small></h1>
</div>

<?php $this->widget('widgets.admin.notifications'); ?>

<div class="row-fluid">
    <div class="span12 contentDivider"></div>
</div>
 <div class="row-fluid">
	<div class="span12">
    <div class="containerHeadline tableHeadline">
        <h2><?php echo Yii::t('global', 'Languages')?></h2>
        <form>
            <div class="input-append">
                <span class="add-on add-on-middle add-on-mini minimizeTable"><i class="icon-caret-down"></i></span>
                <span class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></span>
            </div>
        </form>

    </div>
    <div class="floatingBox table">
    <div class="container-fluid">
			<table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th ><?php echo Yii::t('adminlang', 'Language Key');?></th>
						<th ><?php echo Yii::t('adminlang', 'Language Title'); ?></th>
						<th ><?php echo Yii::t('adminlang', 'Source Language'); ?></th>
						<th ><?php echo Yii::t('adminlang', '# Strings'); ?></th>
						<th class="actions" ><?php echo Yii::t('adminlang', 'Options'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach( Yii::app()->params['languages'] as $key => $value ): ?>
						<tr>
							<td><?php echo $key; ?></td>
							<td><?php echo $value; ?></td>
							<td>
								<?php if( $key == Yii::app()->sourceLanguage ): ?>
									<img class="tipb" data-original-title='<?php echo Yii::t('adminlang', 'Source Language'); ?>' src="<?php echo Yii::app()->themeManager->baseUrl; ?>/img/icons/tick_circle.png" alt="Source Language" />
								<?php else: ?>
									<img class="tipb" data-original-title='<?php echo Yii::t('adminlang', 'Not Source Language'); ?>' src="<?php echo Yii::app()->themeManager->baseUrl; ?>/img/icons/cross_circle.png" alt="Not Source Language" />
								<?php endif; ?>
							</td>
						    <td>
								<?php if( $key == Yii::app()->sourceLanguage ): ?>
									<?php echo Yii::app()->format->formatNumber( $totalStringsInSource ); ?>
								<?php else: ?>
									<?php echo $this->getStringTranslationDifference( $key ) . ' / ' . Yii::app()->format->formatNumber( Message::model()->count('language=:key', array(':key'=>$key)) ); ?>
								<?php endif; ?>
							</td>
							<td>
								<?php if($key == Yii::app()->sourceLanguage): ?>
									<img class="tipb info-language" data-original-title='<?php echo Yii::t('adminlang', 'Source cannot be translated'); ?>' src="<?php echo Yii::app()->themeManager->baseUrl; ?>/img/icons/information.png" alt="Translate" />
								<?php else: ?>
									<a href="<?php echo $this->createUrl('languages/translate', array( 'id' => $key )); ?>" class="tipb translate-this-language" data-original-title="<?php echo Yii::t('adminlang', 'Translate this language'); ?>"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/img/icons/pencil.png" alt="Translate" /></a>
									<a href="<?php echo $this->createUrl('languages/translateneeded', array( 'id' => $key )); ?>" class="tipb translate-only" data-original-title="<?php echo Yii::t('adminlang', 'Translate only the strings that were not translated yet.'); ?>"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/img/icons/pencil.png" alt="Translate" /></a>
									<a href="<?php echo $this->createUrl('languages/copystrings', array( 'id' => $key )); ?>" class="tipb copy-missing" data-original-title="<?php echo Yii::t('adminlang', 'Copy missing language strings from source into this language'); ?>"><img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/img/icons/copy.png" alt="copy" /></a>
								<?php endif; ?>
							</td>
						</tr>	
					<?php endforeach; ?>
				</tbody>
			</table>
    </div>
    </div>

	</div>                                
</div>
</div>
<script>
    $('.info-language').tooltip({
        title: '<?php echo Yii::t('adminlang', 'Source cannot be translated'); ?>'
    });
    $('.translate-this-language').tooltip({
        title: '<?php echo Yii::t('adminlang', 'Translate this language'); ?>'
    });
    $('.translate-only').tooltip({
        title: '<?php echo Yii::t('adminlang', 'Translate only the strings that were not translated yet.'); ?>'
    });
    $('.copy-missing').tooltip({
        title: '<?php echo Yii::t('adminlang', 'Copy missing language strings from source into this language'); ?>'
    });
</script>