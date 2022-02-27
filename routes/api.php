<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//RUTAS DEL USUARIO
Route::post('register_user', 'UserController@register');
Route::post('login', 'UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {
    
    //RUTAS DEL CLIENTE
    Route::post('register_cliente', 'ClienteController@register_cliente');
    Route::get('listar_cliente', 'ClienteController@index');

    //RUTAS DE AGENDA
    Route::post('update_agenda/{id}', 'AgendaController@update_agenda');
    Route::post('register_agenda', 'AgendaController@register_agenda');
    Route::get('listar_agenda', 'AgendaController@index');

});


