<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    public function index(){
        $data = City::all();
        return view('admin_panel.city.index',['data' => $data]);
    }

    public function store(request $request){
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            if($request->edit_id && $request->edit_id != '')
            {
               $city = City::find($request->edit_id);
               $city->title = $request->title;
               $city->save();
                return redirect()->back()->with('city-updated', 'City Updated Successfully');
            }
            else
            {
                $city = new City();
                $city->title = $request->title;
                $city->save();
                return redirect()->back()->with('city-updated', 'City Added Successfully');
            }

        } else {
            return redirect()->back();
        }
    }
}
