<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function all_employee()
    {
        return view('admin.employees.all_employee');
    }
    public function add_employee()
    {
        return view('admin.employees.add_employee');
    }
}
