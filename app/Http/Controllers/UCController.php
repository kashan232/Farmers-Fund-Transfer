<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Tappa;
use App\Models\Tehsil;
use App\Models\UC;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UCController extends Controller
{
    public function add_uc()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            // $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.UC.add_uc', [
                'all_district' => $all_district,
                // 'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function store_uc(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            UC::create([
                'admin_or_user_id'    => $userId,
                'district'          => $request->district,
                'tehsil'          => $request->tehsil,
                'uc'          => $request->uc,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('uc-added', 'UC Added Successfully');
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
    public function get_ucs(Request $request)
    {
        $district = $request->input('district');
        $tehsil = $request->input('tehsil');

        $ucs = UC::where('district', $district)->whereIn('tehsil', $tehsil)->pluck('uc')->toArray(); // Adjust according to your database schema
        $Tappas = Tappa::where('district', $district)->whereIn('tehsil', $tehsil)->pluck('tappa')->toArray(); // Adjust according to your database schema

        return response()->json([
            'ucs' => $ucs,
            'Tappas' => $Tappas,
        ]);
    }
    public function all_uc()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_uc = UC::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.UC.all_uc', [
                'all_uc' => $all_uc,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
