<?php

namespace App\Http\Controllers;

use App\Models\AgricultureFarmersRegistration;
use App\Models\AgricultureUserFarmerRegistration;
use App\Models\District;
use App\Models\LandRevenueDepartment;
use App\Models\LandRevenueFarmerRegistation;
use App\Models\OnlineFarmerRegistration;
use App\Models\Tehsil;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\FarmersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\ValidationException;
use App\Exports\reportsExport;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;



class LandRevenueController extends Controller
{


    public function upload_excel_index(){

        return view('land_revenue_panel.upload_excel.index');

    }

    public function upload_excel_import(request $request){

        $request->validate([
            'file' => 'required|file|mimes:xlsx',
        ]);

        try {
            Excel::import(new FarmersImport, $request->file('file'));
            return redirect()->back()->with('success', 'Farmers imported successfully.');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['file' => $e->getMessage()]);
        }

        return redirect()->back()->with('success', 'Excel imported successfully.');

    }

    public function add_revenue_officer()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            if(Auth::user()->usertype == 'admin'){
                $all_district = District::get();
                $all_tehsil = Tehsil::get();
            }else{
                $all_district = District::where('admin_or_user_id', '=', $userId)->get();
                $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            }
            return view('admin_panel.Land_revenue_department.add_revenue_officer', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function edit_revenue_officer($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $data = LandRevenueDepartment::find($id);
            // dd($userId);


            if(Auth::user()->usertype == 'admin'){
                $all_district = District::get();
                $all_tehsil = Tehsil::get();
            }else{
                $all_district = District::where('admin_or_user_id', '=', $userId)->get();
                $all_tehsil = Tehsil::where('admin_or_user_id', '=', $userId)->get();
            }
            return view('admin_panel.Land_revenue_department.edit_revenue_officer', [
                'all_district' => $all_district,
                'all_tehsil' => $all_tehsil,
                'data' => $data
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_revenue_officer(Request $request)
    {
        if (Auth::id()) {


            // if ($request->edit_id && $request->edit_id != '') {
            //     // In edit mode

            //     $validatedData = $request->validate([
            //         'email_address' => 'required|email|unique:field_officers,email_address,' . $request->edit_id,
            //     ]);


            // }


            // else {
            //     // In create mode
            //     $validatedData = $request->validate([
            //         'email_address' => 'required|email|unique:field_officers,email_address',
            //     ]);
            // }






            // $plainPassword = (string) random_int(10000000, 99999999);

            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            $tehsil = json_encode($request->input('tehsil'));
            $tappa = json_encode($request->input('tappa'));



            if($request->edit_id && $request->edit_id != '')
            {
                     // Update LandRevenueDepartment record
                    $LandRevenueDepartment = LandRevenueDepartment::where('id', $request->edit_id)->first();

                    if ($LandRevenueDepartment) {
                        // Prepare the data for LandRevenueDepartment update
                        $dataToUpdate = [
                            'admin_or_user_id' => $userId,
                            'full_name' => $request->full_name,
                            'contact_number' => $request->contact_number,
                            'cnic' => $request->cnic,
                            'email_address' => $request->email_address,
                            'district' => $request->district,
                            'tehsil' => $tehsil,
                            'tappas' => $tappa,
                            // 'password' => $plainPassword,
                        ];

                        // Only update email_address if it's changed
                        if ($LandRevenueDepartment->email_address != $request->email_address) {
                            $dataToUpdate['email_address'] = $request->email_address;
                        }


                        // Update LandRevenueDepartment record
                        $LandRevenueDepartment->update($dataToUpdate);

                        // Update related User record
                        $user = User::where('user_id', $LandRevenueDepartment->id)->where('usertype','Land_Revenue_Officer')->first();

                        if ($user) {
                            // Prepare data for User update
                            $userDataToUpdate = [
                                'name' => $request->full_name,
                                'user_id' => $LandRevenueDepartment->id,
                                'email' => $request->email_address,
                                'district' => $request->district,
                                'tehsil' => $tehsil,
                                'tappas' => $tappa,
                            // 'password' => $plainPassword,

                                'usertype' => 'Land_Revenue_Officer', // Set the usertype to 'employee'
                            ];

                            // Only update email if it has changed
                            if ($user->email != $request->email_address) {
                                $userDataToUpdate['email'] = $request->email_address;

                            }


                            // Update User record
                            $user->update($userDataToUpdate);
                        }

                        return redirect()->back()->with('officer-added', 'Land Revenue Officer Updated Successfully');
                    } else {
                        return redirect()->back()->with('error', 'Land Revenue Officer not found');
                    }

            }
            else
            {



                // Generate a unique 8-digit numeric password
                $plainPassword = (string) random_int(10000000, 99999999);



                $LandRevenueDepartment = LandRevenueDepartment::create([
                    'admin_or_user_id'    => $userId,
                    'full_name'          => $request->full_name,
                    'contact_number'          => $request->contact_number,
                    'cnic'          => $request->cnic,
                    'email_address'          => $request->email_address,
                    'district'          => $request->district,
                    'tehsil'          => $tehsil,
                    // 'ucs'               => $ucs,
                    'tappas'          => $tappa,
                    // 'username'          => $request->username,
                    'password'          => $plainPassword,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ]);


                // Create a user record with the same credentials and usertype 'employee'
                $user = User::create([
                    'name' => $request->full_name,
                    'user_id' => $LandRevenueDepartment->id,
                    'email' => $request->email_address,
                    'district' => $request->district,
                    'tehsil' => $tehsil,
                    // 'ucs'               => $ucs,
                    'tappas'          => $tappa,
                    'password' => bcrypt($plainPassword ), // Make sure to hash the password
                    'usertype' => 'Land_Revenue_Officer', // Set the usertype to 'employee'
                ]);

                return redirect()->back()->with('officer-added', 'Land Revenue Officer Created Successfully');
            }



        } else {
            return redirect()->back();
        }



        // if (Auth::id()) {


        //     try{





        //     $usertype = Auth()->user()->usertype;
        //     $userId = Auth::id();
        //     $tehsil = json_encode($request->input('tehsil'));
        //     $ucs = json_encode($request->input('ucs'));
        //     $tappa = json_encode($request->input('tappa'));

        //     if($request->edit_id && $request->edit_id != '')
        //     {
        //        // Fetch the LandRevenueDepartment record before updating
        //         $landrevenue = LandRevenueDepartment::where('id', $request->edit_id)->first();

        //         if ($landrevenue) {
        //             // Update the LandRevenueDepartment record
        //             $landrevenue->update([
        //                 'admin_or_user_id' => $userId,
        //                 'full_name' => $request->full_name,
        //                 'contact_number' => $request->contact_number,
        //                 'address' => $request->address,
        //                 'email_address' => $request->email_address,
        //                 'district' => $request->district,
        //                 'tehsil' => $tehsil,
        //                 'ucs' => $ucs,
        //                 'tappas' => $tappa,
        //                 'username' => $request->username,
        //             ]);

        //             // Update the related User record
        //             $user = User::where('user_id', $landrevenue->id)->first();

        //             if ($user) {
        //                 $user->update([
        //                     'user_id' => $landrevenue->id,
        //                     'name' => $request->full_name,
        //                     'email' => $request->email_address,
        //                     'district' => $request->district,
        //                     'tehsil' => $tehsil,
        //                     'ucs' => $ucs,
        //                     'tappas' => $tappa,
        //                     'password' => $request->password ? Hash::make($request->password) : $user->password, // Preserve the existing password if not updated
        //                     'usertype' => 'Land_Revenue_Officer', // Set the usertype to 'Land_Revenue_Officer'
        //                 ]);

        //                 dd($user);
        //             }

        //             return redirect()->back()->with('officer-added', 'Land Revenue Officer updated Successfully');
        //         } else {
        //             return redirect()->back()->with('error', 'Land Revenue Officer not found');
        //         }
        //     }
        //     else{
        //         $landrevenue = LandRevenueDepartment::create([
        //             'admin_or_user_id'    => $userId,
        //             'full_name'          => $request->full_name,
        //             'contact_number'          => $request->contact_number,
        //             'address'          => $request->address,
        //             'email_address'          => $request->email_address,
        //             'district'          => $request->district,
        //             'tehsil'          => $tehsil,
        //             'ucs'               => $ucs,
        //             'tappas'          => $tappa,
        //             'username'          => $request->username,
        //             'password'          => $request->password,
        //             'created_at'        => Carbon::now(),
        //             'updated_at'        => Carbon::now(),
        //         ]);

        //          // Create a user record with the same credentials and usertype 'employee'

        //         // Create a user record with the same credentials and usertype 'employee'
        //         $user = User::create([
        //             'user_id' => $landrevenue->id,
        //             'name' => $request->full_name,
        //             'email' => $request->email_address,
        //             'district' => $request->district,
        //             'tehsil' => $tehsil,
        //             'ucs'               => $ucs,
        //             'tappas'          => $tappa,
        //             'password' => bcrypt($request->password), // Make sure to hash the password
        //             'usertype' => 'Land_Revenue_Officer', // Set the usertype to 'employee'
        //         ]);

        //         return redirect()->back()->with('officer-added', 'Land Revenue Officer Created Successfully');
        //     }
        // }
        // catch (ValidationException $e) {
        //     // Handle the validation failure
        //     return back()->withErrors($e->validator)->withInput();
        // }
        // } else {
        //     return redirect()->back();
        // }
    }
    public function all_revenue_officer()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_revenue = LandRevenueDepartment::where('admin_or_user_id', '=', $userId)->get();
            // dd($all_revenue);
            return view('admin_panel.Land_revenue_department.all_revenue_officer', [
                'all_revenue' => $all_revenue,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function all_agri_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agriculture_farmers = AgricultureFarmersRegistration::where('verification_status', '!=', '0')->get();
            return view('land_revenue_panel.agriculture_farmers.all_agri_farmers_by_land', [
                'all_agriculture_farmers' => $all_agriculture_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function unverify_agri_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agriculture_farmers = AgricultureFarmersRegistration::where('verification_status', '=', 1)->orWhere('verification_status', '=', 2)->get();
            return view('land_revenue_panel.agriculture_farmers.unverify_agri_farmers_by_land', [
                'all_agriculture_farmers' => $all_agriculture_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_agri_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agriculture_farmers = AgricultureFarmersRegistration::where('verification_status', '=', 'Verified')->get();
            return view('land_revenue_panel.agriculture_farmers.verify_agri_farmers_by_land', [
                'all_agriculture_farmers' => $all_agriculture_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_unverify_agri_farmers_by_land(Request $request)
    {

        if (Auth::id()) {
            $userId = Auth::id();
            $farmers_id = $request->farmers_id;
            $verification_status = $request->verification_status; // Ensure this matches the form field name
            $declined_reason = $request->declined_reason; // Ensure this matches the form field name

            $user_name = Auth::user()->name;

            if( $verification_status == '1')
            {
             AgricultureFarmersRegistration::where('id', $farmers_id)->update([
                 'verification_status' => 'Verified',
                 'declined_reason' => null,
                 'verification_by' => $user_name,
                 'updated_at' => Carbon::now(),
             ]);
            }
            else{
             AgricultureFarmersRegistration::where('id', $farmers_id)->update([
                 'verification_status' => 2,
                 'declined_reason' => $declined_reason,
                 'verification_by' => $user_name,
                 'updated_at' => Carbon::now(),
             ]);
            }

            return redirect()->back()->with('farmer-updated', 'Farmer verification status updated successfully');
        } else {
            return redirect()->back();
        }
    }



    public function all_agriuser_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agricultureuser_farmers = AgricultureUserFarmerRegistration::where('verification_status', '=', '1')->orWhere('verification_status', '=', 2)->orWhere('verification_status', '=',   'Verified')->get();

            return view('land_revenue_panel.agricultureuser_farmers.all_agriuser_farmers_by_land', [
                'all_agricultureuser_farmers' => $all_agricultureuser_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function unverify_agriuser_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agricultureuser_farmers = AgricultureUserFarmerRegistration::where('verification_status', '=', 1)->orWhere('verification_status', '=', 2)->get();
            return view('land_revenue_panel.agricultureuser_farmers.unverify_agriuser_farmers_by_land', [
                'all_agricultureuser_farmers' => $all_agricultureuser_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_agriuser_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_agricultureuser_farmers = AgricultureUserFarmerRegistration::where('verification_status', '=', 'Verified')->get();
            return view('land_revenue_panel.agricultureuser_farmers.verify_agriuser_farmers_by_land', [
                'all_agricultureuser_farmers' => $all_agricultureuser_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_unverify_agriuser_farmers_by_land(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $farmers_id = $request->farmers_id;
            $verification_status = $request->verification_status; // Ensure this matches the form field name
            $declined_reason = $request->declined_reason; // Ensure this matches the form field name

            $user_name = Auth::user()->name;

            if( $verification_status == '1')
            {
             AgricultureUserFarmerRegistration::where('id', $farmers_id)->update([
                 'verification_status' => 'Verified',
                 'declined_reason' => null,
                 'verification_by' => $user_name,
                 'updated_at' => Carbon::now(),
             ]);
            }
            else{
             AgricultureUserFarmerRegistration::where('id', $farmers_id)->update([
                 'verification_status' => 2,
                 'declined_reason' => $declined_reason,
                 'verification_by' => $user_name,
                 'updated_at' => Carbon::now(),
             ]);
            }
            return redirect()->back()->with('farmer-updated', 'Farmer verification status updated successfully');
        } else {
            return redirect()->back();
        }
    }

    public function unverify_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $land_id = Auth()->user()->user_id;
            // dd($land_id);

            $all_land_farmers = LandRevenueFarmerRegistation::where('land_emp_id', $land_id)->where('verification_status', '=', 1)->get();
            return view('land_revenue_panel.land_verifications.unverify_farmers_by_land', [
                'all_land_farmers' => $all_land_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $land_id = Auth()->user()->user_id;
            // dd($userId);
            $all_land_farmers = LandRevenueFarmerRegistation::where('land_emp_id', $land_id)->where('verification_status', '=', 'Verified')->get();
            return view('land_revenue_panel.land_verifications.verify_farmers_by_land', [
                'all_land_farmers' => $all_land_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_unverify_land_farmers(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $farmers_id = $request->farmers_id;
            $verification_status = $request->verification_status; // Ensure this matches the form field name
            $declined_reason = $request->declined_reason; // Ensure this matches the form field name

            $user_name = Auth::user()->name;

            LandRevenueFarmerRegistation::where('id', $farmers_id)->update([
                'verification_status' => $verification_status,
                'declined_reason' => $verification_status === 'Unverified' ? $declined_reason : null,
                'verification_by' => $user_name,
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('farmer-updated', 'Farmer verification status updated successfully');
        } else {
            return redirect()->back();
        }
    }

    public function verifications_land_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $land_id = Auth()->user()->user_id;
            // dd($land_id);
            $all_land_farmers = LandRevenueFarmerRegistation::where('land_emp_id', $land_id)->get();
            return view('land_revenue_panel.land_verifications.verifications_land_farmers', [
                'all_land_farmers' => $all_land_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function unverify_online_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $online_farmers = OnlineFarmerRegistration::where('verification_status', '=', 1)->get();
            return view('land_revenue_panel.online_farmers_verifications.unverify_farmers_by_land', [
                'online_farmers' => $online_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verify_online_farmers_by_land()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $land_id = Auth()->user()->user_id;
            // dd($userId);
            $all_land_farmers = OnlineFarmerRegistration::where('verification_status', '=', 'Verified')->get();
            return view('land_revenue_panel.online_farmers_verifications.verify_farmers_by_land', [
                'all_land_farmers' => $all_land_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function verifications_online_farmers()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $land_id = Auth()->user()->user_id;
            // dd($land_id);
            $all_land_farmers = OnlineFarmerRegistration::get();
            return view('land_revenue_panel.online_farmers_verifications.verifications_land_farmers', [
                'all_land_farmers' => $all_land_farmers,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function view_farmers_land($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $user_id = Auth()->user()->user_id;
            $user_name = Auth()->user()->name;
            $data = AgricultureFarmersRegistration::where('id', '=', $id)->first();
            // dd($data);
            return view('land_revenue_panel.agriculture_farmers.view_agri_farmers', [
                'data' => $data,
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function verify_unverify_online_farmers(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $farmers_id = $request->farmers_id;
            $verification_status = $request->verification_status; // Ensure this matches the form field name
            $declined_reason = $request->declined_reason; // Ensure this matches the form field name

            $user_name = Auth::user()->name;

            OnlineFarmerRegistration::where('id', $farmers_id)->update([
                'verification_status' => $verification_status,
                'declined_reason' => $verification_status === 'Unverified' ? $declined_reason : null,
                'verification_by' => $user_name,
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('farmer-updated', 'Farmer verification status updated successfully');
        } else {
            return redirect()->back();
        }
    }

    public function farmers_reporting(request $request){

        if (Auth::id()) {
            $userId = Auth::id();
            $district = Auth::user()->district;
            $tehsils = Tehsil::where('district', $district)->get();
            return view('land_revenue_panel.farmers_reporting.index', [
                'district' => $district,
                'tehsils' => $tehsils,
            ]);
        }
    }
    public function view_farmers_reporting(request $request)
    {

        $start_date = Carbon::parse($request->start_date)->startOfDay();
        $end_date = Carbon::parse($request->end_date)->endOfDay();
        $district = $request->input('district');
        $tehsilArray = $request->input('tehsil', []); // Default to an empty array if no tehsils are provided
        $minAcre = intval($request->input('min_acre'));
        $maxAcre = intval($request->input('max_acre'));

        $registrations = LandRevenueFarmerRegistation::where('district', $district)
            ->whereIn('tehsil', $tehsilArray)
            ->where('total_landing_acre', '>=', $minAcre)
            ->where('total_landing_acre', '<=', $maxAcre)
            ->whereBetween('created_at', [$start_date, $end_date]);

        $data = $registrations->paginate(10);

        $filter_data = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'district' => $district,
            'tehsilArray' => $tehsilArray,
            'minAcre' => $minAcre,
            'maxAcre' => $maxAcre
        ];

// dd($data);
        return view('land_revenue_panel.farmers_reporting.view',['data' => $data, 'filter_data' => $filter_data]);
    }



    public function reports_download (request $req){

        return Excel::download(new reportsExport, 'reports.xlsx');

    }
}
