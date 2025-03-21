<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankBranch;
use Illuminate\Support\Facades\Auth;
use App\Models\City;


class BankBranchController extends Controller
{
    public function index(){
        $cities = City::all();
        $data = BankBranch::paginate();
        return view('admin_panel.bankbranches.index',['data' => $data, 'cities' => $cities]);
    }

    public function store(request $request){
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            if($request->edit_id && $request->edit_id != '')
            {
               $bankbranches = BankBranch::find($request->edit_id);
               $bankbranches->city_id = $request->city_id;
               $bankbranches->title = $request->title;
               $bankbranches->save();
                return redirect()->back()->with('bankbranches-updated', 'Bank Branches Updated Successfully');
            }
            else
            {
                $bankbranches = new BankBranch();
                $bankbranches->city_id = $request->city_id;
                $bankbranches->title = $request->title;
                $bankbranches->save();
                return redirect()->back()->with('bankbranches-updated', 'Bank Branches Added Successfully');
            }

        } else {
            return redirect()->back();
        }
    }
}
