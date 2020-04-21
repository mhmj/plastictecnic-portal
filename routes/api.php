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
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'namespace' => 'Dashboard'], function () {
        Route::get('/list-announcement', 'ListAnnouncementController@list')->name('list-announcement');
        Route::get('/list-news', 'ListNewsController@list')->name('list-news');
    });


    // Staff Routes
    Route::group(['prefix' => 'ITAsset', 'as' => 'ITAsset.', 'namespace' => 'ITAsset'], function () {
        Route::get('/list-it-asset', 'ListITAssetController@record')->name('list-it-asset');
        Route::post('/create-it-asset', 'CreateITAssetController@create')->name('create-it-asset');
        Route::post('/{id}/update-it-asset', 'UpdateITAssetController@update')->name('update-it-asset');
        Route::delete('/{id}/delete-it-asset', 'DeleteITAssetController@delete')->name('delete-it-asset');
        Route::post('/{id}/assign-it-asset', 'AssignITAssetController@assign')->name('assign-it-asset');
        Route::get('/{id}/{query}/search-it-asset', 'SearchITAssetController@search')->name('search-it-asset');

        Route::get('/{id}/{category}/list-it-asset', 'ListAssetBasedOnLocationController@list')
            ->where('category', 'bangi|nilaiA|nilaiB')
            ->name('list-it-asset-location');


        Route::group(['prefix' => 'staff', 'as' => 'staff.', 'namespace' => 'Staff'], function () {
            Route::get('/staff-list-it-asset/{id}', 'ListITAssetController@record')->name('staff-list-it-asset');

        });
    });

    Route::group(['prefix' => 'license', 'as' => 'license.', 'namespace' => 'Licensing'], function () {
        Route::post('/create-license', 'CreateLicensingController@create')->name('create-license');
        Route::post('/{id}/update-license', 'UpdateLicensingController@update')->name('update-license');
        Route::delete('/{id}/delete-license', 'DeleteLicensingController@delete')->name('delete-license');
        Route::get('/{id}/{query}/search-license', 'SearchLicensingController@search')->name('search-license');


        Route::get('/{id}/{category}/list-license', 'ListLicensingBasedOnLocationController@list')
            ->where('category', 'bangi|nilaiA|nilaiB')
            ->name('list-license-location');
    });

    Route::group(['prefix' => 'staff', 'as' => 'staff.', 'namespace' => 'Staff'], function () {
        Route::get('/list-staff', 'ListStaffController@record')->name('list-staff');
        Route::post('/create-staff', 'CreateStaffController@create')->name('create-staff');
        Route::post('/{id}/update-staff', 'UpdateStaffController@update')->name('update-staff');
        Route::delete('/{id}/delete-staff', 'DeleteStaffController@delete')->name('delete-staff');
        Route::get('/{id}/{query}/search-staff', 'SearchStaffController@search')->name('search-staff');


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

        Route::group(['prefix' => 'staff', 'as' => 'staff.', 'namespace' => 'Staff'], function () {
            Route::get('/staff-list-incident-report/{id}', 'ListIncidentReportController@record')->name('staff-list-incident-report');

        });
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Common'], function () {

        Route::get('/{id}', 'ProfileDetailsController@profile')->name('profile');
        Route::get('/{id}/{new_password}/change-password', 'ProfileDetailsController@changePassword')->name('change-password-profile');

    });

    Route::get('/check-password/{id}/{password}','DropdownController@checkpassword');
    Route::get('/getCompany', 'DropdownController@getCompany');
    Route::get('/getCompany', 'DropdownController@getCompany');
    Route::get('/getCompanyDetails/{id}', 'DropdownController@getCompanyDetails');


    Route::get('/getDepartment', 'DropdownController@getDepartment');
    Route::get('/getDepartmentDetails/{id}', 'DropdownController@getDepartmentDetails');

    Route::get('/getDesignation', 'DropdownController@getDesignation');
    Route::get('/getDesignationDetails/{id}', 'DropdownController@getDesignationDetails');

    Route::get('/getStaff', 'DropdownController@getStaff');
    Route::get('/getStaffDetails/{id}', 'DropdownController@getStaffDetails');
    Route::get('/getStaffByLocation/{id}', 'DropdownController@getStaffByLocation');
    Route::get('/getITStaff/{id}', 'DropdownController@getITStaff');


    Route::get('/getITAssetCategory', 'DropdownController@getITAssetCategory');
    Route::get('/getITAssetCategoryDetails/{id}', 'DropdownController@getITAssetCategoryDetails');

    Route::get('/getITAssetBrand', 'DropdownController@getITAssetBrand');
    Route::get('/getITAssetBrandDetails/{id}', 'DropdownController@getITAssetBrandDetails');

    Route::get('/getITAsset', 'DropdownController@getITAsset');
    Route::get('/getITAssetDetails/{id}', 'DropdownController@getITAssetDetails');
    Route::get('/getITAssetByLocation/{id}', 'DropdownController@getITAssetByLocation');

});

