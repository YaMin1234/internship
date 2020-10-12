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

use App\Http\Controllers\CartController;
use App\Mail\NewUserNotification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission;
use Spatie\Permission\Contracts\Role;

Route::get('/',function(){
     return view('welcome');
 });

Auth::routes();
//Route:: resource('/admin','adminController');
Route::post('/admin/destroy/{id}','adminController@destroy')->name('admin.delete');


Route::group(['middleware' => ['role:admin']], function () {
    Route:: resource('/admin','adminController');
 });



Route::get('/restaurants', 'RestaurantController@index')->name('restaurants');
Route::get('/restaurants/create', 'RestaurantController@create')->name('restaurants.create');
Route::get('/restaurants/{restaurant}', 'RestaurantController@show')->name('restaurants.show');
Route::post('/restaurants', 'RestaurantController@store')->name('restaurants.store');
Route::get('/restaurants/editRestaurant/{id}', 'RestaurantController@edit')->name('restaurants.edit');
Route::post('/restaurants/destroy/{id}','RestaurantController@destroy')->name('restaurants.delete');
Route::patch('/restaurants/update/{id}','RestaurantController@update')->name('restaurants.update');
Route::get('/trash','RestaurantController@trash')->name('resaturants.trashed');
Route::get('/restaurants/hdelete/{id}','RestaurantController@hdelete')->name('resaturants.hdelete');
Route::get('/restaurants/restore/{id}','RestaurantController@restore')->name('resaturants.restore');


Route::get('/menus/create', 'MenuController@create')->name('menus.create');

Route::post('/menus', 'MenuController@store')->name('menus.store');
Route::get('/menus/editMenu/{id}', 'MenuController@edit')->name('menus.edit');
Route::get('/menus/destroy/{id}','MenuController@destroy')->name('menus.delete');
Route::patch('/menus/update/{id}','MenuController@update')->name('menus.update');

Route::get('/menu_types/create', 'MenuTypeController@create')->name('menu_types.create');
Route::get('/menu_types/back', 'MenuTypeController@back')->name('menu_types.back');
Route::post('/menu_types/search', 'MenuTypeController@search')->name('menu_types.search');
Route::get('/menu_types/{menu_type}', 'MenuTypeController@show')->name('menu_types.show');
Route::post('/menu_types', 'MenuTypeController@store')->name('menu_types.store');
Route::get('/menu_types/edit/{id}', 'MenuTypeController@edit')->name('menu_types.edit');
Route::get('/menu_types/destroy/{id}','MenuTypeController@destroy')->name('menu_types.delete');
Route::patch('/menu_types/update/{id}','MenuTypeController@update')->name('menu_types.update');
Route::get('/menu_types', 'MenuTypeController@index');


Route::get('users/registeration', 'Auth\RegisterController@registerationForm');
Route::post('users/register', 'Auth\RegisterController@userRegister');
Route::get('users/login', 'Auth\LoginController@create');
Route::post('users/login', 'Auth\LoginController@store');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::patch('users/update/{id}','UserController@update')->name('users.update');
Route::get('users/editAccount/{id}', 'UserController@edit')->name('users.edit');

Route::get('registeration', 'Auth\RegisterController@adminRegisterationForm')->name('registeration');
Route::post('admin/register', 'Auth\RegisterController@adminRegister');
Route::get('adminlogin', 'Auth\LoginController@adminlogin')->name('loginForm');
Route::post('admin/login', 'Auth\LoginController@adminstore');

Route::get('/login-check','CheckoutController@login_check')->name('login-check');
Route::post('/customer_registration','CheckoutController@customer_registration')->name('customer_registration');
Route::get('/checkout','CheckoutController@checkout')->name('checkout');
Route::post('/save-shipping-details','CheckoutController@save_shipping_details');
//customer login and logout are here------------------------------------
Route::post('/customer_login','CheckoutController@customer_login')->name('customer_login');
Route::get('/customer_logout','CheckoutController@customer_logout')->name('customer_logout');

Route::get('/payment','CheckoutController@payment')->name('payment');
Route::post('/order-place','CheckoutController@order_place');

Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{order_id}','CheckoutController@view_order')->name('view_order');
Route::get('/prepared_order/{order_id}','CheckoutController@prepared_order')->name('prepared');
Route::get('/update_order/{order_id}','CheckoutController@update_order')->name('update');
Route::get('/pickup_order/{order_id}','CheckoutController@pickup_order')->name('pickup');
Route::get('/finish_order/{order_id}','CheckoutController@finish_order')->name('finish');
Route::get('/destroy/{order_id}','CheckoutController@destroy')->name('delete_order');

Route::get('/foodDelivery/home','CustomerController@home');
Route::get('/foodDelivery','CustomerController@index')->name('foodDelivery.index');
Route::get('/foodDelivery/show/{id}','CustomerController@show')->name('foodDelivery.show');
Route::get('/foodDelivery/category/{id}','CustomerController@category')->name('foodDelivery.category');
Route::get('/foodDelivery/{menu_type}', 'CustomerController@showMenu')->name('foodDelivery.showMenu');

Route::get('/cart','CartController@cart')->name('foodDelivery.cart');
// Route::get('/foodDelivery/cart', 'CartController@cart')->name('foodDelivery.cart');
Route::get('/foodDelivery/add-to-cart/{id}', 'CartController@addToCart')->name('foodDelivery.addToCart');
Route::patch('/foodDelivery/update-cart', 'CartController@update')->name('foodDelivery.updateCart');
Route::delete('/foodDelivery/remove-from-cart', 'CartController@remove')->name('foodDelivery.removeCart');

Route::get('/contact','ContactController@contact')->name('contact');
Route::post('/save-contact','ContactController@save_contact')->name('save_contact');
Route::get('/all-message','ContactController@all_message');
Route::get('/unactive_contact/{contact_id}','ContactController@unactive_contact')->name('unactive_contact');
Route::get('/active_contact/{contact_id}','ContactController@active_contact')->name('active_contact');
Route::get('/view-message/{contact_id}','ContactController@view_message')->name('view_message');
Route::get('/delete-contact/{contact_id}','ContactController@delete_message')->name('delete_contact');
Route::post('/ok-message/{contact_id}','ContactController@ok_message')->name('ok_message');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/invoice/{order_id}','HomeController@invoice')->name('invoice');
Route::get('send/{order_id}','HomeController@sendMail')->name('send-mail');



 
