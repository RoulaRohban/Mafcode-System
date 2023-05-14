<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'sidebar.dashboard',
            'root' => true,
            'icon' => 'flaticon-analytics', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],

        [
            'title' => 'sidebar.users',
            'root' => true,
            'icon' => 'flaticon-users', // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'sidebar.users',
                    'bullet' => 'dot',
                    'page' => '/admin/users',
                ],
                [
                    'title' => 'sidebar.blood_types',
                    'bullet' => 'dot',
                    'page' => '/admin/blood_types',
                ],
            ]
        ],

        [
            'title' => 'sidebar.advertisements',
            'root' => true,
            'icon' => 'flaticon-rocket', // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'sidebar.advertisements',
                    'bullet' => 'dot',
                    'page' => '/admin/advertisements',
                ],
                [
                    'title' => 'sidebar.promotions',
                    'bullet' => 'dot',
                    'page' => '/admin/promotions',
                ],
                [
                    'title' => 'sidebar.plans',
                    'bullet' => 'dot',
                    'page' => '/admin/plans',
                ],
            ]
        ],

        [
            'title' => 'sidebar.categories',
            'root' => true,
            'icon' => 'flaticon-interface-6', // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'sidebar.categories',
                    'bullet' => 'dot',
                    'page' => '/admin/categories',
                ],
                [
                    'title' => 'sidebar.products',
                    'bullet' => 'dot',
                    'page' => '/admin/products',
                ],
            ]
        ],

        [
            'title' => 'sidebar.countries',
            'root' => true,
            'icon' => 'flaticon-earth-globe', // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'sidebar.countries',
                    'bullet' => 'dot',
                    'page' => '/admin/countries',
                ],
                [
                    'title' => 'sidebar.cities',
                    'bullet' => 'dot',
                    'page' => '/admin/cities',
                ],
                [
                    'title' => 'sidebar.regions',
                    'bullet' => 'dot',
                    'page' => '/admin/regions',
                ],
            ]
        ],

        [
            'title' => 'sidebar.orders',
            'root' => true,
            'icon' => 'flaticon-list', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/admin/orders',
            'new-tab' => false,
        ],


        [
            'title' => 'sidebar.reports',
            'root' => true,
            'icon' => 'flaticon-line-graph', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/admin/reports',
            'new-tab' => false,
        ],

        [
            'title' => 'sidebar.rates',
            'root' => true,
            'icon' => 'flaticon-medal', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/admin/rates',
            'new-tab' => false,
        ],

        [
            'title' => 'sidebar.sliders',
            'root' => true,
            'icon' => 'flaticon-confetti', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/admin/sliders',
            'new-tab' => false,
        ],

        [
            'title' => 'sidebar.settings',
            'root' => true,
            'icon' => 'flaticon-settings-1', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/admin/settings',
            'new-tab' => false,
        ],


    ]

];
