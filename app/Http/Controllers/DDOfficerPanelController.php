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


    public function farmers_index(Request $req, $search = null, $status = null){

        // $user = User::find(Auth::id());
        // $tehsils = Tehsil::whereIn('district', json_decode($user->district))->get();
        // $farmers =  LandRevenueFarmerRegistation::whereIn('district', json_decode($user->district))

        //         ->whereIn('tehsil', json_decode($user->tehsil))
        //         ->whereIn('tappa', json_decode($user->tappas))
        //         ->whereIn('verification_status', [
        //             'rejected_by_dd','rejected_by_lrd',
        //             'verified_by_ao','verified_by_lrd',
        //             'verified_by_dd',
        //         ])
        // ->latest()->get();
        // return view('dd_officer_panel.farmers.index',['farmers' => $farmers, 'tehsils' => $tehsils]);



        if (!empty($req->user_id)) {
            $query = LandRevenueFarmerRegistation::with('user')->orderBy('tehsil', 'asc');
        }
        else{
            $user = User::find(Auth::id());
                $query =  LandRevenueFarmerRegistation::whereIn('district', json_decode($user->district))

                        ->whereIn('tehsil', json_decode($user->tehsil))
                        ->whereIn('tappa', json_decode($user->tappas))
                        ->where(function ($query) {
                        $query->whereIn('verification_status', [
                            'verified_by_fa',
                            'verified_by_ao',
                            'verified_by_lrd',
                            'rejected_by_fa',
                            'rejected_by_ao',
                            'rejected_by_lrd',
                        ])->orWhereNull('verification_status');
                    })
                ->latest();
        }


        if (!empty($req->user_id) && $req->fa_total_farmers == 'total_farmers') {
            $user = user::find( $req->user_id);
            // $tehsils = json_decode($user->tehsil ?? '[]');
            // $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->where('tehsil', $user->tehsil)
            ->whereIn('tappa', $tappas)
             ->where(function ($query) {
                $query->whereIn('verification_status', [
                    'verified_by_fa',
                    'verified_by_ao',
                    'verified_by_lrd',
                    'rejected_by_fa',
                    'rejected_by_ao',
                    'rejected_by_lrd',
                ])->orWhereNull('verification_status');
            });
        }

        if (!empty($req->user_id) && $req->fa_in_process == 'in_process') {
            $user = user::find( $req->user_id);
            // $tehsils = json_decode($user->tehsil ?? '[]');
            // $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->where('tehsil', $user->tehsil)
            ->whereIn('tappa', $tappas)
             ->where(function ($query) {
                $query->whereIn('verification_status', [
                    'verified_by_fa',
                    'verified_by_ao',
                ]);
            });
        }

        if (!empty($req->user_id) && $req->fa_rejected == 'rejected') {
            $user = user::find( $req->user_id);
            // $tehsils = json_decode($user->tehsil ?? '[]');
            // $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->where('tehsil', $user->tehsil)
            ->whereIn('tappa', $tappas)
             ->where(function ($query) {
                 $query->whereIn('verification_status', [
                    'rejected_by_fa',
                    'rejected_by_ao',
                    'rejected_by_lrd',
                ]);
            });
        }

        if (!empty($req->user_id) && $req->fa_verified == 'verified') {
            $user = user::find( $req->user_id);
            // $tehsils = json_decode($user->tehsil ?? '[]');
            // $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->where('tehsil', $user->tehsil)
            ->whereIn('tappa', $tappas)
             ->where(function ($query) {
                 $query->whereIn('verification_status', [

                    'verified_by_lrd',
                ]);
            });
        }

        if (!empty($req->user_id) && $req->fa_pending == 'pending') {
            $user = user::find( $req->user_id);
            // $tehsils = json_decode($user->tehsil ?? '[]');
            // $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->where('tehsil', $user->tehsil)
            ->whereIn('tappa', $tappas)
            ->where(function ($query) {
                    $query->whereNull('verification_status');
            });
        }



        ////// AOOOO //////


        if (!empty($req->user_id) && $req->ao_total_farmers == 'total_farmers') {
            $user = user::find( $req->user_id);
            // $tehsils = json_decode($user->tehsil ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->whereIn('tehsil', $tehsils)
            ->whereIn('tappa', $tappas)
             ->where(function ($query) {
                 $query->whereIn('verification_status', [
                    'verified_by_fa',
                    'verified_by_ao',
                    'verified_by_lrd',
                    'rejected_by_ao',
                    'rejected_by_lrd',
                ]);
            });
        }


        if (!empty($req->user_id) && $req->ao_in_process == 'in_process') {
            $user = user::find( $req->user_id);
            // $tehsils = json_decode($user->tehsil ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->whereIn('tehsil', $tehsils)
            ->whereIn('tappa', $tappas)
             ->where(function ($query) {
                $query->whereIn('verification_status', [
                    'verified_by_ao',
                    'verified_by_lrd'
                ]);
            });
        }


        if (!empty($req->user_id) && $req->ao_rejected == 'rejected') {
            $user = user::find( $req->user_id);
            // $tehsils = json_decode($user->tehsil ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->whereIn('tehsil', $tehsils)
            ->whereIn('tappa', $tappas)
             ->where(function ($query) {
                $query->whereIn('verification_status', [
                    'rejected_by_ao',
                    'rejected_by_lrd',
                ]);
            });
        }


        if (!empty($req->user_id) && $req->ao_pending == 'pending') {
            $user = user::find( $req->user_id);
            // $tehsils = json_decode($user->tehsil ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->whereIn('tehsil', $tehsils)
            ->whereIn('tappa', $tappas)
             ->where(function ($query) {
                 $query->whereIn('verification_status', [
                    'verified_by_fa',
                ]);
            });
        }








        /// LRD ////

        if (!empty($req->user_id) && $req->lrd_total_farmers == 'total_farmers') {
            $user = user::find( $req->user_id);
            // $tehsils = json_decode($user->tehsil ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->whereIn('tehsil', $tehsils)
            ->whereIn('tappa', $tappas)
             ->where(function ($query) {
                 $query->whereIn('verification_status', [
                    'verified_by_ao',
                    'verified_by_lrd',
                    'rejected_by_lrd',
                ]);
            });
        }


        if (!empty($req->user_id) && $req->lrd_verified == 'verified') {
            $user = user::find( $req->user_id);
            // $tehsils = json_decode($user->tehsil ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->whereIn('tehsil', $tehsils)
            ->whereIn('tappa', $tappas)
             ->where(function ($query) {
                $query->whereIn('verification_status', [
                    'verified_by_lrd'
                ]);
            });
        }


        if (!empty($req->user_id) && $req->lrd_rejected == 'rejected') {
            $user = user::find( $req->user_id);
            // $tehsils = json_decode($user->tehsil ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->whereIn('tehsil', $tehsils)
            ->whereIn('tappa', $tappas)
             ->where(function ($query) {
                $query->whereIn('verification_status', [

                    'rejected_by_lrd',
                ]);
            });
        }


        if (!empty($req->user_id) && $req->lrd_pending == 'pending') {
            $user = user::find( $req->user_id);
            // $tehsils = json_decode($user->tehsil ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->whereIn('tehsil', $tehsils)
            ->whereIn('tappa', $tappas)
             ->where(function ($query) {
                 $query->whereIn('verification_status', [
                    'verified_by_ao',
                ]);
            });
        }



        $totalFarmers = (clone $query)->count();
        $farmers = $query->paginate(5000)->appends($req->all());
        return view('dd_officer_panel.farmers.index',['farmers' => $farmers, 'totalFarmers' => $totalFarmers]);



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
            if($request->declined_reason == 'other')
            {
                $farmer->declined_reason = $request->other_reason;
            }
            else{
                $farmer->declined_reason = $request->declined_reason;
            }
        }
        else{
            $farmer->declined_reason = null;
        }
        $farmer->verification_by = $user->id;
        $farmer->save();
        return redirect()->route('farmers-by-dd')->with('farmers-registered', 'Done');
    }
}
