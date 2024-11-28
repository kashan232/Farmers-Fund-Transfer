<?php

namespace App\Http\Controllers;

use App\Models\LandRevenueFarmerRegistation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class OnlineFormController extends Controller
{
    public function index()
    {
        return view('auth.online-login');
    }

    public function authenticate(request $request)
    {


        $user = User::where('cnic', $request->cnic)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::guard('web')->login($user);

            return  redirect()->route('home');
        } else {
            return redirect()->route('online-login-form')->withErrors(['cnic' => 'Invalid Cnic or password'])->withInput();
        }
    }

    public function logout()
    {
        auth()->logout();
        return  redirect()->route('online-login-form');
    }

    public function store_online_farmers_registration(Request $request)
    {

        // Step 1: Validate the incoming request - Only required fields
        $validated = $request->validate([
            // Text fields
            'name' => 'required',
            'father_name' => 'required',
            'cnic' => 'required',
            'mobile' => 'required',
            'district' => 'required',
            'tehsil' => 'required',
            'uc' => 'required',
            'tappa' => 'required',
            'dah' => 'required',
            'village' => 'required',
            'gender' => 'required',
            'house_type' => 'required',
            'owner_type' => 'required',
            'full_name_of_next_kin' => 'required',
            'cnic_of_next_kin' => 'required',
            'mobile_of_next_kin' => 'required',
            'female_children_under16' => 'required',
            'female_Adults_above16' => 'required',
            'male_children_under16' => 'required',
            'male_Adults_above16' => 'required',
            'total_landing_acre' => 'required',
            'total_area_with_hari' => 'required',
            'total_area_cultivated_land' => 'required',
            'total_fallow_land' => 'required',
            'title_name.*' => 'required',
            'title_cnic.*' => 'required',
            'title_number.*' => 'required',
            'title_area.*' => 'required',
            'crops.*' => 'required',
            'crop_area.*' => 'required',
            'crop_average_yeild.*' => 'required',
            'physical_asset_item' => 'required',
            'animal_name.*' => 'required',
            'animal_qty.*' => 'required',
            'source_of_irrigation' => 'required',
            'source_of_irrigation_engery' => 'required',
            'area_length' => 'required',
            'line_status' => 'required',
            'lined_length' => 'required',
            'total_command_area' => 'required',
            'account_title' => 'required',
            'account_no' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'IBAN_number' => 'required',
            'branch_code' => 'required',

            // File uploads
            'front_id_card' => 'required',
            'back_id_card' => 'required',
            'upload_land_proof' => 'required',
            'upload_other_attach' => 'required',
            'upload_farmer_pic' => 'required',
            'upload_cheque_pic' => 'required',
        ]);

        $data = $request->all();
        $data['user_type'] = 'Online';
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

        $data['verification_status'] = 0;

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

        LandRevenueFarmerRegistation::create($data);
        return redirect()->back()->with('farmers-registered', 'Your Farmers Is Successfully Registered');
    }
}
