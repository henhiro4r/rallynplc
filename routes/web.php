<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function (){
    Route::get('admin/dashboard', 'Admin\PageController@dashboard')->name('admin');

    Route::get('admin/administrator', 'Admin\UserController@admin')->name('user.admin');
    Route::get('admin/liaison', 'Admin\UserController@liaison')->name('user.liaison');
    Route::get('admin/participant', 'Admin\UserController@participant')->name('user.participant');
    Route::get('admin/user/deactivate', 'Admin\UserController@deactivate')->name('user.deactivate');
    Route::post('admin/user/deactivate', 'Admin\UserController@deactivate');
    Route::get('admin/user/activate', 'Admin\UserController@activate')->name('user.activate');
    Route::post('admin/user/activate', 'Admin\UserController@activate');

    Route::resource('admin/users', 'Admin\UserController');
    Route::resource('admin/games', 'Admin\GameController');
    Route::resource('admin/games/history', 'Admin\HistoryController');
    Route::resource('admin/quiz', 'Admin\QuizController');
    Route::resource('admin/quiz/historyQuiz', 'Admin\QuizPlayController');
    Route::resource('admin/photo', 'Admin\PhotoController');
    Route::resource('admin/photo/historyPhoto', 'Admin\PhotoPlayController');
});