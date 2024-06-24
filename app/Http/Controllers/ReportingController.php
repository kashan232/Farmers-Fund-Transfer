<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Tehsil;
use App\Models\UC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportingController extends Controller
{
    public function admin_reporting()
    {
        if (Auth::id()) {
            $userId = Auth::id();

            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            $all_uc = UC::where('admin_or_user_id', '=', $userId)->get();

            return view('admin_panel.Reporting.get-reporting', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
                'all_uc' => $all_uc,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function admin_reporting_search()
    {
        if (Auth::id()) {
            $userId = Auth::id();

            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            $all_uc = UC::where('admin_or_user_id', '=', $userId)->get();

            return view('admin_panel.Reporting.get-reporting-search', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
                'all_uc' => $all_uc,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
