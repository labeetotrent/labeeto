<?php $user = User::model()->findByPk($data->user_id); 
if($user){?>
<div class="post">
    <div class="first-infor">
        <div class="profile">
            <?php if(($user->photo =='')||($user->photo =='undefined')){ ?>
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/no-avatar.png">
            <?php }else{ ?> 
                <img src="../uploads/avatar/<?php echo Utils::getAvatar($user->photo); ?>">
            <?php } ?>
            <img class="online-icon-p" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/online-icon.png" />
            <div class="crycle-img">
                <h2>
                    <a href="/user/detail/<?php echo $user->id; ?>"><?php echo $user->username; ?></a>
                    <img class="premium-icon" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/premium_2.png" />
                    <img class="check-icon" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/icon_check.png" />
                </h2>
                <h2>
                    <span class="time-location">18 F, CA,</span> 
                    <span class="dot-icon"> <?php echo Achievements::time_elapsed_string($data->created); ?></span>
                </h2>
                <!--<a class="message" data-id="<?php //echo $user->id; ?>" data-toggle="modal" data-target="#SendaMessage">Send a Message</a>
                <a class="report-user" data-id="<?php //echo $user->id . '_' . $data->id; ?>" data-toggle="modal" data-target="#ReportUser">Report User</a>
                <input type="hidden" id="avatar_hidien_<?php //echo $user->id; ?>" value="<?php //echo $user->photo; ?>" />
                <input type="hidden" id="name_hidien_<?php  //echo $user->id; ?>" value="<?php //echo $user->username; ?>" />-->
            </div>
        </div>
        
        <div class="vote">
            <ul>
                <li><span class="upvote" id="upvote_<?php echo $data->id; ?>" data-id=<?php echo $data->id; ?>></span></li>
                <li><span class="change_vote_<?php echo $data->id; ?>"><?php echo Achievements::model()->getCore($data->id); ?></span></li>
                <li><span class="downvote" id="downvote_<?php echo $data->id; ?>" data-id=<?php echo $data->id; ?>></span></li>
            </ul>
        </div>
    </div>
    <div class="content-post">
      <h3 class="my_posted"> 
      <?php 
      if(isset($_GET['search'])){
      $arr = $data->content;
      $str_serach = '#'. preg_replace('/[^A-Za-z0-9\-]/', '', $_GET['search']);
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
                
                if($str == $str_serach){
                    $search[] = $str;
                    $replace[] = '<span class="link_1">'. $str .'</span>';
                }
                
            }
      }
      echo str_replace($search, $replace, $data->content);
     }else{
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
          echo str_replace($search, $replace, $data->content);
        
     } ?> </h3>
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
<?php } ?>