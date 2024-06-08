<?php

namespace App\Http\Controllers;

use App\Models\Tappa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UCController extends Controller
{
    public function add_uc()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            // $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.UC.add_uc', [
                // 'all_district' => $all_district,
                // 'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function store_tappa(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Tappa::create([
                'admin_or_user_id'    => $userId,
                'district'          => $request->district,
                'tehsil'          => $request->tehsil,
                'tappa'          => $request->tappa,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('tappa-added', 'Tappa Added Successfully');
        } else {
            return redirect()->back();
        }
    }
}
