<?php
return [
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'request' => [
            'class' => 'common\compenents\Request',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mob' => [
            'class' => 'common\compenents\MobileCode',
            'appkey' => '8a93ea9b1b40',
            'api' => 'https://api.sms.mob.com/sms/verify',
        ],
    ],
];
