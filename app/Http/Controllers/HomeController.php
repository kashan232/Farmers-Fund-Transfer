<?php

namespace App\Http\Controllers;

use App\Models\AgricultureOfficer;
use App\Models\AgriUser;
use App\Models\District;
use App\Models\LandRevenueDepartment;
use App\Models\OurUser;
use App\Models\Tappa;
use App\Models\Tehsil;
use App\Models\UC;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            // if ($usertype == 'online_user') {
            //     return view('dashboard');
            // }
            if ($usertype == 'District_Officer') {
                $userId = Auth::id();
                $user_id = Auth()->user()->user_id;
                $agriUserfarmersCount = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->count();
                $Unverifiedfarmeragiruser = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->where('verification_status', '=', 'Unverified')->count();
                $Verifiedfarmeragiruser = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->where('verification_status', '=', 'Verified')->count();
                return view('district_officer_panel.index', [
                    'agriUserfarmersCount' => $agriUserfarmersCount,
                    'Unverifiedfarmeragiruser' => $Unverifiedfarmeragiruser,
                    'Verifiedfarmeragiruser' => $Verifiedfarmeragiruser,
                ]);
            }
            else if ($usertype == 'Agri_Officer') {
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
             else if ($usertype == 'admin') {
                // Fetching counts directly
                $district_counts = District::count();
                $tehsil_counts = Tehsil::count();
                $ucs_counts = UC::count();
                $tappas_count = Tappa::count();

                // $AgriUser = AgriUser::count();
                // $AgricultureOfficer = AgricultureOfficer::count();
                $LandRevenueDepartment = LandRevenueDepartment::count();
                $subsidyfarmers = OurUser::count();


                // $agriUserCount = DB::table('agriculture_user_farmer_registrations')->count();
                // $agricultureOfficerCount = DB::table('agriculture_farmers_registrations')->count();
                $landRevenueDepartmentCount = DB::table('land_revenue_farmer_registations')->count();
                $onlineFarmerRegistrationCount = DB::table('online_farmer_registrations')->count();

                $totalEntries = $landRevenueDepartmentCount + $onlineFarmerRegistrationCount;

                // $Unverifiedfarmeragiruser = DB::table('agriculture_user_farmer_registrations')->where('verification_status', '=', 'Unverified')->count();
                // $Unverifiedfarmeragioficr = DB::table('agriculture_farmers_registrations')->where('verification_status', '=', 'Unverified')->count();
                $Unverifiedfarmerland = DB::table('land_revenue_farmer_registations')->where('verification_status', '=', 'Unverified')->count();
                $Unverifiedfarmeronline = DB::table('online_farmer_registrations')->where('verification_status', '=', 'Unverified')->count();

                $TotalUnverifiedfarmer =  $Unverifiedfarmerland + $Unverifiedfarmeronline;

                // $Verifiedfarmeragiruser = DB::table('agriculture_user_farmer_registrations')->where('verification_status', '=', 'Verified')->count();
                // $Verifiedfarmeragioficr = DB::table('agriculture_farmers_registrations')->where('verification_status', '=', 'Verified')->count();
                $Verifiedfarmerland = DB::table('land_revenue_farmer_registations')->where('verification_status', '=', 'Verified')->count();
                $Verifiedfarmeronline = DB::table('online_farmer_registrations')->where('verification_status', '=', 'Verified')->count();

                $TotalVerifiedfarmers =  $Verifiedfarmerland + $Verifiedfarmeronline;

                // Fetching data for the view
                $data = DB::table('districts')
                    ->leftJoin('land_revenue_farmer_registations', 'districts.district', '=', 'land_revenue_farmer_registations.district')
                    ->select('districts.district', DB::raw('COUNT(land_revenue_farmer_registations.id) as user_count'))
                    ->groupBy('districts.district')
                    ->orderBy('districts.district', 'asc')
                    ->get()
                    ->map(function ($item) {
                        return [
                            'label' => $item->district,
                            'value' => $item->user_count,
                        ];
                    })
                    ->toArray();

                $data2 = DB::table('districts')
                    ->leftJoin('land_revenue_farmer_registations', 'land_revenue_farmer_registations.district', '=', 'districts.district')
                    ->select('districts.district', DB::raw('COUNT(land_revenue_farmer_registations.id) as user_count'))
                    ->groupBy('districts.district')
                    ->get()
                    ->map(function ($item) {
                        return [
                            'label' => $item->district,
                            'value' => $item->user_count,
                        ];
                    })
                    ->toArray();

                $data3 = DB::table('districts')
                    ->leftJoin('online_farmer_registrations', 'online_farmer_registrations.district', '=', 'districts.district')
                    ->select('districts.district', DB::raw('COUNT(online_farmer_registrations.id) as user_count'))
                    ->groupBy('districts.district')
                    ->get()
                    ->map(function ($item) {
                        return [
                            'label' => $item->district,
                            'value' => $item->user_count,
                        ];
                    })
                    ->toArray();

                return view('admin_panel.admin_dashboard', [
                    'data' => $data,
                    'data2' => $data2,
                    'data3' => $data3,
                    'district_counts' => $district_counts,
                    'tehsil_counts' => $tehsil_counts,
                    'ucs_counts' => $ucs_counts,
                    'tappas_count' => $tappas_count,
                    // 'AgriUser' => $AgriUser,
                    // 'AgricultureOfficer' => $AgricultureOfficer,
                    'LandRevenueDepartment' => $LandRevenueDepartment,
                    'totalEntries' => $totalEntries,
                    'TotalUnverifiedfarmer' => $TotalUnverifiedfarmer,
                    'TotalVerifiedfarmers' => $TotalVerifiedfarmers,
                    'subsidyfarmers' => $subsidyfarmers,
                ]);
            }  else if ($usertype == 'Field_Officer') {

                $userId = Auth::id();
                $user_id = Auth()->user()->user_id;
                // dd($user_id);

                // Retrieve the user's record
                $user = User::find($userId);

                // Initialize counts
                $districtCount = 0;
                $tehsilCount = 0;
                $tappaCount = 0;
                $ucCount = 0;

                $district = Auth()->user()->district;
                // Check if user record exists
                if ($user) {
                    // Count district (assuming it's a single value)
                    if ($user->district) {
                        $districtCount = 1; // Only one district
                    }

                    // Decode and count tehsils
                    if ($user->tehsil) {
                        $tehsils = json_decode($user->tehsil, true);
                        $tehsilCount = count($tehsils);
                    }

                    // Decode and count tappas
                    if ($user->tappas) {
                        if($user->tappas != null && is_array(json_decode($user->tappas)))
                        {
                            $tappas = json_decode($user->tappas, true);
                            $tappaCount = count($tappas);
                        }
                        else
                        {
                            $tappaCount = 0;
                        }
                    }

                    // Decode and count UCs
                    if ($user->ucs) {
                        if($user->ucs != null && is_array(json_decode($user->ucs)))
                        {
                            $ucs = json_decode($user->ucs, true);
                            $ucCount = count($ucs);
                        }
                        else
                        {
                            $ucCount =  0;
                        }
                    }
                }
                $agriUserfarmersCount = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->count();
                $Unverifiedfarmeragiruser = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->where('verification_status', '=', 'Unverified')->count();
                $Verifiedfarmeragiruser = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->where('verification_status', '=', 'Verified')->count();

                return view('field_officer_panel.dashboard', [
                    'agriUserfarmersCount' => $agriUserfarmersCount,
                    'Unverifiedfarmeragiruser' => $Unverifiedfarmeragiruser,
                    'Verifiedfarmeragiruser' => $Verifiedfarmeragiruser,
                    'districtCount' => $districtCount,
                    'tehsilCount' => $tehsilCount,
                    'tappaCount' => $tappaCount,
                    'ucCount' => $ucCount,
                ]);
            }
            else if ($usertype == 'Land_Revenue_Officer') {

                $userId = Auth::id();
                $user_id = Auth()->user()->user_id;
                // dd($user_id);

                // Retrieve the user's record
                $user = User::find($userId);

                // Initialize counts
                $districtCount = 0;
                $tehsilCount = 0;
                $tappaCount = 0;
                $ucCount = 0;

                $district = Auth()->user()->district;
                // Check if user record exists
                if ($user) {
                    // Count district (assuming it's a single value)
                    if ($user->district) {
                        $districtCount = 1; // Only one district
                    }

                    // Decode and count tehsils
                    if ($user->tehsil) {
                        $tehsils = json_decode($user->tehsil, true);
                        $tehsilCount = count($tehsils);
                    }

                    // Decode and count tappas
                    if ($user->tappas) {
                        if($user->tappas != null && is_array(json_decode($user->tappas)))
                        {
                            $tappas = json_decode($user->tappas, true);
                            $tappaCount = count($tappas);
                        }
                        else
                        {
                            $tappaCount = 0;
                        }
                    }

                    // Decode and count UCs
                    if ($user->ucs) {
                        if($user->tappas != null && is_array(json_decode($user->tappas)))
                        {
                            $ucs = json_decode($user->ucs, true);
                            $ucCount = count($ucs);
                        }
                        else
                        {
                            $ucCount = 0;
                        }
                    }
                }
                $agriUserfarmersCount = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->count();
                $Unverifiedfarmeragiruser = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->where('verification_status', '=', 'Unverified')->count();
                $Verifiedfarmeragiruser = DB::table('land_revenue_farmer_registations')->where('land_emp_id', '=', $user_id)->where('verification_status', '=', 'Verified')->count();

                return view('land_revenue_panel.land_revenue_dashboard', [
                    'agriUserfarmersCount' => $agriUserfarmersCount,
                    'Unverifiedfarmeragiruser' => $Unverifiedfarmeragiruser,
                    'Verifiedfarmeragiruser' => $Verifiedfarmeragiruser,
                    'districtCount' => $districtCount,
                    'tehsilCount' => $tehsilCount,
                    'tappaCount' => $tappaCount,
                    'ucCount' => $ucCount,
                ]);
            }


        } else {
            // return redirect()->back();

            return Redirect()->route('login');
        }
    }
    public function adminpage()
    {
        return view('admin_panel.admin_dashboard');
    }

    public function farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_user = OurUser::paginate(200);

            return view('admin_panel.farmers', [
                'all_user' => $all_user,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function veirfyfarmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('admin_panel.verifeidfarmers', []);
        } else {
            return redirect()->back();
        }
    }

    public function unvieryfarmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('admin_panel.unverifeidfarmers', []);
        } else {
            return redirect()->back();
        }
    }
}
