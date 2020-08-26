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

Route::get('/backend','DashboardController@index')->name('dashboard.index');

Route::get('user/dashboard', 'DashboardController@user')->name('dashboard.user');

Route::resource('client', 'ClientController');

Route::resource('lead','LeadController');

Route::post('lead/client','LeadController@client')->name('lead.client');

Route::resource('jobs','TaskController');

Route::post('jobs/client','TaskController@client')->name('jobs.client');

Route::get('job/invoice/{id}','TaskController@invoice')->name('task.invoice');

// Admin routes
Route::resource('user/posts', 'Admin\PostController');

Route::resource('admin/clients','Admin\ClientController');

Route::resource('admin/leads', 'Admin\LeadController');

Route::resource('admin/users','Admin\UserController');



Route::resource('invoice', 'InvoiceController');

Route::get('calendar','CalendarController@index')->name('calendar.index');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
