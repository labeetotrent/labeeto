<div class="container-fluid">

<div class="row-fluid">
<div class="span12">

<div class="containerHeadline tableHeadline">
    <h2><?php echo Yii::t('global', 'Custompages'); ?></h2>
    <form>
        <div class="input-append">
            <span class="add-on add-on-middle add-on-mini" onclick="window.location.href='<?php echo $this->createUrl('custompages/create') ?>'"><i class="icon-plus-sign" title="Create custompages"></i></span>
            <span class="add-on add-on-middle add-on-mini minimizeTable"><i class="icon-caret-down"></i></span>
            <span class="add-on add-on-last add-on-mini removeTable"><i class="icon-remove"></i></span>
        </div>
    </form>

</div>

<div class="floatingBox table">
<div class="container-fluid">
    <div class="row-fluid"><div class="span7">
            <?php
            $this->widget('application.extensions.PageSize.PageSize', array(
                'mGridId' => 'custompages-grid',
                'mPageSize' => @$_GET['pageSize'],
                'mDefPageSize' => Yii::app()->params['defaultPageSize'],
                'mPageSizeOptions'=>Yii::app()->params['pageSizeOptions'],
            ));
            ?>
        </div><div class="span5"></div></div>

    <?php
        $columns = array(array(
            'name'=>'id',
            'value'=>'$data->id',
            'htmlOptions'=>array('style'=>'width:35px;')
        ), 'title', 'alias');
        /*foreach( Yii::app()->params['languages'] as $key => $value ){
        $columns[]  = array(
        'header' => '<div align="center"><img src="/uploads/flag/'.$key.'.png" /></div>',
        'value' => '$data->languageButton("'.$key.'")' ,
        'type' => 'raw',
        'htmlOptions'=>array( 'style'=>'text-align: center' )
        );
        }*/
        $columns[] = array(
        'class'=>'ButtonColumn',
        'header' => Yii::t('global','Actions'),
        'template'=>'{view}{update}{delete}',
        'buttons'=>array(
                    'view' => array
                    (
                        'label'=>'<span class="label cyan" ><i class="icon-info-sign info" title="'.Yii::t('adminlang', 'View').'"></i></span>',
                        'options' => array( 'class' => 'tipb view-icon-tooltip',
                            'data-original-title' => Yii::t('adminlang', 'View'),
                            'title'       => Yii::t('adminlang', 'View'), ),
                    ),
                    'update' => array
                    (
                        'label'=>'<span class="label green" ><i class="icon-pencil edit" title="'.Yii::t('adminlang', 'Edit').'"></i></span>',
                        'options' => array( 'class' => 'tipb update-icon-tooltip',
                            'data-original-title' => Yii::t('adminlang', 'Edit'),
                            'title'       => Yii::t('adminlang', 'Edit'), ),
                    ),
                    'delete' => array
                    (
                        'label'=>'<span class="label red" ><i class="icon-trash delete" title="'.Yii::t('adminlang', 'Delete').'"></i></span>',
                        'options' => array( 'class' => 'tipb delete-icon-tooltip',
                            'data-original-title' => Yii::t('adminlang', 'Delete'),
                            'title'       => Yii::t('adminlang', 'Delete') , ),
                    ),
            ),
        );
        $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'custompages-grid',
        'htmlOptions' => array('class' => 'table table-bordered table-hover table-striped'),
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'columns'=> $columns
        ));
    ?>

</div>
</div>

</div>
</div>

</div>
<script>
    $('.update-icon-tooltip').tooltip({
    });
    $('.view-icon-tooltip').tooltip({
    });
    $('.delete-icon-tooltip').tooltip({
    });
</script>