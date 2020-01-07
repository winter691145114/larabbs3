<?php

use App\Models\Category;

return [
    'title' => '分类',
    'single' => '分类',
    'model' => Category::class,

    'action_permissions'=> [
        'delete' => function()
        {
            return Auth::user()->hasRole('Founder');
        }
    ],

    'columns' => [
        'id' => [
            'title' => 'ID'
        ],
        'name' => [
            'title' => '名称',
            'sortable' => false,
        ],
        'description' => [
            'title' => '描述',
            'sortable' => false,
        ],
        'operation' => [
            'title' => '管理',
            'sortable' => false
        ]
    ],

    'edit_fields' => [
        'name' =>[
            'title' => '名称',
        ],
        'description' => [
            'title' => '描述',
            'type' => 'textarea',
        ],
    ],

    'filters' => [
        'name' => [
            'title' => '名称',
        ],
        'description' => [
            'title' => '描述'
        ],
    ],

    'rules' => [
        'name' => 'required|min:2|unique:categories',
    ],

    'messages' => [
        'name.required' => '名称不能为空',
        'name.unique' => '名称已经存在，请先用其他名称',
    ]

];
