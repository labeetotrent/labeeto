<!--<div class="banner-ad-top">
    <img src="<?php // echo Yii::app()->themeManager->baseUrl; ?>/images/ads-top.png" />
</div>-->
<div class="content-main-1" >
    <?php //$this->widget('widgets.admin.notifications'); ?>
     <!-- Content Left  -->
    <div class="left-content">
        <!-- Form first -->
        <form id="form-achievement" class="post-home" method="post" action="/achievement" enctype="multipart/form-data">
            <div class="content-avatar">
                <div class="avatar-post">
                    <img src="../uploads/avatar/<?php echo Utils::getAvatar($info_user->photo); ?>" class="new-photo-achievement">
                </div>
            </div>
            <div class="content-textarea">
                <textarea class="post-textarea" placeholder="Post an achievement..." name="content"></textarea>
            </div>
            <div class="footer-post">
                <span class="add-media">
                   <!-- <input type="file" name="media_post" id="media" style="display: none;" />-->
                    <label for="media" class="label-add-media"></label>
                </span>
                <span class="add-location" style="margin-top: 10px;">
                    <label for="location" style="margin-top: 5px;" class="lable-add-location"></label>
                </span>
                <input type="submit" class="post-btn" value="Post" />
            </div>
        </form>

        <!--End Form first -->
        
        <!--Form Search -->
        <div class="tabs">
            <div>
                <div class="content-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="<?php if(!isset($_GET['search'])) echo "active"; ?>"><a href="#popular" role="tab" data-toggle="tab">Popular</a></li>
                        <li><a href="#recent" role="tab" data-toggle="tab">Recent</a></li>
                        <li class="<?php if(isset($_GET['search'])) echo "active"; ?>"><a href="#trending" role="tab" data-toggle="tab">Trending</a></li>
                    </ul>
                </div>
                <!--<div class="my-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="<?php //if(!isset($_GET['search'])) echo "active"; ?>"><a href="#popular" role="tab" data-toggle="tab">Popular</a></li>
                      <li><a href="#recent" role="tab" data-toggle="tab">Recent</a></li>
                      <li class="<?php // if(isset($_GET['search'])) echo "active"; ?>"><a href="#trending" role="tab" data-toggle="tab">Trending</a></li>
                    </ul>
                </div>-->
                <div class="tab-content">
                    <div id="popular" class="tab-pane  <?php if(!isset($_GET['search'])) echo "active"; ?>">
                        <?php
                          $this->widget('zii.widgets.CListView', array(
                              'dataProvider'=>$popular,
                              'itemView'=>'../elements/popular_view',
                              'summaryText'=>'',
                              'viewData'=>array('infor'=>$info_user),
                              'pager'        => array(
                                    'firstPageLabel' => '<<',
                                    'prevPageLabel'  => '<',
                                    'nextPageLabel'  => '>',
                                    'lastPageLabel'  => '>>',
                              ),
                          ));
                          ?>
                    </div>
                    <div id="recent" class="tab-pane">
                        <?php
                          $this->widget('zii.widgets.CListView', array(
                              'dataProvider'=>$achievement,
                              'itemView'=>'../elements/achievement_view',
                              'summaryText'=>'',
                              'viewData'=>array('infor'=>$info_user),
                              'pager'        => array(
                                    'firstPageLabel' => '<<',
                                    'prevPageLabel'  => '<',
                                    'nextPageLabel'  => '>',
                                    'lastPageLabel'  => '>>',
                              ),
                          ));
                          ?>
                    </div>
                    <div id="trending" class="tab-pane <?php if(isset($_GET['search'])) echo "active"; ?>" >
                        <!--<div class="my-tabs-div"></div>-->
                        <div>
                            <div class="content-form-trending">
                                <form>
                                    <input type="text" name="search" class="form-control seach-tab" value="<?php if(isset($_GET['search'])) echo '#'. preg_replace('/[^A-Za-z0-9\-]/', '', $_GET['search']); ?>"/>
                                </form>
                            </div>
                            <!--<div class="my-tabs-footer">
                                <p>CURRENTLY TRENDING <span id="toggle">Menu toggel</span></p>
                                <?php if($trending){ ?>
                                <div class="menu-slide">
                                    <span></span>
                                    <ul>
                                        <?php //foreach($trending as $value){ ?>
                                        <li><a href="/my_feed?search=<?php //echo $value['text'] ?>">#<?php //echo $value['text'] ?></a></li>
                                        <?php // } ?>
                                    </ul>
                                </div>
                                <?php } ?>
                            </div>-->
                            <div class="content-search-trending">
                                <ul style="width: 30%;">
                                    <li><a href="#">#LOL</a></li>
                                    <li><a href="#">#iPhone6Plus</a></li>
                                    <li><a href="#">#RIPBebeYash</a></li>
                                    <li><a href="#">#YASSS</a></li>
                                    <li><a href="#">#PaidHoliday</a></li>
                                </ul>
                                <ul style="width: 30%;">
                                    <li><a href="#">#Haggard</a></li>
                                    <li><a href="#">#JLONewApt</a></li>
                                    <li><a href="#">#2NE1onBH</a></li>
                                    <li><a href="#">#HowAboutNO</a></li>
                                    <li><a href="#">#BreakingNews</a></li>
                                </ul>
                                <ul style="width: 40%;">
                                    <li><a href="#">#StealMyGirlVideoToday</a></li>
                                    <li><a href="#">#TillaCaroUKTour</a></li>
                                    <li><a href="#">#OttoPorterToSouthBeach</a></li>
                                    <li><a href="#">#MessageToSelf</a></li>
                                    <li><a href="#">#TeamGWEN</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <?php
                          $this->widget('zii.widgets.CListView', array(
                              'dataProvider'=>$search,
                              'itemView'=>'../elements/trending_view',
                              'summaryText'=>'',
                              'viewData'=>array('infor'=>$info_user),
                              'pager'        => array(
                                    'firstPageLabel' => '<<',
                                    'prevPageLabel'  => '<',
                                    'nextPageLabel'  => '>',
                                    'lastPageLabel'  => '>>',
                              ),
                          ));
                          ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="pagination-post">
            <ul>
                <li class="prev-post"><a href="#"><</a></li>
                <li class="normal-pag"><a href="#">1</a></li>
                <li class="special-pag"><a href="#">2</a></li>
                <li class="normal-pag"><a href="#" >3</a></li>
                <li class="normal-pag"><a href="#">4</a></li>
                <li><a href="#">....</a></li>
                <li class="normal-pag"><a href="#" >9</a></li>
                <li class="normal-pag"><a href="#">10</a></li>
                <li class="next-post"><a href="#">></a></li>
            </ul>
        </div>-->
        <!--End Form Search -->
        
    </div>
    <!--End Content Left  -->
    <!-- Content Right -->
    <div class="right-content">
        <div class="content_all_user">
            <div class="featured">
                FEATURED USERS
            </div>
            <ul>
                <li>
                    <div class="user_name_f">
                        <a href="#"><img src="/themes/default/images/f_avatar.png"></a>
                        <div class="f_information">
                            <h4>thatsmyjam853</h4>
                            <span>22, Nashville, TN</span>
                        </div>
                        <div class="message_email">
                            <span class="f_email"></span>
                            <span class="f_message"></span>
                        </div>
                    </div>
                </li>
                
                <li>
                    <div class="user_name_f">
                        <a href="#"><img src="/themes/default/images/f_avatar.png"></a>
                        <div class="f_information">
                            <h4>thatsmyjam853</h4>
                            <span>22, Nashville, TN</span>
                        </div>
                        <div class="message_email">
                            <span class="f_email"></span>
                            <span class="f_message"></span>
                        </div>
                    </div>
                </li>
                
                <li>
                    <div class="user_name_f">
                        <a href="#"><img src="/themes/default/images/f_avatar.png"></a>
                        <div class="f_information">
                            <h4>thatsmyjam853</h4>
                            <span>22, Nashville, TN</span>
                        </div>
                        <div class="message_email">
                            <span class="f_email"></span>
                            <span class="f_message"></span>
                        </div>
                    </div>
                </li>
                
                <li>
                    <div class="user_name_f">
                        <a href="#"><img src="/themes/default/images/f_avatar.png"></a>
                        <div class="f_information">
                            <h4>thatsmyjam853</h4>
                            <span>22, Nashville, TN</span>
                        </div>
                        <div class="message_email">
                            <span class="f_email"></span>
                            <span class="f_message"></span>
                        </div>
                    </div>
                </li>
                
                <li>
                    <div class="user_name_f">
                        <a href="#"><img src="/themes/default/images/f_avatar.png"></a>
                        <div class="f_information">
                            <h4>thatsmyjam853</h4>
                            <span>22, Nashville, TN</span>
                        </div>
                        <div class="message_email">
                            <span class="f_email"></span>
                            <span class="f_message"></span>
                        </div>
                    </div>
                </li>
                
            </ul>
        </div>
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
<!-- Modal Report-->
<div class="modal fade" id="ReportUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content special-border">
      <div class="modal-header header-report">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title report-title">Are you sure you want to block this user? </h4>
        <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avatar-post-small.png">
        <span class="user-kaka user-ricky" id="my_username"></span>
      </div>
      <form method="post">
        <input type="hidden" value="0" id="IdOfUser" />
        <select class="form-control" style="border-radius: 0;" id="type_report">
            <option value="Offensive Messaging">Offensive Messaging</option>
            <option value="Offensive Profile">Offensive Profile</option>
            <option value="Offensive Image">Offensive Image</option>
            <option value="Spamming/Scamming">Spamming/Scamming</option>
        </select>
        <br />
        <textarea name="comment" id="comment_report" class="form-control" placeholder="Add comment here..." rows="4">
           
        </textarea>
        <input type="hidden" id="achievements_id" value="0" />
      <div class="modal-footer footer-report">
        <div class="agreed">
            <input type="checkbox" name="" class="pull-left"/> 
            <span>Would you also like to block this user from making contact with you?</span>
        </div>
        <button type="button" class="btn btn-primary my-report" id="ReportedUser" >Report</button> 
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Message-->
<div class="modal fade" id="SendaMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header header-report special-border">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <span class="span-to">To</span> <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avatar-post-small.png">
            <span class="user-kaka" id="txt_username"></span>
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

<!-- Modal Add Location-->
<div class="modal fade" id="addLocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content special-border">
            <div class="modal-header header-report">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title report-title">Add a location to post </h4>
            </div>
            <div class="">
               <input id="address" class="location fix-input-location validate[required]" name="location-popup" type="text" placeholder="Where are you?">
                <div id="maps-test-location"></div>
            </div>
            <div class="modal-footer footer-report">
                <div class="agreed">
                </div>
                <a type="button" class="btn btn-primary my-report">Add</a>
            </div>
        </div>
    </div>
</div>



<script>
    $('.post-btn').click(function(){
        content = $('.post-textarea').val();
        if( content != '')
            $('#form-achievement').submit();
    });
</script>
