<?php
/* @var $data Chat */
?>
<?php
$date = DateTime::createFromFormat('Y-m-d H:i:s', $data->created);
?>
<div class="col-md-12 message my" <?=isset($hidden) ? 'style="display: none;"' : '';?>>
    <div class="col-md-10">
        <div class="row message-info">
            <span class="date"><?=$date->format('d M, g:ia');?></span>
            <span class="nickname">ME</span>
        </div>
        <div class="row message-content">
            <?=$data->message;?>
        </div>
    </div>
    <div class="col-md-2 avatar">
        <img src="<?=Yii::app()->baseUrl?>/uploads/avatar/<?=$data->userFrom->photo;?>" class="img-circle img-responsive"/>
    </div>
</div>