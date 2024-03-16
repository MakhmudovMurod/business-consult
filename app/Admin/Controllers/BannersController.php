<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Banner;

class BannersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Banner';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Banner());

        $grid->column('id', __('Id'));
        $grid->column('desktop_image', __('Desktop image'))->image();
        $grid->column('mobile_image', __('Mobile image'))->image();
        $grid->column('title_ru', __('Title ru'));
        $grid->column('title_uz', __('Title uz'));
        $grid->column('title_en', __('Title en'));
        $grid->column('subtitle_ru', __('Subtitle ru'));
        $grid->column('subtitle_uz', __('Subtitle uz'));
        $grid->column('subtitle_en', __('Subtitle en'));
        $grid->column('more_details_link', __('More details link'));
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
        $show = new Show(Banner::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('desktop_image', __('Desktop image'))->image();
        $show->field('mobile_image', __('Mobile image'))->image();
        $show->field('title_ru', __('Title ru'));
        $show->field('title_uz', __('Title uz'));
        $show->field('title_en', __('Title en'));
        $show->field('subtitle_ru', __('Subtitle ru'));
        $show->field('subtitle_uz', __('Subtitle uz'));
        $show->field('subtitle_en', __('Subtitle en'));
        $show->field('more_details_link', __('More details link'));
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
        $form = new Form(new Banner());

        $form->file('desktop_image', __('Desktop image'));
        $form->file('mobile_image', __('Mobile image'));
        $form->text('title_ru', __('Title ru'));
        $form->text('title_uz', __('Title uz'));
        $form->text('title_en', __('Title en'));
        $form->ckeditor('subtitle_ru', __('Subtitle ru'));
        $form->ckeditor('subtitle_uz', __('Subtitle uz'));
        $form->ckeditor('subtitle_en', __('Subtitle en'));
        $form->text('more_details_link', __('More details link'));

        return $form;
    }
}
