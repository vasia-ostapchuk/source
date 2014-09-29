<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Site',
        'language'=>'uk',
        'sourceLanguage'=>'en',

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
                'ext.geoip.*',
	),
    
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
                'session' => array (
                        'sessionName' => 'PHPSESSID',
                        'class'=> 'CHttpSession',
                        //'useTransparentSessionID'   =>($_POST['PHPSESSID']) ? true : false,
                        'autoStart' => 'true',    
                        'cookieMode' => 'allow',
                        'timeout' => 300,
                    ),
		'db'=>array(
                        'class'=>'CDbConnection',
                        'connectionString'=>'mysql:host=localhost;dbname=gomusic',
                        'username'=>'root',
                        'password'=>'',
                        'charset'=>'utf8', // система кодування
                        'emulatePrepare'=>true, // потрібно для деяких версій mysql 
                        // включаем профайлер
                        'enableProfiling'=>true,
                        // показываем значения параметров
                        'enableParamLogging' => true,
                    ),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
                'geoip' => array(
                        'class' => 'ext.geoip.CGeoIP',
                        // specify filename location for the corresponding database
                    //$_SERVER['DOCUMENT_ROOT'].'/protected/data/GeoIP.dat';
                        'filename' =>$_SERVER['DOCUMENT_ROOT'] . '/protected/data/GeoLiteCity.dat',
                        // Choose MEMORY_CACHE or STANDARD mode
                        'mode' => 'STANDARD',
                ),
		'log'=>array( // тре розібратися що то таке 
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
				// направляем результаты профайлинга в ProfileLogRoute (отображается
                                // внизу страницы)
                                'class'=>'CWebLogRoute',
                                'levels'=>'trace, info, profile, error, warning, error, log, vardump',
                                'enabled'=>true,
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
                            //'client_id'=>'1043733097488-u9256803gr737g6b7h1oj0ngc0s5f2m4.apps.googleusercontent.com',
                            //'client_secret'=>'8eVvMO8HokmL8dgpjxsEIj2w',
                        ),
                        'facebook' => array(
                            'class' => 'FacebookOAuthService',
                            'client_id' => '778122978897966',
                            'client_secret' => '93cdc457d91327e08f6fdc3e1f240ade',
                        ),
                        'vkontakte' => array(
                            'class' => 'VKontakteOAuthService',
                            'client_id' => '4553978',
                            'client_secret' => 'Z0iuX3QpiMCefwFKYmD3',
                        ),
                    ),
                ),
        ),
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);