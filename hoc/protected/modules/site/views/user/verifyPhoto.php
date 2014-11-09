<?php $code =strtoupper($this->generateRandomString(5)); ?>
<div class="wrapper-verify">
    <div class="head-verify">
        <h2>Verify Profile</h2>
    </div>
    <div class="stepVerify">
        <div class="headstep1">
            <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/verify.png" />
            <p class="text-headst1">Your profile will show an icon confirming that your profile is verified.</p>
        </div>
        <div class="verifyCode">
            <div class="stepOne"> 1</div>
            <div class="writeCode">
                <h1>Write the verification code</h1>
                <div class="text-step1">
                    Handwrite the verification code <b style="font-weight: bold"><?php echo $code; ?></b> on a piece of paper
                </div>
                <div class="paper-code"><?php echo $code; ?>
                <img class="pen-code" src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/pen.png" />
                </div>
            </div>
        </div>
    </div>
    <div class="stepVerify">
        <div class="stepTwo">
            <div class="stepOne"> 2</div>
            <div class="writeCode">
                <h1>Take a photo</h1>
                <div class="text-step1">
                    Take a photo of yourself holding the paper with the code
                </div>
            </div>
            <div class="photoCode">
                <img src="<?php echo Yii::app()->themeManager->baseUrl; ?>/images/img-code.png" />
            </div>
        </div>
    </div>
    <div class="stepVerify">
        <div class="stepThree">
            <div class="stepOne"> 3</div>
            <div class="writeCode">
                <h1>Upload your verification photo :</h1>
                <div class="text-step1">
                    Locate the photo on your devide and upload
                </div>
            </div>
            <form method="post" enctype="multipart/form-data" >

                <?php if($this->user->verifyPhoto == User::NO_VERIFY) { ?>
                    <div class="fileUpload">
                        <input type="file" class="filePhoto" name="verifyPhoto" />
                        <input type="hidden" name="code" value="<?php echo $code; ?>">
                    </div>
                    <input type="submit" value="Verify Profile" class="btn_verify">
                <?php } else if($this->user->verifyPhoto == User::WAIT_VERIFY) { ?>
                    <input type="button" value="Processing Verify Profile" class="btn_verify">
               <?php } else if($this->user->verifyPhoto == User::VERIFIED) { ?>
                    <input type="button" value="Verified Profile" class="btn_verify">
                <?php } ?>
            </form>
        </div>
    </div>
</div>