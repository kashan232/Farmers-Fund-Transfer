<?php

namespace App\Http\Controllers;

use App\Models\LandRevenueFarmerRegistation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandRevenueFarmerController extends Controller
{
    public function add_land_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $district = Auth()->user()->district;
            $tehsil = Auth()->user()->tehsil;

            // dd($userId);
            // $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            // $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('land_revenue_panel.farmers_registration.add_land_farmers', [
                'district' => $district,
                'tehsil' => $tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_land_farmers(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $userId = Auth::id();

             // Initialize variables for file names
             $front_id_cardimageName = null;
             $back_id_cardimageName = null;
             $upload_land_proofimageName = null;
             $upload_other_attachimageName = null;
             $upload_farmer_picimageName = null;
             $upload_cheque_picimageName = null;

             // Handle front ID card image
             if ($request->hasFile('front_id_card')) {
                 $front_id_cardimage = $request->file('front_id_card');
                 $front_id_cardimageName = time() . '_' . uniqid() . '.' . $front_id_cardimage->getClientOriginalExtension();
                 $front_id_cardimage->move(public_path('land_farmers/front_id_card'), $front_id_cardimageName);
             }

             // Handle back ID card image
             if ($request->hasFile('back_id_card')) {
                 $back_id_cardimage = $request->file('back_id_card');
                 $back_id_cardimageName = time() . '_' . uniqid() . '.' . $back_id_cardimage->getClientOriginalExtension();
                 $back_id_cardimage->move(public_path('land_farmers/back_id_card'), $back_id_cardimageName);
             }

             // Handle upload land proof image
             if ($request->hasFile('upload_land_proof')) {
                 $upload_land_proofimage = $request->file('upload_land_proof');
                 $upload_land_proofimageName = time() . '_' . uniqid() . '.' . $upload_land_proofimage->getClientOriginalExtension();
                 $upload_land_proofimage->move(public_path('land_farmers/upload_land_proof'), $upload_land_proofimageName);
             }

             // Handle other attachments image
             if ($request->hasFile('upload_other_attach')) {
                 $upload_other_attachimage = $request->file('upload_other_attach');
                 $upload_other_attachimageName = time() . '_' . uniqid() . '.' . $upload_other_attachimage->getClientOriginalExtension();
                 $upload_other_attachimage->move(public_path('land_farmers/upload_other_attach'), $upload_other_attachimageName);
             }

             // Handle farmer picture image
             if ($request->hasFile('upload_farmer_pic')) {
                 $upload_farmer_picimage = $request->file('upload_farmer_pic');
                 $upload_farmer_picimageName = time() . '_' . uniqid() . '.' . $upload_farmer_picimage->getClientOriginalExtension();
                 $upload_farmer_picimage->move(public_path('land_farmers/upload_farmer_pic'), $upload_farmer_picimageName);
             }

             // Handle cheque picture image
             if ($request->hasFile('upload_cheque_pic')) {
                 $upload_cheque_picimage = $request->file('upload_cheque_pic');
                 $upload_cheque_picimageName = time() . '_' . uniqid() . '.' . $upload_cheque_picimage->getClientOriginalExtension();
                 $upload_cheque_picimage->move(public_path('land_farmers/upload_cheque_pic'), $upload_cheque_picimageName);
             }


            LandRevenueFarmerRegistation::create([
                'admin_or_user_id'    => $userId,
                'land_emp_id'    => $user_id,
                'land_emp_name'    => $user_name,
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
                'front_id_card'           => $front_id_cardimageName,
                'back_id_card'            => $back_id_cardimageName,
                'upload_land_proof'       => $upload_land_proofimageName,
                'upload_other_attach'     => $upload_other_attachimageName,
                'upload_farmer_pic'       => $upload_farmer_picimageName,
                'upload_cheque_pic'       => $upload_cheque_picimageName,
                'verification_status'          => 'Unverified',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);

            return redirect()->back()->with('farmer-added', 'Farmers is successfully registered');
        } else {
            return redirect()->back();
        }
    }

    public function all_land_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $all_land_farmers = LandRevenueFarmerRegistation::where('land_emp_id', '=', $user_id)->where('land_emp_name', '=', $user_name)->get();
            // dd($all_agriculture_farmers);
            return view('land_revenue_panel.farmers_registration.all_land_farmers', [
                'all_land_farmers' => $all_land_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function view_land_farmers($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $all_land_farmers = LandRevenueFarmerRegistation::where('id', '=', $id)->first();
            // dd($all_agriculture_farmers);
            return view('land_revenue_panel.farmers_registration.view_land_farmers', [
                'all_land_farmers' => $all_land_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function edit_land_farmers($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $all_land_farmer = LandRevenueFarmerRegistation::where('id', '=', $id)->first();
            // dd($all_land_farmer);
            return view('land_revenue_panel.farmers_registration.edit_land_farmers', [
                'all_land_farmer' => $all_land_farmer,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update_land_farmers(Request $request, $id)
    {

        if (Auth::id()) {

            if (Auth::id()) {
                $userId = Auth::id();
                $user_id = Auth()->user()->user_id;
                $user_name = Auth()->user()->name;

                // // Initialize variables for file names
                // $front_id_cardimageName = null;
                // $back_id_cardimageName = null;
                // $upload_land_proofimageName = null;
                // $upload_other_attachimageName = null;
                // $upload_farmer_picimageName = null;
                // $upload_cheque_picimageName = null;

                // // Handle front ID card image
                // if ($request->hasFile('front_id_card')) {
                //     $front_id_cardimage = $request->file('front_id_card');
                //     $front_id_cardimageName = time() . '_' . uniqid() . '.' . $front_id_cardimage->getClientOriginalExtension();
                //     $front_id_cardimage->move(public_path('agriculture_farmers/front_id_card'), $front_id_cardimageName);
                // }

                // // Handle back ID card image
                // if ($request->hasFile('back_id_card')) {
                //     $back_id_cardimage = $request->file('back_id_card');
                //     $back_id_cardimageName = time() . '_' . uniqid() . '.' . $back_id_cardimage->getClientOriginalExtension();
                //     $back_id_cardimage->move(public_path('agriculture_farmers/back_id_card'), $back_id_cardimageName);
                // }

                // // Handle upload land proof image
                // if ($request->hasFile('upload_land_proof')) {
                //     $upload_land_proofimage = $request->file('upload_land_proof');
                //     $upload_land_proofimageName = time() . '_' . uniqid() . '.' . $upload_land_proofimage->getClientOriginalExtension();
                //     $upload_land_proofimage->move(public_path('agriculture_farmers/upload_land_proof'), $upload_land_proofimageName);
                // }

                // // Handle other attachments image
                // if ($request->hasFile('upload_other_attach')) {
                //     $upload_other_attachimage = $request->file('upload_other_attach');
                //     $upload_other_attachimageName = time() . '_' . uniqid() . '.' . $upload_other_attachimage->getClientOriginalExtension();
                //     $upload_other_attachimage->move(public_path('agriculture_farmers/upload_other_attach'), $upload_other_attachimageName);
                // }

                // // Handle farmer picture image
                // if ($request->hasFile('upload_farmer_pic')) {
                //     $upload_farmer_picimage = $request->file('upload_farmer_pic');
                //     $upload_farmer_picimageName = time() . '_' . uniqid() . '.' . $upload_farmer_picimage->getClientOriginalExtension();
                //     $upload_farmer_picimage->move(public_path('agriculture_farmers/upload_farmer_pic'), $upload_farmer_picimageName);
                // }

                // // Handle cheque picture image
                // if ($request->hasFile('upload_cheque_pic')) {
                //     $upload_cheque_picimage = $request->file('upload_cheque_pic');
                //     $upload_cheque_picimageName = time() . '_' . uniqid() . '.' . $upload_cheque_picimage->getClientOriginalExtension();
                //     $upload_cheque_picimage->move(public_path('agriculture_farmers/upload_cheque_pic'), $upload_cheque_picimageName);
                // }

                LandRevenueFarmerRegistation::where('id', $id)->update([
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
                    'updated_at'        => Carbon::now(),
                ]);


                return redirect()->back()->with('farmer-update', 'Registered farmers updated successfully');
            } else {
                return redirect()->back();
            }
        }
    }


}
