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
                                                Name</div>
                                            <div class="item-input">
                                                <label class="label-switch">

				<input type="text" id="name" name="name" value="<?=$this->user->username;?>"/>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="label">
                                                Email</div>
                                            <div class="item-input"">
                                                <label class="label-switch">

                                                    <input type="text" id="email" name="email" style="width:auto;"value="<?=$this->user->email;?>"/>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>

                                                    <textarea rows="5" cols="50" placeholder="Please enter a detailed description of any feedback you have or any bugs you have encountered"  id="feedback" name="feedback" style="width:auto;height:auto;"></textarea>
                                </li>



                                <li>
                                    <a href="#" id="save-feedback" class="item-link item-content external">
                                        <div class="item-inner">
                                            <div class="item-title">Submit</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
    </div>
</div>

<script>
    $(document).ready(function(){
 $('#save-feedback').click(function(e){
 e.preventDefault();	
    
            $.post(
//"http://requestb.in/1lcn3si1",
Yii.app.createUrl('settings/saveFeedback'),
                {
                    name: $('#name').val(),
                    email: $('#email').val(),
		    feedback: $('#feedback').val()
        }
            ).done(function(response){
		  
                if(response == 'OK') {
                    myApp.alert('Your feedback was sent successfully', '');
                }
            });
        });
    })
</script>
