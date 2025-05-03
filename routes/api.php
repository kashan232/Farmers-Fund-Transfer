<?php

use App\Http\Controllers\ProjectAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FieldOfficerPanelController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



Route::middleware('auth:sanctum')->post('/update-password', function(Request $request) {
    // Validate input
    $request->validate([
        'oldPassword' => 'required',
        'password' => 'required|min:6|confirmed', // `confirmed` checks against `password_confirmation`
    ]);

    $user = Auth::user(); // Get the authenticated user

    if (!$user) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    // Check if old password matches the current password
    if (!Hash::check($request->oldPassword, $user->password)) {
        return response()->json(['error' => 'Old password is incorrect'], 400);
    }

    // Update new password
    $user->update([
        'password' => Hash::make($request->password),
    ]);

    return response()->json(['message' => 'Password updated successfully'], 200);
});





Route::post('/demo/data', function(Request $request) {
    $reports = [];

    for ($i = 1; $i <= 12; $i++) {
        $images = [];
        for ($j = 1; $j <= 12; $j++) {
            $images["image_$j"] = asset("https://cms.benazirharicard.gos.pk/demo/{$j}.jpg");
        }

        $reports[] = [
            'report_id' => $i,
            'title' => "Sample Demo Report $i",
            'description' => "This is demo report #$i for Flutter team",
            'created_at' => now()->toDateTimeString(),
            'images' => $images,
        ];
    }

    return response()->json([
        'success' => true,
        'data' => $reports,
    ]);
});



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

