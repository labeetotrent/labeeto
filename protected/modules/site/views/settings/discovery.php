<?php
$cs = Yii::app()->clientScript;
//    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/foursquare.autocomplete.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/jquery-ui.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/jquery.mousewheel.min.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/jquery.smoothdivscroll-1.3-min.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/settings.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/nouislider/jquery.nouislider.all.min.js');
$cs->registerCssFile(Yii::app()->themeManager->baseUrl.'/nouislider/jquery.nouislider.min.css');
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
                                                Gym match</div>
                                            <div class="item-input">
                                                <label class="label-switch">

				<input type="checkbox" id="gym-match" name="gym-match"  <?=$this->user->fitmatch_gym_match ? 'checked' : ''?>/>
                                                    <div class="checkbox"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="label">
                                                Show me</div>
                                            <div class="item-input">
                                                <label class="label-switch">

                                                    <input type="checkbox" id="show-me" name="show-me" <?=$this->user->fitmatch_show_me ? 'checked' : ''?>/>
                                                    <div class="checkbox"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="label">
                                                Fimatch Men</div>
                                            <div class="item-input">
                                                <label class="label-switch">
						
                                                    <input type="checkbox" id="show-m" name="show-m" <?=$this->user->matchm ? 'checked' : ''?>/>
                                                    <div class="checkbox"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="label">
                                                Fitmatch Women</div>
                                            <div class="item-input">
                                                <label class="label-switch">
                                                    <input type="checkbox" id="show-f" name="show-f" <?=$this->user->matchf ? 'checked' : ''?>/>
                                                    <div class="checkbox"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>



                                <li>
                                    <div class="item-content tall-item">
                                        <div class="item-inner">
                                            <div class="label">Distance</div>
                                            <div class="item-input">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <span id="distance-value">40</span> km.
                                                    </div>
                                                </div>
                                                <div id="distance-slider"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content tall-item">
                                        <div class="item-inner">
                                            <div class="label">Age</div>
                                            <div class="item-input">
                                                <div class="row" style="width: 100%;">
                                                    <div style="width: 50%; text-align: left;">
                                                        <span id="age-lower-value">16</span>
                                                    </div>
                                                    <div style="text-align: right;">
                                                        <span id="age-upper-value">25</span>
                                                    </div>
                                                </div>
                                                <div id="age-slider"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" id="save-discovery" class="item-link item-content external">
                                        <div class="item-inner">
                                            <div class="item-title">Save</div>
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

<script>
    $(document).ready(function(){
	


        $("#distance-slider").noUiSlider({
            start: <?=$this->user->fitmatch_distance?>,
            connect: 'lower',
            step: 1,
            range: {
                'min': 1,
                'max': 160
            },
            format: {
                to: function ( value ) {
                    return parseInt(value);
                },
                from: function ( value ) {
                    return parseInt(value);
                }
            }
        });
        $("#age-slider").noUiSlider({
            start: [<?=$this->user->fitmatch_age_lower?>, <?=$this->user->fitmatch_age_upper?>],
            connect: true,
            range: {
                'min': 18,
                'max': 60
            },
            format: {
                to: function ( value ) {
                    return parseInt(value);
                },
                from: function ( value ) {
                    return parseInt(value);
                }
            }
        });
        $("#distance-slider").Link('lower').to($("#distance-value"));

        $("#age-slider").Link('lower').to($("#age-lower-value"));
        $("#age-slider").Link('upper').to($("#age-upper-value"));


        $('#save-discovery').click(function(e){
            e.preventDefault();
var fShow = $('#show-me:checked').val();
var gShow = $('#gym-match:checked').val();
var maShow = $('#show-m:checked').val();
var feShow = $('#show-f:checked').val();


	
    


            $.post(
                Yii.app.createUrl('settings/saveDiscovery'),
                {
                    fitmatch_age_upper: $('#age-slider').val()[1],
                    fitmatch_age_lower: $('#age-slider').val()[0],
                    fitmatch_distance: $('#distance-slider').val(),
                    fitmatch_show_me: fShow,
                    fitmatch_gym_match: gShow,
		    matchm: maShow,
		    matchf: feShow
        }
            ).done(function(response){
		  

                if(response == 'OK') {
                    myApp.alert('Your settings were saved', '');
                }
            });
        });
    })
</script>
