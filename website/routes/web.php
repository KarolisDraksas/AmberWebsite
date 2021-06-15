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



/*Route::get('admin', 'loginController@adminIndex')->name('admin.login');
Route::post('admin', 'loginController@adminPosted');*/
Route::get('admin', [App\Http\Controllers\loginController::class, 'adminIndex'])->name('admin.login');
Route::post('admin', [App\Http\Controllers\loginController::class, 'adminPosted']);

Route::group(['middleware' => 'admin'], function(){

 
    /*Route::get("/admin_panel", 'admin_panel\dashboardController@index')->name('admin.dashboard');*/
    //Route::get('/admin_panel', [App\Http\Controllers\admin_panel\dashboardController::class, 'index'])->name('admin.dashboard');
    //Route::get('/admin_panel', [App\Http\Controllers\admin_panel\dashboardController::class, 'index'])->name('admin.products');


    /*Route::get('admin/logout', 'loginController@adminLogout')->name('admin.logout');*/
    Route::get('admin/logout', [App\Http\Controllers\loginController::class, 'adminLogout'])->name('admin.logout');

    //categories
    /*Route::get('/admin_panel/categories', 'admin_panel\categoriesController@index')->name('admin.categories');
    Route::post('/admin_panel/categories', 'admin_panel\categoriesController@posted');*/
    Route::get('/admin_panel/categories', [App\Http\Controllers\admin_panel\categoriesController::class, 'index'])->name('admin.categories');
    Route::post('/admin_panel/categories', [App\Http\Controllers\admin_panel\categoriesController::class, 'posted']);

   /* Route::get('/admin_panel/categories/edit/{id}', 'admin_panel\categoriesController@edit')->name('admin.categories.edit');
    Route::post('/admin_panel/categories/edit/{id}', 'admin_panel\categoriesController@update');*/
    Route::get('/admin_panel/categories/edit/{id}', [App\Http\Controllers\admin_panel\categoriesController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/admin_panel/categories/edit/{id}', [App\Http\Controllers\admin_panel\categoriesController::class, 'update']);

    /*Route::get('/admin_panel/categories/delete/{id}', 'admin_panel\categoriesController@delete')->name('admin.categories.delete');
    Route::post('/admin_panel/categories/delete/{id}', 'admin_panel\categoriesController@destroy');*/
    Route::get('/admin_panel/categories/delete/{id}', [App\Http\Controllers\admin_panel\categoriesController::class, 'delete'])->name('admin.categories.delete');
    Route::post('/admin_panel/categories/delete/{id}', [App\Http\Controllers\admin_panel\categoriesController::class, 'destroy']);


    //products
    /*Route::get('/admin_panel/products', 'admin_panel\productsController@index')->name('admin.products');*/
    Route::get('/admin_panel/products', [App\Http\Controllers\admin_panel\productsController::class, 'index'])->name('admin.products');

    /*Route::get('/admin_panel/products/create', 'admin_panel\productsController@create')->name('admin.products.create');
    Route::post('/admin_panel/products/create', 'admin_panel\productsController@store');*/
    Route::get('/admin_panel/products/create', [App\Http\Controllers\admin_panel\productsController::class, 'create'])->name('admin.products.create');
    Route::post('/admin_panel/products/create', [App\Http\Controllers\admin_panel\productsController::class, 'store']);



    /*Route::get('/admin_panel/products/edit/{id}', 'admin_panel\productsController@edit')->name('admin.products.edit');
    Route::post('/admin_panel/products/edit/{id}', 'admin_panel\productsController@update');*/
    Route::get('/admin_panel/products/edit/{id}', [App\Http\Controllers\admin_panel\productsController::class, 'edit'])->name('admin.products.edit');
    Route::post('/admin_panel/products/edit/{id}', [App\Http\Controllers\admin_panel\productsController::class, 'update']);

    /*Route::get('/admin_panel/products/delete/{id}', 'admin_panel\productsController@delete')->name('admin.products.delete');
    Route::post('/admin_panel/products/delete/{id}', 'admin_panel\productsController@destroy');*/
    Route::get('/admin_panel/products/delete/{id}', [App\Http\Controllers\admin_panel\productsController::class, 'delete'])->name('admin.products.delete');
    Route::post('/admin_panel/products/delete/{id}', [App\Http\Controllers\admin_panel\productsController::class, 'destroy']);

    //order management 
    /*Route::get('/admin_panel/management', 'admin_panel\managementController@manage')->name('admin.orderManagement');
    Route::post('/admin_panel/management', 'admin_panel\managementController@update')->name('admin.orderUpdate');*/
    //Route::get('/admin_panel/management', [App\Http\Controllers\admin_panel\managementController::class, 'manage'])->name('admin.orderManagement');
   // Route::post('/admin_panel/management', [App\Http\Controllers\admin_panel\managementController::class, 'update'])->name('admin.orderUpdate');

});




/*Auth::routes();*/
/*Route::get('/login', 'loginController@userIndex')->name('user.login');*/
/*Route::get('/signup', 'signupController@userIndex')->name('user.signup');*/
/*Route::get('/', 'user\userController@index')->name('user.home');*/


/*Route::view('prekespridejimas', 'prekespridejimas')->name('prekespridejimas');
Route::get('prekes', [App\Http\Controllers\PrekesController::class, 'prekes'])->name('prekes');
Route::post('prekespridejimas', [App\Http\Controllers\PrekesController::class, 'pridetiPreke'])->name('prekespridejimas');*/


Route::get('/', [App\Http\Controllers\user\userController::class, 'index'])->name('user.home');
Route::get('/login', [App\Http\Controllers\loginController::class, 'userIndex'])->name('user.login');
/*Route::post('/login', 'loginController@userPosted');*/
Route::post('/login', [App\Http\Controllers\loginController::class, 'userPosted']);


Route::get('/signup', [App\Http\Controllers\signupController::class, 'userIndex'])->name('user.signup');
/*Route::post('/signup', 'signupController@userPosted');*/
Route::post('/signup', [App\Http\Controllers\signupController::class, 'userPosted']);

/*Route::post('/check_email', 'signupController@emailCheck')->name('user.signup.check_email');*/
Route::post('/check_email', [App\Http\Controllers\signupController::class, 'emailCheck'])->name('user.signup.check_email');

/*Route::group(['middleware' => 'user'], function(){
    /*Route::get('/history', 'user\userController@history')->name('user.history');*/
 /*   Route::get('/history', [App\Http\Controllers\user\userController::class, 'history'])->name('user.history');
});*/

/*Route::get('/logout', 'loginController@userLogout')->name('user.logout');*/
Route::get('/logout', [App\Http\Controllers\loginController::class, 'userLogout'])->name('user.logout');




//*Route::get('/search', 'user\userController@search')->name('user.search');*/
Route::get('/search', [App\Http\Controllers\user\userController::class, 'search'])->name('user.search');
/*Route::get('/search?c={id}', 'user\userController@view')->name('user.search.cat');*/
Route::get('/search?c={id}', [App\Http\Controllers\user\userController::class, 'view'])->name('user.search.cat');
/*Route::get('/cart', 'user\userController@cart')->name('user.cart');
Route::post('/cart', 'user\userController@confirm');*/
Route::get('/cart', [App\Http\Controllers\user\userController::class, 'cart'])->name('user.cart');
Route::post('/cart', [App\Http\Controllers\user\userController::class, 'confirm']);

/*Route::post('/edit_cart', 'user\userController@editCart')->name('user.editCart');*/
Route::post('/edit_cart', [App\Http\Controllers\user\userController::class, 'editCart'])->name('user.editCart');
/*Route::post('/delete_item_from_cart', 'user\userController@deleteCartItem')->name('user.deleteCartItem');*/
Route::post('/delete_item_from_cart', [App\Http\Controllers\user\userController::class, 'deleteCartItem'])->name('user.deleteCartItem');
/*Route::get('/view/{id}', 'user\userController@view')->name('user.view');
Route::post('/view/{id}', 'user\userController@post');*/
Route::get('/view/{id}', [App\Http\Controllers\user\userController::class, 'view'])->name('user.view');
Route::post('/view/{id}', [App\Http\Controllers\user\userController::class, 'post']);

/*Route::get('/product/{id}', 'user\userController@view')->name('user.product');*/
Route::get('/product/{id}', [App\Http\Controllers\user\userController::class, 'view'])->name('user.product');
Route::post('/product/{id}', [App\Http\Controllers\user\userController::class, 'post']);