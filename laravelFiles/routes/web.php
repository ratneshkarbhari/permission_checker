<?php

use App\Http\Controllers\Titles;
use App\Http\Controllers\Channels;
use App\Http\Controllers\PageLoader;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\DataController;
use App\Http\Controllers\Managers;
use PhpOffice\PhpSpreadsheet\Worksheet\PageBreak;

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
    Route::get("logout",[Authentication::class,'logout']);

    Route::group(['middleware' => ['check_user_auth']], function () {
        Route::get("/see-titles/{channelId}",[PageLoader::class,'see_titles']);
    });

    


    Route::group(['middleware' => ['check_admin_auth']], function () {

        Route::get('upload-monthly-data', [PageLoader::class,'upload_monthly_data']);
    
        Route::post("upload-data-exe",[DataController::class,'upload']);
    
        Route::get("manage-channels",[PageLoader::class,'manage_channels']);
    
        Route::get("manage-managers",[PageLoader::class,'manage_managers']);
    
        Route::get("manage-titles",[PageLoader::class,'manage_titles']);

        Route::get("edit-title/{id}",[PageLoader::class,'edit_title']);

        Route::post("update-title-exe",[Titles::class,'update']);

        Route::get("add-new-title",[PageLoader::class,'add_new_title']);
   
        Route::post("create-title-exe",[Titles::class,'create']);

        Route::get("add-new-channel",[PageLoader::class,'add_new_channel']);
      
        Route::post("create-new-channel-exe",[Channels::class,'create']);

        Route::get("edit-channel/{id}",[PageLoader::class,'edit_channel']);

        Route::post("update-channel-exe",[Channels::class,'update']);
        
        Route::get("edit-manager/{id}",[PageLoader::class,'edit_manager']);

        Route::get("add-new-manager",[PageLoader::class,'add_new_manager']);

        Route::post("create-manager-exe",[Managers::class,'create']);

    });


});
