<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('topics', 'TopicController');
    $router->resource('categories', 'CategoryController');
    $router->resource('labels', 'LabelController');
    $router->resource('links', 'LinkController');
    $router->resource('adminSettings', 'AdminSettingController');
});
