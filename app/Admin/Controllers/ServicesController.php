<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Service;

class ServicesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Service';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Service());

        $grid->column('id', __('Id'));
        $grid->column('image', __('Image'))->image();
        $grid->column('title_ru', __('Title ru'));
        $grid->column('title_uz', __('Title uz'));
        $grid->column('title_en', __('Title en'));
        $grid->column('description_ru', __('Description ru'));
        $grid->column('description_uz', __('Description uz'));
        $grid->column('description_en', __('Description en'));
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
        $show = new Show(Service::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('image', __('Image'));
        $show->field('title_ru', __('Title ru'));
        $show->field('title_uz', __('Title uz'));
        $show->field('title_en', __('Title en'));
        $show->field('description_ru', __('Description ru'));
        $show->field('description_uz', __('Description uz'));
        $show->field('description_en', __('Description en'));
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
        $form = new Form(new Service());

        $form->image('image', __('Image'));
        $form->text('title_ru', __('Title ru'));
        $form->text('title_uz', __('Title uz'));
        $form->text('title_en', __('Title en'));
        $form->ckeditor('description_ru', __('Description ru'));
        $form->ckeditor('description_uz', __('Description uz'));
        $form->ckeditor('description_en', __('Description en'));

        return $form;
    }
}
