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
                        <div class="profile-thumb">
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
                    <div class="settings-elements">
                        <div class="list-block">
                            <ul>
                                <!-- Text inputs -->
                                <li>
                                    <a href="/logout" class="item-link item-content external">
                                        <div class="item-inner">
                                            <div class="item-title">Logout</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>