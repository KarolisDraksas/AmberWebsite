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

Route::get('admin', [App\Http\Controllers\loginController::class, 'adminIndex'])->name('admin.login');
Route::post('admin', [App\Http\Controllers\loginController::class, 'adminPosted']);

Route::group(['middleware' => 'admin'], function(){

    Route::get('admin/logout', [App\Http\Controllers\loginController::class, 'adminLogout'])->name('admin.logout');

    Route::get('/admin_panel/categories', [App\Http\Controllers\admin_panel\categoriesController::class, 'index'])->name('admin.categories');
    Route::post('/admin_panel/categories', [App\Http\Controllers\admin_panel\categoriesController::class, 'posted']);

    Route::get('/admin_panel/categories/edit/{id}', [App\Http\Controllers\admin_panel\categoriesController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/admin_panel/categories/edit/{id}', [App\Http\Controllers\admin_panel\categoriesController::class, 'update']);
    Route::get('/admin_panel/categories/delete/{id}', [App\Http\Controllers\admin_panel\categoriesController::class, 'delete'])->name('admin.categories.delete');
    Route::post('/admin_panel/categories/delete/{id}', [App\Http\Controllers\admin_panel\categoriesController::class, 'destroy']);

    Route::get('/admin_panel/products', [App\Http\Controllers\admin_panel\productsController::class, 'index'])->name('admin.products');

    Route::get('/admin_panel/products/create', [App\Http\Controllers\admin_panel\productsController::class, 'create'])->name('admin.products.create');
    Route::post('/admin_panel/products/create', [App\Http\Controllers\admin_panel\productsController::class, 'store']);
    Route::get('/admin_panel/products/edit/{id}', [App\Http\Controllers\admin_panel\productsController::class, 'edit'])->name('admin.products.edit');
    Route::post('/admin_panel/products/edit/{id}', [App\Http\Controllers\admin_panel\productsController::class, 'update']);

    Route::get('/admin_panel/products/delete/{id}', [App\Http\Controllers\admin_panel\productsController::class, 'delete'])->name('admin.products.delete');
    Route::post('/admin_panel/products/delete/{id}', [App\Http\Controllers\admin_panel\productsController::class, 'destroy']);



});



Route::get('/', [App\Http\Controllers\user\userController::class, 'index'])->name('user.home');
Route::get('/login', [App\Http\Controllers\loginController::class, 'userIndex'])->name('user.login');

Route::post('/login', [App\Http\Controllers\loginController::class, 'userPosted']);


Route::get('/signup', [App\Http\Controllers\signupController::class, 'userIndex'])->name('user.signup');

Route::post('/signup', [App\Http\Controllers\signupController::class, 'userPosted']);

Route::post('/check_email', [App\Http\Controllers\signupController::class, 'emailCheck'])->name('user.signup.check_email');

Route::get('/logout', [App\Http\Controllers\loginController::class, 'userLogout'])->name('user.logout');


Route::get('/search', [App\Http\Controllers\user\userController::class, 'search'])->name('user.search');

Route::get('/search?c={id}', [App\Http\Controllers\user\userController::class, 'view'])->name('user.search.cat');

Route::get('/cart', [App\Http\Controllers\user\userController::class, 'cart'])->name('user.cart');
Route::post('/cart', [App\Http\Controllers\user\userController::class, 'confirm']);

Route::post('/edit_cart', [App\Http\Controllers\user\userController::class, 'editCart'])->name('user.editCart');

Route::post('/delete_item_from_cart', [App\Http\Controllers\user\userController::class, 'deleteCartItem'])->name('user.deleteCartItem');

Route::get('/view/{id}-{name}', [App\Http\Controllers\user\userController::class, 'view'])->name('user.view');
//Route::get('/view/{name}', [App\Http\Controllers\user\userController::class, 'view'])->name('user.view');

Route::post('/view/{id}', [App\Http\Controllers\user\userController::class, 'post']);



Route::get('/product/{id}-{name}', [App\Http\Controllers\user\userController::class, 'view'])->name('user.product');
//Route::get('/product/{id}', [App\Http\Controllers\user\userController::class, 'view'])->name('user.product');

Route::post('/product/{id}', [App\Http\Controllers\user\userController::class, 'post']);

