<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Tehsil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgriUserController extends Controller
{
    public function add_user()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.user.add_user', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function getTehsils(Request $request)
    {
        $district = $request->input('district');
        $tehsils = Tehsil::where('district', $district)->pluck('tehsil')->toArray(); // Adjust according to your database schema
        return response()->json($tehsils);
    }
    public function all_user()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            // $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.user.add_user', [
                // 'all_district' => $all_district,
                // 'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
