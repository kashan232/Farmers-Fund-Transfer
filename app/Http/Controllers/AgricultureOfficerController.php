<?php

namespace App\Http\Controllers;

use App\Models\AgricultureOfficer;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgricultureOfficerController extends Controller
{
    
    public function agri_officer_create()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.agriculture_officer.add_agri_officer', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_agri_officer(Request $request)
    {
        if (Auth::id()) {

            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            AgricultureOfficer::create([
                'admin_or_user_id'    => $userId,
                'full_name'          => $request->full_name,
                'contact_number'          => $request->contact_number,
                'address'          => $request->address,
                'email_address'          => $request->email_address,
                'district'          => $request->district,
                'tehsil'          => $request->tehsil,
                'username'          => $request->username,
                'password'          => $request->password,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);

            // Create a user record with the same credentials and usertype 'employee'
            $user = User::create([
                'name' => $request->full_name,
                'email' => $request->email_address,
                'district' => $request->district,
                'tehsil' => $request->tehsil,
                'password' => bcrypt($request->password), // Make sure to hash the password
                'usertype' => 'Agriculture_Officer', // Set the usertype to 'employee'
            ]);

            return redirect()->back()->with('officer-added', 'Agriculture Officer Created Successfully');
        } else {
            return redirect()->back();
        }
    }
}