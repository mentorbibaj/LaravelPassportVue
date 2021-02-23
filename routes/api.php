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

Route::middleware('auth:api')->group(function (){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    
    Route::get('/todos', 'App\Http\Controllers\TodoController@index');
    Route::post('/todos', 'App\Http\Controllers\TodoController@store');
    Route::patch('/todos/{todo}', 'App\Http\Controllers\TodoController@update');
    Route::delete('/todos/{todo}', 'App\Http\Controllers\TodoController@destroy');
    Route::patch('/todosCheckAll', 'App\Http\Controllers\TodoController@updateAll');
    Route::delete('/todosDeleteCompleted', 'App\Http\Controllers\TodoController@destroyCompleted');

    Route::post('/logout','App\Http\Controllers\AuthController@logout' );
});




Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/register', 'App\Http\Controllers\AuthController@register');