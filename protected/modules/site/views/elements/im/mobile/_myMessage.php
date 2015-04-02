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
<!-- Another sent message -->
<div class="message message-sent message-with-tail">
    <!-- Bubble with text -->
    <div class="message-text"><?=$message['message'];?></div>
</div>
