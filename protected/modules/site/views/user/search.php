<!--<div class="banner-ad-top">
    <img src="<?php //echo Yii::app()->themeManager->baseUrl; ?>/images/ads-top.png" />
</div>-->
<div class="content-main">
    <?php //$this->widget('widgets.admin.notifications'); ?>
    <div class="search-header">
        <form action="" method="post">
            <div class="main-search">
                <div class="search-block first-block">
                    <div class="text-explore">
                        <input type="text" id="search" placeholder="EXPLOER" name="Search[username]" value="<?php echo isset($username)?$username:''; ?>" class="username"/>
                    </div>
                    <div class="text-explore">
                        <select name="Search[looking_friendship]" id="education" class="username">
                            <?php
                                $look = array(
                                    '-1'=>Yii::t('global','LOOKING FOR: FRIENDSHIP'),
                                    '1'=>Yii::t('global','Straight '),
                                    '0'=>Yii::t('global','Gay '),
                                    '2'=>Yii::t('global','Bi '),
                                );
                            foreach( $look as $key=>$val ){ ?>
                                <option   value="<?php echo $key; ?>" <?php if( isset($looking_friendship) ){ if( $looking_friendship == $key ){ echo "selected = 'select' "; } } ?> ><?php echo $val;?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="btn-training">
                        <span class="premium">
                            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/search-premium.png" alt="" />
                        </span>
                        <button id="training" class="btn-all">training</button>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="search-block">
                    <div class="search-block-02">
                        <label>gender</label>
                        <select name="Search[gender]" id="gender">
                            <?php
                                $arr = array(
                                    '-1'=>Yii::t('global','All'),
                                    '1'=>Yii::t('global','Female'),
                                    '0'=>Yii::t('global','Male')
                                );
                            foreach( $arr as $key=>$val ){ ?>
                                <option value="<?php echo $key; ?>" <?php if( isset($gender) ){ if( $gender == $key ){ echo "selected = 'select' "; } } ?> ><?php echo $val;?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="search-block-03">
                        <label>Ages</label>
                        <div class="list-age"> 
                            <input type="text" placeholder="18" class="age_start"  id="start" name="Search[age_start]" value="<?php echo isset($age_start)?$age_start:''; ?>"/>
                            <span>To</span>
                            <input type="text" placeholder="28" class="age_end"  id="end" name="Search[age_end]" value="<?php echo isset($age_end)?$age_end:''; ?>"/>
                        </div>
                    </div>
                    <div class="search-block-02">
                        <label>Within</label>
                        <div class="list-age"> 
                            <input type="text" placeholder="50" class="within_start" id="start" name="Search[within_start]" value="<?php echo isset($within_start)?$within_start:''; ?>" />
                            <span>Miles of</span>
                            <input type="text" placeholder="100" class="within_end" id="end" style="width: 89px;" name="Search[within_end]" value="<?php echo isset($miles)?$miles:''; ?>" />
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="search-block last-block">
                    <ul>
                        <li class="simple last">
                            <a href="/user/advanceSearch">ADVANCE SEARCH</a>
                            <span></span>   
                        </li>
                        <li class="last">
                            <a class="save-search-func">SAVED SEARCHES</a>
                            <span class="white"></span>
                        </li>
                        <li class="last">
                            <a href="#">RESET FILTERS</a>
                        </li>
                        <li>
                            <button id="save" class="btn-save-search">Save this search</button>
                        </li>
                        <li>
                            <button id="save" class="btn-search-page">Search</button>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
    <div style="margin-top: 45px;">
     <!-- Content Left  -->
    <div class="left-content-01">
    <?php
    if( isset($users) ){ ?>
    <!-- <div role="alert" class="alert alert-success alert-dismissible">
    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <?php echo Yii::t('global','Total have'); ?> <?php echo count($users->getData() ); ?> <?php echo Yii::t('global','result search') ?>
    </div> -->
     <?php
     $this->widget('zii.widgets.CListView', array(
         'dataProvider'=>$users,
         'itemView'=>'result_search_users',
         'summaryText'=>''
     ));
        }
     ?>
    </div>
    <!--End Content Left  -->

    <!-- Content Right -->
    <div class="right-content-01">
        <div class="adv-01">
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/adv_1.png" />
        </div>
        <div class="adv-01">
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/ad2.png" />
        </div>
        <div class="adv-01">
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/ad3.png" />
        </div>
        <div class="adv-01">
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/ad5.png" />
        </div>
        <div class="adv-01">
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/ad4.png" />
        </div>
    </div>
     <!-- End Content Right -->
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
<script>
    $('.post-btn').click(function(){
        content = $('.post-textarea').val();
        if( content != '')
            $('#form-achievement').submit();
    });
</script>

<!-- Modal Report-->
<div class="modal fade" id="ReportUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content special-border">
      <div class="modal-header header-report">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title report-title">Is there something wrong with this profile? </h4>
        <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avatar-post-small.png">
        <span class="user-kaka user-ricky">Ricky Martin</span>
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
            <input type="checkbox" name="" class="pull-left"/> <span>Would you also like to block this user from making contact with you?</span>
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
          <div class="modal-header header-report special-border">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <span class="span-to">To </span> 
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avatar-post-small.png">
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


<!-- Modal WantToChat -->
<div class="modal fade" id="WantToChat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content special-border">
      <div class="modal-header header-report">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title request-title">Do you wish to chat with this person ? </h4>
        
      </div>
      <div class="modal-footer footer-report">
        <div class="avatar-model">
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/avatar-post-small.png">
            <span class="request-romeo username-chat-system"></span>
        </div>
        <a type="button" class="btn btn-primary my-report">Send Chat Request</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Save Search -->
<div class="modal fade" id="save_search_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content special-border">
            <div class="modal-header header-report">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title request-title"> Save your search success ! </h4>
            </div>
        </div>
    </div>
</div>