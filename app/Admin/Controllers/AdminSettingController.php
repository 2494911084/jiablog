<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\AdminSetting;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class AdminSettingController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new AdminSetting(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->name;
            $grid->key;
            $grid->value;
            $grid->created_at;
            $grid->updated_at->sortable();

            $grid->disableEditButton();
            $grid->disableQuickEditButton();

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
        return Show::make($id, new AdminSetting(), function (Show $show) {
            $show->id;
            $show->name;
            $show->key;
            $show->value;
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
        return Form::make(new AdminSetting(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('key');
            $form->text('value');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
