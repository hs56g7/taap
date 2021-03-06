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

Route::get('/', 'RouteController@index')->name('home');

Route::resource('/report', 'ReportController')->only(['index', 'show']);

Route::resource('/download', 'DownloadController')->only(['show']);

// only login and password reset
Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

// 2FA routes
Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);

Route::resource('user', 'UserController')->middleware(['auth', 'twofactor'])->only(['index', 'create', 'store', 'show', 'edit', 'update']);

Route::resource('featuredReport', 'FeaturedReportController')->middleware(['auth', 'twofactor'])->only('show');

Route::resource('img', 'ImageController')->only('show');

Route::resource('about', 'AboutController')->only('index');

/**
 * Dev routes
 */
/*
Route::get('/hashPassword', 'RouteController@hash');
Route::get('/testEmail', 'RouteController@testEmail');
*/