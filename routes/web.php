<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MineralsController;
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
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


// Route::get('/minerals/search/{input}/{category}','App\Http\Controllers\MineralsController@search');
Route::resource('/minerals',MineralsController::class);
Route::resource('/specification',SpecificationController::class);
Route::resource('/form',FormController::class);
Route::middleware(['auth'])->controller(HomeController::class)->group(function () {
    Route::get('/account', 'account')->name('account');
    Route::post('/changepassword', 'changePassword')->name('change_password');
    Route::post('/updateAccount', 'update')->name('update_account');
    Route::delete('/deleteAccount', 'destroy')->name('delete_account');
    Route::post('/dummy', 'dummy')->name('dummy');
});
Auth::routes();
Route::get('/welcome', function () {
    return view('welcome');
}); 
Route::get('/', function () {
    return redirect('/form');
});
Route::get('/findMunicipality',[App\Http\Controllers\FormController::class, 'findMunicipality']);
Route::get('/findBarangay',[App\Http\Controllers\FormController::class, 'findBarangay']);
Route::delete('/form-id-delete/{id}',[App\Http\Controllers\FormController::class, 'destroy']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/apps', [App\Http\Controllers\HomeController::class, 'apps'])->name('apps');
// Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])->name('account');
// Route::get('/help', [App\Http\Controllers\HomeController::class, 'help'])->name('help');
