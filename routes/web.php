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
//Special auth route
Auth::routes();

//Public route
Route::get('/', 'PublicController@index')->name('/');
Route::get('product-single/{name}/{id}', 'PublicController@productSingle')->name('product-single');
Route::get('categories', 'PublicController@allCategory')->name('category.allCategory');
Route::get('product/category/{name}', 'PublicController@productCategory')->name('product.category');
Route::get('product/brand/{name}', 'PublicController@productBrand')->name('product.brand');

// Cart Route
Route::post('cart/store', 'CartController@store')->name('cart.store');
Route::get('cart', 'CartController@index')->name('cart.index');
Route::post('cart/{id}', 'CartController@update')->name('cart.update');
Route::get('cart/{id}', 'CartController@destroy')->name('cart.destroy');

// Checkout Routes
Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('checkout/register', 'CheckoutController@register')->name('checkout.register');
Route::post('checkout/login', 'CheckoutController@login')->name('checkout.login');
Route::get('checkout/shipping', 'CheckoutController@shipping')->name('checkout.shipping');
Route::post('checkout/shipping/store', 'CheckoutController@shippingStore')->name('checkout.shipping.store');
Route::get('checkout/payment', 'CheckoutController@payment')->name('checkout.payment');
Route::post('checkout/order', 'CheckoutController@order')->name('checkout.order');
Route::get('checkout/confirm', 'CheckoutController@confirm')->name('checkout.confirm');

//Customer Route
Route::get('customer/register', 'CustomerController@registerForm')->name('customer.registerForm');
Route::post('customer/register', 'CustomerController@register')->name('customer.register');
Route::get('customer/login', 'CustomerController@loginForm')->name('customer.loginForm');
Route::post('customer/login', 'CustomerController@login')->name('customer.login');
Route::get('customer/profile', 'CustomerController@profile')->name('customer.profile');
Route::post('customer/profile', 'CustomerController@profileUpdate')->name('customer.profile-update');
Route::get('customer/order', 'CustomerController@order')->name('customer.order');
Route::get('customer/wishlist', 'CustomerController@wishlist')->name('customer.wishlist');
Route::get('customer/logout', 'CustomerController@logout')->name('customer.logout');


//Customer Review Route
Route::post('customer/review', 'ReviewController@review')->name('customer.review');

//Admin Route
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