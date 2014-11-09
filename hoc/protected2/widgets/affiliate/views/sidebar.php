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
							     ),	
                                    	
                                    
					 	 ),

					  // Product
					 array(
							'label' => Yii::t('global', 'Product'), 
							'url' => array('auctions/index'),
							'icon' => 'isw-documents',
							'itemOptions' => array( 'class' => 'openable' ),
							'items' => array(
                                    array( 
											'label' => Yii::t('global', 'Manage Products'),
											'url' => array('products/index'),
											'icon' => 'icon-barcode'
										 ),

                                    array( 
											'label' => Yii::t('global', 'Best Seller'),
											'url' => array('products/bestSeller'),
											'icon' => 'icon-star'
										 ),
                                    array( 
											'label' => Yii::t('global', 'Manage Categories'),
											'url' => array('categories/index'),
											'icon' => 'icon-list'
										 ),

                            )
					 	 ),
                         
                         array( 
							'label' => Yii::t('global', 'Sales'), 
							'url' => array('auctions/index'),
							'icon' => 'isw-calc',
							'itemOptions' => array( 'class' => 'openable' ),
							'items' => array(
                                    array( 
											'label' => Yii::t('global', 'Manage Orders'),
											'url' => array('orders/index'),
											'icon' => 'icon-shopping-cart'
										 ),
                            )
					 	 ),

                        array( 
							'label' => Yii::t('global', 'Appearance'), 
							'url' => array('appearance/admin'),
							'icon' => 'isw-graph'
						  ),

                    
				)
));
?>