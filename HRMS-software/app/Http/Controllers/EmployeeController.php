<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function all_employee()
    {
        return view('admin_panel.employees.all_employee');
    }
    public function add_employee()
    {
        return view('admin_panel.employees.add_employee');
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
}
