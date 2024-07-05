<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\AgricultureFarmersRegistration;
use App\Models\LandRevenueFarmerRegistation;
use App\Models\AgricultureUserFarmerRegistration;
use App\Models\OnlineFarmerRegistration;



class ReportingController extends Controller
{
    public function index(){
        if (Auth::id()) {
            $userId = Auth::id();
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();

        return view('admin_panel.reporting.index',[
            'all_district' => $all_district,
            'all_tehsil' => $all_tehsil,
        ]);
        }
    }

    public function reports_generate(request $req){

        if($req->farmer_type == 'agriculture_farmers')
        {

            $data = AgricultureFarmersRegistration::where('verification_status','=',$req->verify_status)->where('district','=',$req->district)->whereIn('tehsil', $req->tehsil)->get();
        }
        elseif($req->farmer_type == 'land_farmers')
        {
            $data = LandRevenueFarmerRegistation::where('verification_status','=',$req->verify_status)->where('district','=',$req->district)->whereIn('tehsil', $req->tehsil)->get();
        }
        elseif($req->farmer_type == 'online_farmers')
        {
            $data = OnlineFarmerRegistration::where('verification_status','=',$req->verify_status)->where('district','=',$req->district)->whereIn('tehsil', $req->tehsil)->get();
        }
        elseif($req->farmer_type == 'agriculture_user_farmers')
        {
            $data = AgricultureUserFarmerRegistration::where('verification_status','=',$req->verify_status)->where('district','=',$req->district)->whereIn('tehsil', $req->tehsil)->get();
        }


        if($data && $data != '')
        {
            return view('admin_panel.reporting.reports-generate',['data' => $data]);
        }

    }

    public function view($id, $tablename)
    {

        $modelClass = 'App\\Models\\' . $tablename;
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $data = $modelClass::where('id', '=', $id)->first();
            // dd($data);
            return view('admin_panel.reporting.reports-view', [
                'data' => $data,
            ]);
        }
    }
}
