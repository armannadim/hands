<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('beneficiary', BeneficiaryController::class);
    $router->resource('donation', DonationController::class);
    $router->resource('donor', DonorController::class);
    $router->resource('project', ProjectController::class);
    $router->resource('expense', ExpenseController::class);

});
