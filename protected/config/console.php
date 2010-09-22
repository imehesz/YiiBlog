<?php
require_once dirname(__FILE__) . '/../mehesz/config.php';

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
    'commandMap' => array(
        'migrate' => array(
            'class' => 'application.extensions.yii-dbmigrations.CDbMigrationCommand',
        ),
    ),

	'components' => array(
		'db' => array(
			'class' => 'system.db.CDbConnection', 
           	'connectionString' => MEHESZ_CONNECTION_STRING
		),
    ), 
);
