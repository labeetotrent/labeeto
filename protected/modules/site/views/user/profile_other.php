<?php
    $cs = Yii::app()->clientScript;
    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/nouislider/jquery.nouislider.all.min.js');
    $cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/slashman_profile_other.js');
    $cs->registerCssFile(Yii::app()->themeManager->baseUrl.'/css/slashman_slider_override.css');
    $cs->registerCssFile(Yii::app()->themeManager->baseUrl.'/css/slashman_profile.css');
?>
<div class="content-main-1 my-profile other-profile">


    <div class="row col-md-12 profile-header">
        <div class="col-md-2 col-sm-2 col-xs-12 text-center avatar-container">
            <?php if($model->photo =='undefined'){ ?>
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/no-avatar.png" class="avatar-image img-circle">
            <?php } else { ?>
                <img src="/uploads/avatar/<?php echo $model->photo ?>" class="avatar-image img-circle" />
            <?php } ?>
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/fish/<?php echo ($online->is_online ==  User::USER_ONLINE)? 'online-circle.png' :'offline-circle.png'; ?>" class="online-circle"/>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 profile-info">
            <div class="row col-md-12 user-name">
                <?=$model->username;?>
            </div>
            <div class="row col-md-12 profile-data">
                <?= intval(substr(date('Ymd') - date('Ymd', strtotime($model->birthday)), 0, -4));  ?>, <?php  if($model->gender == 1) echo "Female"; else echo 'Male'; ?>
            </div>
            <div class="row col-md-12 location">
                <?php if($model->address) echo $model->address; ?>
            </div>
        </div>
    </div>
    <div class="row col-md-12 profile-description">
        <div class="col-md-7 desc-text">
            <?php if($model->about) echo $model->about; ?>
        </div>
        <div class="col-md-2 col-md-offset-3 desc-buttons">
            <a href="<?=$this->createUrl('im/toDialog', ['id' => $model->id])?>">
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/fish/message-icon.png"/>
            </a>
<!--            <img src="--><?php //echo Yii::app()->themeManager->baseUrl; ?><!--/images/fish/chat-icon.png"/>-->
        </div>
    </div><!--
    <div class="row col-md-12 looking-for-stripe">
        <div class="col-md-3 text">
            LOOKING FOR:
        </div>
        <div class="col-md-3 param">
            <div class="col-md-3 text">
                Gender:
            </div>
            <div class="col-md-3 text">
                <?php /*if($model->gender_look == 1) echo "Female"; else echo 'Male'; */?>
            </div>
            <div class="col-md-2">
                <img src="<?php /*echo Yii::app()->themeManager->baseUrl; */?>/images/fish/pink-tick.png" class="pull-left"/>
            </div>
        </div>
        <div class="col-md-3 param">
            <div class="col-md-7 text">
                Relationship:
            </div>
            <div class="col-md-3 text">
                <?php /*if($model->relations_look) echo $model->relations_look; */?>
            </div>
            <div class="col-md-2">
                <img src="<?php /*echo Yii::app()->themeManager->baseUrl; */?>/images/fish/pink-tick.png" class="pull-left"/>
            </div>
        </div>
        <div class="col-md-3 param">
            <div class="col-md-4 text">
                <span class="pull-right">Age:</span>
            </div>
            <div class="col-md-4 text">
                <?php /*if($model->age) echo $model->age; */?>
            </div>
            <div class="col-md-4">
                <img src="<?php /*echo Yii::app()->themeManager->baseUrl; */?>/images/fish/pink-tick.png" class="pull-left"/>
            </div>
        </div>
    </div>-->
    <div class="col-md-5 profile-left">
        <div class="left-info col-md-12">
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    Fitness Interests
                </div>
                <div class="col-md-12 value">
                    <?php
                    foreach($model->fitnessInterests as $interest)
                    {
                    ?>
                        <span interest-id="<?=$interest->getPrimaryKey();?>"><i class="fa fa-tag"></i> <?=$interest->name;?></span>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    Gym membership
                </div>
                <div class="col-md-12 value">
                    <?php if($model->inGym->name) echo $model->inGym->name; ?>
                </div>
            </div><!--
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    Diet
                </div>
                <div class="col-md-12 value">
                    <?php /*if($model->diet) echo $model->diet */?>
                </div>
            </div>-->
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    How often do you exercise?
                </div>
                <div class="col-md-12 value">
                    <div class="col-md-2">
                        Nope
                    </div>
                    <div class="col-md-8 slider-container">
                        <div class="slider" id="exercise-slider" disabled></div>
                    </div>
                    <div class="col-md-2" id="v">
                        Often
                    </div>
                </div>
            </div>
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    Do you smoke?
                </div>
                <div class="col-md-12 value">
                    <div class="col-md-2">
                        Nope
                    </div>
                    <div class="col-md-8 slider-container">
                        <div class="slider" id="exercise-smoke" disabled></div>
                    </div>
                    <div class="col-md-2" id="v">
                        Often
                    </div>
                </div>
            </div>
        </div>
        <div class="left-custom col-md-12">
            <?php
            $customQuestions = Question::model()->findAllByAttributes(array('user_id' => Yii::app()->user->getId()));

            foreach($customQuestions as $customQuestion)
            {
                $this->renderPartial('/elements/custom_question_noedit', compact('customQuestion'));
            }
            ?>
        </div>
    </div>
    <div class="col-md-7 profile-right">

        <div class="col-md-12 right-element photos" id="photos-tab">
            <div class="col-md-12 header">
                Photos
            </div>
            <div class="col-md-12 body">
                <?php $photos = Photo::model()->findAllByAttributes(array('user_id' => $model->id)); ?>
                <?php if(count($photos) > 0): ?>
                    <?php foreach($photos as $photo) : ?>
                        <div class="col-md-4 photo-container">
                            <img src="/uploads/photo/<?=$photo->thumb;?>" class="img-responsive"/>
                            <div class="set-profile">
                                <i class="fa fa-user" photo-id="<?=$photo->id;?>"></i>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-md-12 no-photos">
                        There are no photos yet...
                    </div>
                <?php endif;?>
            </div>
        </div>
<!---->
<!--        <div class="col-md-12 right-element featured-users">-->
<!--            <div class="col-md-12 header">-->
<!--                Featured users-->
<!--            </div>-->
<!--            <div class="col-md-12 body">-->
<!--                <div class="col-md-3 featured-person">-->
<!--                    <img src="--><?php //echo Yii::app()->themeManager->baseUrl; ?><!--/images/f_avatar.png" class="img-rounded"/>-->
<!--                    <p class="f-nick">BrenWinton</p>-->
<!--                    <p class="f-data">38, Tules, MI</p>-->
<!--                </div>-->
<!--                <div class="col-md-3 featured-person">-->
<!--                    <img src="--><?php //echo Yii::app()->themeManager->baseUrl; ?><!--/images/f_avatar.png" class="img-rounded"/>-->
<!--                    <p class="f-nick">BrenWinton</p>-->
<!--                    <p class="f-data">38, Tules, MI</p>-->
<!--                </div>-->
<!--                <div class="col-md-3 featured-person">-->
<!--                    <img src="--><?php //echo Yii::app()->themeManager->baseUrl; ?><!--/images/f_avatar.png" class="img-rounded"/>-->
<!--                    <p class="f-nick">BrenWinton</p>-->
<!--                    <p class="f-data">38, Tules, MI</p>-->
<!--                </div>-->
<!--                <div class="col-md-3 featured-person">-->
<!--                    <img src="--><?php //echo Yii::app()->themeManager->baseUrl; ?><!--/images/f_avatar.png" class="img-rounded"/>-->
<!--                    <p class="f-nick">BrenWinton</p>-->
<!--                    <p class="f-data">38, Tules, MI</p>-->
<!--                </div>-->
<!--                <div class="col-md-3 featured-person">-->
<!--                    <img src="--><?php //echo Yii::app()->themeManager->baseUrl; ?><!--/images/f_avatar.png" class="img-rounded"/>-->
<!--                    <p class="f-nick">BrenWinton</p>-->
<!--                    <p class="f-data">38, Tules, MI</p>-->
<!--                </div>-->
<!--                <div class="col-md-3 featured-person">-->
<!--                    <img src="--><?php //echo Yii::app()->themeManager->baseUrl; ?><!--/images/f_avatar.png" class="img-rounded"/>-->
<!--                    <p class="f-nick">BrenWinton</p>-->
<!--                    <p class="f-data">38, Tules, MI</p>-->
<!--                </div>-->
<!--                <div class="col-md-3 featured-person">-->
<!--                    <img src="--><?php //echo Yii::app()->themeManager->baseUrl; ?><!--/images/f_avatar.png" class="img-rounded"/>-->
<!--                    <p class="f-nick">BrenWinton</p>-->
<!--                    <p class="f-data">38, Tules, MI</p>-->
<!--                </div>-->
<!--                <div class="col-md-3 featured-person">-->
<!--                    <img src="--><?php //echo Yii::app()->themeManager->baseUrl; ?><!--/images/f_avatar.png" class="img-rounded"/>-->
<!--                    <p class="f-nick">BrenWinton</p>-->
<!--                    <p class="f-data">38, Tules, MI</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#exercise-slider').val(<?php if($model->excercise) echo $model->excercise;?>);
    });
</script>

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
