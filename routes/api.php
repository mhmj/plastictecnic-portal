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
        Route::post('/create-it-asset', 'CreateITAssetController@create')->name('create-it-asset');
        Route::post('/{id}/update-it-asset', 'UpdateITAssetController@update')->name('update-it-asset');
        Route::delete('/{id}/delete-it-asset', 'DeleteITAssetController@delete')->name('delete-it-asset');
        Route::post('/{id}/assign-it-asset', 'AssignITAssetController@assign')->name('assign-it-asset');

        Route::get('/{id}/{category}/list-it-asset', 'ListAssetBasedOnLocationController@list')
            ->where('category', 'bangi|nilaiA|nilaiB')
            ->name('list-it-asset-location');

    });

    Route::group(['prefix' => 'staff', 'as' => 'staff.', 'namespace' => 'Staff'], function () {
        Route::get('/list-staff', 'ListStaffController@record')->name('list-staff');
        Route::post('/create-staff', 'CreateStaffController@create')->name('create-staff');
        Route::post('/{id}/update-staff', 'UpdateStaffController@update')->name('update-staff');
        Route::delete('/{id}/delete-staff', 'DeleteStaffController@delete')->name('delete-staff');

        Route::get('/{id}/{category}/list-staff', 'ListStaffLocationController@list')
            ->where('category', 'bangi|nilaiA|nilaiB|goodhart')
            ->name('list-staff-location');
    });

    Route::group(['prefix' => 'IncidentReport', 'as' => 'IncidentReport.', 'namespace' => 'IncidentReport'], function () {

        Route::post('/create-incident-report', 'CreateIncidentReportController@create')->name('create-incident-report');
        Route::post('/{id}/update-incident-report', 'UpdateIncidentReportController@update')->name('update-incident-report');
        Route::delete('/{id}/delete-incident-report', 'DeleteIncidentReportController@delete')->name('delete-incident-report');
        Route::get('/{id}/{category}/list-incident-report', 'ListIncidentReportLocationController@list')
            ->where('category', 'bangi|nilaiA|nilaiB')
            ->name('list-incident-report-location');
    });

    Route::get('/getCompany', 'DropdownController@getCompany');
    Route::get('/getCompanyDetails/{id}', 'DropdownController@getCompanyDetails');
    Route::get('/getDepartment', 'DropdownController@getDepartment');
    Route::get('/getDepartmentDetails/{id}', 'DropdownController@getDepartmentDetails');
    Route::get('/getDesignation', 'DropdownController@getDesignation');
    Route::get('/getDesignationDetails/{id}', 'DropdownController@getDesignationDetails');
    Route::get('/getStaff', 'DropdownController@getStaff');
    Route::get('/getStaffDetails/{id}', 'DropdownController@getStaffDetails');
    Route::get('/getITAssetCategory', 'DropdownController@getITAssetCategory');
    Route::get('/getITAssetBrand', 'DropdownController@getITAssetBrand');
    Route::get('/getITAsset', 'DropdownController@getITAsset');
    Route::get('/getITAssetDetails/{id}', 'DropdownController@getITAssetDetails');
    Route::get('/getITStaff/{id}', 'DropdownController@getITStaff');
    Route::get('/getStaffByLocation/{id}', 'DropdownController@getStaffByLocation');
    Route::get('/getITAssetByLocation/{id}', 'DropdownController@getITAssetByLocation');
});

