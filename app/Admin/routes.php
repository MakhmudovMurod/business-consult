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
    $router->resource('posts', PostsController::class);
    $router->resource('clients', ClientsController::class);
    $router->resource('services', ServicesController::class);
    $router->resource('employees', EmployeesController::class);
    $router->resource('vacancies', VacanciesController::class);
    $router->resource('information', InformationsController::class);
});
