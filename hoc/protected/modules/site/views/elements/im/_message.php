<?php
/* @var $data Chat */
?>
<?php
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $data->created);
?>
<div class="col-md-12 message">
    <div class="col-md-2 avatar">
        <img src="<?=Yii::app()->baseUrl?>/uploads/avatar/<?=$data->userFrom->photo;?>" class="img-circle img-responsive"/>
    </div>
    <div class="col-md-10">
        <div class="row message-info">
            <span class="nickname"><?=$data->userFrom->username;?></span>
            <span class="date"><?=$date->format('d M, g:ia');?></span>
        </div>
        <div class="row message-content">
            <?=$data->message;?>
        </div>
    </div>
</div>