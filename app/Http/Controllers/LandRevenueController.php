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
use App\Imports\FarmersImport;
use Maatwebsite\Excel\Facades\Excel;
class LandRevenueController extends Controller
{


    public function upload_excel_index(){

        return view('land_revenue_panel.upload_excel.index');

    }

    public function upload_excel_import(request $request){

        $request->validate([
            'file' => 'required|file|mimes:xlsx',
        ]);

        try {
            Excel::import(new FarmersImport, $request->file('file'));
            return redirect()->back()->with('success', 'Farmers imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['file' => $e->getMessage()]);
        }

        return redirect()->back()->with('success', 'Excel imported successfully.');

    }

    public function add_revenue_officer()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.Land_revenue_department.add_revenue_officer', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function edit_revenue_officer($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $data = LandRevenueDepartment::find($id);
            // dd($userId);
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.Land_revenue_department.edit_revenue_officer', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_revenue_officer(Request $request)
    {
        if (Auth::id()) {

            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            $tehsil = json_encode($request->input('tehsil'));
            $ucs = json_encode($request->input('ucs'));
            $tappa = json_encode($request->input('tappa'));

            if($request->edit_id && $request->edit_id != '')
            {
                $landrevenue = LandRevenueDepartment::where('id',$request->edit_id)->update([
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
                return redirect()->back()->with('officer-added', 'Land Revenue Officer updated Successfully');
            }
            else{
                $landrevenue = LandRevenueDepartment::create([
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

                // Create a user record with the same credentials and usertype 'employee'
                $user = User::create([
                    'user_id' => $landrevenue->id,
                    'name' => $request->full_name,
                    'email' => $request->email_address,
                    'district' => $request->district,
                    'tehsil' => $tehsil,
                    'ucs'               => $ucs,
                    'tappas'          => $tappa,
                    'password' => bcrypt($request->password), // Make sure to hash the password
                    'usertype' => 'Land_Revenue_Officer', // Set the usertype to 'employee'
                ]);

                return redirect()->back()->with('officer-added', 'Land Revenue Officer Created Successfully');
            }
        } else {
            return redirect()->back();
        }
    }
    public function all_revenue_officer()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_revenue = LandRevenueDepartment::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.Land_revenue_department.all_revenue_officer', [
                'all_revenue' => $all_revenue,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function all_agri_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agriculture_farmers = AgricultureFarmersRegistration::where('verification_status', '!=', '0')->get();
            return view('land_revenue_panel.agriculture_farmers.all_agri_farmers_by_land', [
                'all_agriculture_farmers' => $all_agriculture_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function unverify_agri_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agriculture_farmers = AgricultureFarmersRegistration::where('verification_status', '=', 1)->orWhere('verification_status', '=', 2)->get();
            return view('land_revenue_panel.agriculture_farmers.unverify_agri_farmers_by_land', [
                'all_agriculture_farmers' => $all_agriculture_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_agri_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agriculture_farmers = AgricultureFarmersRegistration::where('verification_status', '=', 'Verified')->get();
            return view('land_revenue_panel.agriculture_farmers.verify_agri_farmers_by_land', [
                'all_agriculture_farmers' => $all_agriculture_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_unverify_agri_farmers_by_land(Request $request)
    {

        if (Auth::id()) {
            $userId = Auth::id();
            $farmers_id = $request->farmers_id;
            $verification_status = $request->verification_status; // Ensure this matches the form field name
            $declined_reason = $request->declined_reason; // Ensure this matches the form field name

            $user_name = Auth::user()->name;

            if( $verification_status == '1')
            {
             AgricultureFarmersRegistration::where('id', $farmers_id)->update([
                 'verification_status' => 'Verified',
                 'declined_reason' => null,
                 'verification_by' => $user_name,
                 'updated_at' => Carbon::now(),
             ]);
            }
            else{
             AgricultureFarmersRegistration::where('id', $farmers_id)->update([
                 'verification_status' => 2,
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



    public function all_agriuser_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agricultureuser_farmers = AgricultureUserFarmerRegistration::where('verification_status', '=', '1')->orWhere('verification_status', '=', 2)->orWhere('verification_status', '=',   'Verified')->get();

            return view('land_revenue_panel.agricultureuser_farmers.all_agriuser_farmers_by_land', [
                'all_agricultureuser_farmers' => $all_agricultureuser_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function unverify_agriuser_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agricultureuser_farmers = AgricultureUserFarmerRegistration::where('verification_status', '=', 1)->orWhere('verification_status', '=', 2)->get();
            return view('land_revenue_panel.agricultureuser_farmers.unverify_agriuser_farmers_by_land', [
                'all_agricultureuser_farmers' => $all_agricultureuser_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_agriuser_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agricultureuser_farmers = AgricultureUserFarmerRegistration::where('verification_status', '=', 'Verified')->get();
            return view('land_revenue_panel.agricultureuser_farmers.verify_agriuser_farmers_by_land', [
                'all_agricultureuser_farmers' => $all_agricultureuser_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_unverify_agriuser_farmers_by_land(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $farmers_id = $request->farmers_id;
            $verification_status = $request->verification_status; // Ensure this matches the form field name
            $declined_reason = $request->declined_reason; // Ensure this matches the form field name

            $user_name = Auth::user()->name;

            if( $verification_status == '1')
            {
             AgricultureUserFarmerRegistration::where('id', $farmers_id)->update([
                 'verification_status' => 'Verified',
                 'declined_reason' => null,
                 'verification_by' => $user_name,
                 'updated_at' => Carbon::now(),
             ]);
            }
            else{
             AgricultureUserFarmerRegistration::where('id', $farmers_id)->update([
                 'verification_status' => 2,
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

    public function unverify_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $land_id = Auth()->user()->user_id;
            // dd($land_id);

            $all_land_farmers = LandRevenueFarmerRegistation::where('land_emp_id', $land_id)->where('verification_status', '=', 1)->get();
            return view('land_revenue_panel.land_verifications.unverify_farmers_by_land', [
                'all_land_farmers' => $all_land_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $land_id = Auth()->user()->user_id;
            // dd($userId);
            $all_land_farmers = LandRevenueFarmerRegistation::where('land_emp_id', $land_id)->where('verification_status', '=', 'Verified')->get();
            return view('land_revenue_panel.land_verifications.verify_farmers_by_land', [
                'all_land_farmers' => $all_land_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_unverify_land_farmers(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $farmers_id = $request->farmers_id;
            $verification_status = $request->verification_status; // Ensure this matches the form field name
            $declined_reason = $request->declined_reason; // Ensure this matches the form field name

            $user_name = Auth::user()->name;

            LandRevenueFarmerRegistation::where('id', $farmers_id)->update([
                'verification_status' => $verification_status,
                'declined_reason' => $verification_status === 'Unverified' ? $declined_reason : null,
                'verification_by' => $user_name,
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('farmer-updated', 'Farmer verification status updated successfully');
        } else {
            return redirect()->back();
        }
    }

    public function verifications_land_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $land_id = Auth()->user()->user_id;
            // dd($land_id);
            $all_land_farmers = LandRevenueFarmerRegistation::where('land_emp_id', $land_id)->get();
            return view('land_revenue_panel.land_verifications.verifications_land_farmers', [
                'all_land_farmers' => $all_land_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function unverify_online_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $online_farmers = OnlineFarmerRegistration::where('verification_status', '=', 1)->get();
            return view('land_revenue_panel.online_farmers_verifications.unverify_farmers_by_land', [
                'online_farmers' => $online_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_online_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $land_id = Auth()->user()->user_id;
            // dd($userId);
            $all_land_farmers = OnlineFarmerRegistration::where('verification_status', '=', 'Verified')->get();
            return view('land_revenue_panel.online_farmers_verifications.verify_farmers_by_land', [
                'all_land_farmers' => $all_land_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verifications_online_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $land_id = Auth()->user()->user_id;
            // dd($land_id);
            $all_land_farmers = OnlineFarmerRegistration::get();
            return view('land_revenue_panel.online_farmers_verifications.verifications_land_farmers', [
                'all_land_farmers' => $all_land_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function view_farmers_land($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $data = AgricultureFarmersRegistration::where('id', '=', $id)->first();
            // dd($data);
            return view('land_revenue_panel.agriculture_farmers.view_agri_farmers', [
                'data' => $data,
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function verify_unverify_online_farmers(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $farmers_id = $request->farmers_id;
            $verification_status = $request->verification_status; // Ensure this matches the form field name
            $declined_reason = $request->declined_reason; // Ensure this matches the form field name

            $user_name = Auth::user()->name;

            OnlineFarmerRegistration::where('id', $farmers_id)->update([
                'verification_status' => $verification_status,
                'declined_reason' => $verification_status === 'Unverified' ? $declined_reason : null,
                'verification_by' => $user_name,
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('farmer-updated', 'Farmer verification status updated successfully');
        } else {
            return redirect()->back();
        }
    }

    public function farmers_reporting(request $request){

        $userId = Auth::id();
        $data = LandRevenueFarmerRegistation::where('admin_or_user_id', '=', $userId)->get();

        return view('land_revenue_panel.farmers_reporting.index', [
            'data' => $data,
        ]);
    }

}
