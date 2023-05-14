<?php

return [
    [
        'text' => 'users',
        'icon' => 'users',
        'submenu' => [
            [
                'text' => 'users list',
                'route' => 'admin.users.index'
            ],
            [
                'text' => 'users create',
                'route' => 'admin.users.create'
            ]
        ],
        'route' => 'admin.users.index'
    ],
];
