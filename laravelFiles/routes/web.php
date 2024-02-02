<?php

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

Route::get('/', [PageLoader::class,'index']);
Route::post("upload-data-exe",[DataController::class,'upload']);

Route::get("/reset-channels",[PageLoader::class,'reset']);
Route::get("/see-titles/{channelId}",[PageLoader::class,'see_titles']);