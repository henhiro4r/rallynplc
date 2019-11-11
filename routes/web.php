<?php

use App\Mail\ConfirmationEmail;
use App\Mailing;
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

Route::get('mailable', function (){
   $mail = ['subject' => 'test', 'message' => 'test message'];
   $user = Mailing::first();
   return new ConfirmationEmail($mail, $user);
});

Route::group(['middleware' => 'admin'], function (){
    Route::get('admin/dashboard', 'Admin\PageController@dashboard')->name('admin');

    Route::get('admin/administrator', 'Admin\UserController@admin')->name('user.admin');
    Route::get('admin/liaison', 'Admin\UserController@liaison')->name('user.liaison');
    Route::get('admin/participant', 'Admin\UserController@participant')->name('user.participant');
    Route::get('admin/user/deactivate', 'Admin\UserController@deactivate')->name('user.deactivate');
    Route::post('admin/user/deactivate', 'Admin\UserController@deactivate');
    Route::get('admin/user/activate', 'Admin\UserController@activate')->name('user.activate');
    Route::post('admin/user/activate', 'Admin\UserController@activate');
    Route::post('admin/newsletter/send', 'Admin\MailController@sendmail')->name('mail.send');

    Route::get('admin/user/deactivate-all', 'Admin\UserController@deactivateAll')->name('userAll.deactivate');
    Route::post('admin/user/deactivate-all', 'Admin\UserController@deactivateAll');
    Route::get('admin/user/activate-all', 'Admin\UserController@activateAll')->name('userAll.activate');
    Route::post('admin/user/activate-all', 'Admin\UserController@activateAll');

    Route::resource('admin/users', 'Admin\UserController');
    Route::resource('admin/games', 'Admin\GameController');
    Route::resource('admin/history', 'Admin\HistoryController');
    Route::resource('admin/quiz', 'Admin\QuizController');
    Route::resource('admin/historyQuiz', 'Admin\QuizPlayController');
    Route::resource('admin/photo', 'Admin\PhotoController');
    Route::resource('admin/historyPhoto', 'Admin\PhotoPlayController');
    Route::resource('admin/mailing', 'Admin\MailController');
});