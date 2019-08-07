<?php

return [
    'title' => 'site settings',

    // 访问权限判断
    'permission'=> function()
    {
        // 只允许站长管理站点配置
        return Auth::user()->hasRole('Founder');
    },

    // 站点配置的表单
    'edit_fields' => [
        'site_name' => [
            // 表单标题
            'title' => 'site name',

            // 表单条目类型
            'type' => 'text',

            // 字数限制
            'limit' => 50,
        ],
        'contact_email' => [
            'title' => 'contact email',
            'type' => 'text',
            'limit' => 50,
        ],
        'seo_description' => [
            'title' => 'SEO - Description',
            'type' => 'textarea',
            'limit' => 250,
        ],
        'seo_keyword' => [
            'title' => 'SEO - Keywords',
            'type' => 'textarea',
            'limit' => 250,
        ],
    ],

    // 表单验证规则
    'rules' => [
        'site_name' => 'required|max:50',
        'contact_email' => 'email',
    ],

    'messages' => [
        'site_name.required' => 'Please fill in the name of the site',
        'contact_email.email' => 'Please fill in the correct format of the contact email',
    ],

    // 数据即将保持的触发的钩子，可以对用户提交的数据做修改
    'before_save' => function(&$data)
    {
        // 为网站名称加上后缀，加上判断是为了防止多次添加
        if (strpos($data['site_name'], 'Powered by LaraBBS') === false) {
            $data['site_name'] .= ' - Powered by LaraBBS';
        }
    },

    // 你可以自定义多个动作，每一个动作为设置页面底部的『其他操作』区块
    'actions' => [

        // 清空缓存
        'clear_cache' => [
            'title' => 'update system cache',

            // 不同状态时页面的提醒
            'messages' => [
                'active' => 'Emptying cache...',
                'success' => 'The cache has been cleared!',
                'error' => 'An error occurred while emptying the cache!',
            ],

            // 动作执行代码，注意你可以通过修改 $data 参数更改配置信息
            'action' => function(&$data)
            {
                \Artisan::call('cache:clear');
                return true;
            }
        ],
    ],
];