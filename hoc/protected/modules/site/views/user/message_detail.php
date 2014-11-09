<!--<div class="banner-ad-top">
    <img src="<?php // echo Yii::app()->themeManager->baseUrl; ?>/images/ads-top.png" />
</div>-->
<div class="content-main-setting">
    
    <div class="menu-nav-message">
        <ul style="float: right;">
            <li class="message_new"><a href="/user/newmessage"><span class="new_message">New Message</span></a></li>
            <li class="li_message"><span class="all_message">JESSICA</span></li>
            <li class="list_action">
                <ul>
                    <li><span class="archive_message">archive</span></li>
                    <li><span class="delete_message">delete</span></li>
                    
                </ul>
            </li>
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
                <li class="messege_to_me">
                    <div style="float: left;">
                            <img src="/themes/default/images/avatart-step2.png" alt="" />
                    </div>
                    <div class="name_time">
                        <h6>Jessica</h6>
                        <span>Sept 28, 2014, 8:31pm</span>
                    </div>
                    
                    <div class="view_message">
                        <h6>Hi there, may I view your private photos?</h6>
                        <div class="btn-sure">
                            <span class="sure">Sure</span>
                            <span class="noway">No way</span>
                        </div>
                    </div>
                </li>
                <li class="messege_to_me">
                    <div style="float: left;">
                            <img src="/themes/default/images/avatart-step2.png" alt="" />
                    </div>
                    <div class="name_time">
                        <h6>Jessica</h6>
                        <span>Sept 28, 2014, 8:31pm</span>
                    </div>
                    
                    <div class="view_message">
                        <h6>Sure babydoll. Where you at? </h6>
                        <span>You have shared your private photos to Jessica</span>
                    </div>
                </li>
                <li class="messege_to_me bk_green">
                    <div style="float: left;">
                            <img src="/themes/default/images/avatart-step2.png" alt="" />
                    </div>
                    <div class="name_time">
                        <h6>Jessica</h6>
                        <span>Sept 28, 2014, 8:31pm</span>
                    </div>
                    
                    <div class="view_message">
                        <h6>Sure babydoll. Where you at? </h6>
                        <span>You have shared your private photos to Jessica</span>
                        <!--<span class="text_message">
                        In by an appetite no humoured returned informed
                         </span>-->
                    </div>
                    
                </li>
                <li class="compose">
                    Write a reply
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
                    <div style="float: right;">
                        <span class="send_message_1">Reply</span>
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


