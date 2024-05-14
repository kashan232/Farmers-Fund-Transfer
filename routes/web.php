<?php

use App\Http\Controllers\AgricultureOfficerController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandRevenueController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TappaController;
use App\Http\Controllers\TehsilController;
use App\Models\District;
use App\Models\LeaveRequest;
use Illuminate\Support\Facades\Route;

/*
// ap naraz he?? Aiman Here
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// git connect

Route::get('/', function () {
    return view('welcome');
});

// funds_transfer_gitmove
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home'])->middleware(['auth'])->name('home');
Route::get('/admin-dashboard', [HomeController::class, 'adminpage'])->middleware(['auth','admin'])->name('admin-dashboard');

//District
Route::get('/add-district', [DistrictController::class, 'add_district'])->middleware(['auth','admin'])->name('add-district');
Route::post('/store-district', [DistrictController::class, 'store_district'])->name('store-district');
Route::get('/all-district', [DistrictController::class, 'all_district'])->middleware(['auth','admin'])->name('all-district');
Route::get('/edit-district/{id}', [DistrictController::class, 'edit_district'])->middleware(['auth','admin'])->name('edit-district');
Route::post('/update-district/{id}', [DistrictController::class, 'update_district'])->name('update-district');

 //tehsil
 Route::get('/add-tehsil', [TehsilController::class, 'add_tehsil'])->middleware(['auth','admin'])->name('add-tehsil');
Route::post('/store-tehsil', [TehsilController::class, 'store_tehsil'])->name('store-tehsil');
 Route::get('/all-tehsil', [TehsilController::class, 'all_tehsil'])->middleware(['auth','admin'])->name('all-tehsil');
 Route::get('/edit-tehsil/{id}', [TehsilController::class, 'edit_tehsil'])->middleware(['auth','admin'])->name('edit-tehsil');
 Route::post('/update-tehsil/{id}', [TehsilController::class, 'update_tehsil'])->name('update-tehsil');

 //area
 Route::get('/add-area', [AreaController::class, 'add_area'])->middleware(['auth','admin'])->name('add-area');
 Route::post('/store-area', [AreaController::class, 'store_area'])->name('store-area');
 Route::get('/all-area', [AreaController::class, 'all_area'])->middleware(['auth','admin'])->name('all-area');
 Route::get('/edit-area/{id}', [AreaController::class, 'edit_area'])->middleware(['auth','admin'])->name('edit-area');
 Route::post('/update-area/{id}', [AreaController::class, 'update_area'])->name('update-area');
 
 //tappa
 Route::get('/add-tappa', [TappaController::class, 'add_tappa'])->middleware(['auth','admin'])->name('add-tappa');
 Route::post('/store-tappa', [TappaController::class, 'store_tappa'])->name('store-tappa');
 Route::get('/all-tappa', [TappaController::class, 'all_tappa'])->middleware(['auth','admin'])->name('all-tappa');

 Route::get('/agri-officer-create', [AgricultureOfficerController::class, 'agri_officer_create'])->middleware(['auth','admin'])->name('agri-officer-create');
 Route::get('/store-agri-officer', [AgricultureOfficerController::class, 'store_agri_officer'])->name('store-agri-officer');

 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';
