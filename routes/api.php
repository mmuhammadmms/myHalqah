<?php

use App\Http\Controllers\Api\PeopleController;
use App\Http\Controllers\Api\PeopleDataController;
use App\Http\Controllers\MohallaController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {getPeoples
    return $request->user();
});

Route::get('/peoples/getMohallas',[PeopleDataController::class , 'mohallas']);

Route::post('/peoples',[PeopleController::class,'store']);
Route::get('/peoples/getPeoples',[PeopleController::class,'index']);
Route::get('/peoples/getPeople/{people}',[PeopleController::class,'show']);
Route::put('/peoples/updatePeople/{people}',[PeopleController::class,'update']);
Route::delete('/peoples/deletePeoples/{people}',[PeopleController::class,'destroy']);
