<?php
/*root config*/
Yii::setPathOfAlias('booster', dirname(__FILE__).'/../extensions/bootstrap/');
Yii::setPathOfAlias('docroot', dirname(__FILE__).DIRECTORY_SEPARATOR.'../..'); 

// Required system configuration. There should be no edit performed here.
return array(
        'preload' => array('log', 'session', 'db', 'cache'),
        'basePath' => ROOT_PATH . 'protected/',
        'modules' => array(
            'admin' => array(
                'import' => array('admin.components.*'),
                'layout' => 'main'
            ),
            'site' => array(
                'import' => array('site.components.*'),
                'layout' => 'main'
            ),
            'gii'=>array(
                'class'=>'system.gii.GiiModule',
                'generatorPaths'=>array(
                    'booster.gii'
                ),
                'password'=>'admin123',
            )
        ),
        'import' => array(
            'application.components.*',
            'application.models.*',
            'application.extensions.*',
            'ext.easyimage.EasyImage',
            'application.extensions.bootstrap.components.Booster',
        ),
        'theme' => 'default',
        'name' => 'Labeeto',
        'defaultController' => 'site/index',
        'layout' => 'main',
        'charset'=>'UTF-8',
        'sourceLanguage' => 'en',
        'language' => 'en',
        'params' => require(dirname(__FILE__) . '/params.php'),
        'aliases' => array(
            'helpers' => 'application.widgets',
            'widgets' => 'application.widgets',
        ),
        'components' => array(

            'format' => array(
                'class' => 'CFormatter',
            ),
            'errorHandler'=>array(
                'errorAction'=>'site/error/error',
            ),
            'authManager'=>array(
                'class'=>'AuthManager',
                'connectionID'=>'db',
                'itemTable' => 'authitem',
                'itemChildTable' => 'authitemchild',
                'assignmentTable' => 'authassignment',
                'defaultRoles'=>array('guest'),
            ),
            'user'  => array(
                'class' => 'CustomWebUser',
                'allowAutoLogin' => true,
                'loginUrl' => array('/admin/login'),
                'autoRenewCookie' => true,
                'identityCookie' => array('domain' =>''),
            ),
            'messages' => array(
                'class' => 'CDbMessageSource',
                'cacheID' => 'cache',
            ),
            'urlManager' => array(
                'class' => 'CustomUrlManager',
                'urlFormat' => 'path',
                'cacheID' => 'cache',
                'showScriptName' => false,
                'appendParams' => true,
                'urlSuffix' => ''
            ),
            'booster' => array(
                'class' => 'application.extensions.bootstrap.components.Booster',
                'responsiveCss' => true,
            ),
            'request' => array(
                'class' => 'CHttpRequest',
                'enableCookieValidation' => true,
            ),
            'session' =>  array(
                'class' => 'CDbHttpSession',
                'sessionTableName' => 'sessions',
                'connectionID' => 'db',
                'cookieParams' => array('domain' => '' ),
                'timeout' => 3600,
                'sessionName' => 'SECSESS',
            ),
            'EasyImage' => array(
                'class' => 'application.extensions.easyimage.EasyImage',
            ),
            'clientScript'=>array(
                'packages'=>array(
                    'jquery'=>array(
                        'baseUrl'=>'//ajax.googleapis.com/ajax/libs/jquery/1.8/',
                        'js'=>array('jquery.min.js'),
                        'coreScriptPosition'=>CClientScript::POS_HEAD
                    ),
                    'jquery.ui'=>array(
                        'baseUrl'=>'//ajax.googleapis.com/ajax/libs/jqueryui/1.8/',
                        'js'=>array('jquery-ui.min.js'),
                        'depends'=>array('jquery'),
                        'coreScriptPosition'=>CClientScript::POS_BEGIN
                    )
                ),
            ),
            'Facebook' => array(
                'class'=>'application.extensions.facebook.Social',
            ),
            'utils'=>array('class'=>'Utils'),
        ),        
);
