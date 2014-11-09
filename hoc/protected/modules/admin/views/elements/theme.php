<div class="span4">
    <div> <img src="/templates/<?php echo Utils::slugify_new( $data->name ); ?>/<?php echo $data->screenshot; ?>" title='customize "<?php echo $data->name; ?>"'/> </div>
    <div class="available-theme"><h3> <?php echo $data->name; ?> </h3></div>
    <div class="action-links-theme"> 
    <ul>
        <li><a href="/admin/themes/index?id=<?php echo $data->id; ?>"><?php echo Yii::t('global','Customize'); ?></a></li>
         <?php /*<li><a href="/admin/appearance/index?id=<?php echo $data->id; ?>"><?php echo Yii::t('global','Editor'); ?></a></li> */ ?>
        <li><a href="#" class="delete-theme" onclick="delTheme('<?php echo $data->id; ?>', '<?php echo $data->name; ?>' )"><?php echo Yii::t('global','Delete'); ?></a></li>
    </ul>
    </div>
</div>

