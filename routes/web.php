<?php


use Illuminate\Support\Facades\Route;


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

  Route::get('/', 'HomeController@index');
  Route::get('/Dashboard', 'HomeController@index');
  Route::get('/Permissions', 'HomeController@Permissions');

  Route::get('/Profile', 'usersController@showProfile');


  Route::resource('Messenger', 'MessengerController');
  Route::get('/showMessages', 'MessengerController@showMessages');
  Route::get('/sendMessages', 'MessengerController@SendMas');
  Route::get('/updatemessage', 'MessengerController@updatemessage');
  Route::get('/updatemessage2', 'MessengerController@updatemessage2');
  Route::get('/MessengerCount', 'MessengerController@count');

  Route::resource('users', 'usersController');
  Route::get('/users/{id}', 'usersController@destroy')->name('users.delete');
  Route::Post('/users/{id}/password', 'usersController@newPassword')->name('users.password');
  Route::get('/notifications_es', 'notifications_esController@notifications');
  Route::get('/notificationsDone', 'notifications_esController@notificationsDone');
  Route::get('/notificationsDoneAll', 'notifications_esController@notificationsDoneAll');

  Route::get('/passwordReset', 'usersController@resetPassword');
  Route::Post('/passwordReset', 'usersController@resetPassword');


  Auth::routes();
