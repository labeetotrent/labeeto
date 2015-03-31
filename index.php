<?php

if(function_exists("date_default_timezone_set") and
function_exists("date_default_timezone_get"))
@date_default_timezone_set(@date_default_timezone_get());

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yiilite.php';
$config=dirname(__FILE__).'/protected/config/';
// Define root directory
defined('ROOT_PATH') or define('ROOT_PATH', dirname(__FILE__) . '/');


// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);

$configFile = YII_DEBUG ? 'dev.php' : 'production.php';

require_once($yii);

//Facebook SDK
//define('FACEBOOK_SDK_V4_SRC_DIR', '/protected/components/facebook/src/Facebook/');
//require __DIR__ . '/protected/components/facebook/autoload.php';
Yii::setPathOfAlias('Facebook',dirname(__FILE__). '/protected/components/Facebook');

Yii::createWebApplication($config . $configFile)->run();
