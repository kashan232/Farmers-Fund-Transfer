<?php

namespace App\Http\Controllers;

use App\Models\AgricultureFarmersRegistration;
use App\Models\AgricultureUserFarmerRegistration;
use App\Models\District;
use App\Models\LandRevenueDepartment;
use App\Models\LandRevenueFarmerRegistation;
use App\Models\OnlineFarmerRegistration;
use App\Models\Tehsil;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FieldOfficer;
use Illuminate\Validation\ValidationException;

class DistrictOfficerPanelController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $user_id = Auth()->user()->user_id;
        $agriUserfarmersCount = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->count();
        $Unverifiedfarmeragiruser = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->where('verification_status', '=', 'Unverified')->count();
        $Verifiedfarmeragiruser = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->where('verification_status', '=', 'Verified')->count();
        return view('district_officer_panel.index', [
            'agriUserfarmersCount' => $agriUserfarmersCount,
            'Unverifiedfarmeragiruser' => $Unverifiedfarmeragiruser,
            'Verifiedfarmeragiruser' => $Verifiedfarmeragiruser,
        ]);
    }


    public function farmers_index(){
        $user = User::find(Auth::id());
        $farmers = LandRevenueFarmerRegistation::where('district', '=', $user->district)->whereIn('verification_status', [0,1])->get();
        return view('district_officer_panel.farmers.index',['farmers' => $farmers]);
    }

    public function unverify_farmers(){
        $user = User::find(Auth::id());
        $farmers = LandRevenueFarmerRegistation::where('district', '=', $user->district)->where('verification_status', '=', 0)->get();
        return view('district_officer_panel.farmers.unverify_farmers',['farmers' => $farmers]);
    }

    public function verify_farmers(){
        $user = User::find(Auth::id());
        $farmers = LandRevenueFarmerRegistation::where('district', '=', $user->district)->where('verification_status', '=', 1)->get();
        return view('district_officer_panel.farmers.verify_farmers',['farmers' => $farmers]);
    }

    public function all_field_officer(){
        $user = user::find(Auth::id());
        $field_officers = FieldOfficer::where('District', $user->district)->get();
        return view('district_officer_panel.field_officers.index',['data' => $field_officers]);
    }

    public function create_field_officer(){
        $user = User::find(Auth::id());
        $tehsils = Tehsil::where('district', '=', $user->district)->get();
        return view('district_officer_panel.field_officers.create',['district' => $user->district,'tehsils' => $tehsils]);
    }


    public function edit_field_officer($id){
        $user = User::find(Auth::id());
        $data = FieldOfficer::find($id);
        $tehsils = Tehsil::where('district', '=', $user->district)->get();
        return view('district_officer_panel.field_officers.create',['data' => $data,'tehsils' => $tehsils]);
    }


    public function store_field_officer(request $request){

        if (Auth::id()) {

        try{

            $validatedData = $request->validate([
                'email_address' => 'required|email|unique:users,email',
            ]);

            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            $tehsil = json_encode($request->input('tehsil'));
            $ucs = json_encode($request->input('ucs'));
            $tappa = json_encode($request->input('tappa'));

            if($request->edit_id && $request->edit_id != '')
            {
                $FieldOfficer = FieldOfficer::where('id',$request->edit_id)->update([
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
                return redirect()->back()->with('officer-added', 'Field Officer Updated Successfully');
            }
            else
            {
                $FieldOfficer = FieldOfficer::create([
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
                    'user_id' => $FieldOfficer->id,
                    'email' => $request->email_address,
                    'district' => $request->district,
                    'tehsil' => $tehsil,
                    'ucs'               => $ucs,
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






    public function unverify_agri_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agriculture_farmers = AgricultureFarmersRegistration::where('verification_status', '!=', '1')->where('verification_status', '!=', 'Verified')->get();

            return view('district_officer_panel.agriculture_farmers.unverify_agri_farmers_by_land', [
                'all_agriculture_farmers' => $all_agriculture_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_agri_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agriculture_farmers = AgricultureFarmersRegistration::where('verification_status', '=', 1)->get();
            return view('district_officer_panel.agriculture_farmers.verify_agri_farmers_by_land', [
                'all_agriculture_farmers' => $all_agriculture_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_unverify_agri_farmers(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $farmers_id = $request->farmers_id;
            $verification_status = $request->verification_status; // Ensure this matches the form field name
            $declined_reason = $request->declined_reason; // Ensure this matches the form field name
            $user_name = Auth::user()->name;

            if ($verification_status == '1') {
                AgricultureFarmersRegistration::where('id', $farmers_id)->update([
                    'verification_status' => 1,
                    'declined_reason' => null,
                    'verification_by' => $user_name,
                    'updated_at' => Carbon::now(),
                ]);
            } else {
                AgricultureFarmersRegistration::where('id', $farmers_id)->update([
                    'verification_status' => 0,
                    'declined_reason' => $declined_reason,
                    'verification_by' => $user_name,
                    'updated_at' => Carbon::now(),
                ]);
            }
            return redirect()->back()->with('farmer-updated', 'Farmer verification status updated successfully');
        } else {
            return redirect()->back();
        }
    }


    public function verify_agriuser_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agricultureuser_farmers = AgricultureUserFarmerRegistration::where('verification_status', '=', 1)->get();
            return view('district_officer_panel.agricultureuser_farmers.verify_agriuser_farmers_by_land', [
                'all_agricultureuser_farmers' => $all_agricultureuser_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }



    public function unverify_agriuser_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agricultureuser_farmers = AgricultureUserFarmerRegistration::where('verification_status', '!=', '1')->where('verification_status', '!=', 'Verified')->get();
            return view('district_officer_panel.agricultureuser_farmers.unverify_agriuser_farmers_by_land', [
                'all_agricultureuser_farmers' => $all_agricultureuser_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }



    public function verify_unverify_agriuser_farmers(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $farmers_id = $request->farmers_id;
            $verification_status = $request->verification_status; // Ensure this matches the form field name
            $declined_reason = $request->declined_reason; // Ensure this matches the form field name

            $user_name = Auth::user()->name;

            if ($verification_status == '1') {
                AgricultureUserFarmerRegistration::where('id', $farmers_id)->update([
                    'verification_status' => 1,
                    'declined_reason' => null,
                    'verification_by' => $user_name,
                    'updated_at' => Carbon::now(),
                ]);
            } else {
                AgricultureUserFarmerRegistration::where('id', $farmers_id)->update([
                    'verification_status' => 0,
                    'declined_reason' => $declined_reason,
                    'verification_by' => $user_name,
                    'updated_at' => Carbon::now(),
                ]);
            }

            return redirect()->back()->with('farmer-updated', 'Farmer verification status updated successfully');
        } else {
            return redirect()->back();
        }
    }

    public function view_do_farmers($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $data = AgricultureFarmersRegistration::where('id', '=', $id)->first();
            // dd($data);
            return view('district_officer_panel.agriculture_farmers.view_farmers', [
                'data' => $data,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
