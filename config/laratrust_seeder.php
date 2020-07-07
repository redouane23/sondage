<?php

return [
    'role_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'sondages' => 'c,r,u,d'
        ],
        'user' => [],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
