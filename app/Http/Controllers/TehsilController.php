<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TehsilController extends Controller
{
    public function add_tehsil()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_district = ::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.tehsil.add_tehsil', [
                // 'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function all_tehsil()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_district = ::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.tehsil.all_tehsil', [
                // 'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
