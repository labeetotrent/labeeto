<!--<div class="banner-ad-top">
    <img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/ads-top.png" />
</div>-->
<div class="content-main-1">
    <?php //$this->widget('widgets.admin.notifications'); ?>
    
    
    <div class="infor-user">
        <div class="report-user-1">
            <!--<a class="report-user user-report">Report User</a>-->
        </div>

        <div class="avartar">
            <?php error_reporting(0);?>
            <?php  if(($model->photo =='') || ($model->photo =='undefined')){ ?>
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/no-avatar.png">
            <?php } else { ?>
                <img src="/uploads/avatar/<?php echo $model->photo ?>" />
            <?php } ?>
        </div>
        <div class="content-infor-profile">
            <div class="name_user">
                <?php echo Utils::short_description($model->username,10); ?>
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/<?php echo ($model->is_online ==  User::USER_ONLINE)? 'search-online.png' :'search-btn-gray.png'; ?>" style="padding-bottom: 3px;" >
                <?php if($model->verified ==  User::MEMBER_VERIFIED){ ?>
                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Verified User" style="background: transparent; border: none;">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/search-check-red.png">
                </a>
                <?php } ?>
            </div>
            <div class="menu-nav-infor">
                <ul style="float: right;">
                    <li><a href="#" data-toggle="modal" data-target="#WantToChat"><span class="span-chat"></span>CHAT</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#SendaMessage"><span class="span-message"></span>Message</a></li>
                    <?php if($favorite == false){ ?>
                        <li><a class="favorite_user" data-id="<?php echo $model->id ?>"  style="color: #51a9cd;"><span class="span-favorited"></span>Favorited</a></li>
                    <?php }else{ ?>
                        <li><a class="favorite_user" data-id="<?php echo $model->id ?>"><span class="span-favorite"></span>Favorite</a></li>
                    <?php } ?>
                    
                    <li>
                        <a href="#" data-toggle="modal" data-target="#RateUser" class="rate_user_profile" data-id="<?php echo $model->id ?>"  >
                            <span class="span-rate"></span>Rate</a>
                        <input type="hidden" id="other_photo_<?php echo $model->id ?>" value="<?php echo $model->photo ?>" />
                        <input type="hidden" id="other_name_<?php echo $model->id ?>" value="<?php echo $model->username ?>" />
                    </li>
                </ul>
            </div>
        </div>
       
        <div class="content-img">
            <div style="float: left; width: 60%; padding-left: 14%;">
                <div class="street"><span class="icon-people"></span>
                <?php $age = date("Y") - date('Y', strtotime($model->birthday));  echo $age;  ?>, 
                <?php  if($model->gender == 1) echo "F"; else echo 'M'; ?>, <?php echo $model->gender_look ?>
                    <?php if ($model->membership ==  User::MEMBER_VERIFIED ) { ?>
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/verify.png" >
                    <?php } ?>
                </div>
                <div class="businuess"><span class="icon-vali"></span><?php echo $model->career; ?></div>
                <div class="location"><span class="icon-location"></span><?php echo $model->address; ?></div>
            </div>
            <div class="img-photo-video">
                <div class="photo-private" id="PhotoNomal">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/photo.png" />
                    <h6>Photos</h6>
                    <h3><?php echo count($photos)?></h3>
                    <span class="line-green-photo"></span>
                </div>
                <div class="photo-private" >
                    <a href="#" data-toggle="modal" data-target="#PrivatePhoto">
                        <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/photo.png" />
                        <h6>Private Photo</h6>
                        <h3><?php echo count($private)?></h3>
                    </a>
                </div>
                <div class="photo-private" id="VideosNormal">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/videos.png" />
                    <h6>Videos</h6>
                    <h3><?php echo count($video); ?></h3>
                    <span class="line-green-video"></span>
                </div>
                
            </div>
        </div>
        
    </div>
    <div class="left-profile">
        <!--Post 1-->
        <!--<span class="arrow-up"></span>-->
        <div class="post" style="border: none; position: relative;" > 
            <!--<div class="looking-for">
                <span class="looking_img">LOOKING FOR</span> <span class="stick-green-profile"></span>
                <a href="#"><span class="check-ok"></span></a>-->
                <!--<p>
                <span class="txt-female-profile">
                    <?php //if($model->training == 0) echo 'No,'; else echo "Yes,"; ?>
                    <?php //echo $model->relations. ',' ?>
                    <?php // if($model->gender == 1) echo "Female,"; else echo 'Male,'; ?>
                    <?php //echo "Ages: ".  $model->age  ?>
                    
                </span>
                
                </p>-->
                 <div class="looking-for">
                    <span class="looking_img">LOOKING FOR</span>
                    <p>
                        <span class="txt-gender">Gender: </span>
                        <?php if($user->gender == $model->gender_look) {?>
                            <span class="txt-female" style="color: #9cdd2b;"><?php  if($model->gender_look == 1) echo "Female"; else echo 'Male'; ?></span>
                            <span class="stick-green"></span>
                        <?php }else{ ?>
                            <span class="txt-female"><?php  if($model->gender_look == 1) echo "Female"; else echo 'Male'; ?></span>
                        <?php } ?>
                    </p>
                    <p>
                        <span class="txt-gender">Relationship: </span>
                        <?php if($user->relations_look == $model->relations_look) {?>
                        <span class="txt-female" style="color: #9cdd2b;"><?php echo $model->relations_look ?></span>
                        <span class="stick-green"></span>
                        <?php }else{ ?>
                            <span class="txt-female"><?php echo $model->relations_look ?></span>
                        <?php } ?>
                    </p>
                    <p>
                        <?php 
                            $arr_age_user = explode("-",$model->age);
                            $age_user = date("Y") - date('Y', strtotime($user->birthday));
                        ?>
                        <span class="txt-gender">Age: </span>
                        <?php if(($arr_age_user[0] <= $age_user) && ($age_user <= $arr_age_user[1] )){ ?>
                        <span class="txt-female" style="color: #9cdd2b;"><?php echo $model->age ?></span>
                        <span class="stick-green"></span>
                        <?php }else{ ?>
                            <span class="txt-female"><?php echo $model->age ?></span>
                        <?php } ?>
                    </p>
                    <p>
                        <span class="txt-gender">Training Buddy: </span>
                        <?php if($user->training == $model->training) {?>
                        <span class="txt-female" style="color: #9cdd2b;"><?php if($model->training == 0) echo 'No'; else echo "Yes"; ?></span>
                        <span class="stick-green"></span>
                        <?php }else{ ?>
                            <span class="txt-female"><?php if($model->training == 0) echo 'No'; else echo "Yes"; ?></span>
                        <?php }?>
                    </p>
                </div>
                <!--</div>-->
            <div class="looking-about">
                <span class="looking_about">about</span>
                <p><?php echo $model->about; ?></p>
            </div>
            
            <div class="education">
                <span class="education-span">education</span>
                <span class="bachelor"><?php echo Education::model()->getNameEducation($model->education); ?></span>
            </div>
            
            <div class="education">
                <span class="education-span">RELIGION</span>
                <span class="bachelor"><?php echo Religion::model()->getNameReligion($model->religion) ?></span>
            </div>
            
            <div class="education">
                <span class="education-span">ETHNICITY</span>
                <span class="bachelor"><?php echo Ethnicity::model()->getNameEthnicity($model->ehtnicity) ?></span>
            </div>
            
            <div class="education">
                <span class="education-span">HEIGHT</span>
                <span class="bachelor"><?php echo $model->height . Yii::t('global', ' FEET') ?></span>
            </div>
            
            <div class="education">
                <span class="education-span">CHILDREN</span>
                <span class="bachelor"><?php echo Children::model()->getNameChildren($model->children); ?></span>
            </div>
            
            <div class="content-bit favorite_a">
                <span class="what">Fitness passion</span>
                <span class="godfather"><?php echo $model->passion ?></span>
            </div>
            
            <div class="content-bit favorite_a">
                <span class="what">GYM MEMBERSHIP</span>
                <span class="godfather"><?php echo $model->gym; ?></span>
            </div>
            
            <div class="content-bit favorite_a">
                <span class="what">DIET</span>
                <span class="godfather"><?php echo $model->diet ?></span>
            </div>
            
            <div class="content-bit favorite_a">
                <span class="what">Goals</span>
                <span class="godfather"><?php echo $model->goal ?></span>
            </div>
            
            
            <div class="content-bit favorite_a">
                <span class="what">HOW OFTEN DO YOU EXCERCISE?</span>
                <div style="position: relative;">
                    
                    <span class="godfather"><?php echo Yii::t('global', 'Never') ?></span>
                    <p class="range-2" id="value-excercise">
                        <span class="ws-range" role="slider" aria-readonly="false" tabindex="0" aria-disabled="false" aria-valuenow="<?php echo $model->excercise; ?>" aria-valuetext="<?php /*if($this->user->excercise) echo $this->user->excercise; */?>">
                            <span class="ws-range-min ws-range-progress" style="margin-top: 0px; width: <?php echo $model->excercise; ?>%;"></span>
                            <span class="ws-range-rail ws-range-track" style="left: 11px; right: 9px;">
                                <span class="ws-range-thumb" style="margin-left: -11px; margin-top: -6px; left: <?php echo $model->excercise; ?>%;">
                                     </span>
                            </span>
                        </span>
                    </p>
                    <span class="often"><?php echo Yii::t('global', 'Often') ?></span>
                </div>
            </div>
            
            <div class="content-bit favorite_a">
                <span class="what">DO YOU DRINK?</span>
                <div style="position: relative;">
                    
                    <span class="godfather"><?php echo Yii::t('global', 'Never') ?></span>
                    <p class="range-2" id="value-drink">
                        <span class="ws-range" role="slider" aria-readonly="false" tabindex="0" aria-disabled="false" aria-valuenow="<?php echo $model->drink; ?>" aria-valuetext="<?php /*if($this->user->excercise) echo $this->user->excercise; */?>">
                            <span class="ws-range-min ws-range-progress" style="margin-top: 0px; width: <?php echo $model->drink; ?>%;"></span>
                            <span class="ws-range-rail ws-range-track" style="left: 11px; right: 9px;">
                                <span class="ws-range-thumb" style="margin-left: -11px; margin-top: -6px; left: <?php echo $model->drink; ?>%;">
                                     </span>
                            </span>
                        </span>
                    </p>
                    <span class="often"><?php echo Yii::t('global', 'Often') ?></span>
                    
                </div>
            </div>
            
            <div class="content-bit-final favorite_a">
                <span class="what">DO YOU SMOKE?</span>
                <div style="position: relative;">
                    
                    <span class="godfather"><?php echo Yii::t('global', 'Never') ?></span>
                    <p class="range-2" id="value-smoke">
                        <span class="ws-range" role="slider" aria-readonly="false" tabindex="0" aria-disabled="false" aria-valuenow="<?php echo $model->smoke; ?>" aria-valuetext="<?php /*if($this->user->excercise) echo $this->user->excercise; */?>">
                            <span class="ws-range-min ws-range-progress" style="margin-top: 0px; width: <?php echo $model->smoke; ?>%;"></span>
                            <span class="ws-range-rail ws-range-track" style="left: 11px; right: 9px;">
                                <span class="ws-range-thumb" style="margin-left: -11px; margin-top: -6px; left: <?php echo $model->smoke; ?>%;">
                                     </span>
                            </span>
                        </span>
                    </p>
                    <span class="often"><?php echo Yii::t('global', 'Often') ?></span>
                </div>
            </div>
            
        </div>
        <!--End Post 1 -->
    </div>
    <div class="right-profile">
        
        <!--Photo Page-->
        <!--<div class="content-photo" style="display: none;">
            <div class="title-photo">
                <h3>Photos <span>(243 Photos)</span></h3>
                <p>
                    <a href="#">Upload</a>
                    <a href="#">delete</a>
                    <a href="#" class="close-icon"></a>
                </p>
                
            </div>
            <ul>
                <li><a href="#"><img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/photo_1.png"></a></li>
                <li><a href="#"><img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/photo_2.png"></a></li>
                <li><a href="#"><img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/photo_3.png"></a></li>
                <li><a href="#"><img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/photo_4.png"></a></li>
                <li><a href="#"><img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/photo_5.png"></a></li>
                <li><a href="#"><img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/photo_6.png"></a></li>
                <li><a href="#"><img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/photo_1.png"></a></li>
                <li><a href="#"><img src="<?php ///echo Yii::app()->themeManager->baseUrl; ?>/images/photo_2.png"></a></li>
                <li><a href="#"><img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/photo_3.png"></a></li>
                <li><a href="#"><img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/photo_4.png"></a></li>
                <li><a href="#"><img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/photo_5.png"></a></li>
                <li><a href="#"><img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/photo_6.png"></a></li>
            </ul>
        </div>-->
        
        
        <!--<div class="content-video" style="display: none;">
            <div class="title-photo">
                <h3>Videos <span>(2 Videos)</span></h3>
                <p>
                    <a href="#" class="close-icon"></a>
                </p>
                
            </div>
            
            <div class="post-video"> 
                <!--<div class="title-video">
                    <!--<h2>This is my title</h2>
                </div>-->
                <!--<div class="content-post">
                    <h3><span class="link_3">ICEBUCKET CHALLENGE</span> <span class="link_2">#ALSawareness </span><span class="link_1">#LOL</span></h3>
                    <span class="hour-post">1 hr</span>
                    <iframe title="YouTube video player" class="youtube-player" type="text/html" style="padding-left: 10px; padding-bottom: 10px;"
                    width="98%" height="390" src="http://www.youtube.com/embed/uIbkLjjlMV8"
                    frameborder="0" allowFullScreen></iframe>
                </div>
            </div>
            
            <div class="post-video video-border"> 
                <!--<div class="title-video">
                   <!-- <h2>This is my title</h2>
                </div>-->
               <!-- <div class="content-post">
                    <h3><span class="link_3">Workout like a pro in 3 minutes.</span></h3>
                    <span class="hour-post">1 hr</span>
                    <iframe title="YouTube video player" class="youtube-player" type="text/html" style="padding-left: 10px; padding-bottom: 10px;"
                    width="98%" height="390" src="http://www.youtube.com/embed/uIbkLjjlMV8"
                    frameborder="0" allowFullScreen></iframe>
                </div>
            </div>
            
        </div>-->
        <?php $this->renderPartial('/user/video',compact('video')) ?>
        <?php $this->renderPartial('/user/photo_profile_other',compact('photos','private')) ?>
        <!--Home Page-->
        <div class="content-profile">
        <!--Post 1-->
            <!--<div class="post"> 
                <div class="first-infor infor-pro">
                    <div class="profile">
                        <img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/avatart-step2.png">
                        <div class="crycle-img">
                            <h2 class="h2-name">Rome Martin J. Rosales<span class="time-location">18 F, CA,</span> <span class="dot-icon"> 2 hr</span></h2>
                        </div>
                    </div>
                    <span class="refesh">1002</span>
                </div>
                <div class="content-post">
                    <h3><span class="link_3">ICEBUCKET CHALLENGE</span> <span class="link_2">#ALSawareness </span><span class="link_1">#LOL</span></h3>
                    <iframe title="YouTube video player" class="youtube-player" type="text/html" style="padding-left: 10px; padding-bottom: 10px;"
                    width="98%" height="390" src="http://www.youtube.com/embed/uIbkLjjlMV8"
                    frameborder="0" allowFullScreen></iframe>
                </div>
            </div>->
            <!--End Post 1 -->
            
            <!--<div class="post"> 
                <div class="first-infor infor-pro">
                    <div class="profile">
                        <img src="/themes/default/images/avatart-step2.png">
                        <div class="crycle-img">
                            <h2 class="h2-name">Rome Martin J. Rosales<span class="time-location">18 F, CA,</span> <span class="dot-icon"> 2 hr</span></h2>
                        </div>
                    </div>
                    <span class="refesh">12</span>
                </div>
                <div class="content-post">
                    <h3 style="padding-left: 10px;"><span class="link_1">yumMmm</span> <span class="link_3">#burger #7200cal</span> <span class="link_2">#LOL #depressed </span></h3>
                    <img style="padding-left: 10px; padding-right: 10px;" src="/themes/default/images/break.png">
                </div>
            </div>-->
            <?php if($achievements) { 
                foreach($achievements as $value){
                ?>
                <div class="post"> 
                    <div class="first-infor infor-pro">
                        <div class="profile">
                        <?php if($model->photo =='undefined'){ ?>
                            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/no-avatar.png">
                        <?php } else { ?>
                            <img src="/uploads/avatar/<?php echo $model->photo ?>" />
                        <?php } ?>
                        <img class="online-icon-p" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/online-icon.png" />
                            <div class="crycle-img">
                            <h2 class="h2-name">
                                <a href="/user/detail/<?php echo $model->id; ?>"><?php echo $model->username ?></a>
                                <img class="premium-icon" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/premium_2.png" />
                                <img class="check-icon" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/icon_check.png" />
                            </h2>
                            <h2>
                                <span class="time-location">33 M, NY,</span>
                                <span class="dot-icon"><?php echo Achievements::time_elapsed_string($model->created); ?></span>
                            </h2>
                            </div>
                        </div>
                        <div class="vote">
                            <ul>
                                <li class="upvote" id="upvote_<?php echo $value->id; ?>" data-id=<?php echo $value->id; ?>></li>
                                <li><span class="change_vote_<?php echo $value->id; ?>"><?php echo Achievements::model()->getCore($value->id); ?></span></li>
                                <li class="downvote" id="downvote_<?php echo $value->id; ?>" data-id=<?php echo $value->id; ?>></li>
                            </ul>
                        </div>
                    </div>
                    <div class="content-post">
                        <h4>
                        <?php 
                          $arr = $value->content;
                          $search = array(); $replace = array();
                          for($i = 0; $i < strlen($arr) - 1; $i++){
                                if($arr[$i] == '#'){
                                    $str = '';
                                    for($j = $i; $j< (strlen($arr) ); $j++){
                                        if($arr[$j] != ' '){
                                            $str.= $arr[$j];
                                        }else{
                                            break;
                                        }
                                    }
                                    $search[] = $str;
                                    $replace[] = '<span class="link_2">'. $str .'</span>';
                                }
                          }
                          echo str_replace($search, $replace, $value->content); ?> <!--<span class="link_1">#LOL</span>--></h4>
                        <?php if($value->media){ 
                            $filetype = pathinfo($value->media, PATHINFO_EXTENSION);
                            if(($filetype == 'jpg') || ($filetype == 'PNG') || ($filetype == 'png') || ($filetype == 'GIF') || ($filetype == 'gif')){ ?>
                                <img src="/uploads/media/<?php echo $value->media ?>" alt="" />
                            <?php }
                            if(($filetype == '3gp') || ($filetype == 'avi') || ($filetype == 'flv') || ($filetype == 'mp4') || ($filetype == 'FLV')){ ?>
                                <div class="video-view" style="padding: 10px; width: 100%;">
                                <?php echo $model->getVideo($value->media) ?>
                                </div>
                           <?php }
                        } ?>
                        <div class="comment-post-home">
                        <p style="padding-bottom: 10px;"><span class="comment_txt">Comment</span><span class="comment_count">(2)</span></p>
                        <ul>
                            <li>
                                <div class="user_comment_post">
                                    <a href="#"><img src="/themes/default/images/1_avarta.png"></a>
                                    <div class="infor_comment">
                                        <h5><span>cutesyjf24</span></h5>
                                        <h6><span class="minus_1">8 min </span> - <span class="where_location">Tampa Bay, FL</span></h6>
                                    </div>
                                    <div class="comment_detail_post">
                                        <span>Of Course! Russian Models are hot hot hot!</span>
                                        <a href="#"><img src="/themes/default/images/three_dot.png" /></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="user_comment_post">
                                    <a href="#"><img src="/themes/default/images/1_avarta.png"></a>
                                    <div class="infor_comment">
                                        <h5><span>cutesyjf24</span></h5>
                                        <h6><span class="minus_1">8 min </span> - <span class="where_location">Tampa Bay, FL</span></h6>
                                    </div>
                                    <div class="comment_detail_post">
                                        <span>Of Course! Russian Models are hot hot hot!</span>
                                        <a href="#"><img src="/themes/default/images/three_dot.png" /></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                      </div>
                      <div class="my_comment">
                        <div style="float: left; margin-left: 5px;">
                            <a href="#"><img src="/themes/default/images/1_avarta.png"></a>
                        </div>
                        <div class="content_input_comment">
                            <input class="form-control comment_post_txt" placeholder="Add comment here..." />
                        </div>
                      </div>
                    </div>
                </div>
            <?php } }?>
        </div>
        
        <div class="post" style="padding-bottom: 0px;"> 
             <div class="bit-and-bit">
                <span class="bit">BITS AND BITS</span>
            </div>
            <?php if($question){
                    $i = 0;
                    foreach($question as $value){  
                        if($i == (count($question) - 1) ) $class = 'content-bit-final';
                        else $class = 'content-bit';
                        ?>
                        <div class="<?php echo $class; ?>">
                            <span class="what"><?php echo Question::model()->getQuestion($value['question_id']); ?></span>
                            <span class="godfather"><?php echo $value['answer']; ?></span>
                        </div>
                    
                   <? $i++; }
            } ?>
        </div>
        
    </div>
 

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

<!-- Modal Message-->
<div class="modal fade" id="WantToChat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content special-border">
      <div class="modal-header header-report">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title request-title">Do you wish to chat with this person? </h4>
        
      </div>
      <div class="modal-footer footer-report">
        <div class="avatar-model">
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avatar-post-small.png">
            <span class="request-romeo">Romeo</span>
        </div>
        <a type="button" class="btn btn-primary my-report">Send Chat Request</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="PrivatePhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content special-border">
      <div class="modal-header header-report">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title access-title">Do you wish to access his private photos? </h4>
        
      </div>
      <div class="modal-footer footer-report">
        <div class="avatar-model">
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avatar-post-small.png">
            <span class="request-romeo">Romeo</span>
        </div>
        <a type="button" class="btn btn-primary my-report">Ask for permission</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="SendaMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header header-report special-border">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <span class="span-to">To</span> <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avatar-post-small.png">
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


<div class="modal fade" id="RateUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog">
    <div class="modal-content" style="width: 440px;">
          <div class="modal-header header-report special-border" style="background-color: #e8e8e8; border-bottom-color: #cdc7c7;">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <span class="span-to">Rate</span> <img class="dis_img" src="">
            <span class="user-kaka"></span>
          </div>
          <div style="text-align: center; background-color: #f0f0f0;">
            <div class="content-star-rate">
                   <?php 
                      $this->widget('ext.dzRaty.DzRaty', array(
                            'name' => 'my_rating_'.$model->id,
                            'value' => Ratings::model()->getRating($model->id),
                            'options' => array(
                                    'half' => TRUE,
                                    	'click' => "js:function(score, evt){ ratings(score,".$model->id.") }",
    
                            ),
                            'htmlOptions' => array(
                            'class' => 'new-half-class'
                            ),
                        ));
                    ?>
                
          </div>
          <span class="text-rate">(set RATING name per number of stars)</span>
          </div>
          <div class="modal-footer footer-report" style="border: none;">
            <a type="button" class="btn btn-primary my-report" id="close_rate" >Rate</a>
          </div>
    </div>
  </div>
</div>