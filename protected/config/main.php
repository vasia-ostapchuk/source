<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Site',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
                'application.models.db.*',
		'application.components.*',
                'ext.eoauth.*',         // { розширення для аутентифікації через соц мережі
                'ext.eoauth.lib.*', 
                'ext.lightopenid.*',
                'ext.eauth.services.*',  // }
	),
    
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		
		'db'=>array(
			'class'=>'CDbConnection',
                        'connectionString'=>'mysql:host=localhost;dbname=gomusic',
                        'username'=>'root',
                        'password'=>'',
                        'charset'=>'utf8', // система кодування
                        'emulatePrepare'=>true, // потрібно для деяких версій mysql 
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array( // тре розібратися що то таке 
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
                'loid' => array(
                    'class' => 'ext.lightopenid.loid',
                ),
                'eauth' => array(
                    'class' => 'ext.eauth.EAuth',
                    'popup' => true, // Use the popup window instead of redirecting.
                    'services' => array( // You can change the providers and their classes.
                        'google' => array(
                            'class' => 'GoogleOpenIDService',
                        ),
                        'yandex' => array(
                            'class' => 'YandexOpenIDService',
                        ),
                        'twitter' => array(
                            'class' => 'TwitterOAuthService',
                            'key' => '...',
                            'secret' => '...',
                        ),
                        'facebook' => array(
                            'class' => 'FacebookOAuthService',
                            'client_id' => '...',
                            'client_secret' => '...',
                        ),
                        'vkontakte' => array(
                            'class' => 'VKontakteOAuthService',
                            'client_id' => '...',
                            'client_secret' => '...',
                        ),
                        'mailru' => array(
                            'class' => 'MailruOAuthService',
                            'client_id' => '...',
                            'client_secret' => '...',
                        ),
                    ),
                ),
        ),
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);