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

Route::get('comments/{thread_id}', 'CommentController@index');
Route::post('comments/likecomment','CommentController@likecomment');
Route::post('comments/dislikecomment','CommentController@dislikecomment');
Route::post('comments/likethread','CommentController@likethread');
Route::post('comments/dislikethread','CommentController@dislikethread');

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user-info', 'UserController@getUserInfo');
});