<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" lang="<?php echo Yii::app()->language; ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Annuaire audition">
    <meta name="author" content="">
    <meta name="google-site-verification" content="" />
    <title><?php echo ( count( $this->pageTitle ) ) ? implode( ' - ', array_reverse( $this->pageTitle ) ) : $this->pageTitle; ?></title>
    <link rel="stylesheet" href="<?php echo Yii::app()->homeUrl . 'themes/admin/default/css/styles.css'; ?>">

</head>
<body>


<div class="container-fluid">

    <?php if($model->hasErrors()): ?>
        <div class="alert alert-error">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <?php echo Yii::t('login', 'Sorry, But we can\'t find a member with those login information.'); ?>
        </div>
    <?php endif; ?>
    <fieldset class="submittable">
        <?php echo CHtml::form($this->createUrl('user/admin'), 'post', array('class'=>'form-signin')); ?>
        <h2 class="form-signin-heading"><strong><?php echo Yii::t('global','LABEETO'); ?></strong> <?php echo Yii::t('global','DATING'); ?></h2>
        <div class="input-prepend">
            <span class="add-on"><i class="icon-user"></i></span>
            <input type="text" placeholder="Username" name="LoginForm[email]" class="input">
        </div>
        <div class="input-prepend">
            <span class="add-on"><i class="icon-lock"></i></span>
            <input type="password" placeholder="Password" name="LoginForm[password]" class="input">
            <span class="add-on" id="login"><i class="icon-arrow-right"></i></span>
        </div>
        </form>

        <div class="signInRow">
            <div id="sign-in"><h1><?php echo Yii::t('global','Sign in'); ?></h1></div>
            <div><a href="#"></a></div>
        </div>
    </fieldset>
</div>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script>window.jQuery || document.write('<script src="<?php echo Yii::app()->homeUrl . 'themes/admin/default/js/vendor/jquery-1.9.1.min.js'; ?>"><\/script>')</script>

<script src="<?php echo Yii::app()->homeUrl . 'themes/admin/default/js/vendor/bootstrap.min.js'; ?>"></script>
<script>
    $('#login').click(function(){
        $('.form-signin').submit();
    });
    $('#sign-in').click(function(){
        $('.form-signin').submit();
    });
    $('.input').keypress(function (e) {
        if (e.which == 13) {
            $('.form-signin').submit();
            return false;
        }
    });
</script>
</body>
</html>
