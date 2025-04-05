<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
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
use Illuminate\Support\Str;

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


            if ($request->edit_id && $request->edit_id != '') {
                // In edit mode
                $validatedData = $request->validate([
                    'email_address' => 'required|email|unique:users,email,' . $request->edit_id,
                ]);
            } else {
                // In create mode
                $validatedData = $request->validate([
                    'email_address' => 'required|email|unique:users,email',
                ]);
            }



            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            $tehsil = json_encode($request->input('tehsil'));
            $tappa = json_encode($request->input('tappa'));



            if($request->edit_id && $request->edit_id != '')
            {
                    // Update AgriOfficer record
                    $AgriOfficer = AgriOfficer::where('id', $request->edit_id)->first();

                    if ($AgriOfficer) {
                        $AgriOfficer->update([
                            'admin_or_user_id'    => $userId,
                            'full_name'           => $request->full_name,
                            'contact_number'      => $request->contact_number,
                            'cnic'             => $request->cnic,
                            'email_address'       => $request->email_address,
                            'district'            => $request->district,
                            'tehsil'              => $tehsil,
                            // 'ucs'               => $ucs,
                            'tappas'              => $tappa,
                            // 'username'            => $request->username,
                        ]);

                        // Update related User record
                        $user = User::where('user_id', $AgriOfficer->id)->first();

                        if ($user) {
                            $user->update([
                                'name'      => $request->full_name,
                                'user_id'   => $AgriOfficer->id,
                                'email'     => $request->email_address,
                                'district'  => $request->district,
                                'tehsil'    => $tehsil,
                                // 'ucs'      => $ucs,
                                'tappas'    => $tappa,
                                // 'password'  => $request->password ? Hash::make($request->password) : $user->password, // Preserve existing password if not updated
                                'usertype'  => 'Agri_Officer', // Set the usertype to 'employee'
                            ]);
                        }

                        return redirect()->back()->with('officer-added', 'Agriculture Officer Updated Successfully');
                    } else {
                        return redirect()->back()->with('error', 'AgriOfficer not found');
                    }

            }
            else
            {



                // Generate a unique 8-digit numeric password
                $plainPassword = Str::upper(Str::random(8));


                $AgriOfficer = AgriOfficer::create([
                    'admin_or_user_id'    => $userId,
                    'full_name'          => $request->full_name,
                    'contact_number'          => $request->contact_number,
                    'cnic'          => $request->cnic,
                    'email_address'          => $request->email_address,
                    'district'          => $request->district,
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
                    'user_id' => $AgriOfficer->id,
                    'email' => $request->email_address,
                    'district' => $request->district,
                    'tehsil' => $tehsil,
                    // 'ucs'               => $ucs,
                    'tappas'          => $tappa,
                    'password' => bcrypt($plainPassword ), // Make sure to hash the password
                    'usertype' => 'Agri_Officer', // Set the usertype to 'employee'
                ]);

                return redirect()->back()->with('officer-added', 'Agriculture Officer Created Successfully');
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
