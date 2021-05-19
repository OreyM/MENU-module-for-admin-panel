<?php

return [

    /*
     * List of menu elements for the admin panel.
     * To get the result, clear the cache.
     */
    'cms' => [
        'dashboard' => [
            'name'          => 'menus::admin-menu.dashboard',
            'route'         => 'dashboard',
            'icon'          => 'la la-dashboard',
        ],

        'site' => [
            'is_separator'  => true,
            'name'          => 'menus::admin-menu.site',
            'icon'          => null,
        ],
        'blocks' => [
            'name'          => 'menus::admin-menu.blocks',
            'route'         => 'blocks',
            'icon'          => 'la la-cubes',
        ],
        'file-manager' => [
            'name'          => 'menus::admin-menu.file-manager',
            'route'         => 'file-manager',
            'icon'          => 'la la-archive',
        ],

        'settings' => [
            'is_separator'  => true,
            'name'          => 'menus::admin-menu.settings',
            'icon'          => null,
        ],
        'menu' => [
            'name'          => 'menus::admin-menu.menu',
            'route'         => 'menu',
            'icon'          => 'la la-list',
        ],
        'theme' => [
            'name'          => 'menus::admin-menu.theme',
            'icon'          => 'la la-tv',
        ],

        'system' => [
            'is_separator'  => true,
            'name'          => 'menus::admin-menu.system',
            'icon'          => null,
        ],
        'users' => [
            'name'          => 'menus::admin-menu.users',
            'icon'          => 'la la-user-secret',
            'child' => [
                'employees' => [
                    'name'          => 'menus::admin-menu.employees',
                    'route'         => 'employees',
                    'icon'          => null,
                ],
                'roles' => [
                    'name'          => 'menus::admin-menu.roles',
                    'route'         => 'roles',
                    'icon'          => null,
                ],
            ],
        ],
    ],
];
