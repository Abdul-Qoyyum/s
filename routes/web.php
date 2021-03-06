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

Route::view('features', 'home.features')->name('home.features');

Route::view('pricing', 'home.pricing')->name('home.pricing');

Route::view('about', 'home.about')->name('home.about');

Route::get('/backend', 'DashboardController@index')->name('dashboard.index');

Route::get('user/dashboard', 'DashboardController@user')->name('dashboard.user');


// Client route
Route::get('client/users','ClientController@users')->name('clients.all');

Route::post('client/send','ClientController@send')->name('client.send');

Route::get('client/export','ClientController@export')->name('client.export');

//client's csv export route sample
Route::get('client/sample/export','ClientController@exportClientSampleCSV')->name('client.sample');

// client's csv import route

Route::post('client/import','ClientController@import')->name('client.import');

Route::resource('client', 'ClientController');


// lead routes
Route::post('lead/send','LeadController@send')->name('lead.send');

Route::get('lead/export','LeadController@export')->name('lead.export');

// client's api route for lead
Route::get('lead/users', 'LeadController@users')->name('lead.users');

Route::post('lead/client', 'LeadController@client')->name('lead.client');

Route::resource('lead', 'LeadController');

// Jobs route

Route::get('jobs/export','TaskController@export')->name('jobs.export');

Route::resource('jobs', 'TaskController');

Route::post('jobs/client', 'TaskController@client')->name('jobs.client');

Route::patch('jobs/notes/{id}','TaskController@updateNote')->name('jobs.notes');


// Admin routes
Route::resource('user/posts', 'Admin\PostController');

Route::resource('admin/clients', 'Admin\ClientController');

Route::resource('admin/leads', 'Admin\LeadController');

Route::resource('admin/users', 'Admin\UserController');



// Invoice route
Route::resource('invoice', 'InvoiceController');

Route::get('job/{id}/invoice', 'InvoiceController@task')->name('job.invoice');

Route::patch('invoice/job/{id}', 'InvoiceController@updateTask')->name('invoice.task');

Route::get('invoice/{id}/show', 'InvoiceController@preview')->name('invoice.preview');

Route::get('invoice/{id}/download', 'InvoiceController@downloadPDF')->name('invoice.download');

Route::post('invoice/send', 'InvoiceController@send')->name('invoice.send');


// Quotes route
Route::post('quote/send','QuoteController@send')->name('quote.send');

Route::resource('quote', 'QuoteController');

Route::get('quote/{id}/invoice', 'QuoteController@task')->name('quote.invoice');

Route::patch('quote/job/{id}','QuoteController@updateTask')->name('quote.task');

Route::get('quote/{id}/show','QuoteController@preview')->name('quote.preview');

Route::get('quote/{id}/download','QuoteController@downloadPDF')->name('quote.download');



// Portal routes
Route::get('portal/contract/{id}')->name('portal.contract');

Route::get('portal/invoice/{id}')->name('portal.invoice');

Route::get('portal/questionnaire/{id}')->name('portal.questionnaire');

Route::get('portal/quote/{id}')->name('portal.quote');



// Calendar route
Route::get('calendar', 'CalendarController@index')->name('calendar.index');

// Laravel filemanager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


//  Payments route
Route::resource('payment', 'PaymentController');

//  Settings route
Route::resource('settings', 'SettingController');

Route::get('account', 'SettingController@account');

Route::get('company', 'SettingController@company');

// Route::get('editcompany/{id}', 'SettingController@editview');
Route::get('editcompany', 'SettingController@editview');

Route::post('edited/{id}', 'SettingController@editview');

// Route::view('account', 'users.settings.accountsubscription');

Route::get('user', 'SettingController@user');

Route::get('currencytaxes', 'SettingController@currencytaxes');

Route::get('emailsettings', 'SettingController@emailsettings');

Route::get('datetime', 'SettingController@datetime');

Route::get('paymentmethod', 'SettingController@paymentmethod');

Route::get('paymentschedule', 'SettingController@paymentschedule');

Route::get('productpackages', 'SettingController@productpackages');

Route::get('contact', 'SettingController@contact');

Route::get('workflows', 'SettingController@workflows');

Route::get('jobtypes', 'SettingController@jobtypes');

Route::get('emailtemplates', 'SettingController@emailtemplates');

Route::get('labels', 'SettingController@labels');

Route::get('referfriend', 'SettingController@referfriend');
