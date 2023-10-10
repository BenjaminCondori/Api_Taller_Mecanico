<?php

use App\Http\Controllers\auth\JWTController;
use App\Http\Controllers\MarcaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/usuarios', 'App\Http\Controllers\UsuarioController@index');
Route::post('/usuarios', 'App\Http\Controllers\UsuarioController@store');
Route::get('/usuarios/{usuario}', 'App\Http\Controllers\UsuarioController@show');
Route::put('/usuarios/{usuario}', 'App\Http\Controllers\UsuarioController@update');
Route::delete('/usuarios/{usuario}', 'App\Http\Controllers\UsuarioController@destroy');

Route::get('/vehiculos', 'App\Http\Controllers\VehiculoController@index');
Route::post('/vehiculos', 'App\Http\Controllers\VehiculoController@store');
Route::get('/vehiculos/{vehiculo}', 'App\Http\Controllers\VehiculoController@show');
Route::put('/vehiculos/{vehiculo}', 'App\Http\Controllers\VehiculoController@update');
Route::delete('/vehiculos/{vehiculo}', 'App\Http\Controllers\VehiculoController@destroy');

Route::get('/marca', 'App\Http\Controllers\MarcaController@index');
Route::post('/marca','App\Http\Controllers\MarcaController@store');
Route::get('/marca/{marca}', 'App\Http\Controllers\MarcaController@show');
Route::put('/marca/{marca}', 'App\Http\Controllers\MarcaController@update');
Route::delete('/marca/{marca}', 'App\Http\Controllers\MarcaController@destroy');

Route::get('/modelo', 'App\Http\Controllers\ModeloController@index');
Route::post('/modelo', 'App\Http\Controllers\ModeloController@store');
Route::get('/modelo/{modelo}', 'App\Http\Controllers\ModeloController@show');
Route::put('/modelo/{modelo}', 'App\Http\Controllers\ModeloController@update');
Route::delete('/modelo/{modelo}', 'App\Http\Controllers\ModeloController@destroy');

Route::get('/clientes', 'App\Http\Controllers\ClienteController@index');
Route::post('/clientes', 'App\Http\Controllers\ClienteController@store');
Route::get('/clientes/{ci}', 'App\Http\Controllers\ClienteController@show');
Route::put('/clientes/{ci}', 'App\Http\Controllers\ClienteController@update');
Route::delete('/clientes/{ci}', 'App\Http\Controllers\ClienteController@destroy');

Route::group([
    'middleware' => 'api',
], function($router) {

    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refreshToken']);
    Route::post('/profile', [JWTController::class, 'profile']);
});
