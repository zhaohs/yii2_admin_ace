<?php

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => require(__DIR__ . '/modules.php'),
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty - this is required by cookie validation
            'cookieValidationKey' => 'a24223ecdef0b082326d84243924cb2be',
            'enableCsrfValidation' => false,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
          'class' => 'yii\db\Connection',
          'dsn' => 'mysql:host=127.0.0.1;dbname=cms',
          'username' => 'root',
          'password' => 'root',
          'charset' => 'utf8'
        ],

        'user' => [
            'identityClass' => 'app\models\User',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'view' => [
            'class' => 'yii\web\View',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'message' => [
                    'class' => '\yii\i18n\PhpMessageSource',
                    'basePath' => '@app/language'
                ]
            ]
        ],
        'urlManager'=>array(
            'showScriptName'=>false,
            'enablePrettyUrl' => true,
            'rules'=>array(
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
    ],
    'params' => require(__DIR__ . '/params.php'),
];


// 是否是测试
if (YII_ENV == 'dev') {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
