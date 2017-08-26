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

Route::get('/', 'MainController@index')->name('index');

Auth::routes();

Route::get('/logout', function (){
    Auth::logout();
    return redirect('/');
});

Route::resource('email', 'EmailController', ['only' => [
    'store', 'destroy'
]]);

Route::put('email', 'EmailController@update')->name('email.update');

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'roles'],
    'roles' => 'Admin'
], function () {
    Route::get('users', 'UsersController@index')->name('admin.users');
    Route::delete('users/{user}', 'UsersController@destroy')->name('admin.user.delete');
    Route::get('users/{user}/edit', 'UsersController@edit')->name('admin.user.edit');
});