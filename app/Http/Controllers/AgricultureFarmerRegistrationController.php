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
            $userId = Auth::id();
            AgricultureFarmersRegistration::create([
                'admin_or_user_id'    => $userId,
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
                'bank_id'          => $request->bank_id,
                'bank_account_title'          => $request->bank_account_title,
                'bank_account_number'          => $request->bank_account_number,
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
            // dd($userId);
            // $all_revenue = LandRevenueDepartment::where('admin_or_user_id', '=', $userId)->get();
            return view('agriculture_officer_panel.farmers_registration.all_agri_farmers', [
                // 'all_revenue' => $all_revenue,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
