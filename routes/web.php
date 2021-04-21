<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'api'], function($router)
{
    $router->post('user/add','InquilinoController@createInquilino');
    
    $router->get('inquilino/all','InquilinoController@allInquilinos');
    
    //$router->get('users/{username}','InquilinoController@showUserByUsername');
    
    $router->post('inquilino/remove/{id}','InquilinoController@deleteInquilino');
    
    //$router->post('inquilino/update/{id}','InquilinoController@updateInquilino');

    $router->get('users/all','InquilinoController@showAllUsers');
}); 

Route::get('interessadoProfile/{username}', 'InteressadoController@interessadoProfile');

Route::get('findPropriedade', 'InteressadoController@findPropriedade');

Route::post('edit/{username}', 'InquilinoController@updateInquilino');

Route::get('propertyInfo/{id}', 'InteressadoController@propertyInfo');

//Testes:
Route::get('testar/{username}', 'InquilinoController@inquilinoAluguerInfo');

Route::get('users/{username}','InquilinoController@showUserByUsername');