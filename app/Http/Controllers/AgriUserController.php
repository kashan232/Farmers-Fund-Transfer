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
            $userId = Auth::id();
            $emp_id = Auth::user()->emp_id;

            // Encode the input arrays
            $ucs = json_encode($request->input('ucs'));
            $tappa = json_encode($request->input('tappa'));
            $tehsil = json_encode($request->input('tehsil'));

            // Handle the image upload and resizing
            $image = null;
            if ($request->hasFile('userimg')) {
                $image = resize_image_and_save($request->file('userimg'), 'final');
            }

            // Create the Agriculture User
            $agriuser = AgriUser::create([
                'admin_or_user_id' => $userId,
                'emp_id' => $emp_id,
                'user_name' => $request->user_name,
                'number' => $request->number,
                'email' => $request->email,
                'address' => $request->address,
                'cnic' => $request->cnic,
                'district' => $request->district,
                'tehsil' => $tehsil,
                'ucs' => $ucs,
                'tappas' => $tappa,
                'password' => $request->password, // Assuming password is already hashed, adjust if needed
                'img' => $image,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Create the User record with the same credentials
            User::create([
                'name' => $request->user_name,
                'user_id' => $agriuser->id,
                'email' => $request->email,
                'district' => $request->district,
                'tehsil' => $tehsil,
                'ucs' => $ucs,
                'tappas' => $tappa,
                'password' => bcrypt($request->password), // Ensure password is hashed
                'usertype' => 'Agriculture_User',
            ]);

            return redirect()->back()->with('user-added', 'Agriculture User Created Successfully');
        } else {
            return redirect()->back()->withErrors(['error' => 'User not authenticated']);
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


    public function edit_user($id)
    {

        if (Auth::id()) {
            $userId = Auth::id();
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            $all_uc = UC::where('admin_or_user_id', '=', $userId)->get();
            $agri_user = AgriUser::find($id);

            return view('admin_panel.user.edit_user', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
                'all_uc' => $all_uc,
                'data' => $agri_user
            ]);
        } else {
            return redirect()->back();
        }
    }
}
