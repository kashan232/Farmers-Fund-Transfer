<?php

namespace App\Http\Controllers;

use App\Models\AgricultureOfficer;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AgricultureFarmersRegistration;
use App\Models\AgricultureUserFarmerRegistration;
use App\Models\LandRevenueDepartment;
use App\Models\LandRevenueFarmerRegistation;
use App\Models\OnlineFarmerRegistration;
use App\Models\AgriOfficer;
use Illuminate\Validation\ValidationException;

class AgricultureOfficerController extends Controller
{


    public function agri_officer_create()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            if(Auth::user()->usertype == 'admin'){
                $all_district = District::get();
                $all_tehsil = Tehsil::get();
            }else{
                $all_district = District::where('admin_or_user_id', '=', $userId)->get();
                $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            }
            return view('admin_panel.agri_officer.add_agri_officer', [
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

            try{

                if($request->edit_id && $request->edit_id != '')
            {

            }else{
                $validatedData = $request->validate([
                    'email_address' => 'required|email|unique:users,email',
                ]);
            }

            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            $tehsil = $request->input('tehsil');
            $ucs = $request->input('ucs');
            $tappa = $request->input('tappa');

            if($request->edit_id && $request->edit_id != '')
            {
                $AgriOfficer = AgriOfficer::where('id',$request->edit_id)->update([
                    'admin_or_user_id'    => $userId,
                    'full_name'          => $request->full_name,
                    'contact_number'          => $request->contact_number,
                    'address'          => $request->address,
                    'email_address'          => $request->email_address,
                    'district'          => $request->district,
                    'tehsil'          => $tehsil,
                    'ucs'               => $ucs,
                    'tappas'          => $tappa,
                    'username'          => $request->username,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ]);
                return redirect()->back()->with('officer-added', 'Agriculture Officer Officer Updated Successfully');
            }
            else
            {
                $AgriOfficer = AgriOfficer::create([
                    'admin_or_user_id'    => $userId,
                    'full_name'          => $request->full_name,
                    'contact_number'          => $request->contact_number,
                    'address'          => $request->address,
                    'email_address'          => $request->email_address,
                    'district'          => $request->district,
                    'tehsil'          => $tehsil,
                    'ucs'               => $ucs,
                    'tappas'          => $tappa,
                    'username'          => $request->username,
                    'password'          => $request->password,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ]);
                // Create a user record with the same credentials and usertype 'employee'
                $user = User::create([
                    'name' => $request->full_name,
                    'user_id' => $AgriOfficer->id,
                    'email' => $request->email_address,
                    'district' => $request->district,
                    'tehsil' => $tehsil,
                    'ucs'               => $ucs,
                    'tappas'          => $tappa,
                    'password' => bcrypt($request->password), // Make sure to hash the password
                    'usertype' => 'Agri_Officer', // Set the usertype to 'employee'
                ]);

                return redirect()->back()->with('officer-added', 'Agriculture Officer Officer Created Successfully');
            }
        }
        catch (ValidationException $e) {
            // Handle the validation failure
            return back()->withErrors($e->validator)->withInput();
        }

        } else {
            return redirect()->back();
        }
    }
    public function all_agri_officer()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);

            $all_agri = AgriOfficer::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.agri_officer.all_agri_officer', [
                'all_agri' => $all_agri,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function edit_agri_officer($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $data = AgriOfficer::find($id);
            if(Auth::user()->usertype == 'admin'){
                $all_district = District::get();
                $all_tehsil = Tehsil::get();
            }else{
                $all_district = District::where('admin_or_user_id', '=', $userId)->get();
                $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            }
            return view('admin_panel.agri_officer.edit_agri_officer', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }
}
