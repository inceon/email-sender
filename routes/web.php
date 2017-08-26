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

Route::get('/', function () {
    $user = Auth::user();
    return view('index', [
        'user' => $user,
        'emails' => Auth::check() ? $user->emails()->get()->all() : null
    ]);
});

Auth::routes();

Route::get('/logout', function (){
    Auth::logout();
    return redirect('/');
});

Route::resource('email', 'EmailController', ['only' => [
    'create', 'store', 'show', 'update', 'destroy'
]]);