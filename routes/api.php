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

        Route::get('{id}/announcement-details', 'AnnouncementDetailsController@details')->name('announcement-details');
        Route::post('create-announcement', 'CreateAnnouncementController@create')->name('create-announcement');
        Route::post('{id}/update-announcement', 'UpdateAnnouncementController@update')->name('update-announcement');
        Route::delete('{id}/delete-announcement', 'DeleteAnnouncementController@delete')->name('delete-announcement');

        Route::get('{id}/news-details', 'NewsDetailsController@details')->name('news-details');
        Route::post('create-news', 'CreateNewsController@create')->name('create-news');
        Route::post('{id}/update-news', 'UpdateNewsController@update')->name('update-news');
        Route::delete('{id}/delete-news', 'DeleteNewsController@delete')->name('delete-news');
        Route::post('{id}/update-image-news', 'UpdateNewsImageController@updateNewsImage')->name('update-image-news');


    });


    // Staff Routes
    Route::group(['prefix' => 'ITAsset', 'as' => 'ITAsset.', 'namespace' => 'ITAsset'], function () {
        Route::get('/list-it-asset', 'ListITAssetController@record')->name('list-it-asset');
        Route::post('/create-it-asset', 'CreateITAssetController@create')->name('create-it-asset');
        Route::post('/{id}/update-it-asset', 'UpdateITAssetController@update')->name('update-it-asset');
        Route::delete('/{id}/delete-it-asset', 'DeleteITAssetController@delete')->name('delete-it-asset');
        Route::post('/{id}/assign-it-asset', 'AssignITAssetController@assign')->name('assign-it-asset');
        Route::get('/{id}/{query}/search-it-asset', 'SearchITAssetController@search')->name('search-it-asset');
        Route::get('/summary/brands', 'ITAssetSummaryController@brands')->name('summary-brands');
        Route::get('/summary/category', 'ITAssetSummaryController@category')->name('summary-category');
        Route::get('/summary/locations', 'ITAssetSummaryController@locations')->name('summary-locations');
        Route::get('/summary/received', 'ITAssetSummaryController@received')->name('summary-received');

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
        Route::get('{id}/list-license/it-asset', 'ListLicensingBasedOnITAssetController@list')->name('list-license-it-asset');


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

        Route::get('/summary/status', 'IncidentReportSummaryController@status')->name('summary-status');
        Route::get('/summary/root-cause', 'IncidentReportSummaryController@root_cause')->name('summary-root-cause');
        Route::get('/summary/location', 'IncidentReportSummaryController@location')->name('summary-location');



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


        Route::post('/create-visitor-daily-health', 'VisitorDailyHealth@create')->name('create-visitor-daily-health');
        Route::post('/staff-create-visitor-daily-health', 'VisitorDailyHealth@StaffCreate')->name('staff-create-visitor-daily-health');
        Route::delete('/{companyID}/{id}/staff-delete-visitor-daily-health', 'VisitorDailyHealth@StaffDelete')->name('staff-delete-visitor-daily-health');

    });

    Route::group(['prefix' => 'dailyhealth', 'as' => 'dailyhealth.', 'namespace' => 'DailyHealth'], function () {

        Route::get('/{id}/{category}/list-visitor-daily-health', 'ListVisitorDailyHealthBasedOnLocationController@list')
            ->where('category', 'bangi|nilaiA|nilaiB')
            ->name('list-visitor-daily-health');

        Route::post('/staff-create-daily-health', 'CreateStaffDailyHealthController@create')->name('staff-create-daily-health');

        Route::get('/{companyId}/{staffId}/staff-personal-daily-health', 'ListPersonalDailyHealthController@list')->name('staff-personal-daily-health');



        Route::get('/{id}/{query}/search-visitor-daily-health', 'SearchVisitorDailyHealthController@search')->name('search-visitor-daily-health');
        Route::get('/{id}/{query}/search-staff-daily-health-by-date', 'SearchStaffDailyHealthByDateController@search')->name('search-staff-daily-health-by-date');

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

