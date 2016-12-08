<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
  'aliases' => [
    '@upload' => '\upload',

  ],
    'modules' => [
      'admin' => [
        'class' => 'app\modules\admin\Content',
        'layout' => 'main',
      ],
    ],
    'components' => [
      'assetManager' => [
        'bundles' => [
          'yii\bootstrap\BootstrapAsset' => [
            'css' => ['css/bootstrap.css'],
            'js' => ['js/bootstrap.js'],
          ],
        ],
      ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '2znULUx_eMFn9ylQ1GlKhGovKrfdCt08',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
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
            'messageConfig' => [
            'charset' => 'UTF-8',
            //'from' => ['noreply@site.com' => 'Site Name'],
            ],
            'transport' => [
              'class' => 'Swift_SmtpTransport',
              'host' => 'smtp.gmail.com', // e.g. smtp.mandrillapp.com or smtp.gmail.com
              'username' => 'partcar.od@gmail.com',
              'password' => 'ZxCvB7069340',
              'port' => 465, // Port 25 is a very common port too
              'encryption' => 'ssl', // It is often used, check your provider or mail server specs
          ],
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
        'db1' => require(__DIR__ . '/db1.php'),
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
            ],
        ],
        
    ],
    'params' => $params,
    'defaultRoute' => 'home/index',
];

if (YII_ENV_DEV) {
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
