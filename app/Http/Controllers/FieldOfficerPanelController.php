<?php

namespace App\Http\Controllers;

use App\Models\LandRevenueDepartment;
use Illuminate\Http\Request;
use App\Models\LandRevenueFarmerRegistation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnSelf;

class FieldOfficerPanelController extends Controller
{
    public function index(){
        $user = User::find(Auth::id());

        $farmers = LandRevenueFarmerRegistation::where('district', '=', $user->district)->whereIn('tehsil',json_decode($user->tehsil))->get();

        return view('field_officer_panel.farmers.index',['farmers'=>$farmers]);

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

                $data['verification_status'] = null;


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
