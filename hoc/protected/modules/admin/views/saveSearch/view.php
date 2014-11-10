
<div class="container-fluid">
    <div class="page-header" style="border-bottom: 0px solid !important">
        <h1><?php  echo Yii::t('global','View'); ?> <small>
       <small><?php echo Yii::t('global', 'SaveSearch'); ?> #<?php echo $model->id; ?></small></h1>
    </div>
    <div class="row-fluid">
        <div class="span12 contentDivider"></div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="containerHeadline tableHeadline">
                <i class="icon-table"></i>
                <h2><?php echo Yii::t('global', 'SaveSearch'); ?> </h2>
                <form class="header-tab-view not-bor">
                    <div class="input-append">
                        <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('saveSearch/update?id='.$model->id) ?>'"><i class="icon-edit" title="<?php echo Yii::t('adminlang', 'Edit'); ?>"></i></span>
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
                        array('name'=>'id'),
                        array('name'=>'user_id','value'=>User::model()->getNameUser($model->user_id), 'type'=>'raw'),
                        array('name'=>'username'),
                        array('name'=>'gender','value'=>Lookup::item( "Gender", $model->gender) ),
                        array('name'=>'age_from'),
                        array('name'=>'age_to'),
                        array('name'=>'within_from'),
                        array('name'=>'within_to'),
                        array('name'=>'height_from'),
                        array('name'=>'height_to'),
                        array('name'=>'education','value'=>Education::model()->getNameEducation($model->education), 'type'=>'raw'),
                        array('name'=>'ehtnicity','value'=>Ethnicity::model()->getNameEthnicity($model->ehtnicity), 'type'=>'raw'),
                        array('name'=>'religion', 'value'=>Religion::model()->getNameReligion($model->religion), 'type'=>'raw'),
                        array('name'=>'children', 'value'=>Children::model()->getNameChildren($model->children), 'type'=>'raw'),
                        array('name'=>'excercise'),
                        array('name'=>'drink'),
                        array('name'=>'smoke'),
                        array('name'=>'is_online','value'=>Lookup::item( "StatusOnline", $model->is_online)  ),
                        array('name'=>'verified' ,'value'=>Lookup::item( "StatusUser", $model->verified) ),
                        array('name'=>'created'),
                        array('name'=>'updated'),
                    ),
                    )); ?>

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