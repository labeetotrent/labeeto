<?php
/* @var $data Chat */
?>
<?php
    $element = array();
    if(isset($data->userFrom))
    {
        $message = array('photo' => $data->userFrom->photo, 'created' => $data->created, 'username' => $data->userFrom->username, 'message' => $data->message);
    }
    else
        $message = $data;
    $date = strtotime($message['created']);
?>
<div class="col-md-12 message">
    <div class="col-md-2 avatar">
        <img src="<?=Yii::app()->baseUrl?>/uploads/avatar/<?=$message['photo'];?>" class="img-circle img-responsive"/>
    </div>
    <div class="col-md-10">
        <div class="row message-info">
            <span class="nickname"><?=$message['username']?></span>
            <span class="date"><?=date('d M, g:ia', $date);?></span>
        </div>
        <div class="row message-content">
            <?=$message['message'];?>
        </div>
    </div>
</div>