<!DOCTYPE html>
<html>
<head>
    <title>Labeeto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <!-- css3-mediaqueries.js for IE less than 9 -->
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <!-- Bootstrap -->
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/jquery.placeholder.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/new_design.css" rel="stylesheet">
    <style>
        body {
            background-color: #0a0a0a;
        }
    </style>
</head>
<body>
    <?php echo $content ?>
</body>

</html>