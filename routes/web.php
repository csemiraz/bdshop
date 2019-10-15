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


Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'admin']], function() {
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::get('category/manage-category', 'CategoryController@manageCategory')->name('manage-category');
});

Route::group(['prefix'=>'user', 'namespace'=>'user', 'middleware'=>['auth', 'user']], function() {
    Route::get('dashboard', 'DashboardController@index')->name('user.dashboard');
});