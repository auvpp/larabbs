<?php

use App\Models\Category;

return [
    'title'   => 'category',
    'single'  => 'category',
    'model'   => Category::class,

    // 对 CRUD 动作的单独权限控制，其他动作不指定默认为通过
    'action_permissions' => [
        // 删除权限控制
        'delete' => function () {
            // 只有站长才能删除话题分类
            return Auth::user()->hasRole('Founder');
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => 'name',
            'sortable' => false,
        ],
        'description' => [
            'title'    => 'description',
            'sortable' => false,
        ],
        'operation' => [
            'title'  => 'administrate',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'name' => [
            'title' => 'name',
        ],
        'description' => [
            'title' => 'description',
            'type'  => 'textarea',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'category ID',
        ],
        'name' => [
            'title' => 'name',
        ],
        'description' => [
            'title' => 'description',
        ],
    ],
    'rules'   => [
        'name' => 'required|min:1|unique:categories'
    ],
    'messages' => [
        'name.unique'   => 'The category name is duplicated in the database. Please choose a different name.',
        'name.required' => 'Please make sure the name is at least one character or more.',
    ],
];