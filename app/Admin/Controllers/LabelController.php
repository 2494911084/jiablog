<?php

namespace App\Admin\Controllers;

// use App\Admin\Repositories\Label;
use App\Models\Label;
use Dcat\Admin\IFrameGrid;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class LabelController extends AdminController
{
    protected function iFrameGrid()
    {
        $grid = new IFrameGrid(new Label());

        $grid->quickSearch(['id', 'name']);

        $grid->id->sortable();
        $grid->name;
        $grid->created_at;

        return $grid;
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(Label::with('topics'), function (Grid $grid) {

            // 快捷创建
            $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
                $create->text('name')->required();
            });

            // 快捷搜索
            $grid->quickSearch('name');

            // 禁用创建按钮
            $grid->disableCreateButton();

            $grid->id->sortable();
            $grid->name;
            $grid->column('topics', '文章')->count();
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
        return Show::make($id, new Label(), function (Show $show) {
            $show->id;
            $show->name;
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
        return Form::make(new Label(), function (Form $form) {
            $form->display('id');
            $form->text('name');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
