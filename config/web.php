<?php

$config = [
    'id' => 'admanager',
    'name' => 'AD Manager',
    'homeUrl' => '/redefinir-senha',
    'defaultRoute' => '/redefinir-senha',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'sourceLanguage' => 'pt-br',
    'language' => 'pt-br',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'WqCVCW338XeYG3MRGrXrhpIRtbhtBHVD',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'ldap' => [
            'class' => \alexeevdv\adldap\Adldap::class,
            'options' => [
                'account_suffix' => '',
                'base_dn' => '',
                'domain_controllers' => [
                    '',
                ],
                'admin_username' => '',
                'admin_password' => '',
                'real_primarygroup' => true,
                'use_ssl' => true,
                'use_tls' => false,
                'recursive_groups' => true,
                'ad_port' => 636,
                'sso' => false,
            ]
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
