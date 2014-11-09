<?php

// Load main config file
$main = include_once( 'main.php' );

$development = array(
    'components' => array(
        'db' =>  array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=labeeto',
            'username' => 'hoc',
            'password' => 'Xn5ZZ21Kp!',
            'charset' => 'UTF8',
            'tablePrefix' => '',
            'emulatePrepare' => true,
            'enableProfiling' => true,
            'schemaCacheID' => 'cache',
            'schemaCachingDuration' => 120
        ),
        'cache' => array( 'class' => 'CDummyCache' ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                    array(
                            'class'=>'CWebLogRoute',
                            'enabled' => false,
                            'levels' => 'info',
                    ),
                    array(
                            'class'=>'CProfileLogRoute',
                            'enabled' => false,
                    ),
                                
            ),
        ),
    ),
);
return CMap::mergeArray($main, $development);
