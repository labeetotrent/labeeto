<?php
/**
 * Created by PhpStorm.
 * User: slashman
 * Date: 10.01.15
 * Time: 15:15
 */
?>
<div class="col-md-12 notifications-container">
    <div class="col-md-12 notifications">
        <div class="col-md-12 notifications-header">
            Notifications
        </div>
        <div class="col-md-12 notifications-body">
            <!--<div class="col-md-12 notification-date-separator">
                Today
            </div>-->
            <?php
            if(count($notifications) > 0)
            {
                foreach($notifications as $notification)
                {
                    $this->renderPartial('/elements/notification/_dropdownNotification', array('data' => $notification));
                }
            }
            else
            {
                ?>
                <div class="text-center col-md-12 no-notifications">You have no notifications yet..</div>
            <?php
            }
            ?><!--
            <div class="col-md-12 notification-container message-notification">
                <a href="#" class="nickname">thesweetgirl09</a> sent you a message <span>12:36 pm</span>
            </div>
            <div class="col-md-12 notification-container favour-notification">
                <a href="#">georgiamayjagger</a> favourited your <a href="#">post</a> <span>12:36 pm</span>
            </div>-->
        </div>
    </div>
</div>