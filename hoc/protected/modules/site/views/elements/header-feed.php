<?php
$notificationsCount = Notification::countNotifications();
$messagesCount = Chat::countNewMessages();
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container text-center">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" style="margin: 0 auto;">
            <a class="navbar-brand external" href="/my_feed">
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/newlogo.png" class="img-responsive" alt="Logo"/>
            </a>
        </div>
    </div><!-- /.container-fluid -->
</nav>