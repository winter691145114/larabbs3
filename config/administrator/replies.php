<?php

use App\Models\Reply;

return [
    'title' => '回复',
    'single' => '回复',
    'model' => Reply::class,

    'columns' => [
        'id' => [
            'title' => 'ID'
        ],
        'content' => [
            'title' => '回复',
            'output' => function($value,$model){
                return '<div style="max-width:220px">'.$value.'</div>';
            },
            'sortable' => false,

        ],
        'user' => [
            'title' => '用户名',
            'output' => function($value,$model){

                $avatar = $model->user->avatar;
                $value = empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" style="width:40px;height:40">'.$model->user->name;
                return model_link($value,$model->user);
            },
            'sortable' => false,
        ],
        'topic' => [
            'title' => '话题',
            'sortable' => false,
            'output' => function($value,$model){
                return '<div style="max-width:260px">'. model_link($model->topic->title,$model->topic).'</div>';
            }
        ],

        'operation' => [
            'title' => '管理',
            'sortable' => false
        ],
    ],

    'edit_fields' => [

            'user' => [
                'title' => '用户',
                'type' => 'relationship',
                'name_field' => 'name',
                'autocomplete' => true,
                'search_fields' => ["CONCAT(id,' ',name)"],
                'options_sort_field' => 'id',

            ],
            'topic' => [
                'title' => '话题',
                'type' => 'relationship',
                'name_field' => 'name',
                'search_fields' => ["CONCAT(id,' ',name)"],
                'options_sort_field' => 'id',

            ],
            'content' =>[
                'title' => '回复',
                'type' => 'textarea',
            ],


        ],

    'filters' => [


        'user' => [
                'title' => '用户',
                'type' => 'relationship',
                'name_field' => 'name',
                'autocomplete' => true,
                'search_fields' => ["CONCAT(id,' ',name)"],
                'options_sort_field' => 'id',

            ],

        'topic' => [
                'title' => '话题',
                'type' => 'relationship',
                'name_field' => 'name',
                'search_fields' => ["CONCAT(id,' ',name)"],
                'options_sort_field' => 'id',



            ],
        'content' => [
            'title' => '回复内容',
        ],


    ],

    'rules' => [
        'content' => 'required',
    ],

    'messages' => [
        'content.required' => '请填写回复内容',
    ]
];
