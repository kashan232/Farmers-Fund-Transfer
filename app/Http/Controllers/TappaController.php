<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Tehsil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TappaController extends Controller
{
    public function add_tappa()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.tappa.add_tappa', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function all_tappa()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_district = ::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.tappa.all_tappa', [
                // 'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
