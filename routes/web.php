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

Auth::routes();

Route::get('/', 'PublicController@index')->name('/');
Route::get('product-single/{name}/{id}', 'PublicController@productSingle')->name('product-single');
//Cart
Route::post('cart/store', 'CartController@store')->name('cart.store');
Route::get('cart', 'CartController@index')->name('cart.index');
Route::post('cart/{id}', 'CartController@update')->name('cart.update');
Route::get('cart/{id}', 'CartController@destroy')->name('cart.destroy');


Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'admin']], function() {
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::get('category/manage-category', 'CategoryController@manageCategory')->name('manage-category');
    Route::get('category/add-category', 'CategoryController@addCategory')->name('add-category');
    Route::post('category/store-category', 'CategoryController@storeCategory')->name('store-category');
    Route::get('category/edit-category/{id}', 'CategoryController@editCategory')->name('edit-category');
    Route::post('category/update-category', 'CategoryController@updateCategory')->name('update-category');
    Route::get('category/publish-category/{id}', 'CategoryController@publishCategory')->name('publish-category');
    Route::get('category/unpublish-category/{id}', 'CategoryController@unpublishCategory')->name('unpublish-category');
    Route::get('category/delete-category/{id}', 'CategoryController@deleteCategory')->name('delete-category');

    Route::resource('brands', 'BrandController');
    Route::get('brands/publish/{brand}', 'BrandController@publish')->name('brands.publish');
    Route::get('brands/unpublish/{brand}', 'BrandController@unpublish')->name('brands.unpublish');

    Route::resource('suppliers', 'SupplierController');

    Route::resource('products', 'ProductController'); 
});

Route::group(['prefix'=>'user', 'namespace'=>'user', 'middleware'=>['auth', 'user']], function() {
    Route::get('dashboard', 'DashboardController@index')->name('user.dashboard'); 
});