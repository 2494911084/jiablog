<?php

namespace App\Admin\Controllers;

// use App\Admin\Repositories\Topic;
use App\Models\Topic;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use App\Models\Category;
use App\Models\Label;

class TopicController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(Topic::with(['category', 'labels']), function (Grid $grid) {
            $grid->id->sortable();
            $grid->title;
            // $grid->content;
            $grid->column('category.name', '分类')->label('danger');
            $grid->labels('标签')->pluck('name')->label();

            $grid->isReprint->using([0 => 'N', 1 => 'Y'])->label([
                'default' => 'primary', // 设置默认颜色，不设置则默认为 default
                1 => 'danger',
                0 => 'primary',
            ]);
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
        return Show::make($id, new Topic(), function (Show $show) {
            $show->id;
            $show->title;
            $show->category_id;
            $show->view_count;
            $show->isReprint;
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
        // 这里传入 permissions 关联权限模型的数据

        return Form::make(Topic::with('labels'), function (Form $form) {
            $form->display('id');
            $form->text('title')->required();

            // 弹窗选择器
            $form->selectResource('category_id')
            ->path('categories') // 设置表格页面链接
            ->options(function ($v) {
                if (!$v) return $v;
                return Category::find($v)->pluck('name', 'id');
            })->required();

            $form->multipleSelect('labels', '标签')
            ->options(Label::all()->pluck('name', 'id'))
            ->customFormat(function ($v) {
                if (! $v) {
                    return [];
                }

                // 从数据库中查出的二维数组中转化成ID
                return array_column($v, 'id');
            })->required();

            $form->radio('isReprint')->options(['0'=>'否', '1' => '是'])->required();
            $form->editor('content')->required();

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
