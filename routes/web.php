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

Auth::routes();
Route::get('/', 'Auth\RegisterController@showRegistrationForm');
Route::get('/thankYou', 'HomeController@index');
Route::get('/admin', 'Auth\LoginController@showLoginForm');


Route::group(['prefix' => 'admin'], function() {
    Route::get('dashboard', 'admin\DashboardController@index');
    Route::get('logout', 'admin\DashboardController@logout');

    Route::get('user/bulk-upload', 'admin\UserController@bulkUpload');
    Route::resource('user', 'admin\UserController');
    Route::get('user-data', 'admin\UserController@userData');
    Route::post('export', 'admin\UserController@exportCsv');

    Route::resource('campaign', 'admin\CampaignController');
    Route::get('campaign-data', 'admin\CampaignController@campaignData');

});