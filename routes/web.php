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


use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//Route::get('/', function () {return view('welcome');
//});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');


Route::get('/category/{id}', ['as' => 'category', 'uses' => 'HomeController@getProdCat'])->where('id', '[0-9]+');

Route::resource('cart', 'CartsController', ['only' => [
    'index', 'store', 'destroy'
]]);

Route::post('/user-order', ['as' => 'orderUser', 'uses' => 'UserOrdersController@execute']);

Route::get('/product/{id}', ['as'=>'details', 'uses'=>'HomeController@getProduct'])->where('id', '[0-9]+');

Route::group(['prefix' => 'admin',  'middleware' => 'adminAccess'], function () {
    Route::resource('/products', 'ProductsController', ['only' => [
        'index', 'store', 'update', 'destroy'
    ]]);

    Route::resource('/categories', 'CategoriesController', ['only' => [
        'store', 'destroy'
    ]]);

    Route::resource('/trash', 'TrashController', ['only' => [
        'update'
    ]]);

    Route::resource('/orders', 'AdminOrdersController', ['only' => [
        'index', 'update', 'destroy'
    ]]);

//    Route::resource('/editUser', 'UserEditController', ['only' => [
//        'index', 'update', 'destroy'
//    ]]);


});
Route::get('/editProducts', 'ProductsController@edit')->middleware('adminAccess');
Route::get('/trashProducts', 'ProductsController@trash')->middleware('adminAccess');
Route::get('/editUser', 'UserEditController@index')->middleware('adminAccess');
//Route::resource('/user', 'UserEditController', ['only' => [
//    'index', 'viewUser', 'update', 'destroy'
//    ]]);
Route::get('/viewProfile', 'UserEditController@viewUser')->middleware('auth');
Route::post('/editProfile', [ 'as' => 'user.update', 'uses' => 'UserEditController@update'])->middleware('auth');

