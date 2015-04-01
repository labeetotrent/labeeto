<?php echo (isset($hidden)) ? '<li style="display: none;">' : '<li>'; ?>
    <div class="user_comment_post">
        <div class="col-md-1">
            <a href="#">
                <?php if(($data->user->photo =='')||($data->user->photo =='undefined')){ ?>
                    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/no-avatar.png">
                <?php } else { ?>
                <img src="../uploads/avatar/<?php echo Utils::getAvatar($data->user->photo); ?>">
                <?php } ?>
            </a>
        </div>
        <div class="col-md-3">
            <div class="infor_comment">
                <h5><span><?=$data->user->username;?></span></h5>
                <h6><span class="minus_1"><?php echo Achievements::time_elapsed_string($data->created); ?> </span><!--- <span class="where_location"><?=$data->user->address;?></span>--></h6>
            </div>
        </div>
        <div class="col-md-7">
            <div class="comment_detail_post">
                <span><?=$data->content;?></span>
            </div>
        </div>
        <div class="col-md-1 dots">
            <a href="#"><img src="/themes/default/images/three_dot.png" /></a>
        </div>
    </div>
</li>
