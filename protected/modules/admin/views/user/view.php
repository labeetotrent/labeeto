
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'User'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'User'); ?> </h2>
                <form class="header-tab-view not-bor">
                    <div class="input-append">
                        <div class="add-on add-on-middle add-on-mini minimizeTable "><i class="icon-caret-down"></i></div>
                        <div class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></div>
                    </div>
                </form>
            </div>
            <div class="floatingBox table table-view-user">
                <div class="container-fluid">
                    <?php $this->widget('zii.widgets.CDetailView', array(
                    'htmlOptions' => array('class' => 'table-hover', 'style'=>'width:100% !important;'),
                    'data'=>$model,
                    'attributes'=>array(
                        array('name'=>'username'),
                        array('name'=>'gender','value'=>Lookup::item( "Gender", $model->gender) ),
                        array('name'=>'verified','value'=>User::model()->checkVerifiedUserNew($model->verified), 'type'=>'raw' ),
                        array('name'=>'career'),
                        array('name'=>'email'),
                        array('name'=>'role'),
                        array('name'=>'ehtnicity','value'=>Ethnicity::model()->getNameEthnicity($model->ehtnicity), 'type'=>'raw'),
                        array('name'=>'fname'),
                        array('name'=>'lname'),
                        array('name'=>'birthday'),
                        array('name'=>'photo', 'value'=>User::model()->showAdminImageNew($model->photo), 'type'=>'raw'),
                        array('name'=>'address'),
                        array('name'=>'education','value'=>Education::model()->getNameEducation($model->education), 'type'=>'raw' ),
                        array('name'=>'religion','value'=>Religion::model()->getNameReligion($model->religion), 'type'=>'raw'),
                        array('name'=>'height'),
                        array('name'=>'excercise'),
                        array('name'=>'passion'),
                        array('name'=>'goal'),
                        array('name'=>'smoke'),
                        array('name'=>'relations'),
                        array('name'=>'zipcode'),
                        array('name'=>'latitude'),
                        array('name'=>'longtitude'),
                        array('name'=>'drink'),
                        array('name'=>'status','value'=>Lookup::item( "StatusUser", $model->status) ),
                        array('name'=>'membership','value'=>Lookup::item( "Membership", $model->membership) ),
                        array('name'=>'created'),
                        array('name'=>'updated'),
                    ))); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .content{
        font-size: 14px !important;
    }
</style>