<?php
/* @var $data Notification */
?>
<div class="col-md-12 notification-dropdown-item">
    <div class="col-md-1 notification-photo">
        <img src="<?=Yii::app()->themeManager->baseUrl;?>/images/fish/avatar.png" class="img-responsive img-circle"/>
    </div>
    <div class="col-md-9 notification-content">
        <?php
        switch($data->type)
        {
            case 'FITMATCH': echo '<a href="#" class="nickname">'.$data->author->username.'</a> liked you in fitmatch'; break;
            case 'PHOTO': echo '<a href="#" class="nickname">'.$data->author->username.'</a> commented your <a href="#" class="target-link">photo</a>'; break;
        }
        ?>

    </div>
    <div class="col-md-2 notification-time">
        12:36 pm
    </div>
</div>