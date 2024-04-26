<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers\AddCompanyController;
use App\Http\Controllers\AdminControllers\AdminLoginController;
use App\Http\Controllers\AdminControllers\RegisterAdminController;
use App\Http\Controllers\AdminControllers\PullmanTypeManagement\AddPullmanTypeController;


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




 Route::post('login',AdminLoginController::class);
 Route::post('signup',RegisterAdminController::class);


 //-------
 Route::post('add/company',AddCompanyController::class);


 Route::prefix('pullmanType')->group(function () {
    Route::post('add',AddPullmanTypeController::class);
    // Route::post('delete',::class);
    // Route::post('update',::class);
});