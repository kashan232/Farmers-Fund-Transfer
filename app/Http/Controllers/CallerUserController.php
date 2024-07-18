<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CallerUser;

use App\Models\AgricultureOfficer;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\User;
use App\Models\DistrictOfficer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CallerUserController extends Controller
{
    public function caller_user_create()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.caller_user.add_caller_user', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_caller_user(Request $request)
    {
        if (Auth::id()) {

            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            $tehsil = json_encode($request->input('tehsil'));
            $ucs = json_encode($request->input('ucs'));
            $tappa = json_encode($request->input('tappa'));

            if($request->edit_id && $request->edit_id != '')
            {
                $CallerUser = CallerUser::where('id',$request->edit_id)->update([
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
                return redirect()->back()->with('officer-added', 'Caller User Updated Successfully');
            }
            else
            {
                $CallerUser = CallerUser::create([
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
                    'user_id' => $CallerUser->id,
                    'email' => $request->email_address,
                    'district' => $request->district,
                    'tehsil' => $tehsil,
                    'ucs'               => $ucs,
                    'tappas'          => $tappa,
                    'password' => bcrypt($request->password), // Make sure to hash the password
                    'usertype' => 'Caller_User', // Set the usertype to 'employee'
                ]);

                return redirect()->back()->with('officer-added', 'Caller User Created Successfully');
            }


        } else {
            return redirect()->back();
        }
    }
    public function all_caller_user()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_caller_users = CallerUser::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.caller_user.all_caller_user', [
                'all_caller_users' => $all_caller_users,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function edit_caller_user($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $data = CallerUser::find($id);
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.caller_user.edit_caller_user', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }
}
