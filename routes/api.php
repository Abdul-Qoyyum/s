<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('{slug}/posts', 'Api\PostController@getUserPosts');

// Route::apiResources([
//     'posts' => 'Api\PostController',
// ]);


Route::get('/package','Api\PackageController@getAllPackage')->name('package.all');

Route::get('/contract','Api\ContractController@getAllContract')->name('contract.all');

Route::get('/email/templates','Api\EmailTemplateController@index')->name('template.all');
