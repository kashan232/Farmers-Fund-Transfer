<?php

namespace App\Http\Controllers;

use App\Models\District;
use Carbon\Carbon;
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
    public function store_district(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            if($request->edit_id && $request->edit_id != '')
            {
                District::where('id',$request->edit_id)->update([
                    'admin_or_user_id'    => $userId,
                    'district'          => $request->district,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ]);
                return redirect()->back()->with('district-updated', 'District Updated Successfully');
            }
            else
            {
                District::create([
                    'admin_or_user_id'    => $userId,
                    'district'          => $request->district,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ]);
                return redirect()->back()->with('district-added', 'District Added Successfully');
            }

        } else {
            return redirect()->back();
        }
    }
    public function all_district()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.district.all_district', [
                'all_district' => $all_district,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function edit_district(Request $request, $id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            $districtdetails = District::findOrFail($id);
            return view('admin_panel.district.edit_district', [
                // 'all_department' => $all_department,
                'districtdetails' => $districtdetails,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function update_district(Request $request, $id)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            District::where('id', $id)->update([
                'admin_or_user_id'  => $userId,
                'district'          => $request->district,
                'updated_at' => Carbon::now(),
            ]);
            return Redirect()->back()->with('success-message-updte', 'District Updated successfully!');
        } else {
            return redirect()->back();
        }
    }
}
