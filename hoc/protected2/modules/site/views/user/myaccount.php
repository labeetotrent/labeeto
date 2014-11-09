<div class="row-fluid">
	My Account Page
	<?php

	/*<div class="headInfo" style="background: url(<?php echo $this->baseUrl.'/images/def_convert.png' ?>) no-repeat #fff">
		<i class="fa fa-pencil" onclick="changeConvert()"></i>
		<div class="cir-border ava">
			<div>
				<img src="<?php echo $user->AvaSrc ?>" />
				<div class="changeAva" onclick="changeAva(this)" onHover="return false">Thay ảnh đại diện</div>
				<!-- Display Change Image label -->
				<?php if(!Yii::app()->user->isGuest): ?>
					<div style="display:none">
						<form encoding="multipart/form-data" enctype="multipart/form-data" method="post" action="<?php echo Yii::app()->createUrl('/user/uploadAvatar') ?>" >
							<input type="file" style="position:absolute;display: none;" id="uploadAva" name="User[avatar]">
							<input style="display:none" type="submit" />
						</form>
					</div>
				<?php endif ?>
			</div>
		</div>
		<h1><?php echo Yii::app()->user->getName() ?></h1>
		<ul>
			<li href="#"><a href="#"><i class="fa fa-envelope"></i> Gửi email</a></li>
			<li href="#"><a href="#"><i class="fa fa-comment"></i> Trò chuyện</a></li>
			<li href="#"><a href="#"><i style="font-size:1em" class="fa fa-chevron-down"></i> Thêm vào</a></li>
		</ul>
	</div>
	<?php 
	$tabs = array(
		array(
			'label' => '<div class="accTabPost">Xem bài đăng<div class="rightDarkIcon pull-right"></div></div>', 
			'content' => $this->renderPartial('view-post',compact('user'),true,true),
		),
		array(
			'label' => '<div class="accTabProfile">Giới thiệu bản thân<div class="rightDarkIcon pull-right"></div></div>',
			'content' => $this->renderPartial('view-profile',compact('user'),true,true),
			'active' => true
		),
	);
	$this->widget(
		'bootstrap.widgets.TbTabs',
		array(
			'encodeLabel' => false,
			'htmlOptions'=>array('class'=>'rightMenu span12'),
			'type' => 'tabs',
			'placement' => 'left',
			'tabs' => $tabs
		)
	);?> */ ?>
</div>