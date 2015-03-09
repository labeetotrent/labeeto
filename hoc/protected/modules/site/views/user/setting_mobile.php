<?php
$cs = Yii::app()->clientScript;
//    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/foursquare.autocomplete.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/jquery-ui.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/jquery.mousewheel.min.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/jquery.smoothdivscroll-1.3-min.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/settings.js');
//    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/slashman_myfeed_autoload.js');
?>

<?php $this->renderPartial('../elements/header-feed'); ?>
<?php $this->renderPartial('../elements/footer-menu'); ?>
<div class="statusbar-overlay"></div>
<!-- Panels overlay-->
<div class="panel-overlay"></div>
<!-- Left panel with reveal effect-->
<div class="panel panel-left panel-reveal">
    <div class="content-block">
        <p>Left panel content goes here</p>
    </div>
</div>
<!-- Views -->
<div class="views">
    <!-- Your main view, should have "view-main" class -->
    <div class="view view-main">
        <!-- Top Navbar-->

        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
            <!-- Page, "data-page" contains page name -->
            <div data-page="index" class="page">
                <!-- Scrollable page content -->
                <div class="page-content" style="background-color: white; padding-top: 0;">
                    <div class="row settings-header" style="background-image: url('<?=Yii::app()->request->baseUrl?>/uploads/cover/<?=$this->user->facebook_cover;?>');">
                        <div class="col-xs-4 profile-thumb">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="<?=Yii::app()->request->baseUrl?>/uploads/avatar/<?=$this->user->photo;?>" class="img-responsive"/>
                                </div>
                            </div>
                            <div class="row view-profile-link">
                                <div class="col-md-12">
                                    <a href="/profile" class="external">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row settings-categories">
                        <a href="#" class="col-md-12">
                            <div class="col-md-12 row category">
                                <div class="col-md-2 icon">
                                    <i class="fa fa-lightbulb-o"></i>
                                </div>
                                <div class="col-md-10 text">
                                    <div class="col-md-12 title">
                                        Discovery Preferences
                                    </div>
                                    <div class="col-md-12 description">
                                        Change who you see
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="col-md-12">
                            <div class="col-md-12 row category catfix">
                                <div class="col-md-2 icon">
                                    <i class="fa fa-cog"></i>
                                </div>
                                <div class="col-md-10 text">
                                    <div class="col-md-12 title">
                                        System Settings
                                    </div>
                                    <div class="col-md-12 description">
                                        Notification, account, and other settings
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-12">
                            <div class="col-md-12 row category">
                                <div class="col-md-2 icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="col-md-10 text">
                                    <div class="col-md-12 title">
                                        Contact Labeeto
                                    </div>
                                    <div class="col-md-12 description">
                                        We want to hear it all
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-md-12">
                            <div class="col-md-12 row category">
                                <div class="col-md-2 icon">
                                    <i class="fa fa-share-alt"></i>
                                </div>
                                <div class="col-md-10 text">
                                    <div class="col-md-12 title">
                                        Share Labeeto
                                    </div>
                                    <div class="col-md-12 description">
                                        Sharing is caring
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>