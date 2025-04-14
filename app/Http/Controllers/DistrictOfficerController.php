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
use Illuminate\Support\Str;

use Illuminate\Validation\ValidationException;
class DistrictOfficerController extends Controller
{

    public function district_officer_create()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            if(Auth::user()->usertype == 'admin'){
                $all_district = District::get();
                $all_tehsil = Tehsil::get();
            }else{
                $all_district = District::where('user_id', '=', $userId)->get();
                $all_tehsil = Tehsil::where('user_id', '=', $userId)->get();
            }
            return view('admin_panel.district_officer.add_district_officer', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }



    public function store_district_officer(request $request)
    {


        $plainPassword = Str::upper(Str::random(8));
        if (Auth::id()) {

            try {

                if ($request->edit_id && $request->edit_id != '') {
                } else {
                    $validatedData = $request->validate([
                        'email_address' => 'required|email|unique:users,email',
                    ]);
                }


                $usertype = Auth()->user()->usertype;
                $userId = Auth::id();
                // $tehsil = $request->input('tehsil');
                // $ucs = $request->input('ucs');

                
                $ucs = json_encode($request->input('ucs'));

                $tehsil = json_encode($request->input('tehsil'));

                $tappa = json_encode($request->input('tappa'));



                if ($request->edit_id && $request->edit_id != '') {

                     // Fetch the FieldOfficer record before updating
                    $DistrictOfficer = DistrictOfficer::where('id', $request->edit_id)->first();

                    if ($DistrictOfficer) {
                        // Update the DistrictOfficer record
                        $DistrictOfficer->update([
                            'full_name' => $request->full_name,
                            'contact_number' => $request->contact_number,
                            'email_address' => $request->email_address,
                            'district' => $request->district,
                            'tehsil' => $tehsil,
                            'tappas' => $tappa,
                            'password' => $plainPassword,
                        ]);

                        // Update the related User record
                        $user = User::where('user_id', $DistrictOfficer->id)->first();

                        if ($user) {
                            $user->update([
                                'name' => $request->full_name,
                                'user_id' => $DistrictOfficer->id,
                                'email' => $request->email_address,
                                'district' => $request->district,
                                'tehsil' => $tehsil,
                                'tappas' => $tappa,
                                'password' => $plainPassword, // Preserve existing password if not updated
                                'usertype' => 'Field_Officer', // Set the usertype to 'Field_Officer'
                            ]);
                        }

                        return redirect()->back()->with('officer-added', 'Field Officer Updated Successfully');
                    } else {
                        return redirect()->back()->with('error', 'Field Officer not found');
                    }


                } else {
                    $DistrictOfficer = DistrictOfficer::create([
                        // 'admin_or_user_id'    => $request->district_officer,
                        'full_name'          => $request->full_name,
                        'contact_number'          => $request->contact_number,
                        'cnic'          => $request->cnic,
                        'email_address'          => $request->email_address,
                        'district'          => $request->district,
                        'tehsil'          => $tehsil,
                        'tappas'          => $tappa,
                        'password'          => $plainPassword ,
                        'created_at'        => Carbon::now(),
                        'updated_at'        => Carbon::now(),
                    ]);
                    // Create a user record with the same credentials and usertype 'employee'
                    $user = User::create([
                        'name' => $request->full_name,
                        'user_id' => $DistrictOfficer->id,
                        'cnic'          => $request->cnic,
                        'email' => $request->email_address,
                        'district' => $request->district,
                        'tehsil' => $tehsil,
                        'tappas' => $tappa,
                        'password' => $plainPassword , // Make sure to hash the password
                        'usertype' => 'Field_Officer', // Set the usertype to 'employee'
                    ]);

                    return redirect()->back()->with('officer-added', 'Field Officer Created Successfully');
                }
            } catch (ValidationException $e) {
                // Handle the validation failure
                return back()->withErrors($e->validator)->withInput();
            }
        } else {
            return redirect()->back();
        }
    }





    // public function store_district_officer(Request $request)
    // {
    //     if (Auth::id()) {

    //         try{

    //             if($request->edit_id && $request->edit_id != '')
    //         {

    //         }else{
    //             $validatedData = $request->validate([
    //                 'email_address' => 'required|email|unique:users,email',
    //             ]);
    //         }

    //         $usertype = Auth()->user()->usertype;
    //         $userId = Auth::id();
    //         $tehsil = json_encode($request->input('tehsil'));
    //         $ucs = json_encode($request->input('ucs'));
    //         $tappa = json_encode($request->input('tappa'));

    //         if($request->edit_id && $request->edit_id != '')
    //         {
    //             $DistrictOfficer = DistrictOfficer::where('id',$request->edit_id)->update([
    //                 'admin_or_user_id'    => $userId,
    //                 'full_name'          => $request->full_name,
    //                 'contact_number'          => $request->contact_number,
    //                 'cnic'          => $request->cnic,
    //                 'email_address'          => $request->email_address,
    //                 'district'          => $request->district,
    //                 'tehsil'          => $tehsil,
    //                 'ucs'               => $ucs,
    //                 'tappas'          => $tappa,
    //                 'username'          => $request->username,
    //                 'created_at'        => Carbon::now(),
    //                 'updated_at'        => Carbon::now(),
    //             ]);

    //             $user = User::where('user_id',$DistrictOfficer->id)->update([
    //                 'name' => $request->full_name,
    //                 'district' => $request->district,
    //                 'tehsil' => $tehsil,
    //                 'ucs'               => $ucs,
    //                 'tappas'          => $tappa,
    //                 'password' => bcrypt($request->password), // Make sure to hash the password
    //                 'usertype' => 'District_Officer', // Set the usertype to 'employee'
    //             ]);


    //             return redirect()->back()->with('officer-added', 'District Officer Updated Successfully');
    //         }
    //         else
    //         {
    //             $DistrictOfficer = DistrictOfficer::create([
    //                 'admin_or_user_id'    => $userId,
    //                 'full_name'          => $request->full_name,
    //                 'contact_number'          => $request->contact_number,
    //                 'cnic'          => $request->cnic,
    //                 'email_address'          => $request->email_address,
    //                 'district'          => $request->district,
    //                 'tehsil'          => $tehsil,
    //                 'ucs'               => $ucs,
    //                 'tappas'          => $tappa,
    //                 'username'          => $request->username,
    //                 'password'          => $request->password,
    //                 'created_at'        => Carbon::now(),
    //                 'updated_at'        => Carbon::now(),
    //             ]);
    //             // Create a user record with the same credentials and usertype 'employee'
    //             $user = User::create([
    //                 'name' => $request->full_name,
    //                 'user_id' => $DistrictOfficer->id,
    //                 'email' => $request->email_address,
    //                 'district' => $request->district,
    //                 'tehsil' => $tehsil,
    //                 'ucs'               => $ucs,
    //                 'tappas'          => $tappa,
    //                 'password' => bcrypt($request->password), // Make sure to hash the password
    //                 'usertype' => 'District_Officer', // Set the usertype to 'employee'
    //             ]);

    //             return redirect()->back()->with('officer-added', 'District Officer Created Successfully');
    //         }
    //     }
    //     catch (ValidationException $e) {
    //         // Handle the validation failure
    //         return back()->withErrors($e->validator)->withInput();
    //     }

    //     } else {
    //         return redirect()->back();
    //     }
    // }
    public function all_district_officer()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);

            $all_agri = DistrictOfficer::where('user_id', '=', $userId)->get();
            return view('admin_panel.district_officer.all_district_officer', [
                'all_agri' => $all_agri,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function edit_district_officer($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $data = DistrictOfficer::find($id);
            if(Auth::user()->usertype == 'admin'){
                $all_district = District::get();
                $all_tehsil = Tehsil::get();
            }else{
                $all_district = District::where('user_id', '=', $userId)->get();
                $all_tehsil = Tehsil::where('user_id', '=', $userId)->get();
            }
            return view('admin_panel.district_officer.edit_district_officer', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }
}

