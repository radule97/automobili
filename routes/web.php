<?php

use Illuminate\Support\Facades\Auth;
//use Illuminate\Routing\Route;

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
    $user = Auth::user();
    return view('welcome', compact('user'));
    //return Auth::logout();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/cars', 'CarController');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', 'AdminController@index');

Route::post('/admin', 'AdminController@store');

Route::get('/admin/make-category', 'AdminController@makeCategory');

Route::post('/admin/allow', 'AdminController@allowCar');

Route::post('/admin/delete', 'AdminController@deleteCar');

/*Route::get('/test', function () {
    return view('cars.create');
});*/