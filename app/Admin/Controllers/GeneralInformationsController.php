<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\GeneralInformation;

class GeneralInformationsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'GeneralInformation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GeneralInformation());

        $grid->column('id', __('Id'));
        $grid->column('small_logo', __('Small logo'))->image();
        $grid->column('instagram_link', __('Instagram link'));
        $grid->column('telegram_link', __('Telegram link'));
        $grid->column('facebook_link', __('Facebook link'));
        $grid->column('big_logo', __('Big logo'))->image();
        $grid->column('footer_description', __('Footer description'));
        $grid->column('phone_number', __('Phone number'));
        $grid->column('address_ru', __('Address ru'));
        $grid->column('address_uz', __('Address uz'));
        $grid->column('address_en', __('Address en'));
        $grid->column('email', __('Email'));
        $grid->column('about_text_ru', __('About text ru'));
        $grid->column('about_text_uz', __('About text uz'));
        $grid->column('about_text_en', __('About text en'));
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
        $show = new Show(GeneralInformation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('small_logo', __('Small logo'))->image();
        $show->field('instagram_link', __('Instagram link'));
        $show->field('telegram_link', __('Telegram link'));
        $show->field('facebook_link', __('Facebook link'));
        $show->field('big_logo', __('Big logo'))->image();
        $show->field('footer_description', __('Footer description'));
        $show->field('phone_number', __('Phone number'));
        $show->field('address_ru', __('Address ru'));
        $show->field('address_uz', __('Address uz'));
        $show->field('address_en', __('Address en'));
        $show->field('email', __('Email'));
        $show->field('about_text_ru', __('About text ru'));
        $show->field('about_text_uz', __('About text uz'));
        $show->field('about_text_en', __('About text en'));
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
        $form = new Form(new GeneralInformation());

        $form->image('small_logo', __('Small logo'));
        $form->image('big_logo', __('Big logo'));
        $form->text('instagram_link', __('Instagram link'));
        $form->text('telegram_link', __('Telegram link'));
        $form->text('facebook_link', __('Facebook link'));
        $form->ckeditor('about_text_ru', __('About text ru'));
        $form->ckeditor('about_text_uz', __('About text uz'));
        $form->ckeditor('about_text_en', __('About text en'));
        $form->ckeditor('footer_description', __('Footer description'));
        $form->text('phone_number', __('Phone number'));
        $form->ckeditor('address_ru', __('Address ru'));
        $form->ckeditor('address_uz', __('Address uz'));
        $form->ckeditor('address_en', __('Address en'));
        $form->email('email', __('Email'));
    
        return $form;
    }
}
