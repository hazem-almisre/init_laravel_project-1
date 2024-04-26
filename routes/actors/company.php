<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyControllers\AddEmployeeController;
use App\Http\Controllers\CompanyControllers\CompanyLoginController;
use App\Http\Controllers\CompanyControllers\CreateProgramController;
use App\Http\Controllers\CompanyControllers\StationManagementControllers\AddStationController;
use App\Http\Controllers\CompanyControllers\FeaturesManagementControllers\AddFeatureController;
use App\Http\Controllers\CompanyControllers\TravelsManagementControllers\CreateTravelController;
use App\Http\Controllers\CompanyControllers\StationManagementControllers\DeleteStationController;
use App\Http\Controllers\CompanyControllers\StationManagementControllers\UpdateStationController;
use App\Http\Controllers\CompanyControllers\FeaturesManagementControllers\DeleteFeatureController;
use App\Http\Controllers\CompanyControllers\FeaturesManagementControllers\UpdateFeatureController;

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


Route::post('login',CompanyLoginController::class);


 //-------


 Route::prefix('employee')->group(function () {
    Route::post('add',AddEmployeeController::class);
});


 Route::prefix('program')->group(function () {
    Route::post('create',CreateProgramController::class);
});


Route::prefix('travel')->group(function () {
    Route::post('create',CreateTravelController::class);

});

Route::prefix('station')->group(function () {
    Route::post('add',AddStationController::class);
    Route::post('delete',DeleteStationController::class);
    Route::post('update',UpdateStationController::class);
});


Route::prefix('feature')->group(function () {
    Route::post('add',AddFeatureController::class);
    Route::post('delete',DeleteFeatureController::class);
    Route::post('update',UpdateFeatureController::class);
});