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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function() {
//    return view('pages.dashboard');
//})->name('dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/ITAsset', 'HomeController@ITAsset')->name('ITAsset');
Route::get('/Staff', 'HomeController@Staff')->name('Staff');
Route::get('/IncidentReport', 'HomeController@IncidentReport')->name('IncidentReport');
Route::get('/ITOperation', 'HomeController@ITOperation')->name('ITOperation');
