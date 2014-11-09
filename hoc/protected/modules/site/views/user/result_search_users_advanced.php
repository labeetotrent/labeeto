 <div class="search-result">
<ul class="list-result">
<li class="">
    <div class="chat-message">
        <div class="avatar-intro">
            <!-- <?php  echo ($data->is_online)?'icon-online':'icon-offline'; ?> -->
            <?php if(($data->photo =='')||($data->photo =='undefined')){ ?>
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/no-avatar.png">
            <?php } else { ?>
                <img src="/uploads/avatar/<?php echo $data->photo ?>" />
            <?php } ?>
            <img class="icon-online-pre" src="/themes/default/images/<?php echo ($data->is_online)?'online-icon.png':'online-icon.png'; ?>"> 
        </div>
       
        <div class="name-01">
            <h3 class="show"><a href="/user/detail/<?php echo $data->id; ?>"> <?php echo $data->username; ?> </a> 
                <span class="<?php echo ($data->verified == User::MEMBER_VERIFIED )?'check-red':'' ?>"></span>
                <span class="<?php echo ($data->membership == User::MEMBER_PREMIUM )?'icon-premium':'' ?>"></span>
            </h3>
            <span class="text-search-01"><?php echo  date('Y')- date('Y', strtotime($data->birthday)); ?> F, PH</span> 
            <!-- <span class="<?php echo ($data->is_online)?'online':'offline'; ?>"><?php echo ($data->is_online)?'online':'offline'; ?></span> -->
        </div>
        

        <div class="chat-01">
            <a data-toggle="modal" data-target="#WantToChat" data-id=" <?php echo $data->id; ?> "></a>
        </div>
        
        <div class="message-01">
            <a data-toggle="modal" data-target="#SendaMessage" class="message" data-id="<?php echo $data->id; ?>"></a>
            <input type="hidden" id="avatar_hidien_<?php echo $data->id; ?>" value="<?php echo $data->photo; ?>" />
            <input type="hidden" id="name_hidien_<?php echo $data->id; ?>" value="<?php echo $data->username; ?>" />
        </div>
        <div class="clear"></div>
    </div>
    <div class="avatar-intro-01">
        <!-- <?php if(($data->photo =='')||($data->photo =='undefined')){ ?>
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/no-avatar.png">
        <?php } else { ?>
            <img src="/uploads/avatar/<?php echo $data->photo ?>" />
        <?php } ?> -->
        <p>
            <strong>Hi! I am a smart, ambitious and witty native New Yorker. Born in VA.  I once told Mia Hamm I hated soccer and made a teacher cry in the seventh grade. Please be well-mannered.</strong>
            
            <!-- <a data-toggle="modal" data-target="#ReportUser" class="report report-user" data-id=" <?php echo $data->id; ?> ">Report User</a> -->
        </p>
    </div>
    
</li>


</ul>
</div>