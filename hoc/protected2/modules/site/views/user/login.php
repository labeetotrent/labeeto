LOGIN PAGE
<?php /*
<div class="stdDarkBox loginBox" style="width:415px;margin:50px auto">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
        array(
            'id' => 'registerForm',
            'htmlOptions' => array('class'=>'stdForm darkVer') // for inset effect
        ));?>
    <div class="content">
        <fieldset>
            <div class="row-fluid">
                <?php echo $form->TextFieldRow(
                        $model,
                        'username',
                        array(
                            'class'=>'span11',
                            'labelOptions'=> array('label'=>false),
                            'placeholder'=>'Tên sử dụng',
                            'prepend' => '<i class="icon-sic-email"></i>'));
                ?>
            </div>
            <div class="row-fluid">
                <?php echo $form->passwordFieldRow(
                        $model,
                        'password',
                        array(
                            'class'=>'span11',
                            'labelOptions'=> array('label'=>false),
                            'placeholder'=>'Mật khẩu',
                            'prepend' => '<i class="icon-sic-lock-close"></i>'));
                ?>
            </div>
            <div class="row-fluid">
                <?php //echo $form->checkboxRow($model, 'rememberMe'); ?>
            </div>
        </fieldset>
    </div>
    <div class="footer">
        <button class="sicBtt blueBtn" type="submit"><i class="icon-sic-lock-open" style="margin-top:-10px"></i> Đăng nhập</button>
        <ul class="option">
            <li><a href="#forgot"><i class="fa fa-clock-o"></i> Quên mật khẩu </a><li>
            <li><a href="<?php echo $this->createUrl('user/register')?>"><i class="fa fa-book"></i> Đăng kí </a><li>
        </ul>
    </div> 
    <?php $this->endWidget(); ?>  
</div>

*/ ?>