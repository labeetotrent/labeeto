REGISTER PAGE
<?php /*
<div class="welcome-register" style="float:left;width:470px">
    <?php $this->renderPartial('/home/default') ?>
</div>
<div class="stdDarkBox register" style="width:530px;float:right">
    <h1 class="title">Tạo tài khoản sictravel</h1><span>Thiết lập tiểu sử và tùy chọn theo cách của bạn</span>
    
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
        array(
            'id' => 'registerForm',
            'htmlOptions' => array('class'=>'stdForm darkVer'), // for inset effect
        ));?>
    <div class="content">
        <fieldset>
            <div class="row-fluid">
                <div class="span6">
                    <?php echo $form->TextFieldRow(
                        $model,
                        'first_name',
                        array(
                            'class'=>'span9',
                            'labelOptions'=> array('label'=>false),
                            'placeholder'=>'Họ',
                            'prepend' => '<i class="icon-sic-group"></i>'));
                    ?>
                </div>
                <div class="span6">
                    <?php echo $form->TextFieldRow(
                        $model,
                        'last_name',
                        array(
                            'class'=>'span12',
                            'labelOptions'=> array('label'=>false),
                            'placeholder'=>'Tên',
                            //'prepend' => '<i class="icon-sic-phone"></i>'
                        ));
                    ?>
                </div>
            </div>
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
                <?php echo $form->TextFieldRow(
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
                <?php echo $form->TextFieldRow(
                        $model,
                        'password2',
                        array(
                            'class'=>'span11',
                            'labelOptions'=> array('label'=>false),
                            'placeholder'=>'Nhập lại mật khẩu',
                            'prepend' => '<i class="icon-sic-lock-open"></i>'));
                ?>
            </div>

        </fieldset>
    </div>
    <div class="footer">
        <div class="text">
            <input type="checkbox" style="float:left"/>
            <p>Tôi đồng ý với <a class="blue" href="#">điều khoản</a> của sictravel</p>
        </div>
        <button class="sicBtt blueBtn" type="submit">Đăng kí</button>   
    </div> 
    <?php $this->endWidget(); ?>  
</div> */ ?>