<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Employee;

class EmployeesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Employee';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Employee());

        $grid->column('id', __('Id'));
        $grid->column('image', __('Image'));
        $grid->column('name_ru', __('Name ru'));
        $grid->column('name_uz', __('Name uz'));
        $grid->column('name_en', __('Name en'));
        $grid->column('position_ru', __('Position ru'));
        $grid->column('position_uz', __('Position uz'));
        $grid->column('position_en', __('Position en'));
        $grid->column('info_ru', __('Info ru'));
        $grid->column('info_uz', __('Info uz'));
        $grid->column('info_en', __('Info en'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Employee::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('image', __('Image'));
        $show->field('name_ru', __('Name ru'));
        $show->field('name_uz', __('Name uz'));
        $show->field('name_en', __('Name en'));
        $show->field('position_ru', __('Position ru'));
        $show->field('position_uz', __('Position uz'));
        $show->field('position_en', __('Position en'));
        $show->field('info_ru', __('Info ru'));
        $show->field('info_uz', __('Info uz'));
        $show->field('info_en', __('Info en'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Employee());

        $form->image('image', __('Image'));
        $form->text('name_ru', __('Name ru'));
        $form->text('name_uz', __('Name uz'));
        $form->text('name_en', __('Name en'));
        $form->text('position_ru', __('Position ru'));
        $form->text('position_uz', __('Position uz'));
        $form->text('position_en', __('Position en'));
        $form->ckeditor('info_ru', __('Info ru'));
        $form->ckeditor('info_uz', __('Info uz'));
        $form->ckeditor('info_en', __('Info en'));

        return $form;
    }
}
