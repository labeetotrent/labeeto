<?php
// Side bar menu
$this->widget('widgets.NBADMenu', array(
	'activateParents' => true,
	'htmlOptions' => array( 'class' => 'nav' ) ,
	'items' => array(
					// DASHBOARD
					 array( 
							'label' => Yii::t('global', 'System'),
							//'icon' => 'icon-dashboard',
							'itemOptions' => array( 'class' => 'dropdown' ),
							'items' => array(
								array(
									'label' => Yii::t('global', 'Manage Settings'),
									'url' => array('settings/index'),
								),
                                array(
                                    'label' => Yii::t('global', 'Manage Email Template'),
                                    'url' => array('emailTemplates/index'),
                                ),
								/*array(
									'label' => Yii::t('global', 'Manage Languages'),
									'url' => array('languages/index'),
								),
                                */
                                array(
                                    'label' => Yii::t('global', 'Payment Method'),
                                    'url' => array('paymentMethods/index'),
                                ),
							),
						  ),
						//Members
						array(
							'label' => Yii::t('global', 'Administrators'),
							//'icon' => 'icon-user',
							'itemOptions' => array( 'class' => 'dropdown' ),
							'items' => array(
								array(
									'label' => Yii::t('global', 'Admin Accounts'),
									'url' => array('user/admin'),
								),
								array(
									'label' => Yii::t('global', 'Manage Members'),
									'url' => array('user/index'),
								),
                                array(
                                    'label' => Yii::t('global', 'Manage User Role'),
                                    'url' => array('roleUser/index'),
                                ),
							),
						),

                       array(
                            'label' => Yii::t('global', 'Manage Save Search'),
                            'itemOptions' => array( 'class' => 'dropdown' ),
                            'items' => array(
                                array(
                                    'label' => Yii::t('global', 'Save Search'),
                                    'url' => array('saveSearch/index'),
                                ),
                                
                            ),
                        ),

                        array(
                            'label' => Yii::t('global', 'Privacy & Permissions'),
                            'itemOptions' => array( 'class' => 'dropdown' ),
                            'items' => array(
                                array(
                                    'label' => Yii::t('global', 'Manage Roles'),
                                    'url' => array('rolePermissions/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Permissions'),
                                    'url' => array('permissions/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Lock Ip'),
                                    'url' => array('lockIp/index'),
                                ),
                            ),
                        ),

                        array(
                            'label' => Yii::t('global', 'Chat & Inbox'),
                            'itemOptions' => array( 'class' => 'dropdown' ),
                            'items' => array(
                                array(
                                    'label' => Yii::t('global', 'Manage Chat'),
                                    'url' => array('chat/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Inbox'),
                                    'url' => array('chat/inbox'),
                                ),
                            ),
                        ),

                         array(
                            'label' => Yii::t('global', 'CMS'),
                            //'icon' => 'icon-th-large',
                            'itemOptions' => array( 'class' => 'dropdown' ),
                            'items' => array(
                                array(
                                    'label' => Yii::t('global', 'Manage Banners'),
                                    'url' => array('banners/index'),
                                ),
                                 array(
                                    'label' => Yii::t('global', 'Manage Newsletters'),
                                    'url' => array('newsletter/index'),
                                ),
                               array(
                                    'label' => Yii::t('global', 'Manage Pages'),
                                    'url' => array('custompages/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Contact'),
                                    'url' => array('contactus/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Achievements'),
                                    'url' => array('achievements/index'),
                                ),
                                 array(
                                    'label' => Yii::t('global', 'Manage Report User'),
                                    'url' => array('reportUser/index'),
                                ),
                                 array(
                                    'label' => Yii::t('global', 'Manage Question Default'),
                                    'url' => array('question/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Question User'),
                                    'url' => array('question/questionUser'),
                                ),
                                
                                array(
                                    'label' => Yii::t('global', 'Manage Photo'),
                                    'url' => array('photo/index'),
                                ),
                                
                                array(
                                    'label' => Yii::t('global', 'Manage Verify Profile'),
                                    'url' => array('verifyProfile/index'),
                                ),
                                array(
                                    'label' => Yii::t('global', 'Manage Up and Down Vote'),
                                    'url' => array('achievements/vote'),
                                ),
                            ),
                        ),


    )
));
?>