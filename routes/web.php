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
use App\Http\Controllers\ReportingController;
use App\Http\Controllers\TappaController;
use App\Http\Controllers\TehsilController;
use App\Http\Controllers\UCController;
use App\Http\Controllers\DistrictOfficerController;

use App\Http\Controllers\OnlineFormController;

use App\Http\Controllers\CallerUserController;
use App\Http\Controllers\DistrictOfficerPanelController;


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

Route::get('/', function () {
    return view('welcome');
});

// Azhar connected

// funds_transfer_gitmove
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/online-login-form', [OnlineFormController::class, 'index'])->middleware(['guest'])->name('online-login-form');
Route::post('/online-login', [OnlineFormController::class, 'authenticate'])->name('online-login');
Route::get('/online-dashboard-logout', [OnlineFormController::class, 'logout'])->name('online-dashboard-logout');
Route::get('/home', [HomeController::class, 'home'])->middleware(['auth'])->name('home');


Route::post('/store-online-farmers-registration', [OnlineFormController::class, 'store_online_farmers_registration'])->name('store-online-farmers-registration');


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

Route::get('/edit-user/{id}', [AgriUserController::class, 'edit_user'])->name('edit-user');

Route::get('/farmers', [HomeController::class, 'farmers'])->name('farmers');
Route::get('/veirfyfarmers', [HomeController::class, 'veirfyfarmers'])->name('veirfyfarmers');
Route::get('/unvieryfarmers', [HomeController::class, 'unvieryfarmers'])->name('unvieryfarmers');


//Agriculture office

Route::get('/agri-officer-create', [AgricultureOfficerController::class, 'agri_officer_create'])->middleware(['auth', 'admin'])->name('agri-officer-create');
Route::post('/store-agri-officer', [AgricultureOfficerController::class, 'store_agri_officer'])->name('store-agri-officer');
Route::get('/all-agri-officer', [AgricultureOfficerController::class, 'all_agri_officer'])->middleware(['auth', 'admin'])->name('all-agri-officer');
Route::get('/agri-officer-edit/{id}', [AgricultureOfficerController::class, 'edit_agri_officer'])->middleware(['auth', 'admin'])->name('agri-officer-edit');

//Land Revenue Department
Route::get('/add-revenue-officer', [LandRevenueController::class, 'add_revenue_officer'])->name('add-revenue-officer');
Route::post('/store-revenue-officer', [LandRevenueController::class, 'store_revenue_officer'])->name('store-revenue-officer');
Route::get('/all-revenue-officer', [LandRevenueController::class, 'all_revenue_officer'])->middleware(['auth', 'admin'])->name('all-revenue-officer');
Route::get('/edit-revenue-officer/{id}', [LandRevenueController::class, 'edit_revenue_officer'])->name('edit-revenue-officer');

// District Officer
Route::get('/district-officer-create', [DistrictOfficerController::class, 'district_officer_create'])->middleware(['auth', 'admin'])->name('district-officer-create');
Route::post('/store-district-officer', [DistrictOfficerController::class, 'store_district_officer'])->name('store-district-officer');
Route::get('/all-district-officer', [DistrictOfficerController::class, 'all_district_officer'])->middleware(['auth', 'admin'])->name('all-district-officer');
Route::get('/district-officer-edit/{id}', [DistrictOfficerController::class, 'edit_district_officer'])->middleware(['auth', 'admin'])->name('district-officer-edit');

// District Officer Panel
Route::get('/unverify-agri-farmers-by-do', [DistrictOfficerPanelController::class, 'unverify_agri_farmers'])->name('unverify-agri-farmers-by-do');
Route::get('/verify-agri-farmers-by-do', [DistrictOfficerPanelController::class, 'verify_agri_farmers'])->name('verify-agri-farmers-by-do');
Route::post('/verify-unverify-agri-farmers-by-do', [DistrictOfficerPanelController::class, 'verify_unverify_agri_farmers'])->name('verify-unverify-agri-farmers-by-do');


Route::get('/unverify-agriuser-farmers-by-do', [DistrictOfficerPanelController::class, 'unverify_agriuser_farmers'])->name('unverify-agriuser-farmers-by-do');
Route::get('/verify-agriuser-farmers-by-do', [DistrictOfficerPanelController::class, 'verify_agriuser_farmers'])->name('verify-agriuser-farmers-by-do');
Route::post('/verify-unverify-agriuser-farmers-by-do', [DistrictOfficerPanelController::class, 'verify_unverify_agriuser_farmers'])->name('verify-unverify-agriuser-farmers-by-do');



Route::get('/unverify-farmers-by-do', [DistrictOfficerPanelController::class, 'unverify_farmers'])->name('unverify-farmers-by-do');
Route::get('/verify-farmers-by-do', [DistrictOfficerPanelController::class, 'verify_farmers'])->name('verify-farmers-by-do');
Route::get('/view-do-farmers/{id}', [DistrictOfficerPanelController::class, 'view_do_farmers'])->name('view-do-farmers');



Route::get('/unverify-online-farmers-by-do', [DistrictOfficerPanelController::class, 'unverify_online_farmers'])->name('unverify-online-farmers-by-do');
Route::get('/verify-online-farmers-by-do', [DistrictOfficerPanelController::class, 'verify_online_farmers'])->name('verify-online-farmers-by-do');
// End District Officer Panel





// Caller User Department
Route::get('/caller-user-create', [CallerUserController::class, 'caller_user_create'])->middleware(['auth', 'admin'])->name('caller-user-create');
Route::post('/store-caller-user', [CallerUserController::class, 'store_caller_user'])->name('store-caller-user');
Route::get('/all-caller-user', [CallerUserController::class, 'all_caller_user'])->middleware(['auth', 'admin'])->name('all-caller-user');
Route::get('/caller-user-edit/{id}', [CallerUserController::class, 'edit_caller_user'])->middleware(['auth', 'admin'])->name('caller-user-edit');




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



Route::get('/unverify-online-farmers-by-land', [LandRevenueController::class, 'unverify_online_farmers_by_land'])->name('unverify-online-farmers-by-land');
Route::get('/verify-online-farmers-by-land', [LandRevenueController::class, 'verify_online_farmers_by_land'])->name('verify-online-farmers-by-land');
Route::get('/verifications-online-farmers', [LandRevenueController::class, 'verifications_online_farmers'])->name('verifications-online-farmers');
Route::get('/view-farmers-land/{id}', [LandRevenueController::class, 'view_farmers_land'])->name('view-farmers-land');

Route::post('/verify-unverify-online-farmers', [LandRevenueController::class, 'verify_unverify_online_farmers'])->name('verify-unverify-online-farmers');

// agriculture department panel
Route::get('/add-agri-farmers', [AgricultureFarmerRegistrationController::class, 'add_agri_farmers'])->name('add-agri-farmers');
Route::post('/store-agri-farmers', [AgricultureFarmerRegistrationController::class, 'store_agri_farmers'])->name('store-agri-farmers');
Route::get('/all-agri-farmers', [AgricultureFarmerRegistrationController::class, 'all_agri_farmers'])->name('all-agri-farmers');
Route::get('/view-agri-farmers/{id}', [AgricultureFarmerRegistrationController::class, 'view_agri_farmers'])->name('view-agri-farmers');
Route::get('/edit-agri-farmers/{id}', [AgricultureFarmerRegistrationController::class, 'edit_agri_farmers'])->name('edit-agri-farmers');
Route::post('/update-agri-farmers/{id}', [AgricultureFarmerRegistrationController::class, 'update_agri_farmers'])->name('update-agri-farmers');

Route::get('/agri-unverify-farmers', [AgricultureFarmerRegistrationController::class, 'agri_unverify_farmers'])->name('agri-unverify-farmers');
Route::get('/agri-verify-farmers', [AgricultureFarmerRegistrationController::class, 'agri_verify_farmers'])->name('agri-verify-farmers');



Route::get('/farmers-reporting', [AgricultureFarmerRegistrationController::class, 'farmers_reporting'])->name('agri-officer-reporting');


// AgricultureUser

Route::get('/add-agriuser-farmers', [AgricultureUserFarmersController::class, 'add_agriuser_farmers'])->name('add-agriuser-farmers');
Route::post('/store-agriuser-farmers', [AgricultureUserFarmersController::class, 'store_agriuser_farmers'])->name('store-agriuser-farmers');
Route::get('/all-agriuser-farmers', [AgricultureUserFarmersController::class, 'all_agriuser_farmers'])->name('all-agriuser-farmers');
Route::get('/view-agriuser-farmers/{id}', [AgricultureUserFarmersController::class, 'view_agriuser_farmers'])->name('view-agriuser-farmers');
Route::get('/edit-agriuser-farmers/{id}', [AgricultureUserFarmersController::class, 'edit_agriuser_farmers'])->name('edit-agriuser-farmers');
Route::post('/update-agriuser-farmers/{id}', [AgricultureUserFarmersController::class, 'update_agriuser_farmers'])->name('update-agriuser-farmers');

Route::get('/agri-users-farmers-reporting', [AgricultureUserFarmersController::class, 'farmers_reporting'])->name('agriuser-farmers-reporting');


Route::get('/agriuser-unverify-farmers', [AgricultureUserFarmersController::class, 'agriuser_unverify_farmers'])->name('agriuser-unverify-farmers');
Route::get('/agriuser-verify-farmers', [AgricultureUserFarmersController::class, 'agriuser_verify_farmers'])->name('agriuser-verify-farmers');

//Land Revenue Department verify agriculture farmers
Route::get('/all-agriuser-farmers-by-land', [LandRevenueController::class, 'all_agriuser_farmers_by_land'])->name('all-agriuser-farmers-by-land');
Route::get('/unverify-agriuser-farmers-by-land', [LandRevenueController::class, 'unverify_agriuser_farmers_by_land'])->name('unverify-agriuser-farmers-by-land');
Route::get('/verify-agriuser-farmers-by-land', [LandRevenueController::class, 'verify_agriuser_farmers_by_land'])->name('verify-agriuser-farmers-by-land');

Route::post('/verify-unverify-agriuser-farmers-by-land', [LandRevenueController::class, 'verify_unverify_agriuser_farmers_by_land'])->name('verify-unverify-agriuser-farmers-by-land');

Route::get('/reporting-farmers-by-landOfficer', [LandRevenueController::class, 'farmers_reporting'])->name('reporting-farmers-by-land-officer');





Route::get('/Reporting', [ReportingController::class, 'index'])->name('reporting');
Route::get('/Reports', [ReportingController::class, 'reports_generate'])->name('reports-generate');
Route::get('/view-reports/{id}/{table}', [ReportingController::class, 'view'])->name('reports-view');

//Land Revenue PAnel
//  All Screens

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';





