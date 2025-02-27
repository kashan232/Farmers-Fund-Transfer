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

class FieldOfficerController extends Controller
{
    public function index(){


        if(Auth::user()->usertype == 'admin'){
            $field_officers = FieldOfficer::get();
        }else{
            $field_officers = FieldOfficer::where('admin_or_user_id',Auth::id())->get();
        }
        return view('admin_panel.field_officers.index',['data' => $field_officers]);
     }

    public function create(){
        $districts = district::get();
        $tehsils = tehsil::get();

        $data = [
            'districts' => $districts,
            'tehsils' => $tehsils,
        ];
        return view('admin_panel.field_officers.create',$data);
    }


    public function edit($id){
        $districts = district::get();
        $tehsils = tehsil::get();
        $field_officer = FieldOfficer::find($id);
        $district_officers = DistrictOfficer::where('district' ,'=',$field_officer->district)->get();
        $data = [
            'districts' => $districts,
            'tehsils' => $tehsils,
            'field_officer' => $field_officer,
            'district_officers' => $district_officers
        ];
        return view('admin_panel.field_officers.create',$data);
    }

    public function store(request $request){

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
                $FieldOfficer = FieldOfficer::where('id',$request->edit_id)->update([
                    // 'admin_or_user_id'  => $request->district_officer,
                    'full_name'         => $request->full_name,
                    'contact_number'    => $request->contact_number,
                    'cnic'           => $request->cnic,
                    'email_address'     => $request->email_address,
                    'district'          => $request->district,
                    'tehsil'            => $tehsil,
                    'tappas'            => $tappa,
                    'username'          => $request->full_name,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ]);
                return redirect()->back()->with('officer-added', 'Field Officer Updated Successfully');
            }
            else
            {
                $FieldOfficer = FieldOfficer::create([
                    // 'admin_or_user_id'    => $request->district_officer,
                    'full_name'          => $request->full_name,
                    'contact_number'          => $request->contact_number,
                    'cnic'          => $request->cnic,
                    'email_address'          => $request->email_address,
                    'district'          => $request->district,
                    'tehsil'          => $tehsil,
                    'tappas'          => $tappa,
                    'username'          => $request->full_name,
                    'password'          => $request->password,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ]);
                // Create a user record with the same credentials and usertype 'employee'
                $user = User::create([
                    'name' => $request->full_name,
                    'user_id' => $FieldOfficer->id,
                    'email' => $request->email_address,
                    'district' => $request->district,
                    'tehsil' => $tehsil,
                    'tappas'    => $tappa,
                    'password' => bcrypt($request->password), // Make sure to hash the password
                    'usertype' => 'Field_Officer', // Set the usertype to 'employee'
                ]);

                return redirect()->back()->with('officer-added', 'Field Officer Created Successfully');
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
}
