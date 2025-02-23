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
use Illuminate\Validation\ValidationException;



class AgricultureOfficerPanelController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $user_id = Auth()->user()->user_id;
        $agriUserfarmersCount = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->count();
        $Unverifiedfarmeragiruser = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->where('verification_status', '=', 'Unverified')->count();
        $Verifiedfarmeragiruser = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->where('verification_status', '=', 'Verified')->count();
        return view('agri_officer_panel.index', [
            'agriUserfarmersCount' => $agriUserfarmersCount,
            'Unverifiedfarmeragiruser' => $Unverifiedfarmeragiruser,
            'Verifiedfarmeragiruser' => $Verifiedfarmeragiruser,
        ]);
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
            return view('agri_officer_panel.farmers.edit', [
                'data' => $data,
                'district' => $district,
                'tehsil' => $tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function farmer_create(){
        $district = Auth()->user()->district;
        $tehsil = Auth()->user()->tehsil;
        return view('agri_officer_panel.farmers.create',['district' => $district, 'tehsil' => $tehsil]);
    }

    public function farmers_reporting(request $request){

        if (Auth::id()) {
            $userId = Auth::id();
            $district = Auth::user()->district;
            $tehsils = Tehsil::where('district', $district)->get();
            return view('agri_officer_panel.farmers_reporting.index', [
                'district' => $district,
                'tehsils' => $tehsils,
            ]);
        }
    }
    public function view_farmers_reporting(request $request)
    {

        $start_date = Carbon::parse($request->start_date)->startOfDay();
        $end_date = Carbon::parse($request->end_date)->endOfDay();
        $district = $request->input('district');
        $tehsilArray = $request->input('tehsil', []); // Default to an empty array if no tehsils are provided
        $minAcre = intval($request->input('min_acre'));
        $maxAcre = intval($request->input('max_acre'));

        $registrations = LandRevenueFarmerRegistation::where('district', $district)
            ->whereIn('tehsil', $tehsilArray)
            ->where('total_landing_acre', '>=', $minAcre)
            ->where('total_landing_acre', '<=', $maxAcre)
            ->whereBetween('created_at', [$start_date, $end_date]);

        $data = $registrations->paginate(10);

// dd($data);
        return view('agri_officer_panel.farmers_reporting.view',['data' => $data]);
    }

    public function store_farmer(Request $request)
    {
        if (Auth::check()) {
            if ($request->edit_id && $request->edit_id != '') {
                $data = $request->all();
                $data = $request->except(['_token', 'edit_id']);
                $data['user_type'] = Auth()->user()->usertype;
                $data['admin_or_user_id'] = Auth::id();
                $data['land_emp_id'] = Auth()->user()->user_id;
                $data['land_emp_name'] = Auth()->user()->name;

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

                $data['verification_status'] = null;
                $data['declined_reason'] = null;


                // Handle front ID card image
                if ($request->hasFile('front_id_card')) {
                    $front_id_cardimage = $request->file('front_id_card');
                    $front_id_cardimageName = time() . '_' . uniqid() . '.' . $front_id_cardimage->getClientOriginalExtension();
                    $front_id_cardimage->move(public_path('land_farmers/front_id_card'), $front_id_cardimageName);
                    $data['front_id_card'] = $front_id_cardimageName;
                }

                // Handle back ID card image
                if ($request->hasFile('back_id_card')) {
                    $back_id_cardimage = $request->file('back_id_card');
                    $back_id_cardimageName = time() . '_' . uniqid() . '.' . $back_id_cardimage->getClientOriginalExtension();
                    $back_id_cardimage->move(public_path('land_farmers/back_id_card'), $back_id_cardimageName);
                    $data['back_id_card'] = $back_id_cardimageName;
                }

                // Handle upload land proof image
                if ($request->hasFile('upload_land_proof')) {
                    $upload_land_proofimage = $request->file('upload_land_proof');
                    $upload_land_proofimageName = time() . '_' . uniqid() . '.' . $upload_land_proofimage->getClientOriginalExtension();
                    $upload_land_proofimage->move(public_path('land_farmers/upload_land_proof'), $upload_land_proofimageName);
                    $data['upload_land_proof'] = $upload_land_proofimageName;
                }

                // Handle other attachments image
                if ($request->hasFile('upload_other_attach')) {
                    $upload_other_attachimage = $request->file('upload_other_attach');
                    $upload_other_attachimageName = time() . '_' . uniqid() . '.' . $upload_other_attachimage->getClientOriginalExtension();
                    $upload_other_attachimage->move(public_path('land_farmers/upload_other_attach'), $upload_other_attachimageName);
                    $data['upload_other_attach'] = $upload_other_attachimageName;
                }

                // Handle farmer picture image
                if ($request->hasFile('upload_farmer_pic')) {
                    $upload_farmer_picimage = $request->file('upload_farmer_pic');
                    $upload_farmer_picimageName = time() . '_' . uniqid() . '.' . $upload_farmer_picimage->getClientOriginalExtension();
                    $upload_farmer_picimage->move(public_path('land_farmers/upload_farmer_pic'), $upload_farmer_picimageName);
                    $data['upload_farmer_pic'] = $upload_farmer_picimageName;
                }

                // Handle cheque picture image
                if ($request->hasFile('upload_cheque_pic')) {
                    $upload_cheque_picimage = $request->file('upload_cheque_pic');
                    $upload_cheque_picimageName = time() . '_' . uniqid() . '.' . $upload_cheque_picimage->getClientOriginalExtension();
                    $upload_cheque_picimage->move(public_path('land_farmers/upload_cheque_pic'), $upload_cheque_picimageName);
                    $data['upload_cheque_pic'] = $upload_cheque_picimageName;
                }

                LandRevenueFarmerRegistation::where('id', $request->edit_id)->update($data);
                return redirect()->back()->with('farmers-registered', 'Your Farmers Is Successfully Updated');
            } else {
                $data = $request->all();

                $data['user_type'] = Auth()->user()->usertype;
                $data['admin_or_user_id'] = Auth::id();
                $data['land_emp_id'] = Auth()->user()->user_id;
                $data['land_emp_name'] = Auth()->user()->name;

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

                $data['verification_status'] = null;
                $data['declined_reason'] = null;

                // Handle front ID card image
                if ($request->hasFile('front_id_card')) {
                    $front_id_cardimage = $request->file('front_id_card');
                    $front_id_cardimageName = time() . '_' . uniqid() . '.' . $front_id_cardimage->getClientOriginalExtension();
                    $front_id_cardimage->move(public_path('land_farmers/front_id_card'), $front_id_cardimageName);
                    $data['front_id_card'] = $front_id_cardimageName;
                }

                // Handle back ID card image
                if ($request->hasFile('back_id_card')) {
                    $back_id_cardimage = $request->file('back_id_card');
                    $back_id_cardimageName = time() . '_' . uniqid() . '.' . $back_id_cardimage->getClientOriginalExtension();
                    $back_id_cardimage->move(public_path('land_farmers/back_id_card'), $back_id_cardimageName);
                    $data['back_id_card'] = $back_id_cardimageName;
                }

                // Handle upload land proof image
                if ($request->hasFile('upload_land_proof')) {
                    $upload_land_proofimage = $request->file('upload_land_proof');
                    $upload_land_proofimageName = time() . '_' . uniqid() . '.' . $upload_land_proofimage->getClientOriginalExtension();
                    $upload_land_proofimage->move(public_path('land_farmers/upload_land_proof'), $upload_land_proofimageName);
                    $data['upload_land_proof'] = $upload_land_proofimageName;
                }

                // Handle other attachments image
                if ($request->hasFile('upload_other_attach')) {
                    $upload_other_attachimage = $request->file('upload_other_attach');
                    $upload_other_attachimageName = time() . '_' . uniqid() . '.' . $upload_other_attachimage->getClientOriginalExtension();
                    $upload_other_attachimage->move(public_path('land_farmers/upload_other_attach'), $upload_other_attachimageName);
                    $data['upload_other_attach'] = $upload_other_attachimageName;
                }

                // Handle farmer picture image
                if ($request->hasFile('upload_farmer_pic')) {
                    $upload_farmer_picimage = $request->file('upload_farmer_pic');
                    $upload_farmer_picimageName = time() . '_' . uniqid() . '.' . $upload_farmer_picimage->getClientOriginalExtension();
                    $upload_farmer_picimage->move(public_path('land_farmers/upload_farmer_pic'), $upload_farmer_picimageName);
                    $data['upload_farmer_pic'] = $upload_farmer_picimageName;
                }

                // Handle cheque picture image
                if ($request->hasFile('upload_cheque_pic')) {
                    $upload_cheque_picimage = $request->file('upload_cheque_pic');
                    $upload_cheque_picimageName = time() . '_' . uniqid() . '.' . $upload_cheque_picimage->getClientOriginalExtension();
                    $upload_cheque_picimage->move(public_path('land_farmers/upload_cheque_pic'), $upload_cheque_picimageName);
                    $data['upload_cheque_pic'] = $upload_cheque_picimageName;
                }

                LandRevenueFarmerRegistation::create($data);
                return redirect()->back()->with('farmers-registered', 'Your Farmers Is Successfully Registered');
            }
        }
    }




    public function farmers_index(){
        $user = User::find(Auth::id());
        $tehsils = Tehsil::where('district', '=', $user->district)->get();

        $farmers = LandRevenueFarmerRegistation::where('district', '=', $user->district)
        ->where('user_type', 'Agri_Officer') // Match the user_type
        ->where(function($query) {
            $query->where('verification_status', 'rejected_by_lo')
                  ->orWhere('verification_status', 'verified_by_do')
                  ->orWhere('verification_status', null);
        })
        ->paginate(5);



        return view('agri_officer_panel.farmers.index',['farmers' => $farmers, 'tehsils' => $tehsils]);
    }


    public function lrd_farmers(){
        $user = User::find(Auth::id());
        $tehsils = Tehsil::where('district', '=', $user->district)->get();
        $farmers = LandRevenueFarmerRegistation::where('district', '=', $user->district)->where('verification_status',0)->where('user_type','Land_Revenue_Officer')->paginate(5);
        return view('agri_officer_panel.farmers.index',['farmers' => $farmers, 'tehsils' => $tehsils]);
    }



    public function fields_farmers(){
        $user = User::find(Auth::id());
        $tehsils = Tehsil::where('district', '=', $user->district)->get();
        // $farmers = LandRevenueFarmerRegistation::where('district', '=', $user->district)->where('user_type','Field_Officer')->where('verification_status','=','0')->orWhere('verification_status','=','rejected_by_lo')->paginate(5);

        $farmers = LandRevenueFarmerRegistation::where('district', $user->district)
        ->where('tehsil', $user->tehsil)
        ->where('tappa', $user->tappas)

        ->paginate(10);

        // ->where(function($query) {
        //     $query->where('verification_status', 'rejected_by_lo')
        //     ->orWhere('verification_status', 'verified_by_do')
        //     ->orWhere('verification_status', 'rejected_by_ao')
        //           ->orWhere('verification_status', null);
        // })
        return view('agri_officer_panel.farmers.index',['farmers' => $farmers, 'tehsils' => $tehsils]);
    }

    public function online_farmers(){
        $user = User::find(Auth::id());
        $tehsils = Tehsil::where('district', '=', $user->district)->get();

        $farmers = LandRevenueFarmerRegistation::where('district', '=', $user->district)
        ->where('user_type', 'Online') // Match the user_type
        ->where(function($query) {
            $query->where('verification_status', 'rejected_by_lo')
            ->orWhere('verification_status', 'verified_by_do')
            ->orWhere('verification_status', 'rejected_by_ao')
                  ->orWhere('verification_status', null);
        })
        ->paginate(5);
        return view('agri_officer_panel.farmers.index',['farmers' => $farmers, 'tehsils' => $tehsils]);
    }

    public function verify_farmer(request $request){
        $user = User::find(Auth::id());
        $farmer = LandRevenueFarmerRegistation::find($request->farmer_id);
        // Update farmer verification status
        $farmer->verification_status = $request->verification_status;
        if ($request->verification_status == 'rejected_by_ao') {
            $farmer->declined_reason = $request->declined_reason;
        }
        else{
            $farmer->declined_reason = null;
        }
        $farmer->verification_by = $user->id;
        $farmer->save();
        return redirect()->route('ao-field-farmers')->with('farmers-registered', 'Done');
    }


    public function view_farmers($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $data = LandRevenueFarmerRegistation::where('id', '=', $id)->first();
            // dd($all_agriculture_farmers);
            return view('agri_officer_panel.farmers.view', [
                'data' => $data,
            ]);
        } else {
            return redirect()->back();
        }
    }



    public function unverify_farmers(){
        $user = User::find(Auth::id());

        $farmers = LandRevenueFarmerRegistation::where('district', '=', $user->district)->where('verification_status', '=', 0)->get();
        return view('agri_officer_panel.farmers.unverify_farmers',['farmers' => $farmers, ]);
    }

    public function verify_farmers(){
        $user = User::find(Auth::id());
        $farmers = LandRevenueFarmerRegistation::where('district', '=', $user->district)->where('verification_status', '=', 1)->get();
        return view('agri_officer_panel.farmers.verify_farmers',['farmers' => $farmers]);
    }

    public function all_field_officer(){
        $user = user::find(Auth::id());
        $field_officers = FieldOfficer::where('District', $user->district)->get();
        return view('agri_officer_panel.field_officers.index',['data' => $field_officers]);
    }

    public function create_field_officer(){
        $user = User::find(Auth::id());
        $tehsils = Tehsil::where('district', '=', $user->district)->get();
        return view('agri_officer_panel.field_officers.create',['district' => $user->district,'tehsils' => $tehsils]);
    }


    public function edit_field_officer($id){
        $user = User::find(Auth::id());
        $data = FieldOfficer::find($id);
        $tehsils = Tehsil::where('district', '=', $user->district)->get();
        return view('agri_officer_panel.field_officers.create',['data' => $data,'tehsils' => $tehsils]);
    }


    public function store_field_officer(request $request){

        if (Auth::id()) {

        try{

            if($request->edit_id && $request->edit_id != '')
            {

            }else{
                $validatedData = $request->validate([
                    'email_address' => 'required|email|unique:users,email',
                ]);
            }



            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            $tehsil = json_encode($request->input('tehsil'));
            $ucs = json_encode($request->input('ucs'));
            $tappa = json_encode($request->input('tappa'));

            if($request->edit_id && $request->edit_id != '')
            {
                $FieldOfficer = FieldOfficer::where('id',$request->edit_id)->update([
                    'admin_or_user_id'    => $userId,
                    'full_name'          => $request->full_name,
                    'contact_number'          => $request->contact_number,
                    'address'          => $request->address,
                    'email_address'          => $request->email_address,
                    'district'          => $request->district,
                    'tehsil'          => $tehsil,
                    'ucs'               => $ucs,
                    'tappas'          => $tappa,
                    'username'          => $request->username,

                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ]);
                return redirect()->back()->with('officer-added', 'Field Officer Updated Successfully');
            }
            else
            {
                $FieldOfficer = FieldOfficer::create([
                    'admin_or_user_id'    => $userId,
                    'full_name'          => $request->full_name,
                    'contact_number'          => $request->contact_number,
                    'address'          => $request->address,
                    'email_address'          => $request->email_address,
                    'district'          => $request->district,
                    'tehsil'          => $tehsil,
                    'ucs'               => $ucs,
                    'tappas'          => $tappa,
                    'username'          => $request->username,
                    'password'          => $request->password,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ]);
                // Create a user record with the same credentials and usertype 'employee'
                $user = User::create([
                    'name' => $request->full_name,
                    'user_id' => $FieldOfficer->id,
                    'email' => $request->email_address,
                    'district' => $request->district,
                    'tehsil' => $tehsil,
                    'ucs'               => $ucs,
                    'tappas'    => $tappa,
                    'password' => bcrypt($request->password), // Make sure to hash the password
                    'usertype' => 'Field_Officer', // Set the usertype to 'employee'
                ]);

                return redirect()->back()->with('officer-added', 'Field Officer Created Successfully');
            }

        }
        catch (ValidationException $e) {
            // Handle the validation failure
            return back()->withErrors($e->validator)->withInput();
        }
        } else {
            return redirect()->back();
        }

    }






    public function unverify_agri_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agriculture_farmers = AgricultureFarmersRegistration::where('verification_status', '!=', '1')->where('verification_status', '!=', 'Verified')->get();

            return view('agri_officer_panel.agriculture_farmers.unverify_agri_farmers_by_land', [
                'all_agriculture_farmers' => $all_agriculture_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_agri_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agriculture_farmers = AgricultureFarmersRegistration::where('verification_status', '=', 1)->get();
            return view('agri_officer_panel.agriculture_farmers.verify_agri_farmers_by_land', [
                'all_agriculture_farmers' => $all_agriculture_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_unverify_agri_farmers(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $farmers_id = $request->farmers_id;
            $verification_status = $request->verification_status; // Ensure this matches the form field name
            $declined_reason = $request->declined_reason; // Ensure this matches the form field name
            $user_name = Auth::user()->name;

            if ($verification_status == '1') {
                AgricultureFarmersRegistration::where('id', $farmers_id)->update([
                    'verification_status' => 1,
                    'declined_reason' => null,
                    'verification_by' => $user_name,
                    'updated_at' => Carbon::now(),
                ]);
            } else {
                AgricultureFarmersRegistration::where('id', $farmers_id)->update([
                    'verification_status' => 0,
                    'declined_reason' => $declined_reason,
                    'verification_by' => $user_name,
                    'updated_at' => Carbon::now(),
                ]);
            }
            return redirect()->back()->with('farmer-updated', 'Farmer verification status updated successfully');
        } else {
            return redirect()->back();
        }
    }


    public function verify_agriuser_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agricultureuser_farmers = AgricultureUserFarmerRegistration::where('verification_status', '=', 1)->get();
            return view('agri_officer_panel.agricultureuser_farmers.verify_agriuser_farmers_by_land', [
                'all_agricultureuser_farmers' => $all_agricultureuser_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }



    public function unverify_agriuser_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agricultureuser_farmers = AgricultureUserFarmerRegistration::where('verification_status', '!=', '1')->where('verification_status', '!=', 'Verified')->get();
            return view('agri_officer_panel.agricultureuser_farmers.unverify_agriuser_farmers_by_land', [
                'all_agricultureuser_farmers' => $all_agricultureuser_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }



    public function verify_unverify_agriuser_farmers(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $farmers_id = $request->farmers_id;
            $verification_status = $request->verification_status; // Ensure this matches the form field name
            $declined_reason = $request->declined_reason; // Ensure this matches the form field name

            $user_name = Auth::user()->name;

            if ($verification_status == '1') {
                AgricultureUserFarmerRegistration::where('id', $farmers_id)->update([
                    'verification_status' => 1,
                    'declined_reason' => null,
                    'verification_by' => $user_name,
                    'updated_at' => Carbon::now(),
                ]);
            } else {
                AgricultureUserFarmerRegistration::where('id', $farmers_id)->update([
                    'verification_status' => 0,
                    'declined_reason' => $declined_reason,
                    'verification_by' => $user_name,
                    'updated_at' => Carbon::now(),
                ]);
            }

            return redirect()->back()->with('farmer-updated', 'Farmer verification status updated successfully');
        } else {
            return redirect()->back();
        }
    }

    public function view_do_farmers($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $data = AgricultureFarmersRegistration::where('id', '=', $id)->first();
            // dd($data);
            return view('agri_officer_panel.agriculture_farmers.view_farmers', [
                'data' => $data,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
