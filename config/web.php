<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'centire',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'webvimark\modules\UserManagement\components\UserConfig',
            // Comment this if you don't want to record user logins
            'on afterLogin' => function ($event) {
                \webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
            }
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
            'showScriptName' => true,
            'rules' => [
                '' => 'vehicles/index',

                // Vehicles types
                'vehicles/types' => 'vehicles/vehicles-types',
                'vehicles/type/add' => 'vehicles/add-vehicles-type',
                'vehicles/type/edit/<id:[0-9]+>' => 'vehicles/edit-vehicles-type',

                // Vehicles status
                'vehicles/status' => 'vehicles/vehicles-status',
                'vehicles/status/add' => 'vehicles/add-vehicles-status',
                'vehicles/status/edit/<id:[0-9]+>' => 'vehicles/edit-vehicles-status',

                // Vehicles inventory
                'vehicle/save' => 'vehicles/vehicle-info',
                'vehicle/<vehicleId:[0-9]+>' => 'vehicles/vehicle-display',

                // Vehicles plate number
                'vehicles/plates/numbers' => 'vehicles/vehicle-plate-numbers',
                'vehicles/plates/number/add' => 'vehicles/add-vehicle-plate-number',
                'vehicles/plates/number/edit/<id:[0-9]+>' => 'vehicles/edit-vehicle-plate-number',

                // Vehicles plating type
                'vehicles/plates/types' => 'vehicles/vehicle-plating-types',
                'vehicles/plates/type/add' => 'vehicles/add-vehicle-plating-type',
                'vehicles/plates/type/edit/<id:[0-9]+>' => 'vehicles/edit-vehicle-plating-type',

                // Vehicles plating status
                'vehicles/plates/statuses'  => 'vehicles/vehicle-plating-status',
                'vehicles/plates/status/add'  => 'vehicles/add-vehicle-plating-status',
                'vehicles/plates/status/edit/<id:[0-9]+>' => 'vehicles/edit-vehicle-plating-status',

                // Events
                'vehicles/events'          => 'vehicles/events',
                'vehicles/event/add'          => 'vehicles/add-event',
                'vehicles/event/edit/<id:[0-9]+>' => 'vehicles/edit-event',
                'vehicles/event/view/<id:[0-9]+>' => 'vehicles/view-event',

                // vehicles appointment
                'vehicles/appointments' => 'vehicles/vehciles-appointments',
                'vehicles/appointment/make/<id:[0-9]+>' => 'vehicles/add-vehciles-appointments',
                'vehicles/appointment/edit/<id:[0-9]+>' => 'vehicles/edit-vehciles-appointments',


            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'modules' => [
        'user-management' => [
            'class' => 'webvimark\modules\UserManagement\UserManagementModule',
            // Here you can set your handler to change layout for any controller or action
            // Tip: you can use this event in any module
            'on beforeAction' => function (yii\base\ActionEvent $event) {
                if ($event->action->uniqueId == 'user-management/auth/login') {
                    $event->action->controller->layout = 'loginLayout.php';
                };
            },
        ],
    ],
    'params' => $params,
    //'urlFormat' => 'path',
    //'showScriptName' => false,

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}


function pr($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}


return $config;
