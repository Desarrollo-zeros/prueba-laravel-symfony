<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'middleware' => ['cors'],
    ],
    function ($route) {
        Route::get(
            '/user/',
            "UserController@index"
        );
        Route::post(
            '/user/new',
            "UserController@new"
        );
        Route::post(
            '/user/delete_in',
            "UserController@deleteIn"
        );
        Route::get(
            '/user/{id}',
            "UserController@show"
        );
        Route::post(
            '/user/{id}/edit',
            "UserController@edit"
        );
        Route::delete(
            '/user/{id}',
            "UserController@delete"
        );
    }
);

