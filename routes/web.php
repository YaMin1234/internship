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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



Route::get('/restaurants', 'RestaurantController@index');
Route::get('/restaurants/create', 'RestaurantController@create')->name('restaurants.create');
Route::get('/restaurants/{restaurant}', 'RestaurantController@show')->name('restaurants.show');
Route::post('/restaurants', 'RestaurantController@store')->name('restaurants.store');
Route::get('/restaurants/editRestaurant/{id}', 'RestaurantController@edit')->name('restaurants.edit');
Route::post('/restaurants/destroy/{id}','RestaurantController@destroy')->name('restaurants.delete');
Route::patch('/restaurants/update/{id}','RestaurantController@update')->name('restaurants.update');


Route::get('/menus/create', 'MenuController@create')->name('menus.create');
Route::post('/menus', 'MenuController@store')->name('menus.store');
Route::get('/menus/editMenu/{id}', 'MenuController@edit')->name('menus.edit');
Route::get('/menus/destroy/{id}','MenuController@destroy')->name('menus.delete');
Route::patch('/menus/update/{id}','MenuController@update')->name('menus.update');

Route::get('users/', 'Auth\RegisterController@index');
Route::post('users/register', 'Auth\RegisterController@userRegister');

Route::get('users/login', 'Auth\LoginController@create');
Route::post('users/login', 'Auth\LoginController@store');
Route::post('/logout', 'Auth\LoginController@logout');

Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);
Route::get('users/editAccount/{id}', 'UserController@edit')->name('users.edit');



Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('/', 'Auth\UserController');
// Route::resource('/admin','RestaurantController');

// Route::resource('/restaurants', 'MenuController');
// Route::resource('restaurant' , 'RestaurantController');



 
