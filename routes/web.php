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
})->name('login');

Route::get('/visitor/bangi', function () {
    return view('visitor.visitor_bangi');
})->name('visitor-bangi');

Route::get('/visitor/nilai-A', function () {
    return view('visitor.visitor_nilai_A');
})->name('visitor-nilai-A');

Route::get('/visitor/nilai-B', function () {
    return view('visitor.visitor_nilai_B');
})->name('visitor-nilai-B');

//Route::get('/dashboard', function() {
//    return view('pages.dashboard');
//})->name('dashboard');

Auth::routes();

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/ITOperation', 'HomeController@ITOperation')->name('ITOperation');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/daily-health', 'HomeController@DailyHealth')->name('daily-health');
//Route::get('/daily-health', 'HomeController@daily_health')->name('daily-health');

Route::group(['middleware' => 'Staff'], function(){

    Route::get('/Staff-ITAsset', 'StaffPageController@StaffITAsset')->name('Staff-ITAsset');
    Route::get('/Staff-Incident-Report', 'StaffPageController@StaffIncidentReport')->name('Staff-Incident-Report');
    Route::get('/Staff-List-Staff', 'StaffPageController@StaffListStaff')->name('Staff-List-Staff');

});

Route::group(['middleware' => 'ITStaff'], function(){

    Route::get('/IT-ITAsset', 'ITStaffPageController@ITStaffITAsset')->name('IT-ITAsset');
    Route::get('/IT-Staff', 'ITStaffPageController@ITStaffStaff')->name('IT-Staff');
    Route::get('/IT-IncidentReport', 'ITStaffPageController@ITStaffIncidentReport')->name('IT-IncidentReport');
    Route::get('/IT-License', 'ITStaffPageController@ITStaffLicense')->name('IT-License');

    Route::get('/IT-list-daily-health', 'ITStaffPageController@ITDaily_health')->name('IT-list-daily-health');


    Route::get('/import-staff', 'ImportStaffController@index');
    Route::post('/uploadFile', 'ImportStaffController@uploadFile');
    Route::get('/import-it-asset', 'ImportITAssetController@index');
    Route::post('/uploadFile-it-asset', 'ImportITAssetController@uploadFile');

});

Route::group(['middleware' => 'HRStaff'], function(){

    Route::get('/HR-Staff-ITAsset', 'HRStaffPageController@HRStaffITAsset')->name('HR-Staff-ITAsset');
    Route::get('/HR-Staff-Incident-Report', 'HRStaffPageController@HRStaffIncidentReport')->name('HR-Staff-Incident-Report');
    Route::get('/HR-Staff-List-Staff', 'HRStaffPageController@HRStaffListStaff')->name('HR-Staff-List-Staff');
    Route::get('/HR-list-daily-health', 'HRStaffPageController@HRDaily_health')->name('HR-list-daily-health');

});