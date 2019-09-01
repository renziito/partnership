<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'       => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name'           => 'Partnership',
    'theme'          => 'site',
    'preload'        => array('log'),
    'language'       => 'es',
    'sourceLanguage' => 'en',
    'timeZone'       => 'America/Lima',
    'import'         => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*'
    ),
    'modules'        => array(
        'gii' => array(
            'class'          => 'system.gii.GiiModule',
            'password'       => 'password',
            'ipFilters'      => array('127.0.0.1', '::1'),
            'generatorPaths' => [
                'ext.giiext'
            ],
        ),
        'admin', 'portal'
    ),
    'components'     => array(
        'yexcel'       => array(
            'class' => 'ext.yexcel.Yexcel'
        ),
        'user'         => array(
            'allowAutoLogin' => true,
            'loginUrl'       => array('login'),
        ),
        'urlManager'   => array(
            'urlFormat'      => 'path',
            'showScriptName' => false,
            'rules'          => array(
                'perfil'                                 => 'site/perfil',
                'login'                                  => 'site/login',
                'logout'                                 => 'site/logout',
                '<controller:\w+>/<id:\d+>'              => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'          => '<controller>/<action>'
            ),
        ),
        'db'           => require(dirname(__FILE__) . '/database.php'),
        'errorHandler' => array(
            'errorAction' => YII_DEBUG ? null : 'site/error',
        ),
        'log'          => array(
            'class'  => 'CLogRouter',
            'routes' => array(
                array(
                    'class'  => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
    // using Yii::app()->params['paramName']
    'params'         => array(
        'adminEmail' => 'sepia.aki@gmail.com',
    ),
);
