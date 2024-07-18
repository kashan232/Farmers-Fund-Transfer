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

class DistrictOfficerPanelController extends Controller
{
   public function index(){
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


   public function unverify_agri_farmers_by_land()
   {
       if (Auth::id()) {
           $userId = Auth::id();
           // dd($userId);
           $all_agriculture_farmers = AgricultureFarmersRegistration::where('verification_status', '=', 'Unverified')->get();
           return view('district_officer_panel.agriculture_farmers.unverify_agri_farmers_by_land', [
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
           return view('district_officer_panel.agriculture_farmers.verify_agri_farmers_by_land', [
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

           AgricultureFarmersRegistration::where('id', $farmers_id)->update([
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

   public function unverify_farmers_by_land()
   {
       if (Auth::id()) {
           $userId = Auth::id();
           // dd($userId);
           $land_id = Auth()->user()->user_id;
           // dd($land_id);

           $all_land_farmers = LandRevenueFarmerRegistation::where('land_emp_id', $land_id)->where('verification_status', '=', 'Unverified')->get();
           return view('district_officer_panel.land_verifications.unverify_farmers_by_land', [
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
           return view('district_officer_panel.land_verifications.verify_farmers_by_land', [
               'all_land_farmers' => $all_land_farmers,
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
           return view('district_officer_panel.agricultureuser_farmers.verify_agriuser_farmers_by_land', [
               'all_agricultureuser_farmers' => $all_agricultureuser_farmers,
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
           return view('district_officer_panel.land_verifications.verifications_land_farmers', [
               'all_land_farmers' => $all_land_farmers,
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
           $all_agricultureuser_farmers = AgricultureUserFarmerRegistration::where('verification_status', '=', 'Unverified')->get();
           return view('district_officer_panel.agricultureuser_farmers.unverify_agriuser_farmers_by_land', [
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

           AgricultureUserFarmerRegistration::where('id', $farmers_id)->update([
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

   public function unverify_online_farmers_by_land()
   {
       if (Auth::id()) {
           $userId = Auth::id();
           // dd($userId);
           $online_farmers = OnlineFarmerRegistration::where('verification_status', '=', 'Unverified')->get();
           return view('district_officer_panel.online_farmers_verifications.unverify_farmers_by_land', [
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
           return view('district_officer_panel.online_farmers_verifications.verify_farmers_by_land', [
               'all_land_farmers' => $all_land_farmers,
           ]);
       } else {
           return redirect()->back();
       }
   }

}
