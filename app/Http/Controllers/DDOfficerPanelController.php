<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgricultureFarmersRegistration;
use App\Models\AgricultureUserFarmerRegistration;
use App\Models\District;
use App\Models\LandRevenueDepartment;
use App\Models\LandRevenueFarmerRegistation;
use App\Models\OnlineFarmerRegistration;
use App\Models\Tehsil;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\FieldOfficer;
use App\Models\DDOfficer;

use Illuminate\Validation\ValidationException;

class DDOfficerPanelController extends Controller
{
    public function farmers_index(){
        $user = User::find(Auth::id());
        $tehsils = Tehsil::where('district', '=', $user->district)->get();

        $farmers = LandRevenueFarmerRegistation::where('district', '=', $user->district)

        ->where(function($query) {
            $query->where('verification_status', 'rejected_by_lo')
                  ->orWhere('verification_status', 'verified_by_ao')
                  ->orWhere('verification_status', null);
        })
        ->paginate(5);



        return view('dd_officer_panel.farmers.index',['farmers' => $farmers, 'tehsils' => $tehsils]);
    }

    public function farmer_edit($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $district = Auth()->user()->district;
            $tehsil = Auth()->user()->tehsil;
            $data = LandRevenueFarmerRegistation::where('id', '=', $id)->first();
            // dd($all_land_farmer);
            return view('dd_officer_panel.farmers.edit', [
                'data' => $data,
                'district' => $district,
                'tehsil' => $tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function view_farmers($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $data = LandRevenueFarmerRegistation::where('id', '=', $id)->first();
            // dd($all_agriculture_farmers);
            return view('dd_officer_panel.farmers.view', [
                'data' => $data,
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function verify_farmer(request $request){
        $user = User::find(Auth::id());
        $farmer = LandRevenueFarmerRegistation::find($request->farmer_id);
        // Update farmer verification status
        $farmer->verification_status = $request->verification_status;
        if ($request->verification_status == 'rejected_by_dd') {
            $farmer->declined_reason = $request->declined_reason;
        }
        else{
            $farmer->declined_reason = null;
        }
        $farmer->verification_by = $user->id;
        $farmer->save();
        return redirect()->back()->with('farmers-registered', 'Done');
    }
}