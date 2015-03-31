<div class="col-md-12 user-suggestion" user-id="<?=$data->id;?>" user-name="<?=$data->username;?>">
    <div class="col-md-2 avatar">
        <img src="<?=Yii::app()->baseUrl?>/uploads/avatar/<?=$data->photo;?>" class="img-circle img-responsive"/>
    </div>
    <div class="col-md-10 nickname">
        <?=$data->username;?>
    </div>
</div>