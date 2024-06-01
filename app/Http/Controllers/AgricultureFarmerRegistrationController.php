<?php

namespace App\Http\Controllers;

use App\Models\AgricultureFarmersRegistration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgricultureFarmerRegistrationController extends Controller
{
    public function add_agri_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            // $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('agriculture_officer_panel.farmers_registration.add_agri_farmers', [
                // 'all_district' => $all_district,
                // 'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function store_agri_farmers(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $userId = Auth::id();
            AgricultureFarmersRegistration::create([
                'admin_or_user_id'    => $userId,
                'agri_emp_id'    => $user_id,
                'agri_emp_name'    => $user_name,
                'name'          => $request->name,
                'father_name'          => $request->father_name,
                'gender'          => $request->gender,
                'cnic'          => $request->cnic,
                'province'          => $request->province,
                'district'          => $request->district,
                'tehsil'          => $request->tehsil,
                'uc'          => $request->uc,
                'tappa'          => $request->tappa,
                'area'          => $request->area,
                'chak_goth_killi'          => $request->chak_goth_killi,
                'khasra_survey'          => $request->khasra_survey,
                'mobile'          => $request->mobile,
                'area_category'          => $request->area_category,
                'ownership'          => $request->ownership,
                'aid_type'          => $request->aid_type,
                'is_distributed'          => $request->is_distributed,
                'cheque_amount'          => $request->cheque_amount,
                'cheque_number'          => $request->cheque_number,
                'created_on'          => $request->created_on,
                'created_by'          => $request->created_by,
                'is_verified'          => $request->is_verified,
                'rejection_reason'          => $request->rejection_reason,
                'verified_by'          => $request->verified_by,
                'verified_on'          => $request->verified_on,
                'registration_sms_date_time'          => $request->registration_sms_date_time,
                'seed_given_sms_date_time'          => $request->seed_given_sms_date_time,
                'receiver_mobile_no'          => $request->receiver_mobile_no,
                'total_area'          => $request->total_area,
                'seed_required_qty'          => $request->seed_required_qty,
                'seed_variety'          => $request->seed_variety,
                'seed_given_qty'          => $request->receiver_mobile_no,
                'seed_variety_given'          => $request->seed_variety_given,
                'seed_given_by'          => $request->seed_given_by,
                'seed_given_date'          => $request->seed_given_date,
                'is_sent_bisp'          => $request->is_sent_bisp,
                'bank_branch_name'          => $request->bank_branch_name,
                'bank_branch_code'          => $request->bank_branch_code,
                'bank_account_title'          => $request->bank_account_title,
                'bank_account_number'          => $request->bank_account_number,
                'latitude'          => $request->latitude,
                'longitude'          => $request->longitude,
                'front_id_card'          => $request->front_id_card,
                'back_id_card'          => $request->back_id_card,
                'upload_land_proof'          => $request->upload_land_proof,
                'upload_other_attach'          => $request->upload_other_attach,
                'upload_farmer_pic'          => $request->upload_farmer_pic,
                'upload_cheque_pic'          => $request->upload_cheque_pic,
                'verification_status'          => 'Not Verified',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);

            return redirect()->back()->with('officer-added', 'Land Revenue Officer Created Successfully');
        } else {
            return redirect()->back();
        }
    }
    public function all_agri_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $all_agriculture_farmers = AgricultureFarmersRegistration::where('agri_emp_id', '=', $user_id)->where('agri_emp_name', '=', $user_name)->get();
            // dd($all_agriculture_farmers);
            return view('agriculture_officer_panel.farmers_registration.all_agri_farmers', [
                'all_agriculture_farmers' => $all_agriculture_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    
    public function land_approve_listing()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('land_revenue_panel.land_approve_listing.land_approve_listing', []);
        } else {
            return redirect()->back();
        }
    }
    public function verify_listing()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('land_revenue_panel.land_approve_listing.verify_listing', []);
        } else {
            return redirect()->back();
        }
    }
    public function unverify_listing()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('land_revenue_panel.land_approve_listing.unverify_listing', []);
        } else {
            return redirect()->back();
        }
    }
    public function Verify_screen()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('land_revenue_panel.land_approve_listing.Verify_screen', []);
        } else {
            return redirect()->back();
        }
    }
   
   
}
