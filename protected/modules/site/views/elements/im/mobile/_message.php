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
<div class="message message-with-avatar message-received">
    <!-- Sender name -->
    <div class="message-name"><?=$message['username']?></div>

    <!-- Bubble with text -->
    <div class="message-text"><?=$message['message'];?></div>

    <!-- Sender avatar -->
    <div style="background-image:url(<?=Yii::app()->baseUrl?>/uploads/avatar/<?=$message['photo'];?>)" class="message-avatar"></div>
</div>