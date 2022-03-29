<?php

return [
    'services' => [
        'Protobuf\\Identity\\AuthServiceClient' => [
            'host' => env('AUTH_SERVICE_HOST'),
            'authentication' => 'insecure',
            'cert' => env('AUTH_SERVICE_CERT')
        ],
    ],
];
