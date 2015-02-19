
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
        <nav class="navbar labeeto navbar-default navbar-fixed-top">
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
                                <i class="fa fa-clock-o"></i><span class="link-label visible-xs">Fitmatch</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?=$this->createUrl('/im/index');?>">
                                <i class="fa fa-envelope"></i><span class="link-label visible-xs">Inbox</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?=$this->createUrl('/notification/index');?>" class="visible-xs external">
                                <i class="fa fa-bell"></i><span class="link-label visible-xs">Notifications</span>
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
                                <i class="fa fa-cog"></i><span class="link-label visible-xs">Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="/profile">
                                <i class="fa fa-user"></i><span class="link-label visible-xs">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
            <!-- Page, "data-page" contains page name -->
            <div data-page="index" class="page">
                <!-- Scrollable page content -->
                <div class="page-content">
                    <div class="list-block media-list">
                        <ul class="mobile-dialogs">
                            <?php foreach($dialogs as $dialog): ?>
                                <li>
                                    <div class="row">
                                        <div class="col-md-12 dialog">
                                            <a href="<?=$this->createUrl('/im/mobileChat', ['user_id' => $dialog['id']]);?>" class="item-link item-content external">
                                                <div class="col-md-1 avatar">
                                                    <img src="<?=Yii::app()->baseUrl?>/uploads/avatar/<?=$dialog['photo'];?>" class="img-circle img-responsive img-thumbnail">
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="row username">
                                                        <?=$dialog['username'];?>
                                                    </div>
                                                    <div class="row last-message">
                                                        <?=$dialog['lastMessage'];?>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="row date">
                                                        <?=date('d M', strtotime($dialog['created']));?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
<!--                    <a href="--><?//=$this->createUrl('/im/about');?><!--">About app (test link)</a>-->
                </div>
            </div>
        </div>
        <!-- Bottom Toolbar-->
<!--        <div class="toolbar">-->
<!--            <div class="toolbar-inner">-->
<!--                <!-- Toolbar links -->-->
<!--                <a href="#" class="link">Link 1</a>-->
<!--                <a href="#" class="link">Link 2</a>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</div>