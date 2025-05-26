<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Tehsil;
use Illuminate\Support\Facades\Auth;
use App\Models\FieldOfficer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\DistrictOfficer;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FieldOfficerImport;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class FieldOfficerController extends Controller
{
    public function index()
    {
        if (Auth::user()->usertype == 'admin') {
            $field_officers = FieldOfficer::get();
        } else {
            $field_officers = FieldOfficer::where('admin_or_user_id', Auth::id())->get();
        }
        return view('admin_panel.field_officers.index', ['data' => $field_officers]);
    }

    public function create()
    {
        $districts = district::get();
        $tehsils = tehsil::get();

        $data = [
            'districts' => $districts,
            'tehsils' => $tehsils,
        ];
        return view('admin_panel.field_officers.create', $data);
    }

    public function upload_excel()
    {
        return view('admin_panel.field_officers.excel_upload');
    }

    public function storeFieldOfficer(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new FieldOfficerImport, $request->file('file'));

        return back()->with('success', 'Field Officers imported successfully!');
    }

    public function edit($id)
    {
        $districts = district::get();
        $tehsils = tehsil::get();
        $field_officer = FieldOfficer::find($id);
        $district_officers = DistrictOfficer::where('district', '=', $field_officer->district)->get();
        $data = [
            'districts' => $districts,
            'tehsils' => $tehsils,
            'field_officer' => $field_officer,
            'district_officers' => $district_officers
        ];
        return view('admin_panel.field_officers.create', $data);
    }

    public function store(request $request)
    {


        $plainPassword = (string) random_int(10000000, 99999999);

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
                $tehsil = $request->input('tehsil');
                $ucs = $request->input('ucs');
                $tappa = json_encode($request->input('tappa'));



                if ($request->edit_id && $request->edit_id != '') {

                     // Fetch the FieldOfficer record before updating
                    $FieldOfficer = FieldOfficer::where('id', $request->edit_id)->first();

                    if ($FieldOfficer) {
                        // Update the FieldOfficer record
                        $FieldOfficer->update([
                            'full_name' => $request->full_name,
                            'contact_number' => $request->contact_number,
                            'email_address' => $request->email_address,
                            'district' => $request->district,
                            'tehsil' => $tehsil,
                            'tappas' => $tappa,
                            // 'password' => $plainPassword,
                        ]);

                        // Update the related User record
                        $user = User::where('user_id', $FieldOfficer->id)->first();

                        if ($user) {
                            $user->update([
                                'name' => $request->full_name,
                                'user_id' => $FieldOfficer->id,
                                'email' => $request->email_address,
                                'district' => $request->district,
                                'tehsil' => $tehsil,
                                'tappas' => $tappa,
                                // 'password' => $plainPassword, // Preserve existing password if not updated
                                'usertype' => 'Field_Officer', // Set the usertype to 'Field_Officer'
                            ]);
                        }

                        return redirect()->back()->with('officer-added', 'Field Officer Updated Successfully');
                    } else {
                        return redirect()->back()->with('error', 'Field Officer not found');
                    }


                } else {
                    $FieldOfficer = FieldOfficer::create([
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
                        'user_id' => $FieldOfficer->id,
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
}
