<?php

namespace App\Http\Controllers;

use App\Models\LandRevenueDepartment;
use Illuminate\Http\Request;
use App\Models\LandRevenueFarmerRegistation;
use App\Models\User;
use App\Models\Tehsil;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use function PHPUnit\Framework\returnSelf;

class FieldOfficerPanelController extends Controller
{
    public function index(){
        // $user = User::find(Auth::id());
        $farmers = LandRevenueFarmerRegistation::where('admin_or_user_id' , Auth::user()->id)->get();
        return view('field_officer_panel.farmers.index',['farmers'=>$farmers]);
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

        $registrations = LandRevenueFarmerRegistation::where('district', $district)
            ->where('admin_or_user_id' , Auth::user()->id)
            ->where('tehsil', $tehsilArray)
            ->where('total_landing_acre', '>=', $minAcre)
            ->where('total_landing_acre', '<=', $maxAcre)
            ->whereBetween('created_at', [$start_date, $end_date]);

        $data = $registrations->paginate(10);

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

            return view('field_officer_panel.farmers.create', [

                'district' => $district,
                'tehsils' => $tehsils,
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
            $tehsil = Auth()->user()->tehsil;
            $user_name = Auth()->user()->name;
            $data = LandRevenueFarmerRegistation::where('id', '=', $id)->first();

            return view('field_officer_panel.farmers.edit', [
                'data' => $data,
                'district' => $district,
                'tehsil' => $tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function lrd_farmers(){
        $user = User::find(Auth::id());
        $tehsils = Tehsil::where('district', '=', $user->district)->get();
        $farmers = LandRevenueFarmerRegistation::where('district', '=', $user->district)->where('user_type','Land_Revenue_Officer')->paginate(5);
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

                $data['verification_status'] = 0;


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

                $data['verification_status'] = 0;

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

}
