<?php
    $cs = Yii::app()->clientScript;
//    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/foursquare.autocomplete.js');
//    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/slashman_myfeed.js');
    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/slashman_im.js');
    $cs->registerCssFile(Yii::app()->themeManager->baseUrl.'/css/im.css');
?>
<div class="row im-wrapper">
    <div class="col-md-5 dialogs-column">
        <div class="col-md-12 dialogs-search">
            <input type="text" class="form-control" placeholder="Search"/>
            <i class="fa fa-search"></i>
        </div>
        <div class="row dialogs">
            <div class="col-md-12 dialog has-new">
                <div class="col-md-3 avatar">
                    <img src="<?=Yii::app()->themeManager->baseUrl?>/images/fish/avatar.png" class="img-circle img-responsive"/>
                </div>
                <div class="col-md-7 text">
                    <div class="row nickname">
                        slurtyfox201
                    </div>
                    <div class="row last-message">
                        Hello, My name is Aleesa. How do you do,
                        and where are you from?
                    </div>
                </div>
                <div class="col-md-2 info">
                    <div class="row date">
                        Nov 15
                    </div>
                    <div class="row messages-count">
                        <span class="badge">3</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12 dialog has-new active">
                <div class="col-md-3 avatar">
                    <img src="<?=Yii::app()->themeManager->baseUrl?>/images/fish/avatar.png" class="img-circle img-responsive"/>
                </div>
                <div class="col-md-7 text">
                    <div class="row nickname">
                        slurtyfox201
                    </div>
                    <div class="row last-message">
                        Hello, My name is Aleesa. How do you do,
                        and where are you from?
                    </div>
                </div>
                <div class="col-md-2 info">
                    <div class="row date">
                        Nov 15
                    </div>
                    <div class="row messages-count">
                        <span class="badge">3</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12 dialog">
                <div class="col-md-3 avatar">
                    <img src="<?=Yii::app()->themeManager->baseUrl?>/images/fish/avatar.png" class="img-circle img-responsive"/>
                </div>
                <div class="col-md-7 text">
                    <div class="row nickname">
                        slurtyfox201
                    </div>
                    <div class="row last-message">
                        Hello, My name is Aleesa. How do you do,
                        and where are you from?
                    </div>
                </div>
                <div class="col-md-2 info">
                    <div class="row date">
                        Nov 15
                    </div>
                    <div class="row messages-count">
                        <span class="badge" style="display: none;">3</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7 messages-column">
        <div class="col-md-12 messages-header">
            <div class="col-md-2 avatar">
                <img src="<?=Yii::app()->themeManager->baseUrl?>/images/fish/avatar.png" class="img-circle img-responsive"/>
            </div>
            <div class="col-md-6 text">
                <div class="row nickname">
                    slurtyfox201
                </div>
                <div class="row address">
                    22, F, Chesapeake, VA
                </div>
            </div>
            <div class="col-md-4 buttons">
                <div class="row new-message">
                    <a class="pink-button col-md-12">New Message</a>
                </div>
                <div class="row actions">
                    <a class="pink-button col-md-12">Actions <span class="bulls">&bull;&bull;&bull;</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-12 messages">
            <div class="col-md-12 message">
                <div class="col-md-2 avatar">
                    <img src="<?=Yii::app()->themeManager->baseUrl?>/images/fish/avatar.png" class="img-circle img-responsive"/>
                </div>
                <div class="col-md-10">
                    <div class="row message-info">
                        <span class="nickname">themissymiley</span>
                        <span class="date">Nov 12, 6:41pm</span>
                    </div>
                    <div class="row message-content">
                        onec at quam id felis luctus dapibus. Integer luctus metus in maximus dapibus. Phasellus
                        eleifend, urna et interdum scelerisque, est odio rhoncus lectus
                    </div>
                </div>
            </div>
            <div class="col-md-12 message my">
                <div class="col-md-10">
                    <div class="row message-info">
                        <span class="date">Nov 12, 6:41pm</span>
                        <span class="nickname">ME</span>
                    </div>
                    <div class="row message-content">
                        onec at quam id felis luctus dapibus. Integer luctus metus in maximus dapibus. Phasellus
                        eleifend, urna et interdum scelerisque, est odio rhoncus lectus
                    </div>
                </div>
                <div class="col-md-2 avatar">
                    <img src="<?=Yii::app()->themeManager->baseUrl?>/images/fish/avatar.png" class="img-circle img-responsive"/>
                </div>
            </div>
        </div>
        <div class="col-md-12 message-form">
            <div class="col-md-12 form-panel">
                <div class="row message-textarea">
                    <textarea placeholder="Message"></textarea>
                </div>
                <div class="row message-panel-footer">
                    <div class="col-md-6 pull-left icons">
                        <i class="fa fa-camera"></i>
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="col-md-6 send-button-container">
                        <a class="pink-button simple send-message-button">Send</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>