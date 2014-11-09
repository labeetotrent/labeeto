<!--<div class="banner-ad-top">
    <img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/ads-top.png" />
</div>-->
<div class="content-main-setting">
    
    <div class="menu-nav-message">
        <ul style="float: right;">
            <li class="message_new"><span class="new_message">New Message</span></li>
            <li class="li_message"><span class="all_message">NEW MESSAGE</span></li>
            <!--<li class="list_message">
                <ul>
                    <li><span class="message_1"><</span></li>
                    <li><span class="message_1">1</span></li>
                    <li><span class="message_1">2</span></li>
                    <li><span class="message_1">12</span></li>
                    <li><span class="message_1">13</span></li>
                    <li><span class="message_1">></span></li>
                </ul>
            </li>-->
        </ul>
    </div>
    <div class="message-header">
        <div class="content_left_message">
            <ul>
                <li><a href="#" style="border-left: 4px solid #5dc1ea;"><span class="message_5" style="color: #5dc1ea;">MESSAGES</span></a></li>
                <li><a href="#"><span class="sent">SENT (23)</span></a></li>
                <li><a href=""><span class="archived">ARCHIVED (543)</span></a></li>
                <li><a href=""><span class="trash">TRASH (72)</span></a></li>
                <li class="message_search">
                    <input type="text" class="form-control" placeholder="Search" />
                </li>
            </ul>
        </div>
        <div class="message_box_all">
            <ul class="content_message_box">
                <li class="send_message">
                    <div class="sent_to"> To: </div>
                    <div style="float: left;"><img src="/themes/default/images/avatart-step2.png" alt="" /></div>
                    <div class="send_name">Robyn Rihanna Fenty</div>
                </li>
                <li class="compose">
                    Compose a message
                </li>
                <li>
                    <textarea class="form-control" placeholder="Write a message..."></textarea>
                </li>
                <li class="add_some">
                    <div style="float: left;">
                        <span class="add-media">
                            <input type="file" name="media_post" id="media" style="display: none;" />
                            <label for="media" class="label-add-media">Add Media</label>
                        </span>
                    </div>
                    <div style="float: left;">
                        <span class="add-location">
                            <input type="file" name="media_post" id="media" style="display: none;" />
                            <label for="media" class="label-add-media">Add Media</label>
                        </span>
                    </div>
                    <div>
                        <span class="invite">
                            <input type="checkbox" id="private_photos"/>
                            <label for="private_photos">Invite to view private photos</label>
                        </span>
                    </div>
                    <div style="float: right;">
                        <span class="send_message_1">Send</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
</div>
 
<br />
<div class="">
    <?php    if(isset($_SESSION['User'])) {    ?>
        <div class="col-lg-12">
            You logged with facebook acount:
        </div>
        <img src="https://graph.facebook.com/<?php echo $_SESSION['User']['id']; ?>/picture" width="50"/><div><?php echo $_SESSION['User']['name'];?></div>
        <a href="<?php echo $_SESSION['facebook_logout'];?>">Logout</a>
        <div class="col-lg-12">
            This page is processing develop...
        </div>
    <?php } ?>
</div>


