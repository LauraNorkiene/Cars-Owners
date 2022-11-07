<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ShortCodeController;
use App\Models\Car;
use App\Http\Controllers\OwnerController;
use App\Models\Owner;
use App\Models\Image;
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

Route::get('cars', [CarController::class, 'index'])->name('cars.index');

Route::middleware(['auth','code','role'])->group(function () {
  Route::resource('cars', CarController::class)->except(['index']);
  Route::post('/owners/{id}/addCar',[OwnerController::class,'addCar'])->name('owners.addCar');
  Route::resource('owners', OwnerController::class);
  Route::resource('short_codes', ShortCodeController::class);
});

Route::get('/', function () {
    return view('welcome');

});


Route::get('/image/{name}',[CarController::class, 'display'])
    ->name('image.cars')
    ->middleware('auth');
Route::resource('images', ImageController::class);
Route::get('setLang/{lang}', [LangController::class, 'setLang'])->name('setLang');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('cars');
Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
