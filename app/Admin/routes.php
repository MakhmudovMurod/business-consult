<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('banners', BannersController::class);
    $router->resource('services', ServicesController::class);
    $router->resource('posts', PostsController::class);
    $router->resource('clients', ClientsController::class);
    $router->resource('vacancies', VacanciesController::class);
    $router->resource('employees', EmployeesController::class);
    $router->resource('applications', ApplicationsController::class);
    $router->resource('requests', RequestsController::class);
    $router->resource('case-studies', CaseStudiesController::class);
    $router->resource('general-informations', GeneralInformationsController::class);

});
