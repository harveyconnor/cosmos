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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('main');
})->name('dashboard');

Route::get('/auth/google', 'Auth\GoogleController@redirectToProvider')->name('auth.google');
Route::get('/auth/google/callback', 'Auth\GoogleController@handleProviderCallback');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/bills', 'BillController@index')->name('bills.index');