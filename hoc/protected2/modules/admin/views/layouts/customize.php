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
      	         <?php echo $content; ?>
        </div>
</body>
</html>