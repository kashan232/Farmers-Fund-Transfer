<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgricultureOfficer;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\User;
use App\Models\DistrictOfficer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DGOfficerController extends Controller
{

    public function dg_officer_create()
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
            return view('admin_panel.dg_officer.add_dg_officer', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_dg_officer(Request $request)
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
            $tehsil = json_encode($request->input('tehsil'));
            $ucs = json_encode($request->input('ucs'));
            $tappa = json_encode($request->input('tappa'));

            if($request->edit_id && $request->edit_id != '')
            {
                $DistrictOfficer = DistrictOfficer::where('id',$request->edit_id)->update([
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
                return redirect()->back()->with('officer-added', 'DG Officer Updated Successfully');
            }
            else
            {
                $DistrictOfficer = DistrictOfficer::create([
                    'admin_or_user_id'    => $userId,
                    'full_name'          => $request->full_name,
                    'contact_number'          => $request->contact_number,
                    'address'          => $request->address,
                    'email_address'          => $request->email_address,

                    'username'          => $request->username,
                    'password'          => $request->password,
                    'usertype'           => $request->usertype,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ]);
                // Create a user record with the same credentials and usertype 'employee'
                $user = User::create([
                    'name' => $request->full_name,
                    'user_id' => $DistrictOfficer->id,
                    'email' => $request->email_address,
                    'district' => $request->district,
                    'tehsil' => $tehsil,
                    'ucs'               => $ucs,
                    'tappas'          => $tappa,
                    'password' => bcrypt($request->password), // Make sure to hash the password
                    'usertype' => $request->usertype, // Set the usertype to 'employee'
                ]);

                return redirect()->back()->with('officer-added', 'DG Officer Created Successfully');
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
    public function all_dg_officer()
    {
        if (Auth::id()) {
            $userId = Auth::id();


            $all_agri = DistrictOfficer::where('usertype', '=','PMS_Officer')->get();
            return view('admin_panel.dg_officer.all_dg_officer', [
                'all_agri' => $all_agri,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function edit_dg_officer($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $data = DistrictOfficer::find($id);
            if(Auth::user()->usertype == 'admin'){
                $all_district = District::get();
                $all_tehsil = Tehsil::get();
            }else{
                $all_district = District::where('admin_or_user_id', '=', $userId)->get();
                $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            }
            return view('admin_panel.dg_officer.edit_dg_officer', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }
}
