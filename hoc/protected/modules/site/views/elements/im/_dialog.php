<?php /* @var $data array */ ?>
<?php
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $data['created']);
    $first = false;
    if(isset($data['first']))
    {
        if($data['first'])
            $first = true;
    }
?>
<div class="col-md-12 dialog<?= ($data['unreadMessages'] > 0) ? ' has-new':''; ?><?= ($first) ? ' active':''; ?>" user-id="<?=$data['userid'];?>">
    <div class="col-md-3 avatar">
        <img src="<?=Yii::app()->baseUrl?>/uploads/avatar/<?=$data['photo'];?>" class="img-circle img-responsive"/>
    </div>
    <div class="col-md-7 text">
        <div class="row nickname">
            <?=$data['username'];?>
        </div>
        <div class="row last-message">
            <?=$data['lastMessage'];?>
        </div>
    </div>
    <div class="col-md-2 info">
        <div class="row date">
            <?=$date->format('d M');?>
        </div>
        <?php if($data['unreadMessages'] > 0) { ?>
        <div class="row messages-count">
            <span class="badge"><span><?=$data['unreadMessages'];?></span></span>
        </div>
        <?php } ?>
    </div>
</div>