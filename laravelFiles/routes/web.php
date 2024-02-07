<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\PageLoader;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['middleware' => ['ip_checker']], function () {
    Route::post("user-login-exe",[Authentication::class,'user_login']);

    Route::get("/",[PageLoader::class,'user_dashboard']);
    Route::get("user-login",[PageLoader::class,'user_login']);
    
    Route::get('upload-monthly-data', [PageLoader::class,'upload_monthly_data']);
    Route::post("upload-data-exe",[DataController::class,'upload']);
    
    Route::get("/reset-channels",[PageLoader::class,'reset']);
    Route::get("/see-titles/{channelId}",[PageLoader::class,'see_titles']);
    
    Route::get("import-managers",[DataController::class,'channel_managers_import']);
    
    Route::get("logout",[Authentication::class,'logout']);
    
    Route::get("set-password",[Authentication::class,'set_password']);
});
