<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransferController;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/transfer', 'App\Http\Controllers\TransferController@index');

Route::post('/send_money', 'App\Http\Controllers\TransferController@send_money');

Route::get('/history/{type}', 'App\Http\Controllers\TransferController@pageData');

Route::get('/admin', 'App\Http\Controllers\AdminController@index');

Route::get('/users/edit/{id}', 'App\Http\Controllers\AdminController@edit');

Route::post('/edit_user', 'App\Http\Controllers\AdminController@edit_user');
