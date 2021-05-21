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

$router->get('/', function (){
    //session()->put('Name','Gony');
    return view('homeInteressado');
});

$router->group(['prefix' => 'api'], function($router)
{
    
    $router->post('user/add','InquilinoController@createInquilino');
    
    $router->get('inquilino/all','InteressadoController@allInquilinos');
    
    //$router->get('users/{username}','InquilinoController@showUserByUsername');
    
    $router->post('inquilino/remove/{id}','InquilinoController@deleteInquilino');
    
    //$router->post('inquilino/update/{id}','InquilinoController@updateInquilino');

    $router->get('users/all','InquilinoController@showAllUsers');
}); 

Route::group(['prefix' => ''], function () {

    Route::get('homeInteressado', 'InteressadoController@goHome');

    Route::get('interessadoProfile/{id}', 'InteressadoController@interessadoProfile');

    Route::get('findPropriedadeInteressado/{idUser}', 'InteressadoController@findPropriedade');

    Route::post('editInteressado/{id}', 'InteressadoController@updateInteressado');

    Route::get('propertyInfo/{id}/user/{idUser}', 'InteressadoController@propertyInfo');

    Route::post('startNewRent/{idProp}/user/{idUser}', 'InteressadoController@starNewRent');

    Route::get('walletInteressado/{id}', 'InteressadoController@showWallet');

    Route::post('walletAddInteressado/{id}', 'InteressadoController@addSaldo');

    Route::post('/likeProperty/{idProp}/user/{idUser}', 'InteressadoController@likeProp');

    Route::post('/nolikeProperty/{idProp}/user/{idUser}', 'InteressadoController@deleteLikeProp');

    Route::post('/rateProperty/{idProp}/user/{idUser}', 'InteressadoController@rateProp');

    Route::get('/chat', 'InteressadoController@showChat');

    Route::get('/message/{user_id}', 'InteressadoController@getMessage');

    Route::post('message', 'InteressadoController@sendMessage');

    Route::post('/storeImg/{id}', 'InteressadoController@storeProfileImg');

});

//Testes:
Route::get('testar/{username}', 'InquilinoController@inquilinoAluguerInfo');

Route::get('users/{username}','InquilinoController@showUserByUsername');