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

Route::get('/', function () {
    return view('welcome');
});

/*Auth::routes();*/
/*Route::get('/login', 'loginController@userIndex')->name('user.login');*/
Route::get('/signup', 'signupController@userIndex')->name('user.signup');
/*Route::get('/', 'user\userController@index')->name('user.home');*/
Route::get('/', [App\Http\Controllers\user\userController::class, 'index'])->name('user.home');
Route::get('/login', [App\Http\Controllers\loginController::class, 'userIndex'])->name('user.login');

Route::get('/search', 'user\userController@search')->name('user.search');
Route::get('/search?c={id}', 'user\userController@view')->name('user.search.cat');
Route::get('/cart', 'user\userController@cart')->name('user.cart');
Route::post('/cart', 'user\userController@confirm');