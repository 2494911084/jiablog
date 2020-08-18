<?php

use Illuminate\Support\Arr;
// use Illuminate\Support\Facades\Redis;

function user_admin_config($key = null, $value = null)
{
    $session = session();

    if (! $config = $session->get('admin.config')) {
        $config = config('admin');
    }

    if (is_array($key)) {
        // 保存
        foreach ($key as $k => $v) {
            Arr::set($config, $k, $v);
        }

        $session->put('admin.config', $config);

        return;
    }

    if ($key === null) {
        return $config;
    }

    return Arr::get($config, $key, $value);
}


function blog_config($key = null, $value = null)
{
    $session = session();

    if (! $config = $session->get('blog.config')) {
        $config = null;
    }

    if (is_array($key)) {
        // 保存
        foreach ($key as $k => $v) {
            Arr::set($config, $k, $v);
        }

        $session->put('blog.config', $config);

        return;
    }

    if ($key === null) {
        return $config;
    }

    return Arr::get($config, $key, $value);
}

// 获取缓存
// function getSetting($type)
// {
//     switch ($type) {
//         // 网站名称
//         case 'name':
//             $name = 'name';
//             break;
//         // 邮箱
//         case 'email':
//             $name = 'email';
//             break;
//         // 公告
//         case 'notice':
//             $name = 'notice';
//             break;
//         // about
//         case 'content':
//             $name = 'content';
//             break;
//         // 博文分类
//         case 'category':
//             $categories = Redis::get('topic_categories');
//             if (!$categories) {
//                 $categories = DB::table('categories')->orderBy('order', 'desc')->get();
//             }
//             return $categories;
//     }
//     return Redis::hGet('admin_side_set', $name);
// }

// 将路由名称转为类名
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName()) ;
}
