<div class="facebook-fancybox  lostpass-form" style="display: block; margin: 0px auto;">
    <div class="fancybox-heading">
        <div class="fix-text-forgot">
            <span>Forgot Password!</span>
        </div>
    </div>
    <div class="inner-fancybox">
        <div class="inner-wrapper">
            <form class="frmcontact" id="fancybox-form" action="/user/lostpassword" method="post">            
                <div class="message-login-error"><?php $this->widget('widgets.admin.notifications'); ?></div>
                <input type="text" class="username-input" placeholder="Email" name="LostPasswordForm[email]">
                <input type="submit" value="<?php echo Yii::t('global','Send'); ?>"/>
            </form>
        </div>
       
    </div>
</div>