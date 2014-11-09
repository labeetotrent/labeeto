
<li id="unlock_<?php echo $data->id; ?>">
    <img src="/uploads/avatar/<?php echo User::model()->showAvatar($data->id); ?>" />
    <span>
    <?php echo User::model()->getUser($data->id) ?> 
    <a data-id="<?php echo $data->id; ?>" class="UnlockUser"> Unlock</a></span>
</li>