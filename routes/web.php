<?php

use App\Http\Controllers\JournalController;
use App\Http\Controllers\ShippingController;
use Illuminate\Support\Facades\Route;

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
Route::get('/',[ShippingController::class,'index']);
Route::resource('shipping',ShippingController::class);
Route::controller(JournalController::class)->prefix('journals')->group(function(){
    Route::get('/{shippingId}/create','create')
    ->middleware('checkStatusDone')
    ->name('journals.create');

    Route::get('/{shippingId}/edit','edit')
    ->middleware('checkStatusDone')
    ->name('journals.edit');

    Route::get('/{shippingId}','index')
    ->middleware('checkStatusDone')
    ->name('journals.index');

    Route::post('/','store')
    ->name('journals.store');

    Route::put('/','update')
    ->name('journals.update');


    Route::delete('/{journalId}/destory','destory')
    ->name('journals.destory');
});
