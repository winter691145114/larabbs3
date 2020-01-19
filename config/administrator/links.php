<?php

use App\Models\Link;

return [
    'title' => '资源',
    'single' => '资源',
    'model' => Link::class,

    'permission' => function(){
        return Auth::user()->hasRole('Founder');
    },

    'columns' => [
        'id' => [
            'title' => 'ID',

        ],
        'title' => [
            'title' => '资源描述',
            'sortable' => false
        ],
        'link' => [
            'title' => '资源链接',
            'sortable' => false
        ],
        'operation' => [
            'title' => '管理',
            'sortable' => false,
        ]
    ],

    'edit_fields' => [
        'title' => [
            'title' => '资源描述'
        ],
        'link' => [
            'title' => '资源链接',
        ],
    ],

    'filters' => [
        'id' => [
            'title' => 'ID'
        ],
        'title' => [
            'title' => '资源描述'
        ]
    ]
];
