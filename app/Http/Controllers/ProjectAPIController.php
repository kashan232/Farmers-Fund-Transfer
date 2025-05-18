<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\OnlineFarmerRegistration;
use App\Models\Tappa;
use App\Models\Tehsil;
use App\Models\LandRevenueFarmerRegistation;
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

        $credentials = $request->only('email', 'password');

        //valid credential
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $email = $request->email;
        $password = $request->password;

        // Fetch user by email
        $user = User::where('email', $email)->first();

        // $ucs =  UC::where('district',$user->district)->pluck('uc');

        if ($user && Hash::check($password, $user->password) ) {

            if($user->usertype != 'Field_Officer')
            {
                return response()->json([
                    'message' => 'Permission Denied',
                    'status' => 'Failed'
                ], 401);
            }

            // Generate token
            $token = $user->createToken($request->email)->plainTextToken;

            return response()->json([
                'logged_user_data' => $user,
                // 'ucs' => $ucs,
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






    public function verify_farmer(request $request){

        //valid credential
        $validator = Validator::make($request->all(), [
            'farmer_id' => 'required',
            'user_id' => 'required',
            'verification_status' => 'required|in:verified_by_fa,rejected_by_fa',
            'declined_reason' => 'required_if:verification_status,rejected_by_fa',
            'other_reason' => 'required_if:declined_reason,other'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }


        $farmer = LandRevenueFarmerRegistation::find($request->farmer_id);
        // Update farmer verification status
        $farmer->verification_status = $request->verification_status;
        if ($request->verification_status == 'rejected_by_fa') {
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

        $farmer->verification_by = $request->user_id;
        $farmer->save();

            return response()->json([

                'message' => 'Done..!',
                'status' => 'Success'
            ], 200);

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




    public function dashboard_data($user_id){


        $user = user::find($user_id);

         $fa_total_Registered_Farmers = LandRevenueFarmerRegistation::where('district', $user->district)
                ->where('tehsil', $user->tehsil)
                ->whereIn('tappa', json_decode($user->tappas))
                ->where(function ($query) use ($user) {
                    $query->where(function ($q) use ($user) {
                        $q->where('user_type', 'Field_Officer')
                        ->where('user_id', $user->id);
                    })->orWhere(function ($q) {
                        $q->where('user_type', 'Online')
                        ->whereNull('user_id');
                    });
                })
                ->count();


                $Unverifiedfarmeragiruser = LandRevenueFarmerRegistation::where('district', $user->district)
                ->where('tehsil', $user->tehsil)
                ->whereIn('tappa', json_decode($user->tappas))
                ->where(function ($query) use ($user) {
                    $query->where(function ($q) use ($user) {
                        $q->where('user_type', 'Field_Officer')
                        ->where('user_id', $user->id);
                    })->orWhere(function ($q) {
                        $q->where('user_type', 'Online')
                        ->whereNull('user_id');
                    });
                })
                ->where('verification_status' , NULL)
                ->count();


                $onProcessFarmer = LandRevenueFarmerRegistation::where('district', $user->district)
                ->where('tehsil', $user->tehsil)
                ->whereIn('tappa', json_decode($user->tappas))
                ->where(function ($query) use ($user) {
                    $query->where(function ($q) use ($user) {
                        $q->where('user_type', 'Field_Officer')
                        ->where('user_id', $user->id);
                    })->orWhere(function ($q) {
                        $q->where('user_type', 'Online')
                        ->whereNull('user_id');
                    });
                })
                ->whereIn('verification_status', [
                    'rejected_by_lrd',
                    'rejected_by_ao',
                    'rejected_by_dd',

                    'verified_by_dd',
                    'verified_by_fa',
                    'verified_by_ao'
                ])
                ->count();


                $Verifiedfarmeragiruser = LandRevenueFarmerRegistation::where('district', $user->district)
                ->where('tehsil', $user->tehsil)
                ->whereIn('tappa', json_decode($user->tappas))
                ->where(function ($query) use ($user) {
                    $query->where(function ($q) use ($user) {
                        $q->where('user_type', 'Field_Officer')
                        ->where('user_id', $user->id);
                    })->orWhere(function ($q) {
                        $q->where('user_type', 'Online')
                        ->whereNull('user_id');
                    });
                })
                ->where('verification_status' , 'verified_by_lrd')
                ->count();



                $myRegisteredFarmers = LandRevenueFarmerRegistation::where('district', $user->district)
                ->where('tehsil', $user->tehsil)
                ->whereIn('tappa', json_decode($user->tappas))
                ->where('user_type', 'Field_Officer')
                ->where('user_id', $user->id)
                ->count();

                $onlineFarmers = LandRevenueFarmerRegistation::where('district', $user->district)
                ->where('tehsil', $user->tehsil)
                ->whereIn('tappa', json_decode($user->tappas))
                ->where('user_type', 'Online')
                ->whereNull('user_id')
                ->count();


        // $total_registered_farmers = LandRevenueFarmerRegistation::where('user_id',$user_id)->count();

        // $verified_farmers = LandRevenueFarmerRegistation::where('user_id', $user_id)
        // ->where('verification_status', 'verified_by_lrd')
        // ->count();

        // $unverified_farmers = LandRevenueFarmerRegistation::where('user_id', $user_id)
        // ->where('verification_status','!=' ,'verified_by_lrd')
        // ->count();

        $data = [
            // 'total_registered_farmers' =>  $total_registered_farmers,
            // 'verified_farmers' => $verified_farmers,
            // 'unverified_farmers' => $unverified_farmers

            'fa_total_Registered_Farmers' => $fa_total_Registered_Farmers,
            'Unverifiedfarmeragiruser' => $Unverifiedfarmeragiruser,
            'Verifiedfarmeragiruser' => $Verifiedfarmeragiruser,
            'onProcessFarmer' =>$onProcessFarmer,
            'myRegisteredFarmers' => $myRegisteredFarmers,
            'onlineFarmers' => $onlineFarmers,
        ];

        return response()->json(['data' => $data], 200);

    }








    public function get_farmer($user_id, $search = null )
    {

        $user = user::find($user_id);



        $query = LandRevenueFarmerRegistation::where('district', $user->district)
        ->where('tehsil', $user->tehsil)
        ->whereIn('tappa', json_decode($user->tappas))
        ->where(function ($query) use ($user) {
            $query->where(function ($q) use ($user) {
                $q->where('user_type', 'Field_Officer')
                ->where('user_id', $user->id);
            })->orWhere(function ($q) {
                $q->where('user_type', 'Online')
                ->whereNull('user_id');
            });
        })
        ->latest();

        if ($search) {
            $query->where('cnic', $search);
        }

        $farmers = $search ? $query->get() : $query->paginate(10);

        return response()->json(['farmers' => $farmers], 200);
    }




    public function store_farmer(Request $request)
    {
           \Log::info($request->all());


        $rules = [
            // Required fields
            // 'name' => 'required',
            // 'user_id' => 'required',
            // 'father_name' => 'required',
            // 'cnic' => 'required',
            // 'cnic_issue_date' => 'required|date',
            // // 'cnic_expiry_date' => 'required|date',
            // 'mobile' => 'required',
            // // 'district' => 'required',
            // // 'tehsil' => 'required',
            // // 'uc' => 'required',
            // // 'tappa' => 'required',
            // 'dah' => 'required',
            // 'village' => 'required',
            // 'gender' => 'required|in:male,female,other',
            // 'house_type' => 'required',
            // 'owner_type' => 'required',
            // 'full_name_of_next_kin' => 'required',
            // 'cnic_of_next_kin' => 'required',
            // 'mobile_of_next_kin' => 'required',

            // // Numeric fields (nullable but must be a number if provided)
            // 'female_children_under16' => 'sometimes|nullable|integer',
            // 'female_Adults_above16' => 'sometimes|nullable|integer',
            // 'male_children_under16' => 'sometimes|nullable|integer',
            // 'male_Adults_above16' => 'sometimes|nullable|integer',
            // 'total_landing_acre' => 'sometimes|nullable|numeric',
            // 'total_area_with_hari' => 'sometimes|nullable|numeric',
            // 'total_area_cultivated_land' => 'sometimes|nullable|numeric',
            // 'total_fallow_land' => 'sometimes|nullable|numeric',
            // 'land_share' => 'sometimes|nullable',
            // 'land_area_as_per_share' => 'sometimes|nullable|numeric',

            // // Title information
            // 'survey_no' => 'sometimes|nullable',
            // // 'title_name' => 'sometimes|nullable|array',
            // // 'title_father_name' => 'sometimes|nullable|array',
            // // 'title_cnic' => 'sometimes|nullable|array',
            // // 'title_number' => 'sometimes|nullable|array',
            // // 'title_area' => 'sometimes|nullable|array',

            // // // Crop details
            // // 'crop_season' => 'sometimes|nullable|array',
            // // 'crops' => 'sometimes|nullable|array',
            // // 'crops_orchard' => 'sometimes|nullable|array',
            // // 'crop_area' => 'sometimes|nullable|array',
            // // 'crop_average_yeild' => 'sometimes|nullable|array',

            // // // Assets & animals
            // // 'physical_asset_item' => 'sometimes|nullable|array',
            // // 'animal_name' => 'sometimes|nullable|array',
            // // 'animal_qty' => 'sometimes|nullable|array',

            // // Irrigation
            // 'source_of_irrigation' => 'sometimes|nullable',
            // 'source_of_irrigation_engery' => 'sometimes|nullable',

            // // Area & line status
            // 'area_length' => 'sometimes|nullable|numeric',
            // 'line_status' => 'sometimes|nullable',
            // 'lined_length' => 'sometimes|nullable|numeric',
            // 'total_command_area' => 'sometimes|nullable|numeric',

            // // Banking details
            // 'account_title' => 'sometimes|nullable',
            // 'account_no' => 'sometimes|nullable',
            // 'bank_name' => 'sometimes|nullable',
            // 'branch_name' => 'sometimes|nullable',
            // 'IBAN_number' => 'sometimes|nullable',
            // 'branch_code' => 'sometimes|nullable',

            // // File uploads (conditionally required if old values are not set)
            // 'front_id_card' => 'sometimes|nullable|file|mimes:jpg,jpeg,png|max:500',
            // 'back_id_card' => 'sometimes|nullable|file|mimes:jpg,jpeg,png|max:500',
            // 'upload_land_proof' => 'sometimes|nullable|file|mimes:jpg,jpeg,png|max:500',
            // 'upload_other_attach' => 'sometimes|nullable|file|mimes:jpg,jpeg,png|max:500',
            // 'upload_farmer_pic' => 'sometimes|nullable|file|mimes:jpg,jpeg,png|max:500',
            // 'upload_cheque_pic' => 'sometimes|nullable|file|mimes:jpg,jpeg,png|max:500',
            // 'form_seven_pic' => 'sometimes|nullable|file|mimes:jpg,jpeg,png|max:500',

            // // Verification
            // 'verification_status' => 'sometimes|nullable',
            // 'declined_reason' => 'sometimes|nullable',
            // 'verification_by' => 'sometimes|nullable',

            // // Coordinates
            // 'GpsCordinates' => 'sometimes|nullable',
            // 'FancingCoordinates' => 'sometimes|nullable',

            // // Measurement units
            // 'sq_meters' => 'sometimes|nullable|numeric',
            // 'sq_yards' => 'sometimes|nullable|numeric',
            // 'acres' => 'sometimes|nullable|numeric',

            // // Miscellaneous
            // 'partially_line' => 'sometimes|nullable',
            // 'surname' => 'sometimes|nullable',
        ];

        // Validation
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();

            // Ensure all fields appear in the response even if no error
            foreach (array_keys($rules) as $field) {
                if (!isset($errors[$field])) {
                    $errors[$field] = [];
                }
            }

            return response()->json(['errors' => $errors], 422);
        }


            $data = $request->all();
            $data = $request->except(['_token', 'edit_id', 'old_front_id_card','old_back_id_card','old_form_seven_pic','old_upload_land_proof','old_upload_farmer_pic','old_upload_other_attach','old_no_objection_affidavit_pic']);


            $data['user_type'] = $request->user_type;



            $data['user_id'] = $request->user_id;



            $data['title_name'] = json_encode($request->title_name);
            $data['title_father_name'] = json_encode($request->title_name);
            $data['title_cnic'] = json_encode($request->title_cnic);
            $data['title_number'] = json_encode($request->title_number);
            $data['title_area'] = json_encode($request->title_area);

            $data['owner_type'] = $request->owner_type;

            $data['crop_season'] = json_encode($request->crop_season);
            $data['crops'] = json_encode($request->crops);
            $data['crops_orchard'] = json_encode($request->crops_orchard);
            $data['crop_area'] = json_encode($request->crop_area);
            $data['crop_average_yeild'] = json_encode($request->crop_average_yeild);

            $data['physical_asset_item'] = json_encode($request->physical_asset_item);

            $data['animal_name'] = json_encode($request->animal_name);
            $data['animal_qty'] = json_encode($request->animal_qty);


            $data['source_of_irrigation'] = json_encode($request->source_of_irrigation);
            $data['source_of_irrigation_engery'] = json_encode($request->source_of_irrigation_engery);


            $data['verification_status'] = null;
            $data['declined_reason'] = null;




            // $data['acres'] = $request->acres_hidden;
            // $data['sq_yards'] = $request->sq_yards_hidden;
            // $data['sq_meters'] = $request->sq_meters_hidden;




            if ($request->hasFile('no_objection_affidavit_pic')) {
                $no_objection_affidavit_pic_image = $request->file('no_objection_affidavit_pic');
                $no_objection_affidavit_pic_image_name = time() . '_' . uniqid() . '.' . $no_objection_affidavit_pic_image->getClientOriginalExtension();
                $no_objection_affidavit_pic_image->move(public_path('fa_farmers/no_objection_affidavit_pic'), $no_objection_affidavit_pic_image_name);
                $data['no_objection_affidavit_pic'] = $no_objection_affidavit_pic_image_name;
            }





             // Handle front ID card image
            if ($request->hasFile('front_id_card')) {
                $front_id_cardimage = $request->file('front_id_card');
                $front_id_cardimageName = time() . '_' . uniqid() . '.' . $front_id_cardimage->getClientOriginalExtension();
                $front_id_cardimage->move(public_path('fa_farmers/front_id_card'), $front_id_cardimageName);
                $data['front_id_card'] = $front_id_cardimageName;
            }

            // Handle back ID card image
            if ($request->hasFile('back_id_card')) {
                $back_id_cardimage = $request->file('back_id_card');
                $back_id_cardimageName = time() . '_' . uniqid() . '.' . $back_id_cardimage->getClientOriginalExtension();
                $back_id_cardimage->move(public_path('fa_farmers/back_id_card'), $back_id_cardimageName);
                $data['back_id_card'] = $back_id_cardimageName;
            }

            // Handle upload land proof image
            if ($request->hasFile('upload_land_proof')) {
                $upload_land_proofimage = $request->file('upload_land_proof');
                $upload_land_proofimageName = time() . '_' . uniqid() . '.' . $upload_land_proofimage->getClientOriginalExtension();
                $upload_land_proofimage->move(public_path('fa_farmers/upload_land_proof'), $upload_land_proofimageName);
                $data['upload_land_proof'] = $upload_land_proofimageName;
            }

            // Handle other attachments image
            if ($request->hasFile('upload_other_attach')) {
                $upload_other_attachimage = $request->file('upload_other_attach');
                $upload_other_attachimageName = time() . '_' . uniqid() . '.' . $upload_other_attachimage->getClientOriginalExtension();
                $upload_other_attachimage->move(public_path('fa_farmers/upload_other_attach'), $upload_other_attachimageName);
                $data['upload_other_attach'] = $upload_other_attachimageName;
            }

            // Handle farmer picture image
            if ($request->hasFile('upload_farmer_pic')) {
                $upload_farmer_picimage = $request->file('upload_farmer_pic');
                $upload_farmer_picimageName = time() . '_' . uniqid() . '.' . $upload_farmer_picimage->getClientOriginalExtension();
                $upload_farmer_picimage->move(public_path('fa_farmers/upload_farmer_pic'), $upload_farmer_picimageName);
                $data['upload_farmer_pic'] = $upload_farmer_picimageName;
            }

            // Handle cheque picture image
            if ($request->hasFile('upload_cheque_pic')) {
                $upload_cheque_picimage = $request->file('upload_cheque_pic');
                $upload_cheque_picimageName = time() . '_' . uniqid() . '.' . $upload_cheque_picimage->getClientOriginalExtension();
                $upload_cheque_picimage->move(public_path('fa_farmers/upload_cheque_pic'), $upload_cheque_picimageName);
                $data['upload_cheque_pic'] = $upload_cheque_picimageName;
            }

            // Handle cheque picture image
            // if ($request->hasFile('form_seven_pic')) {
            //     $form_seven_pic_image = $request->file('form_seven_pic');
            //     $form_seven_pic_image_name = time() . '_' . uniqid() . '.' . $form_seven_pic_image->getClientOriginalExtension();
            //     $form_seven_pic_image->move(public_path('fa_farmers/form_seven_pic'), $form_seven_pic_image_name);
            //     $data['form_seven_pic'] = $form_seven_pic_image_name;
            // }

                  if ($request->hasFile('form_seven_pic')) {
                $form_seven_pics = [];

                foreach ($request->file('form_seven_pic') as $file) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('fa_farmers/form_seven_pic'), $filename);
                    $form_seven_pics[] = $filename;
                }

                // Store the filenames as JSON or comma-separated, depending on your DB column type
                $data['form_seven_pic'] = json_encode($form_seven_pics);
            }


            // dd($data);




            try {

                if ($request->edit_id && $request->edit_id != '') {
                    LandRevenueFarmerRegistation::where('id', $request->edit_id)->update($data);
                    // return redirect()->back()->with('farmers-registered', 'Your Farmers Is Successfully Updated');
                    return ['success' => 'Farmer Data Updated Succesfully..!'];
                } else {
                    $farmer = LandRevenueFarmerRegistation::create($data);
                    // return redirect()->back()->with('farmers-registered', 'Your Farmers Is Successfully Registered');
                    if ($farmer) {
                        return response()->json(['success' => 'Farmer Data Submitted Successfully..!'], 200);
                    } else {
                        return response()->json(['error' => 'Failed to store farmer data.'], 500);
                    }
                }



            } catch (\Exception $e) {
                \Log::error('Farmer Store Error: ' . $e->getMessage());
                return response()->json(['error' => 'Error: ' . $e->getMessage()], 500);
            }




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
