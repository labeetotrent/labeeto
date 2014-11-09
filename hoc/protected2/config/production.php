<?php

// Load main config file
$main = include_once( 'main.php' );

// Production configurations
$production = array(
    'components' => array(
        'db' =>  array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=rovetnet_bestworst',
            'username' => 'rovetnet_bw',
            'password' => 'bwrovet',
            'charset' => 'UTF8',
            'tablePrefix' => '',
            'emulatePrepare' => true,
            'enableProfiling' => true,
            'schemaCacheID' => 'cache',
            'schemaCachingDuration' => 3600
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
                )             
            ),
        ),
    )
);
//merge both configurations and return them
return CMap::mergeArray($main, $production);