
<h1 class="heading"> Meet people. Find love. Get fit.</h1>
<!--<h2 class="tag-line"> Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</h2>-->
<?php /*$form=$this->beginWidget('CActiveForm', array(
    'id'=>'signup-form',

    'enableAjaxValidation'=>true,
)); */?><!--
<div id="signup-form" >
<div class="form-wrapper" id="sign-up">-->
    <!--<div class="error"></div>
    <input type="text" name="SignUp[username]" id="username" class="username-input validate[required,custom[space],funcCall[checkUsernameExists]] "  placeholder="Username"/>
    <input type="text" name="SignUp[email]" id="email" class="email-input validate[required,custom[email,funcCall[checkEmailExists]]" placeholder="Email"/>
    <input type="password"  name="SignUp[password]" id="password" class="password-input validate[required,custom[pw]]" placeholder="Password"/>
    <a href="#registration" class="registrations">
        <input type="submit" value="Sign Up" class="signup-home"/>
    </a>
    <div class="email-exists"><input type="hidden" value="0" id="email-exists"/></div>
    <div class="username-exists"><input type="hidden" value="0" id="username-exists"/></div>
</div>
</div>
<?php /*$this->endWidget(); */?>

<p class="description">
    By clicking Sign Up, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Data Use Policy</a> including our
    <a href="#">Cookie Use.</a>
</p>
-->
<a href="<?=$facebookLoginUrl?>" id="signin-fb">
    <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/signin_fb.png" alt="Sign in with Facebook"/>
</a>
