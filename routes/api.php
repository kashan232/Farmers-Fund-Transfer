<?php

use App\Http\Controllers\ProjectAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/get-districts', [ProjectAPIController::class, 'get_districts'])->name('get-districts');
Route::get('/get-tehsil', [ProjectAPIController::class, 'get_tehsil'])->name('get-tehsil');
Route::get('/get-uc', [ProjectAPIController::class, 'get_uc'])->name('get-uc');
Route::get('/get-tappa', [ProjectAPIController::class, 'get_tappa'])->name('get-tappa');

Route::post('/store-online-farmers-registration', [ProjectAPIController::class, 'store_online_farmers_registration'])->name('store-online-farmers-registration');
