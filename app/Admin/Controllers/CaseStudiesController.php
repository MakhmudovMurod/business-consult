<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\CaseStudy;

class CaseStudiesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'CaseStudy';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CaseStudy());

        $grid->column('id', __('Id'));
        $grid->column('image', __('Image'))->image();
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
        $show = new Show(CaseStudy::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('image', __('Image'))->image();
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
        $form = new Form(new CaseStudy());

        $form->image('image', __('Image'));
        $form->ckeditor('description_ru', __('Description ru'));
        $form->ckeditor('description_uz', __('Description uz'));
        $form->ckeditor('description_en', __('Description en'));

        return $form;
    }
}
