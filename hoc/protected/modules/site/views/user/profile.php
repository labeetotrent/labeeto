<?php
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/slashman_profile.js');
$cs->registerScriptFile(Yii::app()->themeManager->baseUrl.'/js/autocomplete.js');
$cs->registerCssFile(Yii::app()->themeManager->baseUrl.'/css/slashman_slider_override.css');
$cs->registerCssFile(Yii::app()->themeManager->baseUrl.'/css/slashman_profile.css');
?>
<div class="content-main-1 my-profile">
    <div class="row col-md-12 profile-header">
        <div class="col-md-2 col-sm-2 col-xs-2 avatar-container">
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
        <div class="col-md-4 col-sm-4 col-xs-4 profile-info">
            <div class="row col-md-12 user-name">
                <?=$this->user->username;?>
            </div>
            <div class="row col-md-12 profile-data">
                <?= date("Y") - date('Y', strtotime($this->user->birthday));  ?>, <?php  if($this->user->gender == 1) echo "Female"; else echo 'Male'; ?>
            </div>
            <div class="row col-md-12 job">
                <?php if($this->user->career) echo $this->user->career; ?>
            </div>
            <div class="row col-md-12 location">
                <?php if($this->user->address) echo $this->user->address; ?>
            </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2 container-element">
            <div class="header-container col-md-12 photos">
                <div class="col-md-12 photos-thumb">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/fish/no-photos.png" class="img-responsive no-thumb"/>
                </div>
                <div class="col-md-12 desc">
                    PHOTOS
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2 container-element">
            <div class="header-container col-md-12 private">
                <div class="col-md-12 photos-thumb">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/fish/no-photos.png" class="img-responsive no-thumb"/>
                </div>
                <div class="col-md-12 desc">
                    PRIVATE
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2 container-element">
            <div class="header-container col-md-12 videos">
                <div class="col-md-12 photos-thumb">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/fish/no-photos.png" class="img-responsive no-thumb"/>
                </div>
                <div class="col-md-12 desc">
                    VIDEOS
                </div>
            </div>
        </div>
    </div>
    <div class="row col-md-12 profile-description">
        <div class="col-md-7 desc-text view">
            <?php if($this->user->about) echo $this->user->about; ?>
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
    </div>
    <div class="row col-md-12 looking-for-stripe">
        <div class="col-md-3 text">
            LOOKING FOR:
        </div>
        <div class="col-md-2 param">
            <div class="col-md-6 text">
                Gender:
            </div>
            <div class="col-md-3 text">
                <?php if($this->user->gender_look == 1) echo "Female"; else echo 'Male'; ?>
            </div>
        </div>
        <div class="col-md-2 param">
            <div class="col-md-6 text">
                Relationship:
            </div>
            <div class="col-md-6 text">
                <?php if($this->user->relations_look) echo $this->user->relations_look; ?>
            </div>
        </div>
        <div class="col-md-5 param">
            <div class="col-md-2 text">
                <span class="pull-right">Age:</span>
            </div>
            <div class="col-md-2 text">
                <?php if($this->user->age) echo $this->user->age; ?>
            </div>
            <div class="col-md-8 text edit">
                <i class="fa fa-pencil-square-o pull-right edit-looking-for"></i>
            </div>
        </div>
    </div>
    <div class="col-md-5 profile-left">
        <div class="left-info col-md-12">
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    <div class="col-md-10">
                        Education
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-pencil-square-o pull-right edit-info-block"></i>
                    </div>
                </div>
                <div class="col-md-12 value view">
                    <?php if($this->user->education) echo Education::model()->getNameEducation($this->user->education); ?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <select name="education" id="education" class="form-control">
                        <?php $education = Education::model()->findAll();
                        foreach($education as $value){
                            $l = '';
                            if($value->id == $this->user->education)
                                $l = 'selected';
                            echo "<option ". $l ." value='".$value->id."'>".$value->name."</option>";
                        }
                        ?>
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
            </div>
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
                    <?php if($this->user->religion) echo Religion::model()->getNameReligion($this->user->religion) ?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <select name="religion" id="religion" class="form-control">
                        <?php $religion = Religion::model()->findAll();
                        foreach($religion as $value){
                            $l = '';
                            if($value->id == $this->user->religion)
                                $l = 'selected';
                            echo "<option ". $l ." value='".$value->id."'>".$value->name."</option>";
                        }
                        ?>
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
            </div>
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    <div class="col-md-10">
                        Ethnicity
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-pencil-square-o pull-right edit-info-block"></i>
                    </div>
                </div>
                <div class="col-md-12 value view">
                    <?php if($this->user->ehtnicity) echo Ethnicity::model()->getNameEthnicity($this->user->ehtnicity) ?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <select name="ehtnicity" id="ethnicity" class="form-control">
                        <?php $ethnicity = Ethnicity::model()->findAll();
                        foreach($ethnicity as $value){
                            $l = '';
                            if($value->id == $this->user->ehtnicity)
                                $l = 'selected';
                            echo "<option ". $l ." value='".$value->id."'>".$value->name."</option>";
                        }
                        ?>
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
            </div>
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    <div class="col-md-10">
                        Height
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-pencil-square-o pull-right edit-info-block"></i>
                    </div>
                </div>
                <div class="col-md-12 value view">
                    <?php if($this->user->height) echo $this->user->height . Yii::t('global', ' FEET')?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <div class="col-md-6">
                        <select class="form-control" name="feet">
                            <?php

                            for($i=0; $i<=10; $i++) {
                                if($this->user->getFeet() == $i)
                                    $l = 'selected';
                                else
                                    $l = '';
                                echo "<option ". $l ." value='".$i."'>".$i."</option>";
                            }?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" id="inches" name="inches">
                            <?php
                                for($i=0; $i<=9; $i++) {
                                    if($this->user->getInches() == $i)
                                        $h = 'selected';
                                    else
                                        $h = '';
                                    echo "<option ". $h ." value='".$i."'>".$i."</option>";
                                }
                            ?>
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
                    <?php if($this->user->children) echo Children::model()->getNameChildren($this->user->children) ?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <select class="form-control" name="children">
                        <?php $religion = Children::model()->findAll();
                        foreach($religion as $value){
                            $l = '';
                            if($value->id == $this->user->religion)
                                $l = 'selected';
                            echo "<option ". $l ." value='".$value->id."'>".$value->name."</option>";
                        }
                        ?>
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
            </div>
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
                    <input type="text" name="passion" id="passion" class="form-control" value="<?php if($this->user->passion) echo $this->user->passion; ?>"/>

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
            <div class="col-md-12 info-block">
                <div class="col-md-12 name">
                    <div class="col-md-10">
                        Diet
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-pencil-square-o pull-right edit-info-block"></i>
                    </div>
                </div>
                <div class="col-md-12 value view">
                    <?php if($this->user->diet) echo $this->user->diet ?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <input type="text" name="diet" id="diet" class="form-control" value="<?php if($this->user->diet) echo $this->user->diet; ?>"/>
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
                    <?php if($this->user->goal) echo $this->user->goal ?>
                </div>
                <div class="col-md-12 value edit hidden-element">
                    <input type="text" name="goal" id="goals" class="form-control" value="<?php if($this->user->goal) echo $this->user->goal; ?>"/>
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
                    How often do you exercise?
                </div>
                <div class="col-md-12 value">
                    <div class="col-md-2">
                        Nope
                    </div>
                    <div class="col-md-8 slider-container">
                        <div class="slider" id="exercise-slider"></div>
                    </div>
                    <div class="col-md-2">
                        Often
                    </div>
                </div>
            </div>
            <div class="col-md-12 info-block">
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
                $customQuestions = Question::model()->findAllByAttributes(array('user_id' => Yii::app()->user->getId()));

                foreach($customQuestions as $customQuestion)
                {
                    $this->renderPartial('/elements/custom_question', compact('customQuestion'));
                }
            ?>
        </div>
    </div>
    <div class="col-md-7 profile-right">
        <div class="col-md-12 right-element photos" id="photos-tab">
            <div class="col-md-12 header">
                <span>Photos</span>
                <form id="add-photo-form" enctype="multipart/form-data" class="hidden">
                    <input type="file" id="add-photo-input" name="add-photo-input"/>
                </form>
                <button class="add-new-btn pull-right" id="add-photo-button">Add Photo</button>
            </div>
            <div class="col-md-12 body">
                <?php
                    foreach(Photo::model()->findAllByAttributes(array('is_public' => 1, 'user_id' => Yii::app()->user->getId())) as $photo)
                    {
                ?>
                <div class="col-md-4 photo-container">
                    <img src="/uploads/photo/<?=$photo->thumb;?>" class="img-responsive"/>
                    <div class="set-profile">
                        <i class="fa fa-user" photo-id="<?=$photo->id;?>"></i>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-12 right-element private-photos hidden-element" id="private-photos-tab">
            <div class="col-md-12 header">
                <span>Private Photos</span>
                <button class="add-new-btn pull-right" id="add-private-photo-button">Add Photo</button>
            </div>
            <div class="col-md-12 body">
                <?php foreach(Photo::model()->findAllByAttributes(array('is_public' => 0, 'user_id' => Yii::app()->user->getId())) as $photo) { ?>
                    <div class="col-md-4 photo-container">
                        <img src="/uploads/photo/<?=$photo->thumb;?>" class="img-responsive"/>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-12 right-element videos hidden-element" id="videos-tab">
            <div class="col-md-12 header">
                <span>Videos</span>
                <button class="add-new-btn pull-right" id="add-video-button">Add Video</button>
            </div>
            <div class="col-md-12 body">
                <?php foreach(Video::model()->findAllByAttributes(array('user_id' => Yii::app()->user->getId())) as $video) { ?>
                <div class="col-md-4 photo-container">
                    <video class="projekktor" style="margin: 0 auto; width: " title="this is projekktor" controls>
                        <source src="<?=Yii::app()->request->baseUrl.'/uploads/video/'.$video->video;?>" />
                    </video>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="col-md-12 right-element featured-users">
            <div class="col-md-12 header">
                Featured users
            </div>
            <div class="col-md-12 body">
                <div class="col-md-3 featured-person">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/f_avatar.png" class="img-rounded"/>
                    <p class="f-nick">BrenWinton</p>
                    <p class="f-data">38, Tules, MI</p>
                </div>
                <div class="col-md-3 featured-person">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/f_avatar.png" class="img-rounded"/>
                    <p class="f-nick">BrenWinton</p>
                    <p class="f-data">38, Tules, MI</p>
                </div>
                <div class="col-md-3 featured-person">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/f_avatar.png" class="img-rounded"/>
                    <p class="f-nick">BrenWinton</p>
                    <p class="f-data">38, Tules, MI</p>
                </div>
                <div class="col-md-3 featured-person">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/f_avatar.png" class="img-rounded"/>
                    <p class="f-nick">BrenWinton</p>
                    <p class="f-data">38, Tules, MI</p>
                </div>
                <div class="col-md-3 featured-person">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/f_avatar.png" class="img-rounded"/>
                    <p class="f-nick">BrenWinton</p>
                    <p class="f-data">38, Tules, MI</p>
                </div>
                <div class="col-md-3 featured-person">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/f_avatar.png" class="img-rounded"/>
                    <p class="f-nick">BrenWinton</p>
                    <p class="f-data">38, Tules, MI</p>
                </div>
                <div class="col-md-3 featured-person">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/f_avatar.png" class="img-rounded"/>
                    <p class="f-nick">BrenWinton</p>
                    <p class="f-data">38, Tules, MI</p>
                </div>
                <div class="col-md-3 featured-person">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/f_avatar.png" class="img-rounded"/>
                    <p class="f-nick">BrenWinton</p>
                    <p class="f-data">38, Tules, MI</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#exercise-slider').val(<?php if($this->user->excercise) echo $this->user->excercise;?>);
            $('#drink-slider').val(<?php if($this->user->drink) echo $this->user->drink;?>);
            $('#smoke-slider').val(<?php if($this->user->smoke) echo $this->user->smoke;?>);
        });
    </script>



    <div class="infor-user" style="display: none;">
        <div class="avartar">
            
            <?php if($this->user->photo =='undefined'){ ?>
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/no-avatar.png">
            <?php } else { ?>
                <img src="/uploads/avatar/<?php echo $this->user->photo ?>" />
            <?php } ?>
            <span class="double-spans"></span>
            <div class="popup_avavtar">
                <a href="#" data-toggle="modal" data-target="#ChangeAvatar">
                    <span style="display: inline-block;">Upload Photo</span>
                </a>
            </div>
        </div>
        <div class="content-infor-profile">
            <div class="name_user">
                <?php echo Utils::short_description($this->user->username, 10); ?>
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/<?php echo ($online->is_online ==  User::USER_ONLINE)? 'search-online.png' :'search-btn-gray.png'; ?>" class="icononline" style="padding-bottom: 3px;" >
                <?php if($online->membership ==  User::MEMBER_VERIFIED){ ?>
                <a href="/user/verify" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Verified User" style="background: transparent; border: none;">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/search-check-red.png">
                </a>
                <?php } ?>
            </div>
            
            <div class="menu-nav-infor">
                <ul style="float: right;">
                    <li><a href="/profile_other"><?php echo Yii::t('global', 'preview profile') ?></a></li>
                    <li><a href="#"><?php echo Yii::t('global', 'verify profile') ?></a></li>
                </ul>
            </div>
        </div>
       
        <div class="content-img">
            <div style="float: left; width: 60%; padding-left: 14%;">
                <div class="street"><span class="icon-people"></span>
                <?php echo date("Y") - date('Y', strtotime($this->user->birthday));  ?>, <?php  if($this->user->gender == 1) echo "F"; else echo 'M'; ?>, <?php echo $this->user->gender_look; ?> <?php if ($online->membership ==  User::MEMBER_VERIFIED ) { ?>
                        <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/verify.png" >
                    <?php } ?></div>
                <div class="businuess"><span class="icon-vali"></span><?php if($this->user->career) echo $this->user->career; ?></div>
                <div class="location"><span class="icon-location"></span><?php if($this->user->address) echo $this->user->address; ?></div>
            </div>
            <div class="img-photo-video">
                <div class="photo-private"  id="PhotoNomal">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/photo.png" />
                    <h6><?php echo Yii::t('global', 'Photos') ?></h6>
                    <h3><?php echo count($photos)?></h3>
                    <span class="line-green-photo"></span>
                </div>
                <div class="photo-private" id="PhotoPrivate">
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/photo.png" />
                    <h6><?php echo Yii::t('global', 'Private Photo') ?></h6>
                    <h3><?php echo count($private)?></h3>
                    <span class="line-green-photo-pravite"></span>
                </div>
                <div class="photo-private" id="VideosNormal">
                    <!--<a href="#" data-toggle="modal" data-target="#PrivateVideo">-->
                        <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/videos.png" />
                        <h6><?php echo Yii::t('global', 'Videos') ?></h6>
                        <h3><p><?php echo count($video); ?></p></h3>
                    <span class="line-green-video"></span>
                    <!--</a>-->
                </div>
                
            </div>
        </div>
        
    </div>
    <div class="left-profile" style="display: none;">
        <div class="post" style="border: none; position: relative;" > 
            <div class="looking-for">
                <span class="looking_img"><?php echo Yii::t('global', 'LOOKING FOR') ?></span>
                <span class="note-span" id="id-gender"></span>
                <div id="value-gender">
                    <p>
                        <span class="txt-gender"><?php echo Yii::t('global', 'Gender: ') ?></span>
                        <span class="txt-female"><?php  if($this->user->gender_look == 1) echo "Female"; else echo 'Male'; ?></span>
                    </p>
                    <p>
                        <span class="txt-gender"><?php echo Yii::t('global', 'Relationship: ') ?> </span>
                        <span class="txt-female"><?php if($this->user->relations_look) echo $this->user->relations_look; ?></span>
                    </p>
                    <p>
                        <span class="txt-gender"><?php echo Yii::t('global', 'Age: ')?> </span>
                        <span class="txt-female"><?php if($this->user->age) echo $this->user->age; ?></span>
                    </p>
                    <p>
                        <span class="txt-gender"><?php echo Yii::t('global', 'Training Buddy:') ?> </span>
                        <span class="txt-female"><?php if($this->user->training == 0) echo 'No'; else echo "Yes"; ?></span>
                    </p>
                </div>
                <form method="post" id="form-gender" style="display: none;">
                    <p>
                        <span class="txt-gender"><?php echo Yii::t('global', 'Gender: ') ?></span>
                        <span class="txt-female">
                            <input type="radio" name="gender" <?php if($this->user->gender_look == 0) echo 'checked="true"'; ?> value="0"  />Male
                            <input type="radio" name="gender" <?php if($this->user->gender_look == 1) echo 'checked="true"'; ?> value="1" name=""/>Female
                        </span>
                    </p>
                    <p>
                        <span class="txt-gender"><?php echo Yii::t('global', 'Relationship: ') ?> </span>
                        <span class="txt-female">
                            <select name="relationship" class="form-control">
                                <option <?php if($this->user->relations_look == 'Casual') echo 'selected'; ?> value="Casual">Casual</option>
                                <option <?php if($this->user->relations_look == 'Something Serious') echo 'selected'; ?> value="Something Serious">Something Serious</option>
                                <option <?php if($this->user->relations_look == 'Friendship') echo 'selected'; ?> value="Friendship">Friendship</option>
                            </select>
                        </span>
                    </p>
                    <p>
                        <span class="txt-gender"><?php echo Yii::t('global', 'Age: ')?> </span>
                        <?php $arr_age = explode("-",$this->user->age);?>
                        <span class="txt-female">
                            <select name="age-from" class="form-control" style="width: 75px; float: left;">
                                <?php 
                                
                                for($i=18; $i<=50; $i++) {
                                    if($this->user->getAge(0) == $i)
                                        $l = 'selected';
                                    else
                                        $l = '';
                                    echo "<option ". $l ." value='".$i."'>".$i."</option>";
                                }?>
                            </select>
                            <select name="age-to" class="form-control" style="width: 75px;">
                                <?php 
                                
                                for($i=19; $i<=50; $i++) {
                                    if($this->user->getAge(1) == $i)
                                        $l = 'selected';
                                    else
                                        $l = '';
                                    echo "<option ". $l ." value='".$i."'>".$i."</option>";
                                }?>
                            </select>
                        </span>
                    </p>
                    <p>
                        <span class="txt-gender"><?php echo Yii::t('global', 'Training Buddy:') ?> </span>
                        <span class="txt-female">
                            <select name="training" class="form-control">
                                <option <?php if($this->user->training == 1) echo 'selected'; ?> value="1">Yes</option>
                                <option <?php if($this->user->training == 0) echo 'selected'; ?> value="0">No</option>
                            </select>
                        </span>
                    </p>
                    <span class="my-btn">
                        <input type="submit" value="Save"/>
                        <span class="text-cancel" id="cancel-gender">Cancel</span>
                    </span>
                </form>
            </div>
            <div class="looking-about">
                <span class="looking_about"><?php echo Yii::t('global', 'about') ?></span>
                <span class="note-span" id="id-about"></span>
                <p id="value-about"><?php if($this->user->about) echo $this->user->about; ?></p>
                <form method="post" style="display: none;" id="form-about">
                    <textarea class="form-control" id="about" name="about"><?php if($this->user->about) echo $this->user->about; ?></textarea>
                    <p style="font-size: 14px; margin-top: 5px;" id="about-count"> You have <?php echo 50 - (strlen($this->user->about)) ?> characters remaining </p>
                    <span class="my-btn">
                        <input type="submit" value="Save"/>
                        <span class="text-cancel" id="cancel-about">Cancel</span>
                    </span>
                </form>
            </div>
            
            <div class="education">
                <span class="education-span"><?php echo Yii::t('global', 'education') ?></span>
                <span class="note-span" id="id-education"></span>
                <span class="bachelor" id="value-education"><?php if($this->user->education) echo Education::model()->getNameEducation($this->user->education); ?></span>
                <form method="post" style="display: none;" id="form-education">
                    <select name="education" id="education" class="form-control">
                        <?php $education = Education::model()->findAll(); 
                            foreach($education as $value){
                                $l = '';
                                if($value->id == $this->user->education)
                                    $l = 'selected'; 
                                    echo "<option ". $l ." value='".$value->id."'>".$value->name."</option>"; 
                                }
                        ?>
                    </select>
                    <span class="my-btn">
                        <input type="submit" value="Save"/>
                        <span class="text-cancel" id="cancel-education">Cancel</span>
                    </span>
                </form>
            </div>
            
            <div class="education">
                <span class="education-span"><?php echo Yii::t('global', 'RELIGION') ?></span>
                <span class="note-span" id="id-religion"></span>
                <span class="bachelor" id="value-religion"><?php if($this->user->religion) echo Religion::model()->getNameReligion($this->user->religion) ?></span>
                <form method="post" style="display: none;" id="form-religion">
                    <select name="religion" id="religion" class="form-control">
                        <?php $religion = Religion::model()->findAll(); 
                            foreach($religion as $value){
                                $l = '';
                                if($value->id == $this->user->religion)
                                    $l = 'selected'; 
                                    echo "<option ". $l ." value='".$value->id."'>".$value->name."</option>"; 
                                }
                        ?>
                    </select>
                    <span class="my-btn">
                        <input type="submit" value="Save"/>
                        <span class="text-cancel" id="cancel-religion">Cancel</span>
                    </span>
                </form>
            </div>
            
            <div class="education">
                <span class="education-span"><?php echo Yii::t('global', 'ETHNICITY')?></span>
                <span class="note-span" id="id-ehtnicity"></span>
                <span class="bachelor" id="value-ehtnicity"><?php if($this->user->ehtnicity) echo Ethnicity::model()->getNameEthnicity($this->user->ehtnicity) ?></span>
                <form method="post" style="display: none;" id="form-ehtnicity">
                    <select name="ehtnicity" id="ethnicity" class="form-control">
                        <?php $ethnicity = Ethnicity::model()->findAll(); 
                            foreach($ethnicity as $value){
                                $l = '';
                                if($value->id == $this->user->ehtnicity)
                                    $l = 'selected'; 
                                    echo "<option ". $l ." value='".$value->id."'>".$value->name."</option>"; 
                                }
                        ?>
                    </select>
                    <span class="my-btn">
                        <input type="submit" value="Save"/>
                        <span class="text-cancel" id="cancel-ehtnicity">Cancel</span>
                    </span>
                </form>
            </div>
            <div class="education">
                <span class="education-span"><?php echo Yii::t('global', 'HEIGHT') ?></span>
                <span class="note-span" id="id-height"></span>
                <span class="bachelor" id="value-height"><?php if($this->user->height) echo $this->user->height . Yii::t('global', ' FEET')?> </span>
                <?php $arr = explode(".",$this->user->height);?>
                <form method="post" style="display: none;" id="form-height">
                    <div style="float: left; width: 50%;">
                        <select class="form-control" name="feet">
                                <?php 
                                
                                for($i=0; $i<=10; $i++) {
                                    if($arr[0] == $i)
                                        $l = 'selected';
                                    else
                                        $l = '';
                                    echo "<option ". $l ." value='".$i."'>".$i."</option>";
                                }?>
                        </select>
                    </div>
                    <div style="float: right; width: 49%;">
                        <select class="form-control" id="inches" name="inches">
                            <?php 
                            
                            /*for($i=0; $i<=9; $i++) {
                                if($arr[1] == $i)
                                    $h = 'selected';
                                else
                                    $h = '';
                                echo "<option ". $h ." value='".$i."'>".$i."</option>";
                            }*/?>
                        </select>
                    </div>
                        
                    <span class="my-btn">
                        <input type="submit" value="Save"/>
                        <span class="text-cancel" id="cancel-height">Cancel</span>
                    </span>
                </form>
            </div>
            
            <div class="education">
                <span class="education-span"><?php echo Yii::t('global', 'CHILDREN') ?></span>
                <span class="note-span" id="id-children"></span>
                <span class="bachelor" id="value-children"><?php if($this->user->children) echo Children::model()->getNameChildren($this->user->children) ?> </span>
                <form method="post" style="display: none;" id="form-children">
                   <select class="form-control" name="children">
                        <?php $religion = Children::model()->findAll(); 
                            foreach($religion as $value){
                                $l = '';
                                if($value->id == $this->user->religion)
                                    $l = 'selected'; 
                                    echo "<option ". $l ." value='".$value->id."'>".$value->name."</option>"; 
                                }
                        ?>
                    </select>
                    <span class="my-btn">
                        <input type="submit" value="Save"/>
                        <span class="text-cancel" id="cancel-children">Cancel</span>
                    </span>
                </form>
            </div>
            
            <div class="content-bit favorite_a">
                <span class="what"><?php echo Yii::t('global', 'Fitness passion') ?></span>
                <span class="note-span" id="id-passion"></span>
                <span class="godfather" id="value-passion"><?php if($this->user->passion) echo $this->user->passion ?> </span>
                <form method="post" style="display: none;" id="form-passion">
                    <input type="text" name="passion" id="passion" class="form-control" value="<?php if($this->user->passion) echo $this->user->passion; ?>"/>
                    <p style="font-size: 14px; margin-top: 5px;" id="passion-count"> You have <?php echo 35 - (strlen($this->user->passion)) ?> characters remaining </p>
                    <span class="my-btn">
                        <input type="submit" value="Save"/>
                        <span class="text-cancel" id="cancel-passion">Cancel</span>
                    </span>
                </form>
            </div>
            
            <div class="content-bit favorite_a">
                <span class="what"><?php echo Yii::t('global', 'GYM MEMBERSHIP') ?></span>
                <span class="note-span" id="id-gym"></span>
                <span class="godfather" id="value-gym"><?php if($this->user->gym) echo $this->user->gym ?> </span>
                <form method="post" style="display: none;" id="form-gym">
                    <input type="text" name="gym" id="gym" class="form-control" value="<?php if($this->user->gym) echo $this->user->gym; ?>"/>
                    <p style="font-size: 14px; margin-top: 5px;" id="gym-count"> You have <?php echo 35 - (strlen($this->user->gym)) ?> characters remaining </p>
                    <span class="my-btn">
                        <input type="submit" value="Save"/>
                        <span class="text-cancel" id="cancel-gym">Cancel</span>
                    </span>
                </form>
            </div>
            
            
            <div class="content-bit favorite_a">
                <span class="what"><?php echo Yii::t('global', 'DIET') ?></span>
                <span class="note-span" id="id-diet"></span>
                <span class="godfather" id="value-diet"><?php if($this->user->diet) echo $this->user->diet ?> </span>
                <form method="post" style="display: none;" id="form-diet">
                    <input type="text" name="diet" id="diet" class="form-control" value="<?php if($this->user->diet) echo $this->user->diet; ?>"/>
                    <p style="font-size: 14px; margin-top: 5px;" id="diet-count"> You have <?php echo 35 - (strlen($this->user->diet)) ?> characters remaining </p>
                    <span class="my-btn">
                        <input type="submit" value="Save"/>
                        <span class="text-cancel" id="cancel-diet">Cancel</span>
                    </span>
                </form>
            </div>
            
            <div class="content-bit favorite_a">
                <span class="what"><?php echo Yii::t('global', 'Goals') ?></span>
                <span class="note-span" id="id-goal"></span>
                <span class="godfather" id="value-goal"><?php if($this->user->goal) echo $this->user->goal ?> </span>
                <form method="post" style="display: none;" id="form-goal">
                    <input type="text" name="goal" id="goals" class="form-control" value="<?php if($this->user->goal) echo $this->user->goal; ?>"/>
                    <p style="font-size: 14px; margin-top: 5px;" id="goals-count"> You have <?php echo 35 - (strlen($this->user->goal)) ?> characters remaining </p>
                    <span class="my-btn">
                        <input type="submit" value="Save"/>
                        <span class="text-cancel" id="cancel-goal">Cancel</span>
                    </span>
                </form>
            </div>
            
            <div class="content-bit favorite_a">
                <span class="what"><?php echo Yii::t('global',  'HOW OFTEN DO YOU EXCERCISE?') ?></span>
                <span class="note-span rangesUpdate" id="id-excercise" ></span>
                <div style="position: relative;" >
                    
                    <span class="godfather"><?php echo Yii::t('global', 'Never') ?></span>
                    <p class="range-2" id="value-excercise">
                        <span class="ws-range" role="slider" aria-readonly="false" tabindex="0" aria-disabled="false" aria-valuenow="<?php if($this->user->excercise) echo $this->user->excercise; ?>" aria-valuetext="<?php /*if($this->user->excercise) echo $this->user->excercise; */?>">
                            <span class="ws-range-min ws-range-progress" style="margin-top: 0px; width: <?php if($this->user->excercise) echo $this->user->excercise; ?>%;"></span>
                            <span class="ws-range-rail ws-range-track" style="left: 11px; right: 9px;">
                                <span class="ws-range-thumb" style="margin-left: -11px; margin-top: -6px; left: <?php if($this->user->excercise) echo $this->user->excercise; ?>%;">
                                     </span>
                            </span>
                        </span>
                    </p>
                    
                    
                    <span class="often"><?php echo Yii::t('global', 'Often') ?></span>
                    <form method="post"  class="rangetype" id="form-excercise">
                        <input class="rangeOpacity" name="excercise" type="range" min="0" value="<?php if($this->user->excercise) echo $this->user->excercise; ?>" max="100" data-rangeslider>
                        <output style="display: none"></output>
                        <!--<p class="range-2">
                            <input type="range" min="1" max="100" step="1" value="<?php //echo $this->user->excercise ?>" name="excercise" class="width-range"/>
                        </p>-->
                        <span class="my-btn btn-ranges btn-ranges-ex" >
                            <input type="submit" value="Save"/>
                            <span class="text-cancel" id="cancel-excercise">Cancel</span>
                            <div class="ajaxloader"></div>
                        </span>

                    </form>
                </div>
                  
            </div>
            
            <div class="content-bit favorite_a">
                <span class="what"><?php echo Yii::t('global', 'DO YOU DRINK?') ?></span>
                <span class="note-span rangesUpdate" id="id-drink"></span>
                <div style="position: relative;">
                    
                    <span class="godfather"><?php echo Yii::t('global', 'Never') ?></span>
                    <p class="range-2" id="value-drink">
                        <!--<input type="range" value="20" max="100" class="input-range" />-->
                        <span class="ws-range" role="slider" aria-readonly="false" tabindex="0" aria-disabled="false" aria-valuenow="<?php if($this->user->drink) echo $this->user->drink; ?>" aria-valuetext="<?php if($this->user->drink) echo $this->user->drink; ?>">
                            <span class="ws-range-min ws-range-progress" style="margin-top: 0px; width: <?php if($this->user->drink) echo $this->user->drink; ?>%;"></span>
                            <span class="ws-range-rail ws-range-track" style="left: 11px; right: 9px;">
                                <span class="ws-range-thumb" style="margin-left: -11px; margin-top: -6px; left: <?php if($this->user->drink) echo $this->user->drink; ?>%;">
                                    <span data-value="<?php if($this->user->drink) echo $this->user->drink; ?>" data-valuetext="<?php if($this->user->drink) echo $this->user->drink; ?>"></span>
                                </span>
                            </span>
                        </span>
                    </p>
                    <span class="often"><?php echo Yii::t('global', 'Often') ?></span>
                    <form method="post"  class="rangetype" id="form-drink">
                        <input name="drink" type="range" min="0" value="<?php if($this->user->drink) echo $this->user->drink; ?>" max="100" data-rangeslider>
                        <output style="display: none"></output>
                        <!--<p class="range-2">
                            <input type="range" min="1" max="100" step="1" value="<?php //echo $this->user->drink ?>" name="drink" class="width-range"/>
                        </p>-->
                        <span class="my-btn btn-ranges btn-ranges-dr">
                            <input type="submit" value="Save"/>
                            <span class="text-cancel" id="cancel-drink">Cancel</span>
                            <div class="ajaxloader"></div>
                        </span>
                    </form>
                </div>
                
            </div>
            
            <div class="content-bit-final favorite_a">
                <span class="what"><?php echo Yii::t('global', 'DO YOU SMOKE?') ?></span>
                <span class="note-span rangesUpdate" id="id-smoke"></span>
                <div style="position: relative;">
                    
                    <span class="godfather"><?php echo Yii::t('global', 'Never') ?></span>
                    <p class="range-2" id="value-smoke">
                        <span class="ws-range" role="slider" aria-readonly="false" tabindex="0" aria-disabled="false" aria-valuenow="<?php if($this->user->smoke) echo $this->user->smoke; ?>" aria-valuetext="<?php if($this->user->smoke) echo $this->user->smoke; ?>">
                            <span class="ws-range-min ws-range-progress" style="margin-top: 0px; width: <?php if($this->user->smoke) echo $this->user->smoke; ?>%;"></span>
                            <span class="ws-range-rail ws-range-track" style="left: 11px; right: 9px;">
                                <span class="ws-range-thumb" style="margin-left: -11px; margin-top: -6px; left: <?php if($this->user->smoke) echo $this->user->smoke; ?>%;">
                                    <span data-value="<?php if($this->user->smoke) echo $this->user->smoke; ?>" data-valuetext="<?php if($this->user->smoke) echo $this->user->smoke; ?>"></span>
                                </span>
                            </span>
                        </span>
                    </p>
                    <span class="often"><?php echo Yii::t('global', 'Often') ?></span>
                    <form method="post"  class="rangetype" id="form-smoke">
                        <input name="smoke" type="range" min="0" value="<?php if($this->user->smoke) echo $this->user->smoke; ?>" max="100" data-rangeslider>
                        <output style="display: none"></output>
                        <!--<p class="range-2">
                            <input type="range" min="1" max="100" step="1" value="<?php //echo $this->user->smoke ?>" name="smoke" class="width-range"/>
                        </p>-->
                        <span class="my-btn btn-ranges btn-ranges-sm ">
                            <input type="submit" value="Save"/>
                            <span class="text-cancel" id="cancel-smoke">Cancel</span>
                            <div class="ajaxloader"></div>
                        </span>
                    </form>
                </div>
                
            </div>
            
        </div>
        <!--End Post 1 -->
    </div>
    <div class="right-profile" style="display: none;">
    
        
        <?php //$this->renderPartial('/user/video',compact('video')) ?>
        
        <?php //$this->renderPartial('/user/photo',compact('photos','private')) ?>

        <!--Home Page-->
        <div class="content-profile">
        <!--Post 1-->
            <?php if($achievements) { 
                foreach($achievements as $value){
                ?>
                <div class="post"> 
                    <div class="first-infor infor-pro">
                        <div class="profile">
                        <?php if($this->user->photo =='undefined'){ ?>
                            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/no-avatar.png">
                        <?php } else { ?>
                            <img src="/uploads/avatar/<?php echo $this->user->photo ?>" />
                        <?php } ?>
                        <img class="online-icon-p" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/online-icon.png" />
                            <div class="crycle-img">
                                <h2 class="h2-name">
                                    <?php error_reporting(0);?>
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
                                <li><span class="upvote" id="upvote_<?php echo $value->id; ?>" data-id=<?php echo $value->id; ?>></span></li>
                                <li><span class="vote_amount change_vote_<?php echo $value->id; ?>"><?php echo Achievements::model()->getCore($value->id); ?></span></li>
                                <li><span class="downvote" id="downvote_<?php echo $value->id; ?>" data-id=<?php echo $value->id; ?>></span></li>
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
                          echo str_replace($search, $replace, $value->content); ?> 
      
                        <!--<span class="link_1">#LOL</span>-->
                        </h4>
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
                            <p style="padding-bottom: 10px;"><span class="comment_txt">Comment</span> <span class="comment_count">(2)</span></p>
                            <ul>
                                <li>
                                    <div class="user_comment_post">
                                        <div class="col-md-1">
                                            <a href="#"><img src="/themes/default/images/1_avarta.png"></a>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="infor_comment">
                                                <h5><span>cutesyjf24</span></h5>
                                                <h6><span class="minus_1">8 min </span> - <span class="where_location">Tampa Bay, FL</span></h6>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="comment_detail_post">
                                                <span>Of Course! Russian Models are hot hot hot!</span>
                                            </div>
                                        </div>
                                        <div class="col-md-1 dots">
                                            <a href="#"><img src="/themes/default/images/three_dot.png" /></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="user_comment_post">
                                        <div class="col-md-1">
                                            <a href="#"><img src="/themes/default/images/1_avarta.png"></a>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="infor_comment">
                                                <h5><span>cutesyjf24</span></h5>
                                                <h6><span class="minus_1">8 min </span> - <span class="where_location">Tampa Bay, FL</span></h6>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="comment_detail_post">
                                                <span>Of Course! Russian Models are hot hot hot!</span>
                                            </div>
                                        </div>
                                        <div class="col-md-1 dots">
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
                <span class="bit">Detailed About Me</span>
                <span class="add-question-1" id="question-custom">Add Custom Question</span>
            </div>
            <div id="question-custom-form" class="content-form-question">
                <div class="form-group">
                    <input type="text" id="question" class="form-control" name="question" placeholder="Enter a question" />
                    <p style="font-size: 14px; margin-top: 5px;" id="question-count">You have 35 characters remaining</p>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="answer" name="answer" placeholder="And now answer it!"></textarea>
                    <p style="font-size: 14px; margin-top: 5px;" id="answer-count">You have 35 characters remaining</p>
                </div>
                <span class="my-btn">
                    <input type="submit" value="Save" class="post-question"/>
                    <span class="text-cancel" id="cancel-question-custom">Cancel</span>
                </span>
            </div>
            
            <div class="all-question"></div>
            <?php if($this->question){ 
                $i = 0;
                foreach($this->question as $value){                     
                    $check = Question::model()->checkQuestion($value['question_id']);
                ?>
                <?php if($check == 0) { ?>
                        <div <?php if($i == (count($this->question) - 1)) echo 'class="content-bit-final"'; else echo 'class="content-bit"'; ?> id="content-question-default_<?php echo $value['question_id'];?>">
                            <span class="what" id="sentence_question_<?php echo $value['question_id']; ?>"><?php echo Question::model()->getQuestion($value['question_id']); ?></span>
                        <?php }else{ ?>
                        <div <?php if($i == (count($this->question) - 1)) echo 'class="content-bit-final"'; else echo 'class="content-bit"'; ?> >
                            <span class="what"><?php echo Question::model()->getQuestion($value['question_id']); ?></span>
                        <?php } ?>
                        <span class="note-span note_default_question" data-id="<?php echo $value['question_id']; ?>"></span>
                        <span class="godfather answer_<?php echo $value['question_id']; ?>" ><?php echo $value['answer']; ?></span>
                        <div id="question_<?php echo $value['question_id']; ?>" style="display: none;" method="post">
                            <?php if($check == 0) { ?>
                                <input type="text" id="user_question_<?php echo $value['question_id']; ?>" name="question" class="form-control" value="<?php echo Question::model()->getQuestion($value['question_id']); ?>" />
                                <p style="font-size: 14px; margin-top: 5px;" id="question-count_<?php echo $value['question_id'];?>"> You have <?php echo 35 - (strlen(Question::model()->getQuestion($value['question_id']))) ?> characters remaining </p>
                                <br />
                            <?php }else{ ?>
                                <input type="hidden" id="user_question_<?php echo $value['question_id']; ?>" name="question" class="form-control" value="<?php echo Question::model()->getQuestion($value['question_id']); ?>" />
                            <?php } ?>
                            <textarea class="form-control" id="user_answer_<?php echo $value['question_id']; ?>" name="answer"><?php echo $value['answer']; ?></textarea>
                            <p style="font-size: 14px; margin-top: 5px;" id="answer-count_<?php echo $value['question_id'];?>"> You have <?php echo 35 - (strlen($value['answer'])) ?> characters remaining </p>
                            <span class="my-btn">
                                
                                <?php if($check == 0) { ?>
                                    <input type="button" value="Save" class="saveAnswer" data-id="<?php echo $value['question_id']. "_". 0; ?>" />
                                    <span class="text-cancel q_default_delete deleteAnswer" data-id="<?php echo $value['question_id']; ?>">Delete</span>
                                <?php }else{ ?>
                                    <input type="button" value="Save" class="saveAnswer" data-id="<?php echo $value['question_id']. "_". 1; ?>" />
                                <?php } ?>
                                <span class="text-cancel q_default_cancel" data-id="<?php echo $value['question_id']; ?>">Cancel</span>
                            </span>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $("#user_question_<?php echo $value['question_id']; ?>").on('input', function(){
                            var question_lenght = $("#user_question_<?php echo $value['question_id']; ?>").val().trim().length;
                            if(question_lenght < 36)
                                $('#question-count_<?php echo $value['question_id']; ?>').html('You have ' + (35 - question_lenght) + ' characters remaining');
                            else
                                alert('Please ensure the length question smaller than 35 character.!');
                        });
                        
                        $("#user_answer_<?php echo $value['question_id']; ?>").on('input', function(){
                            var answer_lenght = $("#user_answer_<?php echo $value['question_id']; ?>").val().trim().length;
                            if(answer_lenght < 36)
                                $('#answer-count_<?php echo $value['question_id']; ?>').html('You have ' + (35 - answer_lenght) + ' characters remaining');
                            else
                                alert('Please ensure the length answer smaller than 35 character.!');
                        });
                        
                    </script>
                <?php $i++; } 
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
