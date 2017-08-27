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

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'MainController@index')->name('index');
Route::get('/logout', 'MainController@logout')->name('logout');

Route::resource('email', 'EmailController', ['only' => [
    'store', 'destroy'
]]);
Route::put('email', 'EmailController@update')->name('email.update');
Route::get('profile', 'UsersController@profile')->middleware('auth')->name('profile');

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'roles'],
    'roles' => 'Admin'
], function () {
    Route::get('users', 'UsersController@index')->name('admin.users');
    Route::delete('users/{user}', 'UsersController@destroy')->name('admin.user.delete');
    Route::get('users/{user}/edit', 'UsersController@edit')->name('admin.user.edit');
    Route::put('users/{user}', 'UsersController@update')->name('admin.user.update');
    Route::get('emails', 'EmailController@index')->name('admin.emails');
});