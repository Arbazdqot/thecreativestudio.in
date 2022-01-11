<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ApiController;
use App\http\Controllers\ApiController;
Use App\Story;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// home
Route::get('home_event',        [ApiController::class,'home_event']);
Route::get('home_blog',         [ApiController::class,'home_blog']);
Route::get('home_category/{id?}',     [ApiController::class,'home_category']);
Route::get('home_video',        [ApiController::class,'home_video']);
Route::get('home_image',        [ApiController::class,'home_image']);
Route::get('home_recent_event', [ApiController::class,'home_recent_event']);
Route::post('contact_us',       [ApiController::class,'contact_us']);
Route::get('banner',           [ApiController::class,'banner']);
Route::get('team',           [ApiController::class,'team']);




// listing
Route::get('event_list',     [ApiController::class,'event_list']);






