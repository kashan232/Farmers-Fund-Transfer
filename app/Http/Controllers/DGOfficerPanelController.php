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

        // Paginate results
        $farmers = $query->paginate(10);

        return view('pd_officer_panel.reporting.farmers',['farmers'=>$farmers ]);
    }


}
