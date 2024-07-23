<?php

namespace App\Http\Controllers;

use App\Models\AgricultureUserFarmerRegistration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgricultureUserFarmersController extends Controller
{
    public function add_agriuser_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $district = Auth()->user()->district;
            $tehsil = Auth()->user()->tehsil;
            // dd($userId);
            // $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            // $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('agriculture_user_panel.farmers_registration.add_agri_user_farmers', [
                'district' => $district,
                'tehsil' => $tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_agriuser_farmers(Request $request)
    {
        if (Auth::check()) {

            if($request->edit_id && $request->edit_id != '')
            {
                $data = $request->all();
                $data = $request->except(['_token','edit_id']);

                $data['admin_or_user_id'] = Auth::id();
                $data['agri_user_emp_id'] = Auth()->user()->user_id;
                $data['agri_user_emp_name'] = Auth()->user()->name;

                $data['title_name'] = json_encode($request->title_name);
                $data['title_cnic'] = json_encode($request->title_cnic);
                $data['title_number'] = json_encode($request->title_number);
                $data['title_area'] = json_encode($request->title_area);

                $data['crops'] = json_encode($request->crops);
                $data['crop_area'] = json_encode($request->crop_area);
                $data['crop_average_yeild'] = json_encode($request->crop_average_yeild);

                $data['physical_asset_item'] = json_encode($request->physical_asset_item);

                $data['animal_name'] = json_encode($request->animal_name);
                $data['animal_qty'] = json_encode($request->animal_qty);

                $data['verification_status'] = 'Unverified';

                // Handle front ID card image
                if ($request->hasFile('front_id_card')) {
                $front_id_cardimage = $request->file('front_id_card');
                $front_id_cardimageName = time() . '_' . uniqid() . '.' . $front_id_cardimage->getClientOriginalExtension();
                $front_id_cardimage->move(public_path('agriculture_farmers/front_id_card'), $front_id_cardimageName);
                $data['front_id_card'] = $front_id_cardimageName;
                }

                // Handle back ID card image
                if ($request->hasFile('back_id_card')) {
                    $back_id_cardimage = $request->file('back_id_card');
                    $back_id_cardimageName = time() . '_' . uniqid() . '.' . $back_id_cardimage->getClientOriginalExtension();
                    $back_id_cardimage->move(public_path('agriculture_farmers/back_id_card'), $back_id_cardimageName);
                    $data['back_id_card'] = $back_id_cardimageName;
                }

                // Handle upload land proof image
                if ($request->hasFile('upload_land_proof')) {
                    $upload_land_proofimage = $request->file('upload_land_proof');
                    $upload_land_proofimageName = time() . '_' . uniqid() . '.' . $upload_land_proofimage->getClientOriginalExtension();
                    $upload_land_proofimage->move(public_path('agriculture_farmers/upload_land_proof'), $upload_land_proofimageName);
                    $data['upload_land_proof'] = $upload_land_proofimageName;
                }

                // Handle other attachments image
                if ($request->hasFile('upload_other_attach')) {
                    $upload_other_attachimage = $request->file('upload_other_attach');
                    $upload_other_attachimageName = time() . '_' . uniqid() . '.' . $upload_other_attachimage->getClientOriginalExtension();
                    $upload_other_attachimage->move(public_path('agriculture_farmers/upload_other_attach'), $upload_other_attachimageName);
                    $data['upload_other_attach'] = $upload_other_attachimageName;
                }

                // Handle farmer picture image
                if ($request->hasFile('upload_farmer_pic')) {
                    $upload_farmer_picimage = $request->file('upload_farmer_pic');
                    $upload_farmer_picimageName = time() . '_' . uniqid() . '.' . $upload_farmer_picimage->getClientOriginalExtension();
                    $upload_farmer_picimage->move(public_path('agriculture_farmers/upload_farmer_pic'), $upload_farmer_picimageName);
                    $data['upload_farmer_pic'] = $upload_farmer_picimageName;
                }

                // Handle cheque picture image
                if ($request->hasFile('upload_cheque_pic')) {
                    $upload_cheque_picimage = $request->file('upload_cheque_pic');
                    $upload_cheque_picimageName = time() . '_' . uniqid() . '.' . $upload_cheque_picimage->getClientOriginalExtension();
                    $upload_cheque_picimage->move(public_path('agriculture_farmers/upload_cheque_pic'), $upload_cheque_picimageName);
                    $data['upload_cheque_pic'] = $upload_cheque_picimageName;
                }
                AgricultureUserFarmerRegistration::where('id',$request->edit_id)->update($data);
                return redirect()->back()->with('farmers-registered', 'Your Farmers Is Successfully Updated!');
            }
            else
            {
                $data = $request->all();

                $data['admin_or_user_id'] = Auth::id();
                $data['agri_user_emp_id'] = Auth()->user()->user_id;
                $data['agri_user_emp_name'] = Auth()->user()->name;

                $data['title_name'] = json_encode($request->title_name);
                $data['title_cnic'] = json_encode($request->title_cnic);
                $data['title_number'] = json_encode($request->title_number);
                $data['title_area'] = json_encode($request->title_area);

                $data['crops'] = json_encode($request->crops);
                $data['crop_area'] = json_encode($request->crop_area);
                $data['crop_average_yeild'] = json_encode($request->crop_average_yeild);

                $data['physical_asset_item'] = json_encode($request->physical_asset_item);

                $data['animal_name'] = json_encode($request->animal_name);
                $data['animal_qty'] = json_encode($request->animal_qty);

                $data['verification_status'] = 'Unverified';

                // Handle front ID card image
                if ($request->hasFile('front_id_card')) {
                $front_id_cardimage = $request->file('front_id_card');
                $front_id_cardimageName = time() . '_' . uniqid() . '.' . $front_id_cardimage->getClientOriginalExtension();
                $front_id_cardimage->move(public_path('agriculture_farmers/front_id_card'), $front_id_cardimageName);
                $data['front_id_card'] = $front_id_cardimageName;
                }

                // Handle back ID card image
                if ($request->hasFile('back_id_card')) {
                    $back_id_cardimage = $request->file('back_id_card');
                    $back_id_cardimageName = time() . '_' . uniqid() . '.' . $back_id_cardimage->getClientOriginalExtension();
                    $back_id_cardimage->move(public_path('agriculture_farmers/back_id_card'), $back_id_cardimageName);
                    $data['back_id_card'] = $back_id_cardimageName;
                }

                // Handle upload land proof image
                if ($request->hasFile('upload_land_proof')) {
                    $upload_land_proofimage = $request->file('upload_land_proof');
                    $upload_land_proofimageName = time() . '_' . uniqid() . '.' . $upload_land_proofimage->getClientOriginalExtension();
                    $upload_land_proofimage->move(public_path('agriculture_farmers/upload_land_proof'), $upload_land_proofimageName);
                    $data['upload_land_proof'] = $upload_land_proofimageName;
                }

                // Handle other attachments image
                if ($request->hasFile('upload_other_attach')) {
                    $upload_other_attachimage = $request->file('upload_other_attach');
                    $upload_other_attachimageName = time() . '_' . uniqid() . '.' . $upload_other_attachimage->getClientOriginalExtension();
                    $upload_other_attachimage->move(public_path('agriculture_farmers/upload_other_attach'), $upload_other_attachimageName);
                    $data['upload_other_attach'] = $upload_other_attachimageName;
                }

                // Handle farmer picture image
                if ($request->hasFile('upload_farmer_pic')) {
                    $upload_farmer_picimage = $request->file('upload_farmer_pic');
                    $upload_farmer_picimageName = time() . '_' . uniqid() . '.' . $upload_farmer_picimage->getClientOriginalExtension();
                    $upload_farmer_picimage->move(public_path('agriculture_farmers/upload_farmer_pic'), $upload_farmer_picimageName);
                    $data['upload_farmer_pic'] = $upload_farmer_picimageName;
                }

                // Handle cheque picture image
                if ($request->hasFile('upload_cheque_pic')) {
                    $upload_cheque_picimage = $request->file('upload_cheque_pic');
                    $upload_cheque_picimageName = time() . '_' . uniqid() . '.' . $upload_cheque_picimage->getClientOriginalExtension();
                    $upload_cheque_picimage->move(public_path('agriculture_farmers/upload_cheque_pic'), $upload_cheque_picimageName);
                    $data['upload_cheque_pic'] = $upload_cheque_picimageName;
                }

                AgricultureUserFarmerRegistration::create($data);
                return redirect()->back()->with('farmers-registered', 'Your Farmers Is Successfully Registered');
            }

        }
        else {
            // If user is not authenticated, redirect back
            return redirect()->back()->withErrors(['Authentication failed.']);
        }
    }

    public function all_agriuser_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $all_agriuser_farmers = AgricultureUserFarmerRegistration::where('agri_user_emp_id', '=', $user_id)->where('agri_user_emp_name', '=', $user_name)->get();
            // dd($all_agriculture_farmers);
            return view('agriculture_user_panel.farmers_registration.all_agri_user_farmers', [
                'all_agriuser_farmers' => $all_agriuser_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function view_agriuser_farmers($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $all_agriuser_farmers = AgricultureUserFarmerRegistration::where('id', '=', $id)->first();
            // dd($all_agriuser_farmers);
            return view('agriculture_user_panel.farmers_registration.view_agri_user_farmers', [
                'all_agriuser_farmers' => $all_agriuser_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function edit_agriuser_farmers($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $district = Auth()->user()->district;
            $tehsil = Auth()->user()->tehsil;
            $data = AgricultureUserFarmerRegistration::where('id', '=', $id)->first();
            // dd($all_agriculture_farmer);
            return view('agriculture_user_panel.farmers_registration.edit_agri_user_farmers', [
                'data' => $data,
                'district' => $district,
                'tehsil' => $tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update_agriuser_farmers(Request $request, $id)
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

                AgricultureUserFarmerRegistration::where('id', $id)->update([
                    'name'                    => $request->name,
                    'father_name'             => $request->father_name,
                    'gender'                  => $request->gender,
                    'cnic'                    => $request->cnic,
                    'province'                => $request->province,
                    'district'                => $request->district,
                    'tehsil'                  => $request->tehsil,
                    'uc'                      => $request->uc,
                    'tappa'                   => $request->tappa,
                    'area'                    => $request->area,
                    'chak_goth_killi'         => $request->chak_goth_killi,
                    'khasra_survey'           => $request->khasra_survey,
                    'mobile'                  => $request->mobile,
                    'area_category'           => $request->area_category,
                    'ownership'               => $request->ownership,
                    'aid_type'                => $request->aid_type,
                    'is_distributed'          => $request->is_distributed,
                    'cheque_amount'           => $request->cheque_amount,
                    'cheque_number'           => $request->cheque_number,
                    'created_on'              => $request->created_on,
                    'created_by'              => $request->created_by,
                    'is_verified'             => $request->is_verified,
                    'rejection_reason'        => $request->rejection_reason,
                    'verified_by'             => $request->verified_by,
                    'verified_on'             => $request->verified_on,
                    'registration_sms_date_time' => $request->registration_sms_date_time,
                    'seed_given_sms_date_time'   => $request->seed_given_sms_date_time,
                    'receiver_mobile_no'      => $request->receiver_mobile_no,
                    'total_area'              => $request->total_area,
                    'seed_required_qty'       => $request->seed_required_qty,
                    'seed_variety'            => $request->seed_variety,
                    'seed_given_qty'          => $request->seed_given_qty,
                    'seed_variety_given'      => $request->seed_variety_given,
                    'seed_given_by'           => $request->seed_given_by,
                    'seed_given_date'         => $request->seed_given_date,
                    'is_sent_bisp'            => $request->is_sent_bisp,
                    'bank_branch_name'        => $request->bank_branch_name,
                    'bank_branch_code'        => $request->bank_branch_code,
                    'bank_account_title'      => $request->bank_account_title,
                    'bank_account_number'     => $request->bank_account_number,
                    'latitude'                => $request->latitude,
                    'longitude'               => $request->longitude,
                    'updated_at'              => Carbon::now(),
                ]);

                return redirect()->back()->with('farmer-update', 'Registered farmers updated successfully');
            } else {
                return redirect()->back();
            }
        }
    }

    public function agriuser_unverify_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agricultureuser_farmers = AgricultureUserFarmerRegistration::where('admin_or_user_id', '=', $userId)->where('verification_status', '=', 'Unverified')->get();
            return view('agriculture_user_panel.farmers_verifications.unverify_agriuser_farmers_by_land', [
                'all_agricultureuser_farmers' => $all_agricultureuser_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function agriuser_verify_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agricultureuser_farmers = AgricultureUserFarmerRegistration::where('admin_or_user_id', '=', $userId)->where('verification_status', '=', 'Verified')->get();
            return view('agriculture_user_panel.farmers_verifications.verify_agriuser_farmers_by_land', [
                'all_agricultureuser_farmers' => $all_agricultureuser_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function farmers_reporting(request $request){

        $userId = Auth::id();
        $all_agriculture_farmers = AgricultureUserFarmerRegistration::where('admin_or_user_id', '=', $userId)->get();

        return view('agriculture_user_panel.farmers_reporting.index', [
            'data' => $all_agriculture_farmers,
        ]);
    }



}
