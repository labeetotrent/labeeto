<div class="container" xmlns="http://www.w3.org/1999/html">
    <a href="/" id="logo">
        <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/top_logo.png" alt="Logo"/>
    </a>
    <?php if(!Yii::app()->user->isGuest){ ?>
            <a href="<?php echo $this->createUrl('/user/logout'); ?>" class="deleteSessionAjax" style="color: #A10EA1;"><?php echo Yii::t('global', '(Logout)'); ?></a>
    <?php } else { ?>
        <a href="#facebook-fancybox" class="fancybox" id="login-btn">LOGIN</a>
    <?php } ?>
</div>
<!-- Fancybox come here -->
<div id="facebook-fancybox" class="facebook-fancybox">
    <div class="fancybox-heading">
        <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/fancybox_heading.png" alt="Sign in to Labeeto"/>
    </div>
    <div class="inner-fancybox">
        <div class="inner-wrapper">
            <?php echo CHtml::form($this->createUrl('/user/loginUser'), 'post', array('class'=>'frmcontact', 'id'=>'fancybox-form')); ?>
            <div class="message-login-error"></div>
            <input type="text" class="username-input" placeholder="Username" name="LoginForm[email]"/>
            <input type="password" class="password-input" placeholder="Password" name="LoginForm[password]"/>
            <div class="checkbox-wrapper">
                <!--<input type="checkbox" name="LoginForm[rememberme]" value="1" id="remember-check"/>
                <label for="remember-check">Remember me</label>-->
                <input type="checkbox" name="LoginForm[keepmelogged]" value="1" id="keep-me-logged"/>
                <label for="keep-me-logged">Keep Me Logged in</label>
            </div>
            <input type="submit" value="Log In"/>
            </form>
            <p class="signup-text"><?php //echo Yii::t('global','Forgot Password'); ?> 
            <a href="#forgot-password-fancybox" class="fancybox" >
            <?php echo Yii::t('global','Forgot Password?') ?></a></p>
        </div>
        <div class="inner-wrapper bg-inner-wrapper">
            <a href="#">
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/signin_fb.png" id="facebookPopup" alt="Sign In With Facebook"/>
            </a>
        </div>
    </div>
</div>

<!-- Fancybox come here -->
<div id="forgot-password-fancybox" class="facebook-fancybox">
    <div class="fancybox-heading fix-text-forgot">
        Forgot Password!
    </div>
    <div class="inner-fancybox content-lost">
        <div class="inner-wrapper" id="p-lostpassword">
            <?php //echo CHtml::form($this->createUrl('/user/lostpassword'), 'post', array('class'=>'frmcontact', 'id'=>'fancybox-form')); ?>
            <div class="frmcontact" id="fancybox-form" method="post">
                <div class="message-login-error"><?php $this->widget('widgets.admin.notifications'); ?></div>
                <input type="text" class="username-input email-pw" placeholder="Email" name="LostPasswordForm[email]">
                <input type="submit" id="forgotPass-2" class="resetpw" value="<?php echo Yii::t('global','Send'); ?>"/>
            </div>

        </div>
    </div>
</div>