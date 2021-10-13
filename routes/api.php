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

/*Public API*/
Route::post('/login','ApiPatientAuthController@login')->name('login');



/*Protected API*/
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('/logout','ApiPatientAuthController@logout')->name('logout');
    Route::get('/patient/prescription','PatientResource\PatientResource@getPrescription')->name('getPrescription');
    Route::get('/patient/video','PatientResource\PatientResource@getVideo')->name('getVideo');
    Route::get('/patient/medicines','PatientResource\PatientResource@getMedicines')->name('getMedicines');
    Route::get('/patient/getReportofadverseevents','PatientResource\PatientResource@getReportofadverseevents')->name('getReportofadverseevents');
   	Route::get('/patient/getPrescriptionupdate','PatientResource\PatientResource@getPrescriptionupdate')->name('getPrescriptionupdate');
    Route::get('/patient/getmedicinepercentage','PatientResource\PatientResource@getmedicinepercentage')->name('getmedicinepercentage');
    Route::get('/patient/getcomplaintreport','PatientResource\PatientResource@getcomplaintreport')->name('getcomplaintreport');
    Route::resource('patient','PatientResource\PatientResource');
    Route::post('/patient/lifeStyle','PatientResource\PatientResource@lifeStyle')->name('lifeStyle');
	Route::post('/patient/updateprofile','PatientResource\PatientResource@updateprofile')->name('updateprofile');
	Route::post('/patient/report','PatientResource\PatientResource@report')->name('report');
	Route::post('/patient/misseddose','PatientResource\PatientResource@misseddose')->name('misseddose');

   
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
