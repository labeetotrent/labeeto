<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta charset="UTF-8">
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <!-- Bootstrap -->
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
<!--    <link type="text/css" href="--><?php //echo Yii::app()->themeManager->baseUrl; ?><!--/css/bootstrap.min.css" rel="stylesheet">-->
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/feed.css" rel="stylesheet">


    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/validationEngine.jquery.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/rangejs/rangeslider.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/chat.css" />
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/blue/jplayer.blue.monday.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/smoothDivScroll.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/fa/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/nouislider/jquery.nouislider.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/fw7/css/framework7.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/fw7/css/my-app.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/slashman.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/settings.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/im.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/new_design.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php //Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/jquery.fakecrop.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/fancybox/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/jwplayer.js"></script>

    <!-- PROJEKKTOR -->
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/projekktor/projekktor.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/projekktor/themes/maccaco/projekktor.style.css" type="text/css" media="screen" />

    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/jquery.blImageCenter.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/nouislider/jquery.nouislider.all.min.js"></script>
    <!--    <script type="text/javascript" src="--><?php //echo Yii::app()->themeManager->baseUrl; ?><!--/js/jquery.smoothdivscroll-1.3-min.js"></script>-->
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/jPlayer/jquery.jplayer.min.js">
        jwplayer.key="YLh0EpQST8/bQUTi3GDUFWxfaIaeKorWSL5ihzmIxDSdoJDoz9fLSJZrt9g=";</script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
    <title>Labeeto</title>

    <?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/chat.js' ); ?>
    <script type="text/javascript">
        function ratings( score, id){
            $.get('/user/saveRating?score='+score+'&id='+id, function(html) {
                console.log(html);
            });
        }
        function ratings_post( score, id){
            $.get('/user/saveVoting?score='+score+'&id='+id, function(html) {
                console.log(html);
            });
        }

    </script>


</head>
<body>
<?php //$this->renderPartial('../elements/header-feed'); ?>
<?php //$this->renderPartial('../elements/footer-menu'); ?>
    <?php echo $content ?>

<!-- Path to Framework7 Library JS-->
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/fw7/js/framework7.min.js"></script>
<!-- Path to your app js-->
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/fw7/js/my-app.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/jquery.session.js' ?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/feed.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/profile.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/jquery.validationEngine.js' ?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/jquery.validationEngine-en.js' ?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/bootstrap.min.js' ?>"></script>

</body>
</html>