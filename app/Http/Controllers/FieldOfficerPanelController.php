<?php

namespace App\Http\Controllers;

use App\Models\LandRevenueDepartment;
use Illuminate\Http\Request;
use App\Models\LandRevenueFarmerRegistation;
use App\Models\User;
use App\Models\City;
use App\Models\Tehsil;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use function PHPUnit\Framework\returnSelf;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class FieldOfficerPanelController extends Controller
{
    public function index(){
        // $user = User::find(Auth::id());
        $user = User::find(Auth::id());
        $tehsils = Tehsil::where('district', '=', $user->district)->get();



        $farmers = LandRevenueFarmerRegistation::where('district', $user->district)
        ->where('tehsil', $user->tehsil)
        ->whereIn('tappa', json_decode($user->tappas))
        ->paginate(10);

        return view('field_officer_panel.farmers.index',['farmers'=>$farmers , 'tehsils' => $tehsils]);
    }


    public function farmers_reporting(request $request){

        if (Auth::id()) {
            $userId = Auth::id();
            $district = Auth::user()->district;
            $tehsils = Tehsil::where('district', $district)->get();
            $tehsil = json_decode(Auth::user()->tehsil);

            return view('field_officer_panel.farmers_reporting.index', [
                'district' => $district,
                'tehsil' => $tehsil,
            ]);
        }
    }
    public function view_farmers_reporting(request $request)
    {

        $start_date = Carbon::parse($request->start_date)->startOfDay();
        $end_date = Carbon::parse($request->end_date)->endOfDay();
        $district = $request->input('district');
        $tehsilArray = $request->input('tehsil'); // Default to an empty array if no tehsils are provided
        $minAcre = intval($request->input('min_acre'));
        $maxAcre = intval($request->input('max_acre'));

        $query = LandRevenueFarmerRegistation::where('district', $district)
            ->where('user_id' , Auth::user()->id)
            ->where('tehsil', $tehsilArray);

            if($request->input('min_acre') && $request->input('min_acre') != ''){
                $query->where('total_landing_acre', '>=', $minAcre)
                ->where('total_landing_acre', '<=', $maxAcre);
            }

            if($request->start_date && $request->start_date != ''){
                $query->whereBetween('created_at', [$start_date, $end_date]);
            }

            if($request->house_type && $request->house_type != ''){
                $query->where('house_type', $request->input('house_type'));
            }

            // Correct handling of owner_type
            if($request->owner_type && $request->owner_type != '') {
                // Dynamically set the owner_types based on the request
                $ownerTypes = is_array($request->owner_type) ? $request->owner_type : [$request->owner_type];
                // Apply the whereIn condition using the values from the request

                $query->whereJsonContains('owner_type', $ownerTypes);

            }



        $data = $query->paginate(10);
        // dd($data);
        return view('field_officer_panel.farmers_reporting.view',['data' => $data]);
    }


    public function view($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $data = LandRevenueFarmerRegistation::where('id', '=', $id)->first();
            // dd($data);
            return view('field_officer_panel.farmers.view', [
                'data' => $data,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function create()
    {
        if (Auth::id()) {

            $district = Auth()->user()->district;
            $tehsils = Auth()->user()->tehsil;
            $tappa = Auth()->user()->tappas;
            $cities = City::all();
            return view('field_officer_panel.farmers.create', [

                'district' => $district,
                'tehsils' => $tehsils,
                'tappa' => $tappa,
                'cities' => $cities
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $district = Auth()->user()->district;
            $tehsils = Auth()->user()->tehsil;
            $user_name = Auth()->user()->name;
            $data = LandRevenueFarmerRegistation::where('id', '=', $id)->first();
            $tappa = Auth()->user()->tappas;
            $cities = City::all();
            return view('field_officer_panel.farmers.create', [
                'data' => $data,
                'district' => $district,
                'tehsils' => $tehsils,
                'tappa' => $tappa,
                'cities' => $cities
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
        if ($request->verification_status == 'rejected_by_fa') {

            if($request->declined_reason == 'other')
            {
                $farmer->declined_reason = $request->declined_reason;
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
        return redirect()->route('farmers-list-field-officer')->with('farmers-registered', 'Done');
    }




    public function lrd_farmers(){
        $user = User::find(Auth::id());
        $tehsils = Tehsil::where('district', '=', $user->district)->get();
        $farmers = LandRevenueFarmerRegistation::where('district', '=', $user->district)->where('user_type','Land_Revenue_Officer')->where('verification_status',null)->paginate(10);
        return view('field_officer_panel.lrd_farmers.index',['farmers' => $farmers, 'tehsils' => $tehsils]);
    }




    public function district_farmers(){
        $user = User::find(Auth::id());
        $tehsils = Tehsil::where('district', '=', $user->district)->get();
        $farmers = LandRevenueFarmerRegistation::where('district', '=', $user->district)->where('user_type','District_Officer')->where('verification_status',null)->paginate(10);
        return view('field_officer_panel.lrd_farmers.index',['farmers' => $farmers, 'tehsils' => $tehsils]);
    }


    public function view_farmers($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $data = LandRevenueFarmerRegistation::where('id', '=', $id)->first();
            // dd($all_agriculture_farmers);
            return view('field_officer_panel.lrd_farmers.view', [
                'data' => $data,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {

        $rules = [
             // Text fields
             'name' => 'required',
             'father_name' => 'required',
             'cnic' => 'required|min:13',
             'mobile' => 'required',
            //  'district' => 'required',
            //  'tehsil' => 'required',
            //  'uc' => 'required',

            //  'tappa' => 'required',
            //  'dah' => 'required',
            //  'village' => 'required',
            //  'gender' => 'required',
            //  'house_type' => 'required',
            //  'owner_type' => 'required',
            //  'full_name_of_next_kin' => 'required',
            //  'cnic_of_next_kin' => 'required',
            //  'mobile_of_next_kin' => 'required',
            //  'female_children_under16' => 'required',
            //  'female_Adults_above16' => 'required',
            //  'male_children_under16' => 'required',
            //  'male_Adults_above16' => 'required',
            //  'total_landing_acre' => 'required',
            //  'total_area_with_hari' => 'required',
            //  'total_area_cultivated_land' => 'required',
            //  'total_fallow_land' => 'required',
            //  'title_name.*' => 'required',
            //  'title_cnic.*' => 'required',
            //  'title_number.*' => 'required',
            //  'title_area.*' => 'required',
            //  'crops.*' => 'required',
            //  'crops_orchard.*' => 'required',
            //  'crop_area.*' => 'required',
            //  'crop_average_yeild.*' => 'required',
            //  'physical_asset_item' => 'required',
            //  'animal_name.*' => 'required',
            //  'animal_qty.*' => 'required',
            //  'source_of_irrigation' => 'required',
            //  'source_of_irrigation_engery' => 'required',
            //  'area_length' => 'required',
            //  'line_status' => 'required',
            //  'lined_length' => 'required',
            //  'total_command_area' => 'required',
            //  'account_title' => 'required',
            //  'account_no' => 'required',
            //  'bank_name' => 'required',
            //  'branch_name' => 'required',
            //  'IBAN_number' => 'required',
            //  'branch_code' => 'required',


             // File uploads
            // 'front_id_card' => 'required|file|mimes:jpg,png,jpeg|max:500',
            // 'back_id_card' => 'required|file|mimes:jpg,png,jpeg|max:500',
            // 'form_seven_pic' => 'required|file|mimes:jpg,png,jpeg|max:500',
            // 'upload_farmer_pic' => 'required|file|mimes:jpg,png,jpeg|max:500',

        ];


        if ($request->old_front_id_card != 1){
            $rules['front_id_card'] = 'required|max:500|file|mimes:jpg,png,jpeg';
        }
        if ($request->old_back_id_card != 1){
            $rules['back_id_card'] = 'required|max:500|file|mimes:jpg,png,jpeg';
        }
        if ($request->old_form_seven_pic != 1){
            $rules['form_seven_pic'] = 'required|max:1024|file|mimes:jpg,png,jpeg,pdf';
        }
        if ($request->old_upload_farmer_pic != 1){
            $rules['upload_farmer_pic'] = 'required|max:500|file|mimes:jpg,png,jpeg';
        }
        // if ($request->old_upload_land_proof != 1){
        //     $rules['upload_land_proof'] = 'required|max:500|file|mimes:jpg,png,jpeg';
        // }




        $messages = [
            'front_id_card.max' => 'The ID card file size must not exceed 500KB.',
            'back_id_card.max' => 'The ID card file size must not exceed 500KB.',
            'form_seven_pic.max' => 'The Form VII proof file size must not exceed 1024KB.',
            'upload_farmer_pic.max' => 'The farmer photo file size must not exceed 500KB.',
            'form_seven_pic.required' => 'Forms VII / Registry from Micro (Land Documents) is required.',
            'upload_land_proof.required' => 'Forms VII/ VIII A/ Affidavit/ Heirship / Registry from Micro (Land Documents) is required.',

            'upload_farmer_pic.required' => 'Photo of the farmer is required.',

            'front_id_card.mimes' => 'The ID card must be a file of type: jpg, jpeg, png.',
            'back_id_card.mimes' => 'The ID card must be a file of type: jpg, jpeg, png.',
            'form_seven_pic.mimes' => 'The Form VII proof file must be of type: jpg, jpeg, png, pdf.',
            'upload_farmer_pic.mimes' => 'The farmer photo must be of type: jpg, jpeg, png.',

            'upload_land_proof.mimes' => 'The Form VIII proof file must be of type: jpg, jpeg, png.',



        ];


        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }


            $data = $request->all();

            // dd($data);
            $data = $request->except(['_token', 'edit_id', 'old_front_id_card','old_back_id_card','old_form_seven_pic','old_upload_land_proof','old_upload_farmer_pic','old_upload_other_attach','old_no_objection_affidavit_pic']);


            $data['user_type'] = $request->user_type;
            if( $data['user_type'] != 'Online'){

                $data['user_id'] = Auth::id();
                // $data['land_emp_id'] = Auth()->user()->user_id;

                // $data['land_emp_name'] = Auth()->user()->name;
            }


            $data['title_name'] = json_encode($request->title_name);
            $data['title_father_name'] = json_encode($request->title_name);
            $data['title_cnic'] = json_encode($request->title_cnic);
            $data['title_number'] = json_encode($request->title_number);
            $data['title_area'] = json_encode($request->title_area);

            $data['owner_type'] = json_encode($request->owner_type);

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
            if ($request->hasFile('form_seven_pic')) {
                $form_seven_pic_image = $request->file('form_seven_pic');
                $form_seven_pic_image_name = time() . '_' . uniqid() . '.' . $form_seven_pic_image->getClientOriginalExtension();
                $form_seven_pic_image->move(public_path('fa_farmers/form_seven_pic'), $form_seven_pic_image_name);
                $data['form_seven_pic'] = $form_seven_pic_image_name;
            }



            if ($request->hasFile('no_objection_affidavit_pic')) {
                $no_objection_affidavit_pic_image = $request->file('no_objection_affidavit_pic');
                $no_objection_affidavit_pic_image_name = time() . '_' . uniqid() . '.' . $no_objection_affidavit_pic_image->getClientOriginalExtension();
                $no_objection_affidavit_pic_image->move(public_path('fa_farmers/no_objection_affidavit_pic'), $no_objection_affidavit_pic_image_name);
                $data['no_objection_affidavit_pic'] = $no_objection_affidavit_pic_image_name;
            }



            // dd($data);

            if ($request->edit_id && $request->edit_id != '') {
                LandRevenueFarmerRegistation::where('id', $request->edit_id)->update($data);
                // return redirect()->back()->with('farmers-registered', 'Your Farmers Is Successfully Updated');
                return ['success' => 'Farmer Data Updated Succesfully..!'];
            } else {
                LandRevenueFarmerRegistation::create($data);
                // return redirect()->back()->with('farmers-registered', 'Your Farmers Is Successfully Registered');
                return ['success' => 'Farmer Data Submitted Succesfully..!'];
            }

    }

}
