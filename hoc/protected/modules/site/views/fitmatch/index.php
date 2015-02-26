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
        <div class="col-md-8 card-container">
            <div class="col-md-12 card-info">
                <div class="col-md-4 avatar">
                    <img src="/uploads/avatar/<?php echo $fitmatch->photo ?>" class="img-responsive img-circle"/>
                </div>
                <div class="col-md-8 user-info">
                    <div class="row nickname-info">
                        <div class="nickname col-md-5">
                            <?=$fitmatch->username;?>
                        </div>
                        <div class="labels col-md-7">
                            &nbsp;
                        </div>
                    </div>
                    <div class="row personal-info">
                        <div class="col-md-4 birth">
                            <i class="fa fa-user"></i> <?= date("Y") - date('Y', strtotime($fitmatch->birthday));  ?>, <?php if($fitmatch->gender == 1) echo "Female"; else echo 'Male'; ?>
                        </div><!--
                        <div class="col-md-4 job">
                            <?/*=$fitmatch->career;*/?>
                        </div>-->
                        <div class="col-md-4 location">
                            <i class="fa fa-map-marker"></i> <?=$fitmatch->address;?>
                        </div>
                    </div>
                    <div class="row about-info">
                        <?php if($fitmatch->about) echo $fitmatch->about; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 card-decision">
                <div class="col-md-12 decision-header">
                    Training buddy?
                </div>
                <div class="col-md-12 decision-buttons">
                    <div class="row">
                        <div class="col-md-6 col-xs-6 decision-button-container">
                            <form method="POST">
                                <input type="hidden" name="Fitmatch[to_user]" value="<?=$fitmatch->getPrimaryKey();?>"/>
                                <input type="hidden" name="Fitmatch[result]" value="0"/>
                                <button type="submit" class="decision-button btn-next col-xs-12">NO</button>
                            </form>
                        </div>
                        <div class="col-md-6 col-xs-6 decision-button-container">
                            <form method="POST">
                                <input type="hidden" name="Fitmatch[to_user]" value="<?=$fitmatch->getPrimaryKey();?>"/>
                                <input type="hidden" name="Fitmatch[result]" value="1"/>
                                <button type="submit" class="decision-button btn-yes col-xs-12">YES</button>
                            </form>
                        </div>
                    </div>
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