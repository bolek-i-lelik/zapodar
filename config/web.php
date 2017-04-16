<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dfgdfghdshdghdgfdhgfhdgfuyrewudcndhfuewq',
            'baseUrl'=> '',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\UserIdentity',
            'enableAutoLogin' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'basket'],
                'contact/<name>' => 'site/contact',
                'category/<id>' => 'site/category',
                'product/<alias>' => 'product/index',
                'new/<alias>' => 'new/onenew',
                'about' => 'site/about',
                //'sitemap.xml' => 'sitemap/index',
                'action' => 'site/action',
                'catalog' => 'site/catalog',
                'contact' => 'site/contact',
                'login' => 'site/login',
                'news' => 'site/news',
                'partner' => 'site/partner',
                'reg' => 'site/reg',
                'basket' => 'basket/basket',
                'newparol' => 'site/newparol',
                'vp/<secret_key>' => 'site/vp',
                'message' => 'site/message',
                'search' => 'site/search',
                'logout' => 'site/logout',
                ''
            ],
        ],
        
    ],
    'params' => $params,
    
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    /*$config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];*/

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
