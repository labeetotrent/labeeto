
    <div class="row-fluid">
<div class="span12">
    <div class="containerHeadline">
        <i class="icon-ok-sign"></i><h2><?php echo Yii::t('global','Role Permissions'); ?></h2>
        <div class="controlButton pull-right"><i class="icon-remove removeElement"></i></div>
        <div class="controlButton pull-right"><i class="icon-caret-down minimizeElement"></i></div>
    </div>

    <div class="floatingBox" style="display: block;">
        <div class="container-fluid">

            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'role-permissions-form',
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array(
                                'class'=>'form-horizontal contentForm',
                                'data-validate'=>'parsley',
                                )
                )); ?>

            <?php echo $form->errorSummary($model); ?>
                   <table class="table table-bordered table-hover table-striped" name="rolePermissions">
                       <tr>
                           <td class="action-permissions-title"> <?php echo Yii::t('global','Action'); ?></td>
                           <?php foreach( $role as $key=>$val ){ ?>
                                    <td class="name-permissions-role"> <?php echo $val['name']; ?> </td>
                           <?php } ?>
                       </tr>
                        <?php foreach ($permission as $k=>$v){ ?>
                                    <tr> <td style="width:70%" class="<?php echo ($v['value'] == '') ? 'name-parent-value':'name-child-value';?> "><?php echo $v['name'] ?></td>
                                        <?php
                                        foreach( $role as $key=>$val ){
                                                if( $v['value'] != '' ){
                                                $valRolePer = RolePermissions::model()->getValue( $v['per_id'], $val['id'] );
                                                $valW       = ( $valRolePer == Permissions::STATUS_ACTIVE )?0:Permissions::STATUS_ACTIVE;
                                        ?>
                                            <td style="width: 5%">
                                                <input type="hidden" name="RolePermissions[<?php echo $v['per_id'].':'.$val['id']; ?>]" value="<?php echo $v['per_id'].':'.$val['id'].':'.$valW; ?>" />
                                                <input type="checkbox" name="RolePermissions[<?php echo $v['per_id'].':'.$val['id']; ?>]" <?php if( $valRolePer == Permissions::STATUS_ACTIVE){ echo 'checked'; } ?> value="<?php echo $v['per_id'].':'.$val['id'].':'.$valRolePer ?>" > </td>
                                        <?php } ?>

                                        <?php } ?>
                                    </tr>
                              <?php  } ?></td>

                        <tr>
                            <td colspan="<?php echo (count($role)+1); ?>">
                                <div class="control-group" style="float:right;">
                                <div class="controls">
                                <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('global','Save') : Yii::t('global','Save'), array('class'=>'btn btn-primary')); ?>
                                <button class="btn" type="reset"><?php echo Yii::t('global','Reset'); ?></button>
                                </div>
                                </div>
                            </td>
                        </tr>
                   </table>
            <?php $this->endWidget(); ?>
        </div>
    </div>

</div>
    </div>