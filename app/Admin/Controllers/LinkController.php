<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Link;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class LinkController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Link(), function (Grid $grid) {

            // 快捷创建
            $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
                $create->text('url')->required()->rules('url');
                $create->text('title')->required();
            });

            // 快捷搜索
            $grid->quickSearch('title');

            // 禁用创建按钮
            $grid->disableCreateButton();

            $grid->id->sortable();
            $grid->url;
            $grid->title;
            $grid->created_at;
            $grid->updated_at->sortable();

        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Link(), function (Show $show) {
            $show->id;
            $show->url;
            $show->title;
            $show->created_at;
            $show->updated_at;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Link(), function (Form $form) {
            $form->display('id');
            $form->url('url')->required();
            $form->text('title')->required();

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
