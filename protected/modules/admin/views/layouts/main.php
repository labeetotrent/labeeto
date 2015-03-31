<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title><?php echo implode( ' - ', $this->pageTitle ); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/css/bootstrap-responsive.min.css' ); ?>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <?php Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/css/styles.css' ); ?>

</head>
<body class="dashboard">

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="brand" href="<?php echo $this->createUrl('index/index', array('lang'=>false)); ?>"><strong class="brandBold">LABEETO</strong>DATING</a>
            <div class="nav pull-right">
                <form class="navbar-form">
                    <div class="input-append">
                         <div class="collapsibleContent">
                            <?php  
                            /*
                            $allLang = Languages::model()->findAll(); ?>
                            <?php foreach($allLang as $lang){
                                if($lang['region_code'] == Yii::app()->language){
                                    echo "<a class='sidebar'><img src='/uploads/flag/".$lang['icon']."' /></a>";
                                }

                            } 
                            */
                            ?>
                            <a href="#" class="link_PopupLanguage add-on add-on-middle add-on-mini add-on-dark">
                                <img src="/uploads/flag/<?php echo Yii::app()->language; ?>.png" />
                            </a>
                            <div id="PopupLanguage" class="popup">
                                <ul>
                                  <?php
                                    $params = $_GET;
                                    if (isset($params['lang'])) unset($params['lang']);
            
                                    foreach( Yii::app()->params['languages'] as $key => $value ){
                                        if ($key != Yii::app()->language){
                                            if(http_build_query($params)!='')
                                                echo '<li><a href="?lang='.$key.'&'.http_build_query($params).'"><img src="/uploads/flag/'.$key.'.png" /> '.$value.'</a></li>'; 
                                            else
                                                echo '<li><a href="?lang='.$key.'"><img src="/uploads/flag/'.$key.'.png" /> '.$value.'</a></li>'; 

                                        }
                                    }
                                    ?>
                                </ul>
                            </div>

                        
                            <a href="#settingsContent" class="sidebar"><span class="add-on add-on-middle add-on-mini add-on-dark" id="settings"><i class="icon-cog"></i></span></a>
                            <a href="#profileContent" class="sidebar"><span class="add-on add-on-mini add-on-dark" id="profile"><i class="icon-user"></i><span class="username"><?php echo Yii::t('global','Hi')?>, <?php echo Yii::app()->user->name; ?></span></span></a>
                        </div>
                        <a href="#collapsedSidebarContent" class="collapseHolder sidebar"><span class="add-on add-on-mini add-on-dark"><i class="icon-sort-down"></i></span></a>
                    </div>
                </form>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- ==================== END OF TOP MENU ==================== -->

<!-- ==================== SIDEBAR ==================== -->
<div class="hiddenContent">
<!-- ==================== SIDEBAR COLLAPSED ==================== -->
<div id="collapsedSidebarContent">
    <div class="sidebarDivider"></div>
    <div class="sidebarContent">
        <ul class="collapsedSidebarMenu">
            <li><a href="#tasksContent" class="sidebar">Tasks <div class="notifyCircle cyan">3</div><i class="icon-chevron-sign-right"></i></a></li>
            <li><a href="#notificationsContent" class="sidebar">Notifications <div class="notifyCircle orange">9</div><i class="icon-chevron-sign-right"></i></a></li>
            <li><a href="#messagesContent" class="sidebar">Messages <div class="notifyCircle red">12</div><i class="icon-chevron-sign-right"></i></a></li>
            <li><a href="#settingsContent" class="sidebar">Settings<i class="icon-chevron-sign-right"></i></a></li>
            <li><a href="#profileContent" class="sidebar"><?php echo Yii::t('global','Hi')?>, <?php echo Yii::app()->user->name; ?><i class="icon-chevron-sign-right"></i></a></li>
            <li class="sublevel"><a href="#">edit profile<i class="icon-user"></i></a></li>
            <li class="sublevel"><a href="#">change password<i class="icon-lock"></i></a></li>
            <li class="sublevel"><a href="<?php echo $this->createUrl('/logout', array('lang'=>false)); ?>">logout<i class="icon-off"></i></a></li>
        </ul>
    </div>
</div>
<!-- ==================== END OF SIDEBAR COLLAPSED ==================== -->

<!-- ==================== SIDEBAR TASKS ==================== -->

<!-- ==================== SIDEBAR SETTINGS ==================== -->
<div id="settingsContent">
    <div class="sidebarDivider"></div>
    <div class="sidebarContent">
        <a href="#collapsedSidebarContent" class="showCollapsedSidebarMenu"><i class="icon-chevron-sign-left"></i><h1> Settings</h1></a>
        <h1>Settings</h1>
        <ul class="settingsList">

            <li>
                <div class="settingToggler">
                    <i class="icon-leaf"></i><h3> Toggler</h3>
                    <label class="checkbox toggle well" onclick="">
                        <input id="toggler" type="checkbox" checked />
                        <span class="slider-selection"></span>
                                    <span class="toggleStatus">
                                        <span><i class="icon-ok toggleOn"></i></span>
                                        <span><i class="icon-remove toggleOff"></i></span>
                                    </span>
                        <a class="btn btn-primary slide-button"></a>
                    </label>
                </div>
            </li>

        </ul>
    </div>
</div>
<!-- ==================== END OF SIDEBAR SETTINGS ==================== -->

<!-- ==================== SIDEBAR PROFILE ==================== -->
<div id="profileContent">
    <div class="sidebarDivider"></div>
    <div class="sidebarContent">
        <a href="#collapsedSidebarContent" class="showCollapsedSidebarMenu"><i class="icon-chevron-sign-left"></i><h1> <?php echo Yii::t('global','My account'); ?></h1></a>
        <h1><?php echo Yii::t('global','My account'); ?></h1>
        <div class="profileBlock">
            <div class="">
                <div class="usernameHolder"><?php echo Yii::app()->user->username; ?></div>
            </div>
            <div class="profileInfo">
                <p><i class="icon-map-marker"></i> <?php echo Yii::t('global','Role'); ?> : <?php echo Yii::app()->user->role; ?>  </p>
                <p><i class="icon-envelope-alt"></i> <?php echo Yii::app()->user->email; ?></p>
                <p><i class="icon-globe"></i> <?php //echo Yii::app()->params->homeUrl; ?></p>
                <p class="aboutMe">
                    <?php echo Yii::t('global','Last Visit').' : ';
                            echo isset(Yii::app()->user->last_visit)?Yii::app()->user->last_visit:'';
                    ?>
                    <br>
                    <?php
                        echo Yii::t('global','Language').' : ';
                        //echo Members::model()->getLanguageNew( Yii::app()->language );
                    ?>
                </p>
            </div>
            <footer>
                <div class="profileSettingBlock editProfile" onclick="window.location.href='/admin/user/update?id=<?php echo Yii::app()->user->id; ?>'"><i class="icon-user"></i>edit profile</div>
                <div class="profileSettingBlock changePassword" onclick="window.location.href='/admin/user/changepass?id=<?php echo Yii::app()->user->id; ?>&action=index'"><i class="icon-lock"></i>change password</div>
                <div class="profileSettingBlock logout" onclick = "window.location.href='/logout'"><i class="icon-off"></i>logout </div>
            </footer>
        </div>
    </div>
</div>
<!-- ==================== END OF SIDEBAR PROFILE ==================== -->

</div>
<!-- ==================== END OF SIDEBAR ==================== -->

<!-- ==================== MAIN MENU ==================== -->
<?php $this->renderPartial('/elements/main_menu'); ?>
<!-- ==================== END OF MAIN MENU ==================== -->

<!-- ==================== PAGE CONTENT ==================== -->
<div class="content">
    <!-- ==================== TITLE LINE FOR HEADLINE ==================== -->
    <div class="titleLine">
        <div class="container-fluid">
            <div class="titleIcon"><i class="icon-dashboard"></i></div>
            <ul class="titleLineHeading">
                <li class="heading"><h1>Dashboard</h1></li>
            </ul>
            <ul class="titleLineOnRight pull-right">
                <li>
                    <span class="usersBar">100,235,549,222,639,335,800</span>
                    <h2 class="cyanText">1254<span class="greyText">users</span></h2>
                </li>
                <li>
                    <span class="visitsBar">20,35,10,80,52,34,74,99,45,68</span>
                    <h2 class="redText">758<span class="greyText">visits</span></h2>
                </li>
                <li>
                    <span class="ordersBar">254,159,480,531,214,984,671</span>
                    <h2 class="greenText">3541<span class="greyText">orders</span></h2>
                </li>
            </ul>
        </div>
    </div>
    <!-- ==================== END OF TITLE LINE ==================== -->
    <!-- ==================== BREADCRUMBS / DATETIME ==================== -->
    <ul class="breadcrumb">
        <?php
            $links = array();
            $links[] = '<li><i class="icon-home"></i><a href="/admin">'.Yii::t("global","Home").'</a> <span class="divider"><i class="icon-angle-right"></i></span></li>';
            if(count($this->breadcrumbs))
            {
                foreach($this->breadcrumbs as $label=>$url)
                {
                    if(is_string($label) || is_array($url))
                        $links[] = CHtml::link($label, $url);
                    else
                        $links[] = '<a>'.$label.'</a>';
                }
            }
            echo '<li class="active">' . implode(' ', $links) . '</li>';
        ?>
        <li class="moveDown pull-right">
            <span class="time"></span>
            <span class="date"></span>
        </li>
    </ul>
    <!-- ==================== END OF BREADCRUMBS / DATETIME ==================== -->
     <?php echo $content; ?>
</div>
<!-- ==================== END OF PAGE CONTENT ==================== -->
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/bootstrap-slider.js' ); ?> <!-- bootstrap slider plugin -->
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/jquery.sparkline.min.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/jquery.flot.min.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/jquery.flot.pie.min.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/wysihtml5-0.3.0_rc2.min.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/bootstrap-wysihtml5-0.0.2.min.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/bootstrap-tags.js' ); ?>

<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/raphael.2.1.0.min.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/justgage.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/bootstrap-multiselect.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/bootstrap-datepicker.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/bootstrap-colorpicker.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/parsley.min.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/formToWizard.js' ); ?>

<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/bootstrap.min.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/vendor/bootstrap-editable.min.js' ); ?>
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/thekamarel.min.js' ); ?>

<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins.js' ); ?>
<!--tung add fancybox-->
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/fancybox/jquery.fancybox.pack.js' ); ?>
<?php Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/js/plugins/fancybox/jquery.fancybox.css' ); ?>

<!--tung add  select2-->
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/select2/select2.min.js' ); ?>
<?php Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/css/select2.css' ); ?>

<!--tung add uniform -->
<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->themeManager->baseUrl . '/js/plugins/uniform/js/jquery.uniform.js' ); ?>
<?php Yii::app()->clientScript->registerCssFile( Yii::app()->themeManager->baseUrl . '/js/plugins/uniform/css/uniform.default.css' ); ?>




<!-- main project js file -->
<?php
Yii::app()->clientScript->registerScript('re-install-date-picker', "
        function reinstallDatePicker(id, data) {
            jQuery('#datepicker_for_due_date').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['".(Yii::app()->language=='en'?'':Yii::app()->language)."'], {'dateFormat':'".Yii::app()->locale->getDateFormat('medium_js')."'}));
            jQuery('#datepicker_for_due_date_last').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['".(Yii::app()->language=='en'?'':Yii::app()->language)."'], {'dateFormat':'".Yii::app()->locale->getDateFormat('medium_js')."'}));
        }
        ");
?>
<script type="text/javascript">

            jQuery("#PopupLanguage").hide();
            jQuery(".link_PopupLanguage").click(function(){            
                        
                if(jQuery("#PopupLanguage").is(':visible')){
                    jQuery("#PopupLanguage").fadeOut(200);
                }else{
                    jQuery("#PopupLanguage").fadeIn(300); 
                }
                
               return false;
               
            });

        </script>
</body>
</html>
