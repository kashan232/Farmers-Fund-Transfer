<?php

namespace App\Http\Controllers;

use App\Models\AgriUser;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\UC;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgriUserController extends Controller
{
    public function add_user()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            $all_uc = UC::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.user.add_user', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
                'all_uc' => $all_uc,

            ]);
        } else {
            return redirect()->back();
        }
    }
    public function getTehsils(Request $request)
    {
        $district = $request->input('district');
        $tehsils = Tehsil::where('district', $district)->pluck('tehsil')->toArray(); // Adjust according to your database schema
        return response()->json($tehsils);
    }
    public function store_user(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $emp_id = Auth::user()->emp_id;
            $userId = Auth::id();
            AgriUser::create([
                'admin_or_user_id'    => $userId,
                'emp_id'    => $emp_id,
                'user_name'          => $request->user_name,
                'number'          => $request->number,
                'email'          => $request->email,
                'address'          => $request->address,
                'cnic'          => $request->cnic,
                'district'          => $request->district,
                'tehsil'          => $request->tehsil,
                'uc'          => $request->uc,
                'password'          => $request->password,
                'img'          => $request->img,
                'cnic_img'          => $request->cnic_img,
                'form_img'          => $request->form_img,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('user-added', 'User Added Successfully');
        } else {
            return redirect()->back();
        }
    }
    public function all_user()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_user = AgriUser::where('admin_or_user_id', '=', $userId)->get();
           
            return view('admin_panel.user.all_user', [
                'all_user' => $all_user,
            ]);
        } else {
            return redirect()->back();
        }
    }
}