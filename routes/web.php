<?php

use App\Http\Controllers\HalqahController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\MarkazController;
use App\Http\Controllers\MohallaController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ZoneController;
use App\Models\Halqah;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('peoples',PeopleController::class);

Route::resource('states',StateController::class);
Route::resource('zones',ZoneController::class);
Route::resource('markazs',MarkazController::class);
Route::resource('halqahs',HalqahController::class);
Route::resource('mohallas',MohallaController::class);
Route::resource('houses', HouseController::class);

Route::get('{any}', function(){
    return view('/home');
})->where('any' , '.*');