<?php
// Side bar menu
$this->widget('widgets.NBADMenu', array(
	'activateParents' => true,
	'htmlOptions' => array( 'class' => 'navigation' ) ,
    'items' => array(
					// dashboard
        			 array( 
							'label' => Yii::t('global', 'Dashboard'), 
							'url' => array('index/index'),
							'icon' => 'isw-grid'
						  ),
					 // System
					 array( 
							'label' => Yii::t('global', 'System'), 
							'url' => array('settings/index'),
							'icon' => 'isw-settings',
							'itemOptions' => array( 'class' => 'openable' ),
							'items' => array(
									array( 
											'label' => Yii::t('global', 'Manage Settings'), 
											'url' => array('settings/index'),
											'icon' => 'icon-wrench'
										 ),


                                    array(
                                        'label' => Yii::t('global', 'Manage Countries'),
                                        'url' => array('countries/index'),
                                        'icon' => ' icon-book'
                                    ),


							     ),	
                                    	
                                    
					 	 ),

				)
));
?>