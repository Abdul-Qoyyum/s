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


Route::view('/', 'home.index');

Auth::routes();

Route::view('features','home.features')->name('home.features');

Route::view('pricing','home.pricing')->name('home.pricing');

Route::view('about', 'home.about')->name('home.about');

Route::get('dashboard','DashboardController@index')->name('dashboard.index');
