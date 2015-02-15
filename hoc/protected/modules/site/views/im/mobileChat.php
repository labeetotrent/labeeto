<?php
$cs = Yii::app()->clientScript;

$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/strophe/strophe.min.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/strophe/mobile_im.js');
$cs->registerCssFile(Yii::app()->themeManager->baseUrl.'/css/im.css');
?>
<script>
    var myId = '<?=Yii::app()->user->getId();?>';
    var userId = '<?=$user_id;?>';
    var xmppUser = '<?=$this->user->id.'@zhilin.skib6.ru';?>';
    var xmppPass = '123';
    //var xmppPass = '<?=$this->user->password;?>';
</script>
<!-- Status bar overlay for full screen mode (PhoneGap) -->
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
        <div class="navbar">
            <div class="navbar-inner">
                <div class="left">
                    <a href="<?=$this->createUrl('/im');?>" class="link external">
                        <i class="icon icon-back-blue"></i>
                        <span>Back</span>
                    </a>
                </div>
                <!-- We need cool sliding animation on title element, so we have additional "sliding" class -->
                <div class="center sliding">Messages</div>
                <div class="right">
                    <!--
                      Right link contains only icon - additional "icon-only" class
                      Additional "open-panel" class tells app to open panel when we click on this link
                    -->
                    <a href="#" class="link icon-only open-panel"><i class="icon icon-bars-blue"></i></a>
                </div>
            </div>
        </div>
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
            <!-- Page, "data-page" contains page name -->
            <div data-page="index" class="page">
                <!-- Scrollable page content -->
                <div class="page-content messages-content">
                    <div class="messages">
                        <!-- Date stamp -->
<!--                        <div class="messages-date">Sunday, Feb 9 <span>12:58</span></div>-->

                        <?php
                        foreach($messages as $message)
                        {
                            if($message->user_from != Yii::app()->user->getId())
                                $this->renderPartial('/elements/im/mobile/_message', array('data' => $message));
                            else
                                $this->renderPartial('/elements/im/mobile/_myMessage', array('data' => $message));
                        }
                        ?>
                    </div>
                </div>
                <div class="toolbar messagebar">
                    <div class="toolbar-inner message-textarea">
                        <textarea placeholder="Message"></textarea><a href="#" class="link">Send</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>