<?php $user = User::model()->findByPk($data->user_id);
$vote = Vote::model()->findByAttributes(array('achievements_id' => $data->id, 'user_id' => Yii::app()->user->getId()));
$active = 'NONE';
if($vote !== null)
{
    if($vote->up_vote == '1' && $vote->down_vote == '0')
        $active = 'UP';
    elseif($vote->up_vote == '0' && $vote->down_vote == '1')
        $active = 'DOWN';
}
if($user){?>
<div class="post">
    <div class="first-infor">
        <div class="profile">
            <?php if(($user->photo =='')||($user->photo =='undefined')){ ?>
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/no-avatar.png">
            <?php } else { ?>
                <img src="../uploads/avatar/<?php echo Utils::getAvatar($user->photo); ?>">
            <?php } ?>
            <img class="online-icon-p" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/online-icon.png" />
            <div class="crycle-img">
                <h2>
                    <a href="/user/detail/<?php echo $user->id; ?>"><?php echo $user->username; ?></a>
                </h2>
                <h2>
                    <span class="time-location"><?= date("Y") - date('Y', strtotime($user->birthday));  ?> <?php  if($user->gender == 1) echo "F"; else echo 'M'; ?> - <?= $user->address; ?></span>
                    <span class="dot-icon"> <?php echo Achievements::time_elapsed_string($data->created); ?></span>
                </h2>
            </div>
        </div>
        <div class="vote">
            <ul>
                <li><span class="upvote<?=($active == 'UP') ? ' active' : ' notactive';?>" id="upvote_<?php echo $data->id; ?>" data-id=<?php echo $data->id; ?>></span></li>
                <li><span class="vote_amount change_vote_<?php echo $data->id; ?><?=($active !== 'NONE') ? ' active' : ' notactive';?>"><?php echo Achievements::model()->getCore($data->id); ?></span></li>
                <li><span class="downvote<?=($active == 'DOWN') ? ' active' : ' notactive';?>" id="downvote_<?php echo $data->id; ?>" data-id=<?php echo $data->id; ?>></span></li>
            </ul>
        </div>
    </div>
    <div class="content-post">
      <h3 class="my_posted"> 
      <?php 
      $arr = $data->content;
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
      echo str_replace($search, $replace, $data->content); ?> </h3>
      <div class="comment-post-home">
        <p style="padding-bottom: 10px;"><span class="comment_txt">Comment</span> <span class="comment_count">(<?=count($data->comments);?>)</span></p>
        <?php if(count($data->comments) > 0) { ?>
            <ul>
                <?php
                    foreach($data->comments as $comment)
                    {
                        $this->renderPartial('../elements/achievement_comment', array('data' => $comment));
                    }
                ?>
            </ul>
        <?php } ?>
      </div>
      <div class="my_comment" post-id="<?=$data->id;?>">
        <div style="float: left; margin-left: 5px;">
            <a href="#"><img src="../uploads/avatar/<?php echo Utils::getAvatar($this->user->photo); ?>"></a>
        </div>
        <div class="content_input_comment">
            <input class="form-control comment_post_txt" placeholder="Add comment here..." />
        </div>
        <div class="col-md-12 add-comment-container">
            <button class="add-comment-btn pull-right">Add</button>
        </div>
      </div>
    </div>
</div>
<?php } ?>
