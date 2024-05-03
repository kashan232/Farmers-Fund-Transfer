<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function designation()
    {
        return view('admin_panel.designation.designation');
    }
}
