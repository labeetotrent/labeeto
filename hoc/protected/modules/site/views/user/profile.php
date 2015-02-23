<?php
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/slashman_profile.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/autocomplete.js');
$cs->registerCssFile(Yii::app()->themeManager->baseUrl.'/css/slashman_slider_override.css');
$cs->registerCssFile(Yii::app()->themeManager->baseUrl.'/css/slashman_profile.css');
?>
<div class="content-main-1 my-profile">
    <div class="row col-md-12 profile-header">
        <div class="col-md-2 col-sm-2 col-xs-12 text-center avatar-container">
            <form id="avatar-form" enctype="multipart/form-data">
                <input type="file" name="avatar-file" id="avatar-file"/>
            </form>
            <!--<img src="<?php /*echo Yii::app()->themeManager->baseUrl; */?>/images/fish/avatar.png" class="avatar-image img-circle"/>-->

            <?php if($this->user->photo =='undefined'){ ?>
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/no-avatar.png" class="avatar-image img-circle">
            <?php } else { ?>
                <img src="/uploads/avatar/<?php echo $this->user->photo ?>" class="avatar-image img-circle" />
            <?php } ?>
            <div class="avatar-upload-popover">
                <a href="#" data-toggle="modal" data-target="#ChangeAvatar">
                    <i class="fa fa-upload"></i>
                </a>
            </div>
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/fish/<?php echo ($online->is_online ==  User::USER_ONLINE)? 'online-circle.png' :'offline-circle.png'; ?>" class="online-circle"/>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 profile-info">
            <div class="row col-md-12 user-name">
                <?=$this->user->username;?>
            </div>
            <div class="row col-md-12 profile-data">
                <i class="fa fa-user"></i> <?= date("Y") - date('Y', strtotime($this->user->birthday));  ?>, <?php  if($this->user->gender == 1) echo "Female"; else echo 'Male'; ?>
            </div>
            <?php if($this->user->address):?>
            <div class="row col-md-12 location">
                <i class="fa fa-map-marker"></i> <?=$this->user->address; ?>
            </div>
            <?php endif; ?>
        </div>
        <!--
            <div class="col-md-2 col-sm-2 col-xs-12 container-element pull-right">
                <div class="header-container col-md-12 photos">
                    <div class="col-md-12 photos-thumb">
                        <img src="<?php /*echo Yii::app()->themeManager->baseUrl; */?>/images/fish/no-photos.png" class="img-responsive no-thumb"/>
                    </div>
                    <div class="col-md-12 desc">
                        PHOTOS
                    </div>
                </div>
            </div>
        -->
        <!--
        <div class="col-md-2 col-sm-2 col-xs-2 container-element">
            <div class="header-container col-md-12 private">
                <div class="col-md-12 photos-thumb">
                    <img src="<?php /*echo Yii::app()->themeManager->baseUrl; */?>/images/fish/no-photos.png" class="img-responsive no-thumb"/>
                </div>
                <div class="col-md-12 desc">
                    PRIVATE
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2 container-element">
            <div class="header-container col-md-12 videos">
                <div class="col-md-12 photos-thumb">
                    <img src="<?php /*echo Yii::app()->themeManager->baseUrl; */?>/images/fish/no-photos.png" class="img-responsive no-thumb"/>
                </div>
                <div class="col-md-12 desc">
                    VIDEOS
                </div>
            </div>
        </div>-->
    </div>
    <div class="row col-md-12 profile-description">
        <div class="col-md-7 desc-text view">
            <?php if($this->user->about) echo $this->user->about; else echo 'Write something about yourself...';?>
        </div>
        <div class="col-md-7 desc-text edit hidden-element">
            <textarea class="desc-textarea"><?php if($this->user->about) echo $this->user->about; ?></textarea>
        </div>
        <div class="col-md-4 col-md-offset-1 description-edit">
            <i class="fa fa-pencil-square-o pull-right description-edit-icon"></i>
        </div>
        <div class="col-md-4 col-md-offset-1 description-edit-buttons hidden-element">
            <div class="col-md-6">
                <button type="submit" class="btn btn-default btn-sm btn-save-st col-md-12" id="about-save">Save</button>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-default btn-sm btn-cancel-st col-md-12">Cancel</button>
            </div>
        </div>
    </div><!--
    <div class="row col-md-12 looking-for-stripe">
        <div class="col-md-3 text">
            LOOKING FOR:
        </div>
        <div class="col-md-2 param">
            <div class="col-md-6 text">
                Gender:
            </div>
            <div class="col-md-3 text">
                <?php /*if($this->user->gender_look == 1) echo "Female"; else echo 'Male'; */?>
            </div>
        </div>
        <div class="col-md-2 param">
            <div class="col-md-6 text">
                Relationship:
            </div>
            <div class="col-md-6 text">
                <?php /*if($this->user->relations_look) echo $this->user->relations_look; */?>
            </div>
        </div>
        <div class="col-md-5 param">
            <div class="col-md-2 text">
                <span class="pull-right">Age:</span>
            </div>
            <div class="col-md-2 text">
                <?php /*if($this->user->age) echo $this->user->age; */?>
            </div>
            <div class="col-md-8 text edit">
                <i class="fa fa-pencil-square-o pull-right edit-looking-for"></i>
            </div>
        </div>
    </div>-->
    <div class="col-md-5 profile-left">
        <div class="left-info col-md-12">
            <!--<div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    <div class="col-md-10">
                        Education
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-pencil-square-o pull-right edit-info-block"></i>
                    </div>
                </div>
                <div class="col-md-12 value view">
                    <?php /*if($this->user->education) echo Education::model()->getNameEducation($this->user->education); */?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <select name="education" id="education" class="form-control">
                        <?php /*$education = Education::model()->findAll();
                        foreach($education as $value){
                            $l = '';
                            if($value->id == $this->user->education)
                                $l = 'selected';
                            echo "<option ". $l ." value='".$value->id."'>".$value->name."</option>";
                        }
                        */?>
                    </select>
                </div>
                <div class="col-md-12 edit-buttons hidden-element">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-save-st col-md-12" id="education-save">Save</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-cancel-st col-md-12">Cancel</button>
                    </div>
                </div>
            </div>--><!--
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    <div class="col-md-10">
                        Religion
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-pencil-square-o pull-right edit-info-block"></i>
                    </div>
                </div>
                <div class="col-md-12 value view">
                    <?php /*if($this->user->religion) echo Religion::model()->getNameReligion($this->user->religion) */?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <select name="religion" id="religion" class="form-control">
                        <?php /*$religion = Religion::model()->findAll();
                        foreach($religion as $value){
                            $l = '';
                            if($value->id == $this->user->religion)
                                $l = 'selected';
                            echo "<option ". $l ." value='".$value->id."'>".$value->name."</option>";
                        }
                        */?>
                    </select>
                </div>
                <div class="col-md-12 edit-buttons hidden-element">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-save-st col-md-12" id="religion-save">Save</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-cancel-st col-md-12">Cancel</button>
                    </div>
                </div>
            </div>-->
            <!--<div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    <div class="col-md-10">
                        Ethnicity
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-pencil-square-o pull-right edit-info-block"></i>
                    </div>
                </div>
                <div class="col-md-12 value view">
                    <?php /*if($this->user->ehtnicity) echo Ethnicity::model()->getNameEthnicity($this->user->ehtnicity) */?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <select name="ehtnicity" id="ethnicity" class="form-control">
                        <?php /*$ethnicity = Ethnicity::model()->findAll();
                        foreach($ethnicity as $value){
                            $l = '';
                            if($value->id == $this->user->ehtnicity)
                                $l = 'selected';
                            echo "<option ". $l ." value='".$value->id."'>".$value->name."</option>";
                        }
                        */?>
                    </select>
                </div>
                <div class="col-md-12 edit-buttons hidden-element">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-save-st col-md-12" id="ethnicity-save">Save</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-cancel-st col-md-12">Cancel</button>
                    </div>
                </div>
            </div>-->
            <!--<div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    <div class="col-md-10">
                        Height
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-pencil-square-o pull-right edit-info-block"></i>
                    </div>
                </div>
                <div class="col-md-12 value view">
                    <?php /*if($this->user->height) echo $this->user->height . Yii::t('global', ' FEET')*/?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <div class="col-md-6">
                        <select class="form-control" name="feet">
                            <?php
/*
                            for($i=0; $i<=10; $i++) {
                                if($this->user->getFeet() == $i)
                                    $l = 'selected';
                                else
                                    $l = '';
                                echo "<option ". $l ." value='".$i."'>".$i."</option>";
                            }*/?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" id="inches" name="inches">
                            <?php
/*                                for($i=0; $i<=9; $i++) {
                                    if($this->user->getInches() == $i)
                                        $h = 'selected';
                                    else
                                        $h = '';
                                    echo "<option ". $h ." value='".$i."'>".$i."</option>";
                                }
                            */?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 edit-buttons hidden-element">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-save-st col-md-12" id="height-save">Save</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-cancel-st col-md-12">Cancel</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    <div class="col-md-10">
                        Children
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-pencil-square-o pull-right edit-info-block"></i>
                    </div>
                </div>
                <div class="col-md-12 value view">
                    <?php /*if($this->user->children) echo Children::model()->getNameChildren($this->user->children) */?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <select class="form-control" name="children">
                        <?php /*$religion = Children::model()->findAll();
                        foreach($religion as $value){
                            $l = '';
                            if($value->id == $this->user->religion)
                                $l = 'selected';
                            echo "<option ". $l ." value='".$value->id."'>".$value->name."</option>";
                        }
                        */?>
                    </select>
                </div>
                <div class="col-md-12 edit-buttons hidden-element">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-save-st col-md-12" id="children-save">Save</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-cancel-st col-md-12">Cancel</button>
                    </div>
                </div>
            </div>-->
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    <div class="col-md-10">
                        Fitness interests
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-pencil-square-o pull-right edit-info-block"></i>
                    </div>
                </div>
                <div class="col-md-12 value view">
                    <?php
                    foreach($this->user->fitnessInterests as $interest)
                    {
                    ?>
                        <span interest-id="<?=$interest->getPrimaryKey();?>"><i class="fa fa-tag"></i> <?=$interest->name;?></span>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <input type="text" name="passion" id="passion" class="form-control" value=""/>

                    <?php
                    if(count($this->user->fitnessInterests) > 0)
                    {
                        echo '<ul class="fitness-tags-list-edit">';
                        foreach($this->user->fitnessInterests as $interest)
                        {
                        ?>
                            <li interest-id="<?=$interest->getPrimaryKey();?>"><i class="fa fa-tag"></i> <?=$interest->name;?> <i class="fa fa-close remove-tag"></i></li>
                        <?php
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
                <div class="col-md-12 edit-buttons hidden-element">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-save-st col-md-12" id="passion-save">Add</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-cancel-st col-md-12">Close</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    <div class="col-md-10">
                        Gym membership
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-pencil-square-o pull-right edit-info-block"></i>
                    </div>
                </div>
                <div class="col-md-12 value view">
                    <?php if($this->user->inGym->name) echo $this->user->inGym->name; ?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <input type="text" name="gym" id="gym" class="form-control" value="<?php if($this->user->inGym->name) echo $this->user->inGym->name; ?>"/>
                </div>
                <div class="col-md-12 edit-buttons hidden-element">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-save-st col-md-12" id="gym-save">Save</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-cancel-st col-md-12">Cancel</button>
                    </div>
                </div>
            </div>
            <!--<div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    <div class="col-md-10">
                        Diet
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-pencil-square-o pull-right edit-info-block"></i>
                    </div>
                </div>
                <div class="col-md-12 value view">
                    <?php /*if($this->user->diet) echo $this->user->diet */?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <input type="text" name="diet" id="diet" class="form-control" value="<?php /*if($this->user->diet) echo $this->user->diet; */?>"/>
                </div>
                <div class="col-md-12 edit-buttons hidden-element">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-save-st col-md-12">Save</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-cancel-st col-md-12">Cancel</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    <div class="col-md-10">
                        Goals
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-pencil-square-o pull-right edit-info-block"></i>
                    </div>
                </div>
                <div class="col-md-12 value view">
                    <?php /*if($this->user->goal) echo $this->user->goal */?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <input type="text" name="goal" id="goals" class="form-control" value="<?php /*if($this->user->goal) echo $this->user->goal; */?>"/>
                </div>
                <div class="col-md-12 edit-buttons hidden-element">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-save-st col-md-12">Save</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-default btn-sm btn-cancel-st col-md-12">Cancel</button>
                    </div>
                </div>
            </div>-->
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    Training Intensity
                </div>
                <div class="col-md-12 value">
                    <div class="col-md-2">
                        Relax
                    </div>
                    <div class="col-md-8 slider-container">
                        <div class="slider" id="exercise-slider"></div>
                    </div>
                    <div class="col-md-2">
                        Intensive
                    </div>
                </div>
            </div>
            <!--<div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    Do you drink?
                </div>
                <div class="col-md-12 value">
                    <div class="col-md-2">
                        Nope
                    </div>
                    <div class="col-md-8 slider-container">
                        <div class="slider" id="drink-slider"></div>
                    </div>
                    <div class="col-md-2">
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
                        <div class="slider" id="smoke-slider"></div>
                    </div>
                    <div class="col-md-2">
                        Often
                    </div>
                </div>
            </div>
        </div>
        <div class="left-custom col-md-12">
            <div class="col-md-12 new-question">
                <div class="col-md-12 name">
                    Bits and Bits!
                </div>
                <div class="col-md-12 value text-center view">
                    <button class="custom-question-btn">Add custom question</button>
                </div>
                <div class="col-md-12 edit hidden-element">
                    <div class="col-md-12">
                        <input type="text" class="custom-question-input form-control" placeholder="Question">
                    </div>
                    <div class="col-md-12">
                        <textarea class="custom-question-textarea form-control" placeholder="Answer"></textarea>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-default btn-sm btn-save-st col-md-12" id="custom-create">Save</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-default btn-sm btn-cancel-st col-md-12">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
/*                $customQuestions = Question::model()->findAllByAttributes(array('user_id' => Yii::app()->user->getId()));

                foreach($customQuestions as $customQuestion)
                {
                    $this->renderPartial('/elements/custom_question', compact('customQuestion'));
                }
            */?>
        </div>-->
    </div>
    </div>
    <div class="col-md-7 profile-right">
        <div class="col-md-12 right-element photos" id="photos-tab">
            <div class="col-md-12 header">
                <div class="row">
                    <span>Photos</span>
                    <form id="add-photo-form" enctype="multipart/form-data" class="hidden">
                        <input type="file" id="add-photo-input" name="add-photo-input"/>
                    </form>
                    <button class="add-new-btn pull-right" id="add-photo-button">Add Photo</button>
                </div>
            </div>
            <div class="col-md-12 body">
                <?php if(count($this->user->photos) > 0): ?>
                    <?php foreach(Photo::model()->findAllByAttributes(array('is_public' => 1, 'user_id' => Yii::app()->user->getId())) as $photo) : ?>
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
    </div>
        <script>
            $(document).ready(function(){
                $('#exercise-slider').val(<?php if($this->user->excercise) echo $this->user->excercise;?>);
            });
        </script>
</div>


<div class="modal fade" id="PrivateVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content special-border">
      <div class="modal-header header-report">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title upgarade-account">
        <span style="text-transform: uppercase;">UPGRADE YOUR ACCOUNT</span> <span>to be able to upload videos and</span> <span style="color: #ff6476;"><a href="#">more!</a></span>
         </h4>
        
      </div>
      <div class="modal-footer footer-report footer-upgarde">
        <a type="button" class="btn btn-primary my-report">Upgrade Account</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="ChangeAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content special-border">
      <div class="modal-header header-report">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span>Upload Photo</span>
        
      </div>
      <div class="modal-footer footer-report footer-upgarde">
        <form method="post" id="form-change-avatar">
            <div style="width: 50%; float: left;">
                <input type="file" id="photo-new" name="photo-change" style="display: none;">
                <label for="photo-new" class="btn btn-primary my-report-1">From My Computer </label>
            </div>
        </form>
            <div style="width: 50%; float: left;">
                <a type="button" class="btn btn-primary my-report-1">From Facebook</a>
            </div>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="UploadVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content special-border">
      <div class="modal-header header-report">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <span>Upload Video</span>
        
      </div>
      <div class="modal-footer footer-report footer-upgarde video-up">
        <form method="post" id="form-upload-video">
            <div class="">
            <textarea name="description" class="form-control" rows="4" cols="50" placeholder="Write a description"></textarea>
            
          </div>
            <div style="width: 50%; float: left;">
                <input type="file" id="video-new" name="videos" style="display: none;">
                <label for="video-new" class="btn btn-primary my-report-1"><i></i>From My Computer </label>
            </div>
        </form>
            <div style="width: 50%; float: left;">
                <a type="button" class="btn btn-primary my-report-1">From Facebook</a>
            </div>
        
      </div>
    </div>
  </div>
</div>
    <!-- Modal Upload Public Photo--->
    <div class="modal fade" id="public_photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content special-border">
                <div class="modal-header header-report">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <span>Upload Photo</span>

                </div>

                <div class="modal-footer footer-report footer-upgarde photo-up">
                    <form method="post" id="form-photo">
                        <div style="width: 50%; float: left;">
                            <input type="file" id="photos" name="photos" style="display: none;">
                            <label for="photos" class="btn btn-primary my-report-1"><i></i>From My Computer </label>
                        </div>
                    </form>
                    <div style="width: 50%; float: left;">
                        <a type="button" class="btn btn-primary my-report-1">From Facbook</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Upload Public Photo--->
    <div class="modal fade" id="private_photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content special-border">
                <div class="modal-header header-report">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <span>Upload Photo</span>

                </div>

                <div class="modal-footer footer-report footer-upgarde private-up">
                    <form method="post" id="form-private">
                        <div style="width: 50%; float: left;">
                            <input type="file" id="private" name="photos" style="display: none;">
                            <label for="private" class="btn btn-primary my-report-1"><i></i>From My Computer </label>
                        </div>
                    </form>
                    <div style="width: 50%; float: left;">
                        <a type="button" class="btn btn-primary my-report-1">From Facbook</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
<script>
    var type = '<?php echo isset($_GET['type'])?$_GET['type']:'' ?>';
    if(type=='photos'){
        $('.content-profile').hide();
        $('.content-video').hide();
        $('.line-green-video').hide();
        $('.line-green-photo-pravite').hide();
        $('.content-photo-private').hide();
        $('.content-photo').show();
        $('.line-green-photo').css('display','block');
    }else if(type=='private'){
        $('.content-profile').hide();
        $('.content-photo').hide();
        $('.content-video').hide();
        $('.line-green-photo').hide();
        $('.line-green-photo-pravite').hide();
        $('.line-green-video').hide();
        $('.content-photo-private').show();
        $('.line-green-photo-pravite').css('display','block');
    }else if(type == 'video'){
        $('.content-profile').hide();
        $('.content-photo').hide();
        $('.line-green-photo').hide();
        $('.content-photo-private').hide();
        $('.line-green-photo-pravite').hide();
        $('.content-video').show();
        $('.line-green-video').css('display','block');
    }
</script>
