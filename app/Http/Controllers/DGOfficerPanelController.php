<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandRevenueFarmerRegistation;
use App\Models\District;
use App\Models\Tappa;
use App\Models\Tehsil;
use App\Models\UC;


class DGOfficerPanelController extends Controller
{
    public function index(){
        $farmers = LandRevenueFarmerRegistation::paginate(10);

        return view('pd_officer_panel.farmers',['farmers'=>$farmers ]);
    }


    public function reporting(){
        $districts = District::all();
        return view('pd_officer_panel.reporting.index',['districts'=>$districts ]);
    }


    public function reporting_fetch(request $req){
        $query = LandRevenueFarmerRegistation::query();

            // Check if district is set and not null, otherwise, fetch all
            if (!empty($req->district) && $req->district[0] !== null) {
                $query->whereIn('district', $req->district);
            }

            // Apply filters only if they are not empty
            if (!empty($req->taluka) && $req->taluka[0] !== null) {
                $query->whereIn('tehsil', $req->taluka);
            }

            if (!empty($req->tappa) && $req->tappa[0] !== null) {
                $query->whereIn('tappa', $req->tappa);
            }

            if (!empty($req->start_date) && $req->start_date == $req->end_date) {
                $query->whereDate('created_at', $req->start_date);
            } else {
                if(!empty($req->start_date)){
                    $query->whereBetween('created_at', [$req->start_date, $req->end_date]);
                }

            }

            if (!empty($req->farmer_type) && $req->farmer_type !== null) {
                $query->where('user_type', $req->farmer_type);
            }

            if (!empty($req->verification_status) && $req->verification_status !== null) {
                $query->where('verification_status', $req->verification_status);
            }


        // Paginate results
        $farmers = $query->paginate(10);

        return view('pd_officer_panel.reporting.farmers',['farmers'=>$farmers ]);
    }


}
