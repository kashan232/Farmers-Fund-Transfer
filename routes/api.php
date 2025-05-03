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

return response()->json([
    'success' => true,
    'data' => [
        'report_id' => 1,
        'title' => 'Sample Demo Report',
        'description' => 'This is a demo report for Flutter team',
        'created_at' => now()->toDateTimeString(),
        'images' => [
            'image_1' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_2' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_3' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_4' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_5' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_6' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_7' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_8' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_9' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_10' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_11' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_12' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_13' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_14' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_15' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_16' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_17' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_18' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_19' => asset('https://cms.benazirharicard.gos.pk/1.png'),
            'image_20' => asset('https://cms.benazirharicard.gos.pk/1.png'),

        ]
    ]
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

