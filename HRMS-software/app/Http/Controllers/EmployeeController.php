<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function all_employee()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_employee = Employee::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.employees.all_employee', [
                'all_employee' => $all_employee,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function add_employee()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.employees.add_employee', [
                'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }

        return view('');
    }
    public function store_employee(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Employee::create([
                'admin_or_user_id'    => $userId,
                'first_name'          => $request->first_name,
                'last_name'          => $request->last_name,
                'email'          => $request->email,
                'joining_date'          => $request->joining_date,
                'phone'          => $request->phone,
                'department'          => $request->department,
                'designation'          => $request->designation,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('Employee-added', 'Employee Created Successfully');
        } else {
            return redirect()->back();
        }
    }
    // public function getDesignations(Request $request)
    // {
    //     $departmentId = $request->input('department_id');
    //     $designations = Designation::where('department_id', $departmentId)->get(['id', 'designation']);
    //     return response()->json($designations);
    // }
    public function delete_employee(Request $request, $id)
    {
        $delete = Employee::find($id)->delete();
        return redirect()->back()->with('delete-message', 'Employee Has Been Deleted Successsfully');
    }
}
