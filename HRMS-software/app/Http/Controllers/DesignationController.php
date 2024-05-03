<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{

    public function designation()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_designation = Designation::where('admin_or_user_id', '=', $userId)->get();
            $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.designation.designation', [
                'all_designation' => $all_designation,
                'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function store_designation(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Designation::create([
                'admin_or_user_id'    => $userId,
                'designation'          => $request->designation,
                'department'          => $request->department,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('department-added', 'Department Added Successfully');
        } else {
            return redirect()->back();
        }
    }
    // public function update_designation(Request $request)
    // {
    //     if (Auth::id()) {
    //         $usertype = Auth()->user()->usertype;
    //         $userId = Auth::id();
    //         // Retrieve the input values from the request
    //         $update_id = $request->input('department_id');
    //         $department = $request->input('department_name');
    //         $designation = $request->input('designation_name');

    //         // Update the designation record in the database
    //         Designation::where('id', $update_id)->update([
    //             'department'   => $department,
    //             'designation'   => $designation,
    //             'updated_at' => Carbon::now(),
    //         ]);

    //         // Redirect back to the page where the update was made
    //         return redirect()->back()->with('designation-update', 'Designation updated successfully');
    //     } else {
    //         return redirect()->back();
    //     }
    // }
}
