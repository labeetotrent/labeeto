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
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="label">
                                                Show me</div>
                                            <div class="item-input">
                                                <label class="label-switch">
                                                    <input type="checkbox">
                                                    <div class="checkbox"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="label">Distance</div>
                                            <div class="item-input">
                                                <div class="range-slider">
                                                    <input type="range" min="2" max="180" value="60" step="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="label">Age from</div>
                                            <div class="item-input">
                                                <div class="range-slider">
                                                    <input type="range" min="18" max="40" value="22" step="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="label">Age to</div>
                                            <div class="item-input">
                                                <div class="range-slider">
                                                    <input type="range" min="18" max="50" value="22" step="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>