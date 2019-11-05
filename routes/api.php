<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
//
Route::middleware('auth:api')->get('/user', function () {
    return User::find(Auth::id());
});

//Route::group(['middleware' => 'auth:api'], function (){
//    Route::apiResource('history/{id}','Api\HistoryUserController')->only('index');
//});

Route::group(['prefix' => 'user'],function() {
    Route::apiResource('{user}/history-user','Api\HistoryUserController')->only('index');
});
