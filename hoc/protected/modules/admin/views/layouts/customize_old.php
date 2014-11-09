<!DOCTYPE html>
<html lang="en">
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->    
    <title><?php echo implode( ' - ', $this->pageTitle ); ?></title>	
    <link rel="shortcut icon" href="/favicon.ico" />	
	<?php Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/css/stylesheets.css', 'screen' ); ?>
    <!--[if lt IE 8]>
        <link href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/ie7.css" rel="stylesheet" type="text/css" />
    <![endif]-->	
    <?php Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/css/fullcalendar.print.css', 'print' ); ?>    
    <?php Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/css/jquery.tagit.css' ); ?>
    <?php Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/css/tagit.ui-zendesk.css' ); ?>
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    	
	<?php Yii::app()->clientScript->registerScriptFile( 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js' ); ?>
	<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/jquery/jquery.mousewheel.min.js' ); ?>
	<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/cookie/jquery.cookies.2.2.0.min.js' ); ?>
	<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/bootstrap.min.js' ); ?>
		
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/charts/excanvas.min.js' ); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/charts/jquery.flot.js' ); ?>    
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/charts/jquery.flot.stack.js' ); ?>    
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/charts/jquery.flot.pie.js' ); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/charts/jquery.flot.resize.js' ); ?>
    
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/sparklines/jquery.sparkline.min.js' ); ?>
    
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/fullcalendar/fullcalendar.min.js' ); ?>
    
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/select2/select2.min.js' ); ?>
    
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/uniform/uniform.js' ); ?>
    
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/maskedinput/jquery.maskedinput-1.3.min.js' ); ?>
    <?php if(Yii::app()->language=='en'){
        Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/validation/languages/jquery.validationEngine-en.js' );
    } else {
        Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/validation/languages/jquery.validationEngine-de.js' );
    }
    ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/validation/jquery.validationEngine.js' ); ?>
    
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js' ); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/animatedprogressbar/animated_progressbar.js' ); ?>
    
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/qtip/jquery.qtip-1.0.0-rc3.min.js' ); ?>
    
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/cleditor/jquery.cleditor.js' ); ?>
    
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/dataTables/jquery.dataTables.min.js' ); ?>    
    
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/fancybox/jquery.fancybox.pack.js' ); ?>
     <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/cookies.js' ); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/actions.js' ); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/charts.js' ); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins.js' ); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/settings.js' ); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/tag-it.js' ); ?>
    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/jwplayer.js' ); ?>
<body style="background: none !important;">
        <div class="row-fluid">
      	     <div class="span3 left_customize_theme"> 
                 <div class="span3 button_left_customize"> 
                        <div class="row-fluid">
                            <div class="span1"></div>
                            <div class="span4">
                                <button class="btn_close" type="button"><a href="/admin/appearance/admin"> <?php echo Yii::t('global','Close'); ?>  </a></button> 
                            </div>
                            <div class="span4"></div>
                            <div class="span3">
                                <button class="btn btn-primary disabled"> <?php echo Yii::t('global','Save'); ?> </button>
                            </div>
                        </div>       
        </div>
<div class="full-overlay-sidebar">
 <div class="panel-group" id="accordion">
 
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
            <div class="you_are_previewing"> <?php echo Yii::t('global','You are previewing'); ?> </div>
            <div class="name_theme_customize"> Default </div>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
            <img src="../../themes/default/images/screenshot.png" width="95%" class="screenshot-img">
            <div class="you_are_previewing"> <?php echo Yii::t('global','Default themes'); ?> </div>
      </div>
    </div>
  </div>
  <?php
        $customizes_array   = array( 
            'bg_currency'   => array( 'title'=>'Background Currency', 'type'=>'image', 'value'=> 'top-head.png', 'description' => 'w: 1000px - h: 32px' ),
            'bg_search'     => array( 'title'=>'Background Search', 'type'=>'image', 'value'=> 'midle-header.png', 'description' => 'w: 1000px - h: 51px' ),
            'call24h'       => array( 'title'=>'Support header image', 'type'=>'image', 'value' => 'logo.png', 'description' => 'w: 116px - h: 38px' ), 
            'bg_menu'       => array( 'title'=>'Background Menu', 'type'=>'image', 'value' => 'bottom-header.png', 'description' => 'w: 1000px - h: 74px' ),
            'main_banner'   => array( 'title'=>'Header Image', 'type'=>'text', 'value' => 'mainbanner.jpg', 'description' => 'w: 1000px - h: 238px' ),
        );
        foreach ( $customizes_array as $key=>$val ){
  ?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $key; ?>">
                        <?php echo $val['title']; ?>
                    </a>
                  </h4>
                </div>
                <div id="collapse_<?php echo $key; ?>" class="panel-collapse collapse">
                  <div class="panel-body">
                         <?php Utils::getTypeCustomizeTheme( $val['type'] ); ?>
                  </div>
                </div>
              </div>
     <?php } ?>


</div>
<script>   
   $('.collapse').collapse('hide');
</script>
                 </div> 
                 
              </div>
             <div class="span9" style="margin: 0 !important; padding: 0 !important;"> <?php echo $content; ?>  </div>
        </div>
</body>
</html>