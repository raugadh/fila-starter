<?php

declare(strict_types=1);

return [
    'datetime_format' => 'd/m/Y H:i:s',
    'date_format' => 'd/m/Y',

    'activity_resource' => UnknowSk\FilamentLogger\Resources\ActivityResource::class,
    'scoped_to_tenant' => true,
    'navigation_sort' => 3,

    'resources' => [
        'enabled' => true,
        'log_name' => 'Resource',
        'logger' => UnknowSk\FilamentLogger\Loggers\ResourceLogger::class,
        'color' => 'success',

        'exclude' => [
            // App\Filament\Resources\UserResource::class,
        ],
        'cluster' => null,
        'navigation_group' => 'Administration',
    ],

    'access' => [
        'enabled' => true,
        'logger' => UnknowSk\FilamentLogger\Loggers\AccessLogger::class,
        'color' => 'danger',
        'log_name' => 'Access',
    ],

    'notifications' => [
        'enabled' => true,
        'logger' => UnknowSk\FilamentLogger\Loggers\NotificationLogger::class,
        'color' => null,
        'log_name' => 'Notification',
    ],

    'models' => [
        'enabled' => true,
        'log_name' => 'Model',
        'color' => 'warning',
        'logger' => UnknowSk\FilamentLogger\Loggers\ModelLogger::class,
        'register' => [
            // App\Models\User::class,
        ],
    ],

    'custom' => [
        // [
        //     'log_name' => 'Custom',
        //     'color' => 'primary',
        // ]
    ],
];
