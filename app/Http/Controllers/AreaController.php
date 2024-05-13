<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    public function add_area()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_district = ::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.area.add_area', [
                // 'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function store_area(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Area::create([
                'admin_or_user_id'    => $userId,
                'area'          => $request->area,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('area-added', 'Area Added Successfully');
        } else {
            return redirect()->back();
        }
    }
    public function all_area()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $allarea = Area::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.area.all_area', [
                'allarea' => $allarea
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function edit_area(Request $request, $id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            $areadetails = Area::findOrFail($id);
            return view('admin_panel.area.edit_area', [
                // 'all_department' => $all_department,
                'areadetails' => $areadetails,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function update_area(Request $request, $id)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Area::where('id', $id)->update([
                'area'          => $request->area,
                'updated_at' => Carbon::now(),
            ]);
            return Redirect()->back()->with('success-message-updte', 'Area Updated successfully!');
        } else {
            return redirect()->back();
        }
    }
}
