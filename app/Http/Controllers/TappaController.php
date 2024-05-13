<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Tappa;
use App\Models\Tehsil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TappaController extends Controller
{
    public function add_tappa()
    {
        if (Auth::id()) {
            $userId = Auth::id();
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
    public function get_tehsils(Request $request)
    {
        $district = $request->input('district');
        // dd($district);
        $tehsils = Tehsil::where('district', $district)->pluck('tehsil')->toArray();
        // dd($tehsils);
        return response()->json($tehsils);
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
