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

//   Route::middleware('auth:api')->get('/user', function (Request $request) {
//       return $request->user();
//   });


//************Patients api */
Route::get('patients', 'PatientController@index');
Route::get('adminpatients', 'PatientController@adminindex');

Route::get('patient/{id}', 'PatientController@show');
Route::post('patient', 'PatientController@store');
Route::put('patient', 'PatientController@store');
Route::delete('patient/{id}', 'PatientController@destroy');

//*****************Districts api */
Route::get('/districts', 'DistrictController@index');
Route::get('/admindistricts', 'DistrictController@adminindex');

Route::get('district/{id}', 'DistrictController@show');
Route::post('district', 'DistrictController@store');
Route::put('district', 'DistrictController@store');
Route::delete('district/{id}', 'DistrictController@destroy');


Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});