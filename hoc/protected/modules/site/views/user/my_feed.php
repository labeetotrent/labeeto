<?php

$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/foursquare.autocomplete.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/slashman_myfeed.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/slashman_myfeed_autoload.js');
$cs->registerCssFile(Yii::app()->themeManager->baseUrl.'/css/fs-autocomplete.css');
?>
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
            <div class="col-md-12 footer-post">
                <div class="thumb-container col-md-1 col-md-offset-1">
                    <img src="" class="hidden" id="media-post-thumb"/>
                </div>
                <input type="file" class="hidden" name="media_post" id="post-photo" />
                <input type="file" class="hidden" name="video_file" id="post-video" />
                <input type="hidden" class="hidden" name="Location[lon]" id="geo-lon" />
                <input type="hidden" class="hidden" name="Location[lat]" id="geo-lat" />
                <input type="hidden" class="hidden" name="Location[name]" id="geo-name" />
                <input type="hidden" class="hidden" name="Location[address]" id="geo-address" />
                <div class="col-md-4 col-md-offset-2">
                    <span class="add-media">
                        <i class="fa fa-camera no-file"></i>
                    </span>
                    <span class="add-video">
                        <i class="fa fa-film no-file"></i>
                    </span>
                    <span class="add-location">
                        <label for="location" class="lable-add-location"></label>
                        <i class="fa fa-map-marker no-file"></i>
                    </span>
                </div>
                <div class="col-md-2 pull-right">
                    <input type="submit" class="post-btn" value="Post" />
                </div>
                <div class="geo-tag-container hidden col-md-12">
                    <div class="col-md-12 find-place">
                        <input type="text" class="form-control" id="place-name"/>
                    </div>
                    <div class="col-md-12 set-geo hidden" id="set-geo">

                    </div>
                </div>
            </div>
        </form>

        <!--End Form first -->
        
        <!--Form Search -->
        <div class="tabs">
            <div>
                <div class="content-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li tab="recent" class="<?php if(!isset($_GET['search'])) echo "active"; ?>"><a href="#recent" role="tab" data-toggle="tab">Recent</a></li>
                        <li tab="popular"><a href="#popular" role="tab" data-toggle="tab">Popular</a></li>
                        <li class="<?php if(isset($_GET['search'])) echo "active"; ?>" tab="search"><a href="#trending" role="tab" data-toggle="tab">Trending</a></li>
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
                    <div id="recent" class="tab-pane <?php if(!isset($_GET['search'])) echo "active"; ?>">
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
                    <div id="popular" class="tab-pane">
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
                    <div id="trending" class="tab-pane <?php if(isset($_GET['search'])) echo "active"; ?>" >
                        <!--<div class="my-tabs-div"></div>-->
                        <div>
                            <div class="content-form-trending">
                                <form>
                                    <input type="text" name="search" class="form-control seach-tab" value="<?php if(isset($_GET['search'])) echo '#'. preg_replace('/[^A-Za-z0-9\-]/', '', $_GET['search']); ?>"/>
                                </form>
                            </div>
                            <div class="content-search-trending">
                                <?php
                                foreach(Tag::model()->findAll(array('order' => 'posts DESC')) as $tag)
                                {
                                    echo '<div class="col-md-4"><a href="'.$this->createUrl('my_feed', array('search' => $tag->name)).'">#'.$tag->name.'</a></div>';
                                }
                                ?>
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
