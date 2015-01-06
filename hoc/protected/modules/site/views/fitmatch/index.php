<?php
/**
 * Created by PhpStorm.
 * User: slashman
 * Date: 05.01.15
 * Time: 22:40
 */

$cs = Yii::app()->clientScript;
//    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/foursquare.autocomplete.js');
//    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/slashman_myfeed.js');
$cs->registerCssFile(Yii::app()->themeManager->baseUrl.'/css/fitmatch.css');
?>
<div class="col-md-12 fitmatch-container">
    <div class="col-md-12 fitmatch-header">
        Fit Match
    </div>
    <div class="col-md-12 fitmatch-body">
        <div class="col-md-2 left-side">

        </div>
        <div class="col-md-8 card-container">
            <div class="col-md-12 card-info">
                <div class="col-md-4 avatar">
                    <img src="<?=Yii::app()->themeManager->baseUrl;?>/images/fish/avatar.png" class="img-responsive img-circle"/>
                </div>
                <div class="col-md-8 user-info">
                    <div class="row nickname-info">
                        <div class="nickname col-md-5">
                            ACandiceS
                        </div>
                        <div class="labels col-md-7">
                            &nbsp;
                        </div>
                    </div>
                    <div class="row personal-info">
                        <div class="col-md-4 birth">
                            24, Female
                        </div>
                        <div class="col-md-4 job">
                            Supermodel
                        </div>
                        <div class="col-md-4 location">
                            New York, NY
                        </div>
                    </div>
                    <div class="row about-info">
                        I am a small town girl.  Country music is a must! I love being
                        outdoors & enjoy camping, fishing and fourwheeling.
                        I absolutely love my job but it comes with long hours
                        and consists of shift work.
                    </div>
                    <div class="row tags">
                        <div class="tag">
                            <div class="tag-left"></div>
                            <div class="tag-middle">yoga</div>
                            <div class="tag-right"></div>
                        </div>
                        <div class="tag">
                            <div class="tag-left"></div>
                            <div class="tag-middle">kickboxing</div>
                            <div class="tag-right"></div>
                        </div>
                        <div class="tag">
                            <div class="tag-left"></div>
                            <div class="tag-middle">swimming</div>
                            <div class="tag-right"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 card-photos">
                <div class="col-md-12 photos-header">
                    ACandiceS Photos
                </div>
                <div class="col-md-12 photos">
                    <div class="col-md-2 photo">
                        <img src="<?=Yii::app()->themeManager->baseUrl;?>/images/fish/avatar.png" class="img-responsive img-circle"/>
                    </div>
                    <div class="col-md-2 photo">
                        <img src="<?=Yii::app()->themeManager->baseUrl;?>/images/fish/avatar.png" class="img-responsive img-circle"/>
                    </div>
                    <div class="col-md-2 photo">
                        <img src="<?=Yii::app()->themeManager->baseUrl;?>/images/fish/avatar.png" class="img-responsive img-circle"/>
                    </div>
                    <div class="col-md-2 photo">
                        <img src="<?=Yii::app()->themeManager->baseUrl;?>/images/fish/avatar.png" class="img-responsive img-circle"/>
                    </div>
                    <div class="col-md-2 photo">
                        <img src="<?=Yii::app()->themeManager->baseUrl;?>/images/fish/avatar.png" class="img-responsive img-circle"/>
                    </div>
                    <div class="col-md-2 photo">
                        <img src="<?=Yii::app()->themeManager->baseUrl;?>/images/fish/avatar.png" class="img-responsive img-circle"/>
                    </div>
                </div>
            </div>
            <div class="col-md-12 card-decision">
                <div class="col-md-12 decision-header">
                    Interested?
                </div>
                <div class="col-md-12 decision-buttons">
                    <div class="col-md-12">
                        <button class="btn btn-default btn-cancel-st col-md-12">Sorry, next, please!</button>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-default btn-save-st col-md-12">Yes, yes, YES!</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 right-side">

        </div>
    </div>
</div>