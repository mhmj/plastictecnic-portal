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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => 'api', 'prefix' => 'v1', 'as' => 'api.'], function () {

    // Staff Routes
    Route::group(['prefix' => 'ITAsset', 'as' => 'ITAsset.', 'namespace' => 'ITAsset'], function () {
        Route::get('/list-it-asset', 'ListITAssetController@record')->name('list-it-asset');
    });

    Route::group(['prefix' => 'staff', 'as' => 'staff.', 'namespace' => 'Staff'], function () {
        Route::get('/list-staff', 'ListStaffController@record')->name('list-staff');
    });




});
