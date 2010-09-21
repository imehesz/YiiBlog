<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../../yii-1.1.4.r2429/framework/yii.php';

if( stristr( $_SERVER['SERVER_NAME'], 'local' ) || ! isset( $_SERVER['SERVER_NAME'] ) )
{
    $config=dirname(__FILE__).'/protected/config/development.php';
}
else
{
    $config=dirname(__FILE__).'/protected/config/production.php';
}

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
