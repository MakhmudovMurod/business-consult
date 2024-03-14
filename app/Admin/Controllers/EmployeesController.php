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
        $grid->column('firstname', __('Firstname'));
        $grid->column('lastname', __('Lastname'));
        $grid->column('position', __('Position'));
        $grid->column('info', __('Info'));
        $grid->column('is_ceo', __('Is ceo'));
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
        $show->field('firstname', __('Firstname'));
        $show->field('lastname', __('Lastname'));
        $show->field('position', __('Position'));
        $show->field('info', __('Info'));
        $show->field('is_ceo', __('Is ceo'));
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
        $form->text('firstname', __('Firstname'));
        $form->text('lastname', __('Lastname'));
        $form->text('position', __('Position'));
        $form->textarea('info', __('Info'));
        $form->switch('is_ceo', __('Is ceo'));

        return $form;
    }
}
