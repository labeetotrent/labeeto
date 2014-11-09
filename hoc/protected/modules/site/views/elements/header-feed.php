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
                
            </div>
            <div class="friend-request friend-active">
                <div class="notice-notify">8</div>
            </div>
            <div class="message-request"> <!-- Class active: message-active -->
                <!--<div class="notice-notify">45</div>-->
            </div>
            <div class="notify-request notify-active" id="toggle-notification">
                <div class="notice-notify clicked-notification">45</div>
                <div class="menu-notification">
                    <span class="only-this-span"></span>
                    <ul>
                        <li>
                            <span class="notification-header">NOTIFICATIONS</span>
                            <span class="notification-number">(45)</span>
                            <span class="notification-seeall">See All</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/1_avarta.png">
                                <h6>SAORI TABATA <span class="active-infor">likes your</span><span class="content-infor">post</span></h6>
                                <span class="minuten">16 mins</span>
                            </a>

                        </li>

                        <li>
                            <a href="#">
                                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/2_avata.png">
                                <h6>EMMA ROSE BUNTON <span class="active-infor">likes your</span><span class="content-infor">post</span></h6>
                                <span class="minuten">18 mins</span>
                            </a>

                        </li>

                        <li>
                            <a href="#">
                                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/3_avata.png">
                                <h6>MIRIAM REGALADO <span class="active-infor">likes your</span><span class="content-infor">ROFILE PICTURE</span></h6>
                                <span class="minuten">2 hr</span>
                            </a>

                        </li>

                        <li>
                            <a href="#">
                                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/3_avata.png">
                                <h6>MIRIAM REGALADO <span class="active-infor">wants access to your</span><span class="content-infor">pRIVATE PHOTOS</span></h6>
                                <span class="minuten">2 hr</span>
                            </a>
                            <div class="content-active">
                                <span class="delete-post"></span><span class="check-post"></span>
                            </div>

                        </li>

                        <li>
                            <a href="#">
                                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/4_avata.png">
                                <h6>ASH PONCE <span class="active-infor">likes your</span><span class="content-infor">post</span></h6>
                                <span class="minuten">2 hr</span>
                            </a>

                        </li>

                        <li>
                            <a href="#">
                                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/3_avata.png">
                                <h6>MIRIAM REGALADO <span class="active-infor">wants to</span><span class="content-infor">CHAT</span></h6>
                                <span class="minuten">2 hr</span>
                            </a>
                            <div class="content-active">
                                <span class="delete-post"></span><span class="check-post"></span>
                            </div>

                        </li>

                    </ul>
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