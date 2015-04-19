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
            <a class="navbar-brand external" href="/my_feed">
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
                </li>
                <li>
                    <a href="/settings" class="external">
                        <i class="fa fa-cog"></i><span class="link-label visible-xs">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="/profile" class="external">
                        <i class="fa fa-user"></i><span class="link-label visible-xs">Profile</span>
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
