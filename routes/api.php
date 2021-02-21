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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::middleware('auth:api')->post('/logout','App\Http\Controllers\AuthController@logout' );

Route::get('/todos', 'App\Http\Controllers\TodoController@index');
Route::post('/todos', 'App\Http\Controllers\TodoController@store');
Route::patch('/todos/{todo}', 'App\Http\Controllers\TodoController@update');
Route::patch('/todosCheckAll', 'App\Http\Controllers\TodoController@updateAll');
Route::delete('/todos/{todo}', 'App\Http\Controllers\TodoController@destroy');
Route::delete('/todosDeleteCompleted', 'App\Http\Controllers\TodoController@destroyCompleted');