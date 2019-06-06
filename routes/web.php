<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('key',function(){
    return str_random(32);
});

// User Auth
$router->post('/register', ['as' => 'user.register', 'uses' => 'AuthController@register']);
$router->post('/login', ['as' => 'user.login', 'uses' => 'AuthController@login']);
$router->get('/user[/{id}]', ['as' => 'user.show', 'uses' => 'AuthController@show']);

// COMPANY API
$router->get('company', ['as' => 'company.index', 'uses' => 'CompanyController@index']);
$router->post('company', ['as' => 'company.store', 'uses' => 'CompanyController@store']);
$router->get('company/{id}', ['as' => 'company.show', 'uses' => 'CompanyController@show']);
$router->put('company/{id}', ['as' => 'company.update', 'uses' => 'CompanyController@update']);
$router->delete('company/{id}', ['as' => 'company.destroy', 'uses' => 'CompanyController@destroy']);

// CUSTOMER API
$router->get('customer', ['as' => 'customers.index', 'uses' => 'CustomersController@index']);
$router->post('customer', ['as' => 'customer.store', 'uses' => 'CustomersController@store']);
$router->get('customer/{id}', ['as' => 'customer.show', 'uses' => 'CustomersController@show']);
$router->put('customer/{id}', ['as' => 'customer.update', 'uses' => 'CustomersController@update']);
$router->delete('customer/{id}',['as' => 'customer.destroy', 'uses' => 'CustomersController@destroy']);