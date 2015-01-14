<?php
$notificationsCount = Notification::countNotifications();
?>
<div class="head-feed">
    <div class="content-head">
        <a href="/my_feed" id="logo">
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/new_logo.png" alt="Logo"/>
        </a>
        <div class="menu-nav" style="width: 340px; height: 1px;">
            <!-- <a href="/user/advanceSearch" class="menu-item"><span class="icon search"></span> SEARCH</a> -->
           <!-- <a href="#" class="menu-item"><span class="icon top-rate"></span>TOP RATED</a>
            <a href="#" class="menu-item"><span class="icon get-fit"></span>GET FIT</a>
            <a href="#" class="menu-item"><span class="icon inspire"></span>INSPIRE</a>-->
        </div>
        <div class="notify">
            <div class="search-request" >
                <a href="/user/advanceSearch" class="menu-item"></a> 
            </div>
            <div class="olock-request">
                <a href="<?=$this->createUrl('/fitmatch/index');?>" class="menu-item"></a>
            </div>
            <div class="friend-request friend-active">
                <div class="notice-notify">8</div>
            </div>
            <div class="message-request"> <!-- Class active: message-active -->
                <!--<div class="notice-notify">45</div>-->
                <a href="<?=$this->createUrl('/im');?>" class="menu-item"></a>
            </div>
            <div class="notify-request notify-active" id="toggle-notification">
                <?php if($notificationsCount > 0) { ?> <div class="notice-notify clicked-notification" id="notifications-counter"><?=$notificationsCount;?></div> <?php } ?>
                <div class="menu-notification">
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
            </div>
        </div>
        <div class="profile-nav">
            <div class="test-nav" style="width: 175px; float: right; height: 50px;">
                
                <div class="username-nav">
                    <?php
                    if(strlen(Yii::app()->user->username) > 8){
                        echo "Welcome," ."<div class='uper-case'>".substr(Yii::app()->user->username, 0, 5). '...'."</div>";
                    }else{
                        echo "Welcome," ."<div class='uper-case'>".Yii::app()->user->username."</div>";
                    }

                    ?>
                </div>
                <?php
                    error_reporting(0);
                ?>
                </div>
            <!--<div>
                <div class="n_menu_profile">
                    <img src="/uploads/avatar/<?php //echo $this->user->photo ?>" />
                    <h4>AYANA PALISUC</h4>
                    <p><span></span></p>
                </div>
            </div>-->
            <div class="menu-profile">
                <div class="n_menu_profile">
                    <a href="/profile">
                        <img src="/uploads/avatar/<?php echo $this->user->photo ?>" />
                        <h4>AYANA PALISUC</h4>
                        <p><span></span></p>
                        <h4 class="description_user">YOUR PROFILE</h4>
                    </a>
                </div>
                <div class="menu-child">
                    <ul>
                        <li><a href="#" class="profile-item"><span class="icon-profile invite-friend"></span><span class="content-pro">INVITE FRIENDS</span></a></li>
                        <li><a href="/settings" class="profile-item"><span class="icon-profile settings"></span><span class="content-pro">SETTINGS</span></a></li>
                        <li><a href="#" class="profile-item"><span class="icon-profile upgrade-account"></span><span class="content-pro">UPGRADE ACCOUNT</span></a></li>
                        <li><a href="/user/logout" class="profile-item"><span class="icon-profile logout"></span><span class="content-pro"></span>LOG OUT</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>