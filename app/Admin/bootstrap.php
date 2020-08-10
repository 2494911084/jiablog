<?php

use Dcat\Admin\Admin;
use Dcat\Admin\Grid;
use Dcat\Admin\Form;
use Dcat\Admin\Grid\Filter;
use Dcat\Admin\Show;
use Dcat\Admin\Layout\Navbar;

/**
 * Dcat-admin - admin builder based on Laravel.
 * @author jqh <https://github.com/jqhph>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 *
 * extend custom field:
 * Dcat\Admin\Form::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Column::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Filter::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Admin::css('static/css/nxcrm.css');

// 覆盖默认配置
config(['admin' => user_admin_config()]);

Admin::navbar(function (Navbar $navbar) {

    $navbar->right(App\Admin\Actions\AdminSetting::make()->render());
    $navbar->right(App\Admin\Actions\BlogSetting::make()->render());

    // 下拉菜单
    //$navbar->right(view('admin.navbar-2'));

});
