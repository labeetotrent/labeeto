<!DOCTYPE html>
<html>
<head>
    <title>Labeeto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- Bootstrap -->
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/feed.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::app()->themeManager->baseUrl; ?>/css/validationEngine.jquery.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/jquery.js"></script>
</head>
<body >
<div id="wrapper">
    <header class="clearfix head-feed">
        <?php //$this->renderPartial('../elements/header-feed'); ?>
        <div class="content-head">
            <a href="#" id="logo">
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/logo-feed.png" alt="Logo"/>
            </a>
            <div class="menu-nav">
                <a href="#" class="menu-item"><span class="icon search"></span> SEARCH</a>
                <a href="#" class="menu-item"><span class="icon top-rate"></span>TOP RATED</a>
                <a href="#" class="menu-item"><span class="icon get-fit"></span>GET FIT</a>
                <a href="#" class="menu-item"><span class="icon inspire"></span>Speed date</a>
            </div>
            <div class="notify">
                <div class="friend-request friend-active">
                    <div class="notice-notify">8</div>
                </div>
                <div class="message-request"> <!-- Class active: message-active -->
                    <!--<div class="notice-notify">45</div>-->
                </div>
                <div class="notify-request notify-active" id="toggle-notification">
                    <div class="notice-notify">45</div>
                    <div class="menu-notification">
                        <span class="only-this-span"></span>
                        <ul>
                            <li><span style="color: white; padding-left: 15px;">NOTIFICATIONS</span><span>(45)</span><span style="float: right; padding-right: 15px;">See All</span></li>
                            <li>
                                <a href="#">
                                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avarta_1.png">
                                        <h6>SAORI TABATA <span class="active-infor">thgt ft likes your</span><span class="content-infor">post prive photo in timeline</span></h6> 
                                        <span class="minuten">16 mins</span>
                                </a>
                                <div class="content-active">
                                    <span class="delete-post"></span><span class="check-post"></span>
                                </div> 
                                
                            </li>
                            
                            <li>
                                <a href="#">
                                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avarta_1.png">
                                        <h6>SAORI TABATA <span class="active-infor">thgt ft likes your</span><span class="content-infor">post prive photo in timeline</span></h6> 
                                        <span class="minuten">16 mins</span>
                                </a>
                                <div class="content-active">
                                    <span class="delete-post"></span><span class="check-post"></span>
                                </div> 
                                
                            </li>
                            
                            <li>
                                <a href="#">
                                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avarta_1.png">
                                        <h6>SAORI TABATA <span class="active-infor">thgt ft likes your</span><span class="content-infor">post prive photo in timeline</span></h6> 
                                        <span class="minuten">16 mins</span>
                                </a>
                                <div class="content-active">
                                    <span class="delete-post"></span><span class="check-post"></span>
                                </div> 
                                
                            </li>
                            
                            <li>
                                <a href="#">
                                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avarta_1.png">
                                        <h6>SAORI TABATA <span class="active-infor">thgt ft likes your</span><span class="content-infor">post prive photo in timeline</span></h6> 
                                        <span class="minuten">16 mins</span>
                                </a>
                                <div class="content-active">
                                    <span class="delete-post"></span><span class="check-post"></span>
                                </div> 
                                
                            </li>
                            
                            <li>
                                <a href="#">
                                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avarta_1.png">
                                        <h6>SAORI TABATA <span class="active-infor">thgt ft likes your</span><span class="content-infor">post prive photo in timeline</span></h6> 
                                        <span class="minuten">16 mins</span>
                                </a>
                                <div class="content-active">
                                    <span class="delete-post"></span><span class="check-post"></span>
                                </div> 
                                
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="profile-nav">
                <img class="avatar-nav" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avatart-step2.png" />
                <div class="username-nav">
                <?php 
                if(strlen(Yii::app()->user->username) > 8){
                    echo substr(Yii::app()->user->username, 0, 5). '...';
                }else{
                    echo Yii::app()->user->username;
                }
                 
                ?>
                </div>
                <img class="arrow-nav" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/arrow_down.png" />
                
                <div class="menu-profile">
                    <a href="#" class=" profile-item firt-profile"><span class="icon-profile your-profile"></span>YOUR PROFILE</a>
                    <a href="#" class=" profile-item"><span class="icon-profile favorite"></span>FAVORITE</a>
                    <a href="#" class=" profile-item"><span class="icon-profile post-an-achievement"></span>POST AN ACHIEVEMENT</a>
                    <a href="#" class=" profile-item"><span class="icon-profile invite-friend"></span>INVITE FRIEND</a>
                    <a href="#" class=" profile-item"><span class="icon-profile settings"></span>SETTING</a>
                    <a href="#" class=" profile-item"><span class="icon-profile post-an-ad"></span>POST AN AD</a>
                    <a href="#" class=" profile-item"><span class="icon-profile upgrade-account"></span>UPGRADE ACCOUNT</a>
                    <a href="<?php echo $this->createUrl('/logout/index'); ?>" class=" profile-item"><span class="icon-profile logout"></span>LOGOUT</a>
                </div>
                                                
            </div>
        </div>
    </header>
    <div class="container" id="content-feed">
        <?php echo $content ?>

    </div>



    <footer class="clearfix">
        <?php echo $this->renderPartial('../elements/footer-feed') ?>
    </footer>
    <script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/jquery.session.js' ?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/js/feed.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/jquery.validationEngine.js' ?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/jquery.validationEngine-en.js' ?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->themeManager->baseUrl . '/js/bootstrap.min.js' ?>"></script>
</body>

</html>