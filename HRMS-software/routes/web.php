<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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
// git connect

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home'])->middleware(['auth'])->name('home');
Route::get('/admin-dashboard', [HomeController::class, 'adminpage'])->middleware(['auth','admin'])->name('admin-dashboard');

//DEpartment
Route::get('/department', [DepartmentController::class, 'department'])->middleware(['auth','admin'])->name('department');
Route::post('/store-department', [DepartmentController::class, 'store_department'])->name('store-department');
Route::post('/update-department', [DepartmentController::class, 'update_department'])->name('update-department');


//designation
Route::get('/designation', [DesignationController::class, 'designation'])->name('designation');

//Employees
Route::get('/all-employee', [EmployeeController::class, 'all_employee'])->name('all-employee');
Route::get('/add-employee', [EmployeeController::class, 'add_employee'])->name('add-employee');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
