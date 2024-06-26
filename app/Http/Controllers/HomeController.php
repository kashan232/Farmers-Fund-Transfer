<?php

namespace App\Http\Controllers;

use App\Models\AgricultureOfficer;
use App\Models\AgriUser;
use App\Models\District;
use App\Models\LandRevenueDepartment;
use App\Models\Tappa;
use App\Models\Tehsil;
use App\Models\UC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                return view('dashboard');
            } else if ($usertype == 'admin') {
                // Fetching counts directly
                $district_counts = District::count();
                $tehsil_counts = Tehsil::count();
                $ucs_counts = UC::count();
                $tappas_count = Tappa::count();

                $AgriUser = AgriUser::count();
                $AgricultureOfficer = AgricultureOfficer::count();
                $LandRevenueDepartment = LandRevenueDepartment::count();

                $agriUserCount = DB::table('agriculture_user_farmer_registrations')->count();
                $agricultureOfficerCount = DB::table('agriculture_farmers_registrations')->count();
                $landRevenueDepartmentCount = DB::table('land_revenue_farmer_registations')->count();
                $onlineFarmerRegistrationCount = DB::table('online_farmer_registrations')->count();

                $totalEntries = $agriUserCount + $agricultureOfficerCount + $landRevenueDepartmentCount + $onlineFarmerRegistrationCount;

                $Unverifiedfarmeragiruser = DB::table('agriculture_user_farmer_registrations')->where('verification_status', '=', 'Unverified')->count();
                $Unverifiedfarmeragioficr = DB::table('agriculture_farmers_registrations')->where('verification_status', '=', 'Unverified')->count();
                $Unverifiedfarmerland = DB::table('land_revenue_farmer_registations')->where('verification_status', '=', 'Unverified')->count();
                $Unverifiedfarmeronline = DB::table('online_farmer_registrations')->where('verification_status', '=', 'Unverified')->count();

                $TotalUnverifiedfarmer = $Unverifiedfarmeragiruser + $Unverifiedfarmeragioficr + $Unverifiedfarmerland + $Unverifiedfarmeronline;

                $Verifiedfarmeragiruser = DB::table('agriculture_user_farmer_registrations')->where('verification_status', '=', 'Verified')->count();
                $Verifiedfarmeragioficr = DB::table('agriculture_farmers_registrations')->where('verification_status', '=', 'Verified')->count();
                $Verifiedfarmerland = DB::table('land_revenue_farmer_registations')->where('verification_status', '=', 'Verified')->count();
                $Verifiedfarmeronline = DB::table('online_farmer_registrations')->where('verification_status', '=', 'Verified')->count();

                $TotalVerifiedfarmers = $Verifiedfarmeragiruser + $Verifiedfarmeragioficr + $Verifiedfarmerland + $Verifiedfarmeronline;

                // Fetching data for the view
                $data = DB::table('districts')
                    ->leftJoin('agriculture_farmers_registrations', 'districts.district', '=', 'agriculture_farmers_registrations.district')
                    ->select('districts.district', DB::raw('COUNT(agriculture_farmers_registrations.id) as user_count'))
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
                    'AgriUser' => $AgriUser,
                    'AgricultureOfficer' => $AgricultureOfficer,
                    'LandRevenueDepartment' => $LandRevenueDepartment,
                    'totalEntries' => $totalEntries,
                    'TotalUnverifiedfarmer' => $TotalUnverifiedfarmer,
                    'TotalVerifiedfarmers' => $TotalVerifiedfarmers,
                ]);
            } else if ($usertype == 'Agriculture_Officer') {
                return view('agriculture_officer_panel.agriculture_dashboard');
            } else if ($usertype == 'Land_Revenue_Officer') {
                return view('land_revenue_panel.land_revenue_dashboard');
            } else if ($usertype == 'Agriculture_User') {

                $agriUserCount = DB::table('agriculture_user_farmer_registrations')->count();
                $agricultureOfficerCount = DB::table('agriculture_farmers_registrations')->count();
                $landRevenueDepartmentCount = DB::table('land_revenue_farmer_registations')->count();
                $onlineFarmerRegistrationCount = DB::table('online_farmer_registrations')->count();

                $totalEntries = $agriUserCount + $agricultureOfficerCount + $landRevenueDepartmentCount + $onlineFarmerRegistrationCount;

                $Unverifiedfarmeragiruser = DB::table('agriculture_user_farmer_registrations')->where('verification_status', '=', 'Unverified')->count();
                $Unverifiedfarmeragioficr = DB::table('agriculture_farmers_registrations')->where('verification_status', '=', 'Unverified')->count();
                $Unverifiedfarmerland = DB::table('land_revenue_farmer_registations')->where('verification_status', '=', 'Unverified')->count();
                $Unverifiedfarmeronline = DB::table('online_farmer_registrations')->where('verification_status', '=', 'Unverified')->count();

                $TotalUnverifiedfarmer = $Unverifiedfarmeragiruser + $Unverifiedfarmeragioficr + $Unverifiedfarmerland + $Unverifiedfarmeronline;

                $Verifiedfarmeragiruser = DB::table('agriculture_user_farmer_registrations')->where('verification_status', '=', 'Verified')->count();
                $Verifiedfarmeragioficr = DB::table('agriculture_farmers_registrations')->where('verification_status', '=', 'Verified')->count();
                $Verifiedfarmerland = DB::table('land_revenue_farmer_registations')->where('verification_status', '=', 'Verified')->count();
                $Verifiedfarmeronline = DB::table('online_farmer_registrations')->where('verification_status', '=', 'Verified')->count();

                $TotalVerifiedfarmers = $Verifiedfarmeragiruser + $Verifiedfarmeragioficr + $Verifiedfarmerland + $Verifiedfarmeronline;

                
                return view('agriculture_user_panel.agriculture_user_dashboard');
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
}
