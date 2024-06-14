<?php

use App\Http\Controllers\AgricultureFarmerRegistrationController;
use App\Http\Controllers\AgricultureOfficerController;
use App\Http\Controllers\AgricultureUserController;
use App\Http\Controllers\AgricultureUserFarmersController;
use App\Http\Controllers\AgriUserController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandRevenueController;
use App\Http\Controllers\LandRevenueFarmerController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TappaController;
use App\Http\Controllers\TehsilController;
use App\Http\Controllers\UCController;
use App\Models\AgricultureOfficer;
use App\Models\District;
use App\Models\LeaveRequest;
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

//UC
Route::get('/add-uc', [UCController::class, 'add_uc'])->name('add-uc');
Route::post('/store-uc', [UCController::class, 'store_uc'])->name('store-uc');
Route::get('/all-uc', [UCController::class, 'all_uc'])->name('all-uc');
Route::get('/get-tehsils', [UCController::class, 'getTehsils'])->name('get-tehsils');
Route::get('/get-ucs', [UCController::class, 'get_ucs'])->name('get-ucs');

//User
Route::get('/add-user', [AgriUserController::class, 'add_user'])->name('add-user');
Route::post('/store-user', [AgriUserController::class, 'store_user'])->name('store-user');
Route::get('/all-user', [AgriUserController::class, 'all_user'])->name('all-user');

//Agriculture office

Route::get('/agri-officer-create', [AgricultureOfficerController::class, 'agri_officer_create'])->middleware(['auth', 'admin'])->name('agri-officer-create');
Route::post('/store-agri-officer', [AgricultureOfficerController::class, 'store_agri_officer'])->name('store-agri-officer');
Route::get('/all-agri-officer', [AgricultureOfficerController::class, 'all_agri_officer'])->middleware(['auth', 'admin'])->name('all-agri-officer');

//Land Revenue Department
Route::get('/add-revenue-officer', [LandRevenueController::class, 'add_revenue_officer'])->name('add-revenue-officer');
Route::post('/store-revenue-officer', [LandRevenueController::class, 'store_revenue_officer'])->name('store-revenue-officer');
Route::get('/all-revenue-officer', [LandRevenueController::class, 'all_revenue_officer'])->middleware(['auth', 'admin'])->name('all-revenue-officer');

//Land Revenue Department verify agriculture farmers
Route::get('/all-agri-farmers-by-land', [LandRevenueController::class, 'all_agri_farmers_by_land'])->name('all-agri-farmers-by-land');
Route::get('/unverify-agri-farmers-by-land', [LandRevenueController::class, 'unverify_agri_farmers_by_land'])->name('unverify-agri-farmers-by-land');
Route::get('/verify-agri-farmers-by-land', [LandRevenueController::class, 'verify_agri_farmers_by_land'])->name('verify-agri-farmers-by-land');

Route::post('/verify-unverify-agri-farmers-by-land', [LandRevenueController::class, 'verify_unverify_agri_farmers_by_land'])->name('verify-unverify-agri-farmers-by-land');

Route::get('/add-land-farmers', [LandRevenueFarmerController::class, 'add_land_farmers'])->name('add-land-farmers');
Route::post('/store-land-farmers', [LandRevenueFarmerController::class, 'store_land_farmers'])->name('store-land-farmers');
Route::get('/all-land-farmers', [LandRevenueFarmerController::class, 'all_land_farmers'])->name('all-land-farmers');
Route::get('/view-land-farmers/{id}', [LandRevenueFarmerController::class, 'view_land_farmers'])->name('view-land-farmers');
Route::get('/edit-land-farmers/{id}', [LandRevenueFarmerController::class, 'edit_land_farmers'])->name('edit-land-farmers');
Route::post('/update-land-farmers/{id}', [LandRevenueFarmerController::class, 'update_land_farmers'])->name('update-land-farmers');

Route::get('/unverify-farmers-by-land', [LandRevenueController::class, 'unverify_farmers_by_land'])->name('unverify-farmers-by-land');
Route::get('/verify-farmers-by-land', [LandRevenueController::class, 'verify_farmers_by_land'])->name('verify-farmers-by-land');
Route::get('/verifications-land-farmers', [LandRevenueController::class, 'verifications_land_farmers'])->name('verifications-land-farmers');

Route::post('/verify-unverify-land-farmers', [LandRevenueController::class, 'verify_unverify_land_farmers'])->name('verify-unverify-land-farmers');


// agriculture department panel
Route::get('/add-agri-farmers', [AgricultureFarmerRegistrationController::class, 'add_agri_farmers'])->name('add-agri-farmers');
Route::post('/store-agri-farmers', [AgricultureFarmerRegistrationController::class, 'store_agri_farmers'])->name('store-agri-farmers');
Route::get('/all-agri-farmers', [AgricultureFarmerRegistrationController::class, 'all_agri_farmers'])->name('all-agri-farmers');
Route::get('/view-agri-farmers/{id}', [AgricultureFarmerRegistrationController::class, 'view_agri_farmers'])->name('view-agri-farmers');
Route::get('/edit-agri-farmers/{id}', [AgricultureFarmerRegistrationController::class, 'edit_agri_farmers'])->name('edit-agri-farmers');
Route::post('/update-agri-farmers/{id}', [AgricultureFarmerRegistrationController::class, 'update_agri_farmers'])->name('update-agri-farmers');

Route::get('/agri-unverify-farmers', [AgricultureFarmerRegistrationController::class, 'agri_unverify_farmers'])->name('agri-unverify-farmers');
Route::get('/agri-verify-farmers', [AgricultureFarmerRegistrationController::class, 'agri_verify_farmers'])->name('agri-verify-farmers');

// AgricultureUser
Route::get('/add-agriuser-farmers', [AgricultureUserFarmersController::class, 'add_agriuser_farmers'])->name('add-agriuser-farmers');
Route::post('/store-agriuser-farmers', [AgricultureUserFarmersController::class, 'store_agriuser_farmers'])->name('store-agriuser-farmers');
Route::get('/all-agriuser-farmers', [AgricultureUserFarmersController::class, 'all_agriuser_farmers'])->name('all-agriuser-farmers');
Route::get('/view-agriuser-farmers/{id}', [AgricultureUserFarmersController::class, 'view_agriuser_farmers'])->name('view-agriuser-farmers');


//Land Revenue Department verify agriculture farmers
Route::get('/all-agriuser-farmers-by-land', [LandRevenueController::class, 'all_agriuser_farmers_by_land'])->name('all-agriuser-farmers-by-land');
Route::get('/unverify-agriuser-farmers-by-land', [LandRevenueController::class, 'unverify_agriuser_farmers_by_land'])->name('unverify-agriuser-farmers-by-land');
Route::get('/verify-agriuser-farmers-by-land', [LandRevenueController::class, 'verify_agriuser_farmers_by_land'])->name('verify-agriuser-farmers-by-land');

Route::post('/verify-unverify-agriuser-farmers-by-land', [LandRevenueController::class, 'verify_unverify_agriuser_farmers_by_land'])->name('verify-unverify-agriuser-farmers-by-land');


//Land Revenue PAnel
//  All Screens

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
