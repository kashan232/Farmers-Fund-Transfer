<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Tappa;
use App\Models\Tehsil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TappaController extends Controller
{
    public function add_tappa()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.tappa.add_tappa', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function get_tehsils(Request $request)
    {
        $district = $request->input('district');
        // dd($district);
        $tehsils = Tehsil::where('district', $district)->pluck('tehsil')->toArray();
        // dd($tehsils);
        return response()->json($tehsils);
    }
    public function store_tappa(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            if($request->edit_id && $request->edit_id != '')
            {
                Tappa::where('id',$request->edit_id)->update([
                    'admin_or_user_id'    => $userId,
                    'district'          => $request->district,
                    'tehsil'          => $request->tehsil,
                    'tappa'          => $request->tappa,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ]);
                return redirect()->back()->with('tappa-updated', 'Tappa Updated Successfully');
            }
            else{
                Tappa::create([
                    'admin_or_user_id'    => $userId,
                    'district'          => $request->district,
                    'tehsil'          => $request->tehsil,
                    'tappa'          => $request->tappa,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ]);
                return redirect()->back()->with('tappa-added', 'Tappa Added Successfully');
            }


        } else {
            return redirect()->back();
        }
    }
    public function all_tappa()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            // dd($userId);
            $all_tappa = Tappa::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.tappa.all_tappa', [
                'all_tappa' => $all_tappa,
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function edit_tappa(Request $request, $id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            $tappdetails = Tappa::findOrFail($id);
            $all_district = District::where('admin_or_user_id', '=', $userId)->get();
            $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.tappa.edit_tappa', [
                'tappdetails' => $tappdetails,
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function update_tappa(Request $request, $id)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Tappa::where('id', $id)->update([
                'district'          => $request->district,
                'tehsil'          => $request->tehsil,
                'tappa'          => $request->tappa,
                'updated_at' => Carbon::now(),
            ]);
            return Redirect()->back()->with('success-message-updte', 'Tappa Updated successfully!');
        } else {
            return redirect()->back();
        }
    }
}
