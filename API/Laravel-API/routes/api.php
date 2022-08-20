<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\DBController;
use App\Http\Controllers\MemberController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


});

//      Make First Simplest API
// Route::get("getData", [ApiController::class, 'getdata']);


// Route::get("lists", [DBController::class, 'list']);

//      Get API with Parameter
// Route::get("lists/{id}", [DBController::class, 'listparam']);

//      Post API
Route::post("adds", [DBController::class, 'post']);

//      PUT API
Route::put("updatedata", [DBController::class, 'update']);
//   Search data in database using API in LARAVEL
Route::get("searchdata/{name}", [DBController::class, 'search']);

//  Delete Data using API in LARAVEL
Route::delete("deletedata/{id}", [DBController::class, 'delete']);

// Validation API
Route::post("validate", [DBController::class, 'validator']);


Route::Resource("resource", MemberController::class);
