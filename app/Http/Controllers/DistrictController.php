<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistrictController extends Controller
{
    public function add_district()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.district.add_district', [
                // 'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function all_district()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.district.all_district', [
                // 'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
