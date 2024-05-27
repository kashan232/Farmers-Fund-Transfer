<?php

use App\Http\Controllers\AgricultureFarmerRegistrationController;
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
// aiman

Route::get('/', function () {
    return view('welcome');
});


// funds_transfer_gitmove       
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home'])->middleware(['auth'])->name('home');
Route::get('/admin-dashboard', [HomeController::class, 'adminpage'])->name('admin-dashboard');

//District
Route::get('/add-district', [DistrictController::class, 'add_district'])->name('add-district');
Route::post('/store-district', [DistrictController::class, 'store_district'])->name('store-district');
Route::get('/all-district', [DistrictController::class, 'all_district'])->name('all-district');
Route::get('/edit-district/{id}', [DistrictController::class, 'edit_district'])->name('edit-district');
Route::post('/update-district/{id}', [DistrictController::class, 'update_district'])->name('update-district');

 //tehsil
 Route::get('/add-tehsil', [TehsilController::class, 'add_tehsil'])->name('add-tehsil');
Route::post('/store-tehsil', [TehsilController::class, 'store_tehsil'])->name('store-tehsil');
 Route::get('/all-tehsil', [TehsilController::class, 'all_tehsil'])->name('all-tehsil');
 Route::get('/edit-tehsil/{id}', [TehsilController::class, 'edit_tehsil'])->name('edit-tehsil');
 Route::post('/update-tehsil/{id}', [TehsilController::class, 'update_tehsil'])->name('update-tehsil');
 //area
 Route::get('/add-area', [AreaController::class, 'add_area'])->name('add-area');
 Route::post('/store-area', [AreaController::class, 'store_area'])->name('store-area');
 Route::get('/all-area', [AreaController::class, 'all_area'])->name('all-area');
 Route::get('/edit-area/{id}', [AreaController::class, 'edit_area'])->name('edit-area');
 Route::post('/update-area/{id}', [AreaController::class, 'update_area'])->name('update-area');
 
 //tappa
 Route::get('/add-tappa', [TappaController::class, 'add_tappa'])->name('add-tappa');
 Route::post('/store-tappa', [TappaController::class, 'store_tappa'])->name('store-tappa');
 Route::get('/all-tappa', [TappaController::class, 'all_tappa'])->name('all-tappa');
 //Agriculture office
 
 Route::get('/agri-officer-create', [AgricultureOfficerController::class, 'agri_officer_create'])->middleware(['auth','admin'])->name('agri-officer-create');
 Route::post('/store-agri-officer', [AgricultureOfficerController::class, 'store_agri_officer'])->name('store-agri-officer');
 Route::get('/all-agri-officer', [AgricultureOfficerController::class, 'all_agri_officer'])->middleware(['auth','admin'])->name('all-agri-officer');

 //Land Revenue Department
 Route::get('/add-revenue-officer', [LandRevenueController::class, 'add_revenue_officer'])->name('add-revenue-officer');
 Route::post('/store-revenue-officer', [LandRevenueController::class, 'store_revenue_officer'])->name('store-revenue-officer');
 Route::get('/all-revenue-officer', [LandRevenueController::class, 'all_revenue_officer'])->middleware(['auth','admin'])->name('all-revenue-officer');
 

 // agriculture department panel
 Route::get('/add-agri-farmers', [AgricultureFarmerRegistrationController::class, 'add_agri_farmers'])->name('add-agri-farmers');
 Route::post('/store-agri-farmers', [AgricultureFarmerRegistrationController::class, 'store_agri_farmers'])->name('store-agri-farmers');
 Route::get('/all-agri-farmers', [AgricultureFarmerRegistrationController::class, 'all_agri_farmers'])->name('all-agri-farmers');


//Land Revenue PAnel
//  All Screens
 Route::get('/Agriculture-Farmers', [AgricultureFarmerRegistrationController::class, 'Agriculture_Farmers'])->name('Agriculture-Farmers');
 Route::get('/Land-Revenue-Farmers', [AgricultureFarmerRegistrationController::class, 'Land_Revenue_Farmers'])->name('Land-Revenue-Farmers');
 Route::get('/Online-Farmers', [AgricultureFarmerRegistrationController::class, 'Online_Farmers'])->name('Online-Farmers');
 Route::get('/land-approve-listing', [AgricultureFarmerRegistrationController::class, 'land_approve_listing'])->name('land-approve-listing');
 Route::get('/verify-listing', [AgricultureFarmerRegistrationController::class, 'verify_listing'])->name('verify-listing');
 Route::get('/unverify-listing', [AgricultureFarmerRegistrationController::class, 'unverify_listing'])->name('unverify-listing');
 Route::get('/Verify-screen', [AgricultureFarmerRegistrationController::class, 'Verify_screen'])->name('Verify-screen');
 Route::get('/report', [AgricultureFarmerRegistrationController::class, 'report'])->name('report');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';
