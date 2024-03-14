<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Information;

class InformationsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Information';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Information());

        $grid->column('id', __('Id'));
        $grid->column('instagram_link', __('Instagram link'));
        $grid->column('telegram_link', __('Telegram link'));
        $grid->column('facebook_link', __('Facebook link'));
        $grid->column('company_phone', __('Company phone'));
        $grid->column('company_email', __('Company email'));
        $grid->column('company_description_uz', __('Company description uz'));
        $grid->column('company_description_ru', __('Company description ru'));
        $grid->column('company_description_en', __('Company description en'));
        $grid->column('about_company_uz', __('About company uz'));
        $grid->column('about_company_ru', __('About company ru'));
        $grid->column('about_company_en', __('About company en'));
        $grid->column('company_address_uz', __('Company address uz'));
        $grid->column('company_address_ru', __('Company address ru'));
        $grid->column('company_address_en', __('Company address en'));
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
        $show = new Show(Information::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('instagram_link', __('Instagram link'));
        $show->field('telegram_link', __('Telegram link'));
        $show->field('facebook_link', __('Facebook link'));
        $show->field('company_phone', __('Company phone'));
        $show->field('company_email', __('Company email'));
        $show->field('company_description_uz', __('Company description uz'));
        $show->field('company_description_ru', __('Company description ru'));
        $show->field('company_description_en', __('Company description en'));
        $show->field('about_company_uz', __('About company uz'));
        $show->field('about_company_ru', __('About company ru'));
        $show->field('about_company_en', __('About company en'));
        $show->field('company_address_uz', __('Company address uz'));
        $show->field('company_address_ru', __('Company address ru'));
        $show->field('company_address_en', __('Company address en'));
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
        $form = new Form(new Information());

        $form->text('instagram_link', __('Instagram link'));
        $form->text('telegram_link', __('Telegram link'));
        $form->text('facebook_link', __('Facebook link'));
        $form->text('company_phone', __('Company phone'));
        $form->text('company_email', __('Company email'));
        $form->textarea('company_description_uz', __('Company description uz'));
        $form->textarea('company_description_ru', __('Company description ru'));
        $form->textarea('company_description_en', __('Company description en'));
        $form->textarea('about_company_uz', __('About company uz'));
        $form->textarea('about_company_ru', __('About company ru'));
        $form->textarea('about_company_en', __('About company en'));
        $form->textarea('company_address_uz', __('Company address uz'));
        $form->textarea('company_address_ru', __('Company address ru'));
        $form->textarea('company_address_en', __('Company address en'));

        return $form;
    }
}
