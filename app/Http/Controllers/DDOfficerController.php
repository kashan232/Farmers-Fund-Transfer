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
use App\Models\DDOfficer;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class DDOfficerController extends Controller
{
    public function dd_officer_create()
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
            return view('admin_panel.dd_officer.add_dd_officer', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_dd_officer(Request $request)
    {


        if (Auth::id()) {


            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            // $tehsil = json_encode($request->input('tehsil'));
            // $ucs = json_encode($request->input('ucs'));
            // $tappa = json_encode($request->input('tappa'));

            $district = json_encode($request->input('district'));
            $tehsil = json_encode($request->input('tehsil'));
            $tappa = json_encode($request->input('tappa'));
            $plainPassword = (string) random_int(10000000, 99999999);




        if($request->edit_id && $request->edit_id != '')
        {
                 // Update DDOfficer record
                $DDOfficer = DDOfficer::where('id', $request->edit_id)->first();

                if ($DDOfficer) {
                    // Prepare the data for DDOfficer update
                    $dataToUpdate = [
                        'admin_or_user_id' => $userId,
                        'full_name' => $request->full_name,
                        'contact_number' => $request->contact_number,
                        'cnic' => $request->cnic,
                        'email_address' => $request->email_address,
                        'district' => $district,
                        'tehsil' => $tehsil,
                        'tappas' => $tappa,
                        // 'password' => $plainPassword,

                    ];

                    // Only update email_address if it's changed
                    if ($DDOfficer->email_address != $request->email_address) {
                        $dataToUpdate['email_address'] = $request->email_address;
                    }


                    // Update DDOfficer record
                    $DDOfficer->update($dataToUpdate);

                    // Update related User record
                    $user = User::where('user_id', $DDOfficer->id)->where('usertype','DD_Officer')->first();

                    if ($user) {
                        // Prepare data for User update
                        $userDataToUpdate = [
                            'name' => $request->full_name,
                            'user_id' => $DDOfficer->id,
                            'email' => $request->email_address,
                            'district' => $district,
                            'tehsil' => $tehsil,
                            'tappas' => $tappa,
                            // 'password' => $plainPassword,

                            'usertype' => 'DD_Officer', // Set the usertype to 'employee'
                        ];

                        // Only update email if it has changed
                        if ($user->email != $request->email_address) {
                            $userDataToUpdate['email'] = $request->email_address;

                        }


                        // Update User record
                        $user->update($userDataToUpdate);
                    }

                    return redirect()->back()->with('officer-added', 'DD Officer Updated Successfully');
                } else {
                    return redirect()->back()->with('error', 'DDOfficer not found');
                }

        }
        else
        {



            // Generate a unique 8-digit numeric password
            $plainPassword = (string) random_int(10000000, 99999999);



            $DDOfficer = DDOfficer::create([
                'admin_or_user_id'    => $userId,
                'full_name'          => $request->full_name,
                'contact_number'          => $request->contact_number,
                'cnic'          => $request->cnic,
                'email_address'          => $request->email_address,
                'district'          => $district,
                'tehsil'          => $tehsil,
                // 'ucs'               => $ucs,
                'tappas'          => $tappa,
                // 'username'          => $request->username,
                'password'          => $plainPassword,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);


            // Create a user record with the same credentials and usertype 'employee'
            $user = User::create([
                'name' => $request->full_name,
                'user_id' => $DDOfficer->id,
                'email' => $request->email_address,
                'district' => $district,
                'tehsil' => $tehsil,
                // 'ucs'               => $ucs,
                'tappas'          => $tappa,
                'password' => bcrypt($plainPassword ), // Make sure to hash the password
                'usertype' => 'DD_Officer', // Set the usertype to 'employee'
            ]);

            return redirect()->back()->with('officer-added', 'DD Officer Created Successfully');
        }



    } else {
        return redirect()->back();
    }



        // if (Auth::id()) {

        //     try{

        //         if($request->edit_id && $request->edit_id != '')
        //     {

        //     }else{
        //         $validatedData = $request->validate([
        //             'email_address' => 'required|email|unique:users,email',
        //         ]);
        //     }

        //     $usertype = Auth()->user()->usertype;
        //     $userId = Auth::id();
        //     // $tehsil = json_encode($request->input('tehsil'));
        //     // $ucs = json_encode($request->input('ucs'));
        //     // $tappa = json_encode($request->input('tappa'));

        //     $district = json_encode($request->input('district'));
        //     $tehsil = json_encode($request->input('tehsil'));
        //     $tappa = json_encode($request->input('tappa'));



        //     if($request->edit_id && $request->edit_id != '')
        //     {
        //         // Fetch the DDOfficer record before updating
        //         $DDOfficer = DDOfficer::where('id', $request->edit_id)->first();

        //         if ($DDOfficer) {
        //             // Update the DDOfficer record
        //             $DDOfficer->update([
        //                 'admin_or_user_id' => $userId,
        //                 'full_name' => $request->full_name,
        //                 'contact_number' => $request->contact_number,
        //                 'address' => $request->address,
        //                 'email_address' => $request->email_address,
        //                 'district' => $district,
        //                 'tehsil' => $tehsil,
        //                 'tappas' => $tappa,
        //                 'username' => $request->username,
        //             ]);

        //             // Update the related User record
        //             $user = User::where('user_id', $DDOfficer->id)->first();

        //             if ($user) {
        //                 $user->update([
        //                     'name' => $request->full_name,
        //                     'user_id' => $DDOfficer->id,
        //                     'email' => $request->email_address,
        //                     'district' => $district,
        //                     'tehsil' => $tehsil,
        //                     'tappas' => $tappa,
        //                     'password' => $request->password ? Hash::make($request->password) : $user->password, // Preserve the password if not updated
        //                     'usertype' => 'DD_Officer', // Set the usertype to 'DD_Officer'
        //                 ]);
        //             }

        //             return redirect()->back()->with('officer-added', 'DD Officer Updated Successfully');
        //         } else {
        //             return redirect()->back()->with('error', 'DD Officer not found');
        //         }
        //     }
        //     else
        //     {
        //         $DDOfficer = DDOfficer::create([
        //             'admin_or_user_id'    => $userId,
        //             'full_name'          => $request->full_name,
        //             'contact_number'          => $request->contact_number,
        //             'address'          => $request->address,
        //             'email_address'          => $request->email_address,
        //             'district'          => $district,
        //             'tehsil'          => $tehsil,
        //             // 'ucs'               => $ucs,
        //             'tappas'          => $tappa,
        //             'username'          => $request->username,
        //             'password'          => $request->password,
        //             'created_at'        => Carbon::now(),
        //             'updated_at'        => Carbon::now(),
        //         ]);
        //         // Create a user record with the same credentials and usertype 'employee'
        //         $user = User::create([
        //             'name' => $request->full_name,
        //             'user_id' => $DDOfficer->id,
        //             'email' => $request->email_address,
        //             'district' => $district,
        //             'tehsil' => $tehsil,
        //             // 'ucs'               => $ucs,
        //             'tappas'          => $tappa,
        //             'password' => bcrypt($request->password), // Make sure to hash the password
        //             'usertype' => 'DD_Officer', // Set the usertype to 'employee'
        //         ]);

        //         return redirect()->back()->with('officer-added', 'DD Officer Created Successfully');
        //     }
        // }
        // catch (ValidationException $e) {
        //     // Handle the validation failure
        //     return back()->withErrors($e->validator)->withInput();
        // }

        // } else {
        //     return redirect()->back();
        // }
    }




    public function all_dd_officer()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);

            $all_agri = DDOfficer::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.dd_officer.all_dd_officer', [
                'all_agri' => $all_agri,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function edit_dd_officer($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $data = DDOfficer::find($id);
            if(Auth::user()->usertype == 'admin'){
                $all_district = District::get();
                $all_tehsil = Tehsil::get();
            }else{
                $all_district = District::where('admin_or_user_id', '=', $userId)->get();
                $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            }
            return view('admin_panel.dd_officer.edit_dd_officer', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }
}
