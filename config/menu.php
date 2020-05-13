<?php

return [
    [
        'name' => 'Dashboard',
        'icon' => 'fa fa-bars',
        'route' => 'admin',
    ],
    [
        'name' => 'Banner',
        'icon' => 'fab fa-bimobject',
        'route' => 'admin.banner.index',
    ],
    [
        'name' => 'Product',
        'icon' => 'fab fa-product-hunt',
        'items' => [
            [
                'name' => 'Products',
                'route' => 'admin.products.index',
            ],
            [
                'name' => 'Product Type',
                'route' => 'admin.product_type.index',
            ],
        ],
    ],
    [
        'name' => 'Post',
        'icon' => 'fas fa-vote-yea',
        'items' => [
            [
                'name' => 'Posts',
                'route' => 'admin.posts.index',
            ],
            [
                'name' => 'Post Type',
                'route' => 'admin.post_type.index',
            ],
        ],
    ],
    [
        'name' => 'Images Product',
        'icon' => 'far fa-images',
        'route' => 'admin.images.index',
    ],
    [
        'name' => 'Feedback',
        'icon' => 'far fa-question-circle',
        'route' => 'admin.feedback.index',
    ],
    [
        'name' => 'Users',
        'icon' => 'fas fa-user',
        'route' => 'admin.user.index',
    ],
];
