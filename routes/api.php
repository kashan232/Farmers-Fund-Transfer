<?php

use App\Http\Controllers\ProjectAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FieldOfficerPanelController;
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

Route::post('/login-api', [ProjectAPIController::class, 'login_api'])->name('login-api');


Route::get('/get-districts', [ProjectAPIController::class, 'get_districts'])->name('get-districts');
Route::get('/get-tehsil', [ProjectAPIController::class, 'get_tehsil'])->name('get-tehsil');
Route::get('/get-uc', [ProjectAPIController::class, 'get_uc'])->name('get-uc');
Route::get('/get-tappa', [ProjectAPIController::class, 'get_tappa'])->name('get-tappa');

Route::post('/app-login', [ProjectAPIController::class, 'app_login'])->name('app-login');



Route::post('/farmer-store',[ProjectAPIController::class,'store_farmer']);



Route::get('/farmers/{search?}',[ProjectAPIController::class,'get_farmer']);



Route::get('/dashboard/data/{user_id}',[ProjectAPIController::class,'dashboard_data']);





// Route::post('/api-store-online-farmers-registration', [ProjectAPIController::class, 'api_store_online_farmers_registration'])->name('api-store-online-farmers-registration');

