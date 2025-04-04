<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandRevenueFarmerRegistation;
use App\Models\District;
use App\Models\Tappa;
use App\Models\Tehsil;
use App\Models\UC;
use App\Models\User;

class DGOfficerPanelController extends Controller
{
    public function index(request $req){

        $query = LandRevenueFarmerRegistation::query();


        if (!empty($req->search) && $req->search !== null) {
            $query->where(function ($q) use ($req) {
                $q->where('name', 'LIKE', "%{$req->search}%")
                  ->orWhere('father_name', 'LIKE', "%{$req->search}%")
                  ->orWhere('surname', 'LIKE', "%{$req->search}%")
                  ->orWhere('mobile', 'LIKE', "%{$req->search}%")
                  ->orWhere('cnic', 'LIKE', "%{$req->search}%")
                  ->orWhere('district', 'LIKE', "%{$req->search}%")
                  ->orWhere('tehsil', 'LIKE', "%{$req->search}%")
                  ->orWhere('tappa', 'LIKE', "%{$req->search}%")
                  ->orWhere('uc', 'LIKE', "%{$req->search}%"); // Add more columns as needed
            });
        }

        $farmers = $query->paginate(10)->appends($req->all());

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


            if (!empty($req->search) && $req->search !== null) {
                $query->where(function ($q) use ($req) {
                    $q->where('name', 'LIKE', "%{$req->search}%")
                      ->orWhere('father_name', 'LIKE', "%{$req->search}%")
                      ->orWhere('surname', 'LIKE', "%{$req->search}%")
                      ->orWhere('mobile', 'LIKE', "%{$req->search}%")
                      ->orWhere('cnic', 'LIKE', "%{$req->search}%")
                      ->orWhere('district', 'LIKE', "%{$req->search}%")
                      ->orWhere('tehsil', 'LIKE', "%{$req->search}%")
                      ->orWhere('tappa', 'LIKE', "%{$req->search}%")
                      ->orWhere('uc', 'LIKE', "%{$req->search}%"); // Add more columns as needed
                });
            }


        // Paginate results and keep query parameters
        $farmers = $query->paginate(10)->appends($req->all());

        return view('pd_officer_panel.reporting.farmers',[
            'farmers' => $farmers,
            'requestData' => $req->all(), // Pass request data for hidden inputs
         ]);
    }

    public function get_fa_list_district(request $req){

        $users = User::select('id', 'name', 'number', 'cnic', 'email')
        ->withCount('farmers') // Counts related farmers
        ->where('district', $req->district)
        ->where('usertype', 'Field_Officer')
        ->paginate(10);


        return view('pd_officer_panel.field_officer_list',[
            'users' => $users,
         ]);

    }


}
