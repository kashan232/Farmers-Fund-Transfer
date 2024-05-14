<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandRevenueController extends Controller
{
    public function add_revenue_officer()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            // $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.Land_revenue_department.add_revenue_officer', [
                // 'all_district' => $all_district,
                // 'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }

}
