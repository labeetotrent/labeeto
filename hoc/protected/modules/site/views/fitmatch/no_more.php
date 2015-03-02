<?php
/**
 * Created by PhpStorm.
 * User: slashman
 * Date: 05.01.15
 * Time: 22:40
 */
/* @var $fitmatch User */
$cs = Yii::app()->clientScript;
//    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/foursquare.autocomplete.js');
//    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/slashman_myfeed.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/jquery.blImageCenter.js');
$cs->registerCssFile(Yii::app()->themeManager->baseUrl.'/css/fitmatch.css');
?>
<div class="col-md-12 fitmatch-container">
    <div class="col-md-12 fitmatch-header hidden-xs">
        Fit Match
    </div>
    <div class="col-md-12 fitmatch-body">
        <div class="col-md-2 left-side">

        </div>
        <div class="col-md-8 text-center">
            <div class="row">
                <div class="col-md-12">
                    <img src="<?=Yii::app()->themeManager->baseUrl?>/images/fitmatch-searching.gif" class="img-responsive searching-gif">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 searching-text">
                    Searching for training buddies...
                </div>
            </div>
        </div>
        <div class="col-md-2 right-side">

        </div>
    </div>
</div>
<script>
    //$('.photo img').centerImage();
</script>