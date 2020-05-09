<?php

return [
    [
        'name' => 'Dashboard',
        'icon' => '',
        'route' => 'banner.index',
    ],
    [
        'name' => 'Danh mục 1',
        'icon' => 'fa-bimobject',
        'items' => [
            [
                'name' => 'Danh sách 1',
                'route' => 'banner.index',
            ],
            [
                'name' => 'Danh sách 2',
                'route' => 'banner.index',
            ],
        ],
    ],
    [
        'name' => 'Danh mục 2',
        'items' =>[
            [
                'name' => 'Danh sách 3',
                'items' => [
                    [
                        'name' => 'Danh sách 3-4',
                        'route' => 'banner.index',
                    ],
                ],
            ],
        ],
    ],
];
