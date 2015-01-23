<?php
$notificationsCount = Notification::countNotifications();
$messagesCount = Chat::countNewMessages();
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/my_feed">
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/new_logo.png" class="img-responsive" alt="Logo"/>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right navbar-icons">
                <li>
                    <a href="<?=$this->createUrl('/fitmatch/index');?>">
                        <i class="fa fa-clock-o"></i>
                    </a>
                </li>
                <li>
                    <a href="<?=$this->createUrl('/im/index');?>">
                        <i class="fa fa-envelope"></i>
                    </a>
                </li>
                <li>
                    <a href="<?=$this->createUrl('/notification/index');?>" class="visible-xs">
                        <i class="fa fa-bell"></i>
                    </a>
                    <a href="#" class="hidden-xs" id="toggle-notification">
                        <i class="fa fa-bell"></i>
                    </a>
                    <div class="menu-notification hidden-xs">
                        <div class="notification-balloon"></div>
                        <div class="notification-dropdown-items col-md-12 row">
                            <?php
                            $lastNotifications = Notification::getLastNotifications();
                            if(count($lastNotifications) > 0)
                            {
                                foreach(Notification::getLastNotifications() as $notification)
                                {
                                    $this->renderPartial('/elements/notification/_dropdownNotification', array('data' => $notification));
                                }
                            }
                            else
                            {
                                ?>
                                <div class="text-center col-md-12 no-notifications">You have no notifications yet..</div>
                            <?php
                            }
                            ?>

                            <div class="col-md-12 notification-dropdown-all">
                                <a href="<?=$this->createUrl('/notification/index');?>">View all notifications</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="/settings">
                        <i class="fa fa-cog"></i>
                    </a>
                </li>
                <li>
                    <a href="/profile">
                        <i class="fa fa-user"></i>
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>