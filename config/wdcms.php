<?php
return [
    'git' => [
        'host' => 'https://gitee.com/api/v5/enterprises/wdcms/repos',
        'personal_access_tokens' => env('MODULE_PERSION_ACCESS_TOKESN')
    ],
    'icon' => [
        'path' => resource_path('assets/svg'),
        'prefix' => 'icon',
        'expired_time' => 86400
    ]
];
