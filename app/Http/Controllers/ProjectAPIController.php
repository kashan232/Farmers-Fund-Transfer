<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\OnlineFarmerRegistration;
use App\Models\Tappa;
use App\Models\Tehsil;
use App\Models\UC;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ProjectAPIController extends Controller
{

    public function login_api(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        //valid credential
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $email = $request->email;
        $password = $request->password;

        // Fetch user by email
        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            // Generate token
            $token = $user->createToken($request->email)->plainTextToken;

            return response()->json([
                'logged_user_data' => $user,
                'token' => $token,
                'message' => 'User Login Successfully',
                'status' => 'Success'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Credentials Incorrect',
                'status' => 'Failed'
            ], 401);
        }
    }


    public function get_districts(Request $request)
    {
        // Fetch all districts from the database
        $districts = District::all();
        // Return the districts as a JSON response
        return response()->json(['districts' => $districts], 200);
    }

    public function get_tehsil(Request $request)
    {
        // Fetch all tehsils from the database
        $tehsils = Tehsil::all();

        // Return the tehsils as a JSON response
        return response()->json(['tehsils' => $tehsils], 200);
    }

    public function get_uc(Request $request)
    {
        // Fetch all Ucs from the database
        $Ucs = UC::all();

        // Return the Ucs as a JSON response
        return response()->json(['Ucs' => $Ucs], 200);
    }

    public function get_tappa(Request $request)
    {
        // Fetch all tehsils from the database
        $tehsils = Tappa::all();

        // Return the tehsils as a JSON response
        return response()->json(['tehsils' => $tehsils], 200);
    }


    public function api_store_online_farmers_registration(Request $request)
    {
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
            $front_id_cardimage->move(public_path('online_farmers/front_id_card'), $front_id_cardimageName);
        }

        // Handle back ID card image
        if ($request->hasFile('back_id_card')) {
            $back_id_cardimage = $request->file('back_id_card');
            $back_id_cardimageName = time() . '_' . uniqid() . '.' . $back_id_cardimage->getClientOriginalExtension();
            $back_id_cardimage->move(public_path('online_farmers/back_id_card'), $back_id_cardimageName);
        }

        // Handle upload land proof image
        if ($request->hasFile('upload_land_proof')) {
            $upload_land_proofimage = $request->file('upload_land_proof');
            $upload_land_proofimageName = time() . '_' . uniqid() . '.' . $upload_land_proofimage->getClientOriginalExtension();
            $upload_land_proofimage->move(public_path('online_farmers/upload_land_proof'), $upload_land_proofimageName);
        }

        // Handle other attachments image
        if ($request->hasFile('upload_other_attach')) {
            $upload_other_attachimage = $request->file('upload_other_attach');
            $upload_other_attachimageName = time() . '_' . uniqid() . '.' . $upload_other_attachimage->getClientOriginalExtension();
            $upload_other_attachimage->move(public_path('online_farmers/upload_other_attach'), $upload_other_attachimageName);
        }

        // Handle farmer picture image
        if ($request->hasFile('upload_farmer_pic')) {
            $upload_farmer_picimage = $request->file('upload_farmer_pic');
            $upload_farmer_picimageName = time() . '_' . uniqid() . '.' . $upload_farmer_picimage->getClientOriginalExtension();
            $upload_farmer_picimage->move(public_path('online_farmers/upload_farmer_pic'), $upload_farmer_picimageName);
        }

        // Handle cheque picture image
        if ($request->hasFile('upload_cheque_pic')) {
            $upload_cheque_picimage = $request->file('upload_cheque_pic');
            $upload_cheque_picimageName = time() . '_' . uniqid() . '.' . $upload_cheque_picimage->getClientOriginalExtension();
            $upload_cheque_picimage->move(public_path('online_farmers/upload_cheque_pic'), $upload_cheque_picimageName);
        }

        // Create the farmer registration record
        $farmer = OnlineFarmerRegistration::create([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'gender' => $request->gender,
            'cnic' => $request->cnic,
            'province' => $request->province,
            'district' => $request->district,
            'tehsil' => $request->tehsil,
            'uc' => $request->uc,
            'tappa' => $request->tappa,
            'area' => $request->area,
            'chak_goth_killi' => $request->chak_goth_killi,
            'khasra_survey' => $request->khasra_survey,
            'mobile' => $request->mobile,
            'area_category' => $request->area_category,
            'ownership' => $request->ownership,
            'aid_type' => $request->aid_type,
            'is_distributed' => $request->is_distributed,
            'cheque_amount' => $request->cheque_amount,
            'cheque_number' => $request->cheque_number,
            'created_on' => $request->created_on,
            'created_by' => $request->created_by,
            'is_verified' => $request->is_verified,
            'rejection_reason' => $request->rejection_reason,
            'verified_by' => $request->verified_by,
            'verified_on' => $request->verified_on,
            'registration_sms_date_time' => $request->registration_sms_date_time,
            'seed_given_sms_date_time' => $request->seed_given_sms_date_time,
            'receiver_mobile_no' => $request->receiver_mobile_no,
            'total_area' => $request->total_area,
            'seed_required_qty' => $request->seed_required_qty,
            'seed_variety' => $request->seed_variety,
            'seed_given_qty' => $request->seed_given_qty,
            'seed_variety_given' => $request->seed_variety_given,
            'seed_given_by' => $request->seed_given_by,
            'seed_given_date' => $request->seed_given_date,
            'is_sent_bisp' => $request->is_sent_bisp,
            'bank_branch_name' => $request->bank_branch_name,
            'bank_branch_code' => $request->bank_branch_code,
            'bank_account_title' => $request->bank_account_title,
            'bank_account_number' => $request->bank_account_number,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'front_id_card' => $front_id_cardimageName,
            'back_id_card' => $back_id_cardimageName,
            'upload_land_proof' => $upload_land_proofimageName,
            'upload_other_attach' => $upload_other_attachimageName,
            'upload_farmer_pic' => $upload_farmer_picimageName,
            'upload_cheque_pic' => $upload_cheque_picimageName,
            'verification_status' => 'Unverified',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return response()->json(['message' => 'Farmer registered successfully', 'farmer' => $farmer], 201);
    }
}
