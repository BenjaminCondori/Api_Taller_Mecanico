<?php

use App\Http\Controllers\auth\JWTController;
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


