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

        if($req->usertype == 'Field_Officer')
        {
            $users = User::with('fieldOfficer')->select('id', 'usertype', 'user_id', 'name', 'number', 'cnic', 'email', 'district', 'tehsil', 'tappas')
            ->with('fieldOfficer')
            ->withCount('farmers') // Counts related farmers
            ->where('district', $req->district)
            ->where('usertype', $req->usertype)
            ->get();

            // dd($users);
        }
        elseif ($req->usertype == 'Agri_Officer') {

            $agriUsers = User::with('agriOfficer')->select('id', 'usertype', 'user_id', 'name', 'number', 'cnic', 'email', 'district', 'tehsil', 'tappas')
            ->where('district', $req->district)
            ->where('usertype', 'Agri_Officer')
            ->get();

            $users = $agriUsers->map(function ($user) {
                $tehsils = json_decode($user->tehsil ?? '[]');
                $tappas = json_decode($user->tappas ?? '[]');

                $farmerCount = LandRevenueFarmerRegistation::where('district', $user->district)
                    ->whereIn('tehsil', $tehsils)
                    ->whereIn('tappa', $tappas)
                    ->whereIn('verification_status', [
                        'rejected_by_ao',
                        'verified_by_fa',
                        'verified_by_ao'
                    ])
                    ->count();

                // Add farmers_count to match Field Officer structure
                $user->farmers_count = $farmerCount;
                return $user;
            });

        }elseif ($req->usertype == 'DD_Officer') {




            $district = $req->district; // e.g., "Badin"

            $agriUsers = User::with('ddOfficer')->select('id', 'usertype', 'user_id', 'name', 'number', 'cnic', 'email', 'district', 'tehsil', 'tappas')
                ->where('district', 'LIKE', '%"'.$district.'"%') // Search inside ["Badin"]
                ->where('usertype', 'DD_Officer')
                ->get();



            $users = $agriUsers->map(function ($user) use ($district) { // Pass $district inside closure
                // Decode the user's district
                $districts = json_decode($user->district ?? '[]');

                $tehsils = json_decode($user->tehsil ?? '[]');
                $tappas = json_decode($user->tappas ?? '[]');

                // Make sure the current user's district is being used to count farmers for them
                if (in_array($district, $districts)) {
                    $farmerCount = LandRevenueFarmerRegistation::whereIn('district', $districts)->whereIn('tehsil', $tehsils)
                    ->whereIn('tappa', $tappas)
                        ->whereIn('verification_status', [
                            'rejected_by_dd',
                            'verified_by_ao',
                            'verified_by_dd',
                            'verified_by_lrd'
                        ])
                        ->count();

                    // Add farmers_count to the user object
                    $user->farmers_count = $farmerCount;
                } else {
                    $user->farmers_count = 0;
                }

                return $user;
            });

        }


        elseif ($req->usertype == 'Land_Revenue_Officer') {




            $district = $req->district; // e.g., "Badin"

            $agriUsers = User::with('lrdOfficer')->select('id', 'usertype', 'user_id', 'name', 'number', 'cnic', 'email', 'district', 'tehsil', 'tappas')
                ->where('district', $district) // Search inside ["Badin"]
                ->where('usertype', 'Land_Revenue_Officer')
                ->get();

            $users = $agriUsers->map(function ($user) use ($district) { // Pass $district inside closure
                // Decode the user's district
                $district = $user->district;

                $tehsils = json_decode($user->tehsil ?? '[]');
                $tappas = json_decode($user->tappas ?? '[]');


                    $farmerCount = LandRevenueFarmerRegistation::where('district', $district)->whereIn('tehsil', $tehsils)
                    ->whereIn('tappa', $tappas)
                        ->whereIn('verification_status', [
                            'rejected_by_lrd',

                            'verified_by_dd',
                            'verified_by_lrd'
                        ])
                        ->count();

                    // Add farmers_count to the user object
                    $user->farmers_count = $farmerCount;

                return $user;
            });

        }

        elseif ($req->usertype == 'District_Officer') {

            $district = $req->district; // e.g., "Badin"

            $agriUsers = User::with('adOfficer')->select('id', 'usertype', 'user_id', 'name', 'number', 'cnic', 'email', 'district', 'tehsil', 'tappas')
            ->where('district', 'LIKE', '%"'.$district.'"%')
            ->where('usertype', 'District_Officer')
            ->get();

            $users = $agriUsers->map(function ($user) use ($district) { // Pass $district inside closure

                // Decode the user's district
                $district = json_decode($user->district ?? '[]');

                $tehsils = json_decode($user->tehsil ?? '[]');
                $tappas = json_decode($user->tappas ?? '[]');


                $farmerCount = LandRevenueFarmerRegistation::whereIn('district', $district)->whereIn('tehsil', $tehsils)
                ->whereIn('tappa', $tappas)
                ->count();

                // Add farmers_count to the user object
                $user->farmers_count = $farmerCount;

                return $user;
            });

        }


        return view('pd_officer_panel.field_officer_list',[
            'users' => $users,
         ]);

    }


}
