<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Tehsil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TehsilController extends Controller
{
    public function add_tehsil()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.tehsil.add_tehsil', [
                'all_district' => $all_district,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function store_tehsil(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Tehsil::create([
                'admin_or_user_id'    => $userId,
                'district'          => $request->district,
                'tehsil'          => $request->tehsil,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('tehsil-added', 'Tehsil Added Successfully');
        } else {
            return redirect()->back();
        }
    }
    public function all_tehsil()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.tehsil.all_tehsil', [
                'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function edit_tehsil(Request $request, $id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $tehsildetails = Tehsil::findOrFail($id);
            return view('admin_panel.tehsil.edit_tehsil', [
                'all_district' => $all_district,
                'tehsildetails' => $tehsildetails,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function update_tehsil(Request $request, $id)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Tehsil::where('id', $id)->update([
                'district'          => $request->district,
                'tehsil'          => $request->tehsil,
                'updated_at' => Carbon::now(),
            ]);
            return Redirect()->back()->with('success-message-updte', 'Tehsil Updated successfully!');
        } else {
            return redirect()->back();
        }
    }
}
