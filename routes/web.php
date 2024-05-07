<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TehsilController;
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
Route::get('/all-district', [DistrictController::class, 'all_district'])->middleware(['auth','admin'])->name('all-district');
// Route::post('/store-department', [DepartmentController::class, 'store_department'])->name('store-department');
 //Route::post('/update-department', [DepartmentController::class, 'update_department'])->name('update-department');

 //tehsil
 Route::get('/add-tehsil', [TehsilController::class, 'add_tehsil'])->middleware(['auth','admin'])->name('add-tehsil');
 Route::get('/all-tehsil', [TehsilController::class, 'all_tehsil'])->middleware(['auth','admin'])->name('all-tehsil');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
