<div class="banner-ad-top">
    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/ads-top.png" />
</div>
<div class="content-main">
    <?php //$this->widget('widgets.admin.notifications'); ?>
     <!-- Content Left  -->
    <div class="left-content">
        <!-- Form first -->
        <form class="post-home" method="post" name="" action="#">
            <div class="content-avatar">
                <div class="avatar-post">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avatar-post.png">
                </div>
            </div>
            <div class="content-textarea">
                <textarea class="post-textarea" placeholder="Post an achievement..."></textarea>
            </div>
            <div class="footer-post">
                <a href="#" class="add-media">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/icon-upload.png" />
                    Add Media
                </a>
                <a href="#" class="add-location">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/icon-location.png" />
                    Add Location
                </a>
                <a href="#" class="post-btn">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/post-home.png" />
                </a>
            </div>
        </form>
        
        <!--End Form first -->
        
        <!--Form Search -->
        <div class="tabs">
            <div>
                <div class="my-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="active"><a href="#popular" role="tab" data-toggle="tab">Popular</a></li>
                      <li><a href="#recent" role="tab" data-toggle="tab">Recent</a></li>
                      <li><a href="#trending" role="tab" data-toggle="tab">Trending</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="popular" class="tab-pane"></div>
                    <div id="recent" class="tab-pane"></div>
                    <div id="trending" class="tab-pane">
                        <div class="my-tabs-div"></div>
                        <form>
                            <input type="text" name="search" class="form-control seach-tab"/>
                        </form>
                        <div class="my-tabs-footer">
                            <p>CURRENTLY TRENDING <span id="toggle">Menu toggel</span></p>
                            <div class="menu-slide">
                                <span></span>
                                <ul>
                                    <li><a href="#">#LOL</a></li>
                                    <li><a href="#">#Legday</a></li>
                                    <li><a href="#">#CARDIO</a></li>
                                    <li><a href="#">#ALSawareness</a></li>
                                    <li><a href="#">#WCW</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Form Search -->
        
        <!--Post 1-->
        <div class="post"> 
            <div class="first-infor">
                <div class="profile">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avatar-post-small.png">
                    <div class="crycle-img">
                        <h2>Robyn Rihanna Fenty <span class="time-location">18 F, CA,</span> <span class="dot-icon"> 2 hr</span></h2>
                        <a class="message" data-toggle="modal" data-target="#SendaMessage">Send a Message</a>
                        <a class="report-user" data-toggle="modal" data-target="#ReportUser">Report User</a>
                    </div>
                </div>
                <span class="refesh">10</span>
            </div>
            <div class="content-post">
                <h3><span class="link_1">ICEBUCKET</span> <span class="link_3">CHALLENGE</span> <span class="link_2">#ALSawareness #LOL</span></h3>
                <iframe title="YouTube video player" class="youtube-player" type="text/html" style="padding-left: 20px;"
                width="98%" height="390" src="http://www.youtube.com/embed/uIbkLjjlMV8"
                frameborder="0" allowFullScreen></iframe>
            </div>
        </div>
        <!--End Post 1 -->
        
        
        <!--Post 2-->
        <div class="post"> 
            <div class="first-infor">
                <div class="profile">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avarta_3.png">
                    <div class="crycle-img">
                        <h2>Robyn Rihanna Fenty <span class="time-location">18 F, CA,</span> <span class="dot-icon"> 2 hr</span></h2>
                        <a class="message" data-toggle="modal" data-target="#SendaMessage">Send a Message</a>
                        <a class="report-user" data-toggle="modal" data-target="#ReportUser">Report User</a>
                    </div>
                </div>
                <span class="refesh">10</span>
            </div>
            <div class="content-post">
                <h3><span class="link_1">yumMmm</span> <span class="link_3">#burger #7200cal</span> <span class="link_2">#LOL #depressed </span></h3>
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/break.png">
            </div>
        </div>
        <!--End Post 2 -->
        <!--Post 3-->
        <div class="post"> 
            <div class="first-infor">
                <div class="profile">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avarta_2.png">
                    <div class="crycle-img">
                        <h2>William Leonard Roberts II<span class="time-location">33 M, NY,</span> <span class="dot-icon">Yesterday</span></h2>
                        <a class="message" data-toggle="modal" data-target="#SendaMessage">Send a Message</a>
                        <a class="report-user" data-toggle="modal" data-target="#ReportUser">Report User</a>
                    </div>
                </div>
                <div class="refesh">15</div>
            </div>
            <div class="content-post">
                <h3>Shoutout to my nigga Manny Pacman Pacquiao for
                    helping in my weight-loss programme. <span class="link_1">#LOL</span></h3>
            </div>
        </div>
        <!--End Post 3 -->
        
        <!--Post 4-->
        <div class="post"> 
            <div class="first-infor">
                <div class="profile">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avarta_1.png">
                    <div class="crycle-img">
                        <h2>Ricky Martin<span class="time-location">43 M, PI,</span><span class="dot-icon"> Aug 14</span></h2>
                        <a class="message" data-toggle="modal" data-target="#SendaMessage">Send a Message</a>
                        <a class="report-user" data-toggle="modal" data-target="#ReportUser">Report User</a>
                    </div>
                </div>
                <div class="refesh">12</div>
            </div>
            <div class="content-post">
                <h3><span class="link_1">OUCH</span> <span class="link_3">#LOL</span> <span class="link_2">#legday</span></h3>
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/img_2.png">
            </div>
        </div>
        <!--End Post 4 -->
        
        <div class="pagination-post">
            <ul>
                <li><a href="#" class="prev-post"><</a></li>
                <li><a href="#" class="normal-pag">1</a></li>
                <li><a href="#" class="special-pag">2</a></li>
                <li><a href="#" class="normal-pag">3</a></li>
                <li><a href="#" class="normal-pag">4</a></li>
                <li><a href="#">....</a></li>
                <li><a href="#" class="normal-pag">9</a></li>
                <li><a href="#" class="normal-pag">10</a></li>
                <li><a href="#" class="next-post">></a></li>
            </ul>
        </div>
        
        
    </div>
    <!--End Content Left  -->
    <!-- Content Right -->
    <div class="right-content">
        <div>
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/ad1.png" />
        </div>
        <br />
        <div>
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/ad2.png" />
        </div>
        
        <br />
        <div>
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/ad3.png" />
        </div>
        
        <br />
        <div>
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/ad5.png" />
        </div>
        
        <br />
        <div>
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/ad4.png" />
        </div>
    </div>
     <!-- End Content Right -->

</div>
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

<script>
$(document).ready(function(){
   $("#toggle").click(function(){
    $(".menu-slide").toggle();
   });
   
   $("#toggle-notification").click(function(){
    $(".menu-notification").toggle();
   });

});
</script>

<!-- Modal Report-->
<div class="modal fade" id="ReportUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-report">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title report-title">Is there something wrong with this profile? </h4>
        <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avatar-post-small.png">
        <span class="user-kaka">Ricky Martin</span>
      </div>
      <div class="">
        <select class="form-control" style="border-radius: 0;">
            <option>Test</option>
            <option>Test</option>
            <option>Test</option>
            <option>Test</option>
        </select>
      </div>
      <div class="modal-footer footer-report">
        <div class="agreed">
            <input type="checkbox" name=""/> <span>Would you also like to block this user from making contact with you?</span>
        </div>
        <a type="button" class="btn btn-primary my-report">Report</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Message-->
<div class="modal fade" id="SendaMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header header-report">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            To <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avatar-post-small.png">
            <span class="user-kaka">Ricky Martin</span>
          </div>
          <div class="">
            <textarea class="form-control" rows="4" cols="50" placeholder="Write a message"></textarea>
          </div>
          <div class="modal-footer footer-report">
            <a type="button" class="btn btn-primary my-report">Send</a>
          </div>
    </div>
  </div>
</div>

