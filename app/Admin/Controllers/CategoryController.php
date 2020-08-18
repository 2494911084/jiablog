<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Category;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\IFrameGrid;

class CategoryController extends AdminController
{
    protected function iFrameGrid()
    {
        $grid = new IFrameGrid(new Category());

        $grid->id->sortable();
        $grid->name;

        $grid->filter(function (Grid\Filter $filter) {
            $filter->equal('id');
            $filter->like('name');
        });
        return $grid;
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Category(), function (Grid $grid) {

            // 快捷创建
            $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
                $create->text('name')->required();
                $create->text('content');
            });

            // 快捷搜索
            $grid->quickSearch('name');

            // 禁用创建按钮
            $grid->disableCreateButton();

            $grid->id->sortable();
            $grid->name;
            $grid->topic_count;
            $grid->created_at;
            $grid->updated_at->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
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
        return Show::make($id, new Category(), function (Show $show) {
            $show->id;
            $show->name;
            $show->content;
            $show->topic_count;
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
        return Form::make(new Category(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->textarea('content');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
