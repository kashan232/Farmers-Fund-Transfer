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
use App\Models\OurUser;

class ReportingController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_district = District::get();
            $all_tehsil = Tehsil::get();

            return view('admin_panel.Reporting.index', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
            ]);
        }
    }

    public function reports_generate(Request $req)
    {
        // Start the query with a base condition for the province (which is always 'SINDH')
        $query = OurUser::where('Province', 'SINDH');

        // Apply district filter only if a specific district is selected
        if ($req->district != 'All') {
            $query->where('District', $req->district);
        }

        // Apply tehsil filter if tehsils are selected
        if (!empty($req->tehsil)) {
            $query->whereIn('Tehsil', $req->tehsil);
        }

        // Apply acreage range filter if provided
        if ($req->min_acre && $req->max_acre) {
            $query->whereBetween('Area', [$req->min_acre, $req->max_acre]);
        }

        // Paginate the filtered data, limiting to 100 records per page
        $data = $query->paginate(100);

        // Return the paginated data to the view
        return view('admin_panel.Reporting.reports-generate', ['data' => $data]);
    }



    // public function reports_generate(Request $req)
    // {
    //     // Fetching farmers based on district, tehsil, and acreage range
    //     $data = OurUser::where('district', $req->district)
    //         ->whereIn('tehsil', $req->tehsil)
    //         ->whereBetween('Area', [$req->min_acre, $req->max_acre])
    //         ->get();

    //     // dd($data);
    //     // If data exists, return the view with the data
    //     if ($data && $data->isNotEmpty()) {
    //         return view('admin_panel.Reporting.reports-generate', ['data' => $data]);
    //     } else {
    //         // If no data is found, return the view with an empty dataset
    //         return view('admin_panel.Reporting.reports-generate', ['data' => []]);
    //     }
    // }

    // public function reports_generate(request $req)
    // {
    //     dd($req);
    //     if($req->farmer_type == 'agriculture_farmers')
    //     {

    //         $data = AgricultureFarmersRegistration::where('verification_status','=',$req->verify_status)->where('district','=',$req->district)->whereIn('tehsil', $req->tehsil)->get();
    //     }
    //     elseif($req->farmer_type == 'land_farmers')
    //     {
    //         $data = LandRevenueFarmerRegistation::where('verification_status','=',$req->verify_status)->where('district','=',$req->district)->whereIn('tehsil', $req->tehsil)->get();
    //     }
    //     elseif($req->farmer_type == 'online_farmers')
    //     {
    //         $data = OnlineFarmerRegistration::where('verification_status','=',$req->verify_status)->where('district','=',$req->district)->whereIn('tehsil', $req->tehsil)->get();
    //     }
    //     elseif($req->farmer_type == 'agriculture_user_farmers')
    //     {
    //         $data = AgricultureUserFarmerRegistration::where('verification_status','=',$req->verify_status)->where('district','=',$req->district)->whereIn('tehsil', $req->tehsil)->get();
    //     }


    //     if($data && $data != '')
    //     {
    //         return view('admin_panel.Reporting.reports-generate',['data' => $data]);
    //     }

    // }

    public function view($id, $tablename)
    {

        $modelClass = 'App\\Models\\' . $tablename;
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $data = $modelClass::where('id', '=', $id)->first();
            // dd($data);
            return view('admin_panel.Reporting.reports-view', [
                'data' => $data,
            ]);
        }
    }
}
