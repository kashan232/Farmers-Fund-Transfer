<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandRevenueFarmerRegistation;
use App\Models\District;
use App\Models\Tappa;
use App\Models\Tehsil;
use App\Models\HardCopyFarmer;

use App\Models\UC;
use Carbon\Carbon;
use App\Models\User;
use Symfony\Component\HttpFoundation\StreamedResponse;
class DGOfficerPanelController extends Controller
{




public function excelExport(Request $request)
{
      // Format filename with date range
    if ($request->filled('start_date') && $request->filled('end_date')) {
        $startFormatted = Carbon::parse($request->start_date)->format('d-M-Y'); // e.g. 23-Jun-2025
        $endFormatted = Carbon::parse($request->end_date)->format('d-M-Y');     // e.g. 15-Jul-2025
        $fileName = "farmers_export_{$startFormatted}_to_{$endFormatted}.csv";
    } else {
        $fileName = 'farmers_export_all.csv';
    }



    $farmers = LandRevenueFarmerRegistation::with('branch')
        ->when($request->search, fn($q) => $q->where('name', 'like', "%{$request->search}%"))
        ->when($request->district, fn($q) => $q->where('district', $request->district))
        ->when($request->taluka, fn($q) => $q->where('tehsil', $request->taluka))
        ->when($request->filled('start_date') && $request->filled('end_date'), function ($q) use ($request) {
        $q->whereBetween('created_at', [$request->start_date, $request->end_date]);
    })
    ->when($request->status, function ($q) use ($request) {
        if ($request->status === 'unverified') {
            $q->whereNull('verification_status');
        } else {
            $q->where('verification_status', $request->status);
        }
    })
     ->when($request->farmer_type === 'fa', function ($q) {
        $q->where('user_type', '!=', 'Online');
    })
    ->when($request->farmer_type === 'online', function ($q) {
        $q->where('user_type', 'Online');
    })
    ->get();

    // ->filter(function ($farmer) {
    //     // List of required fields to check for completeness
    //     $requiredFields = [
    //         'name',
    //         'father_name',
    //         'mother_maiden_name',
    //         'cnic',
    //         'cnic_issue_date',
    //         'date_of_birth',
    //         'district', // used as place of birth here
    //         'gender',
    //         'permanent_address',
    //         'tehsil',
    //         'district',
    //         'mobile',
    //         'survey_no',
    //         'total_fallow_land',
    //         'total_area_cultivated_land',
    //         'tappa',
    //         // 'branch_code',
    //     ];

    //     foreach ($requiredFields as $field) {
    //         if (empty($farmer->$field)) {
    //             return false;
    //         }
    //     }
    //       // Check land fields must be > 0
    //     if (
    //         $farmer->total_fallow_land <= 0 ||
    //         $farmer->total_area_cultivated_land <= 0
    //     ) {
    //         return false;
    //     }

    //     // Also ensure related branch title exists
    //     return !empty($farmer->branch) && !empty($farmer->branch->title);
    // })
    // ->values(); // Reindex after filtering




    $columns = [
        'S_no',
        'Name as per CNIC',
        'Father / Husband Name',
        "Mother's Name",
        'CNIC Number',
        'CNIC issuance date',
        'CNIC expiry date',
        'Date of Birth',
        'Place of Birth',
        'Gender',
        'Nationality',
        'Complete Mailing Address as per valid CNIC',
        'Taluka',
        'District',
        'Mobile No.',
        'Passbook / Form VII - B Number',
        'Land Holding',
        'Land Cultivated',
        'Tappa',
        'Taluka',
        'District',
        'Name',
        'Code',
    ];

    $callback = function () use ($farmers, $columns, $request) {
        $file = fopen('php://output', 'w');

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $startFormatted = Carbon::parse($request->start_date)->format('d-M-Y'); // e.g. 23/Jun - 2025
            $endFormatted = Carbon::parse($request->end_date)->format('d-M-Y');     // e.g. 15/Jul - 2025
            fputcsv($file, ["Date: {$startFormatted} to {$endFormatted}"]);
        } else {
            fputcsv($file, ["Date: All"]);
        }

        fputcsv($file, $columns);
        $s_no = 1;
        foreach ($farmers as $farmer) {

            fputcsv($file, [
                $s_no++,
                $farmer->name ?? '',
                $farmer->father_name ?? '',
                $farmer->mother_maiden_name ?? '',
                $farmer->cnic ?? '',
                $farmer->cnic_issue_date ?? '',
                 empty($farmer->cnic_expiry_date) ? '2099-12-31' : $farmer->cnic_expiry_date,
                $farmer->date_of_birth ?? '',
                 $farmer->district ?? '',
                $farmer->gender ?? '',
                'PAKISTANI',
                 $farmer->permanent_address ?? '',
                $farmer->tehsil ?? '',
                $farmer->district ?? '',
                $farmer->mobile ?? '',
                $farmer->survey_no ?? '',
                $farmer->total_landing_acre ?? '',
                $farmer->total_area_cultivated_land ?? '',
                $farmer->tappa ?? '',
                $farmer->tehsil ?? '',
                $farmer->district ?? '',
                $farmer->branch->title ?? '',
                $farmer->branch_code ?? '',
            ]);
        }


        fclose($file);
    };

    return response()->stream($callback, 200, [
        "Content-Type" => "text/csv",
        "Content-Disposition" => "attachment; filename={$fileName}",
    ]);
}




    public function index(Request $req, $search = null, $status = null)
{
    // Override request search/status if present in route
    $search = ($search === '-') ? null : ($search ?? $req->search);
    $status = $status ?? $req->status;

    $query = LandRevenueFarmerRegistation::with('user')->orderBy('tehsil', 'asc');

    if (!empty($search)) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('father_name', 'LIKE', "%{$search}%")
              ->orWhere('surname', 'LIKE', "%{$search}%")
              ->orWhere('mobile', 'LIKE', "%{$search}%")
              ->orWhere('cnic', 'LIKE', "%{$search}%")
              ->orWhere('district', 'LIKE', "%{$search}%")
              ->orWhere('tehsil', 'LIKE', "%{$search}%")
              ->orWhere('tappa', 'LIKE', "%{$search}%")
              ->orWhere('uc', 'LIKE', "%{$search}%");
        });
    }

    $checkList = [
        'rejected_by_ao', 'rejected_by_fa', 'rejected_by_lrd',
        'verified_by_lrd', 'verified_by_ao'
    ];

    if (in_array($status, $checkList)) {
        $query->when(
            $req->filled('start_date') && $req->filled('end_date'),
            fn($q) => $q->whereBetween('updated_at', [$req->start_date, $req->end_date])
        );
    } else {
        $query->when(
            $req->filled('start_date') && $req->filled('end_date'),
            fn($q) => $q->whereBetween('created_at', [$req->start_date, $req->end_date])
        );
    }




// $query->when(
//     $req->filled('start_date') && $req->filled('end_date'),
//     function ($q) use ($req) {
//         $start = Carbon::parse($req->start_date)->startOfDay();
//         $end = Carbon::parse($req->end_date)->endOfDay();

//         $q->where(function ($innerQuery) use ($start, $end) {
//             $innerQuery->where(function ($subQuery) use ($start, $end) {
//                 $subQuery->where(function ($cond) {
//                     $cond->whereNull('verification_status')
//                          ->orWhere('verification_status', 'verified_by_fa');
//                 })->whereBetween('created_at', [$start, $end]);
//             })->orWhere(function ($subQuery) use ($start, $end) {
//                 $subQuery->where(function ($cond) {
//                     $cond->whereNotNull('verification_status')
//                          ->where('verification_status', '!=', 'verified_by_fa');
//                 })->whereBetween('updated_at', [$start, $end]);
//             });
//         });
//     }
// );


    if (!empty($status)) {
        if($status == 'in_process'){
             $query->whereIn('verification_status', [
                'rejected_by_ao',
                'rejected_by_dd',
                'rejected_by_fa',
                'verified_by_dd',

             ]);
        }

        elseif($status == 'forwarded_to_lrd'){
             $query->whereIn('verification_status', [
                'verified_by_ao'
             ]);
        }

         elseif($status == 'forwarded_to_ao'){
             $query->whereIn('verification_status', [
                'verified_by_fa'
             ]);
        }



        elseif($status == 'fa_farmers'){
             $query->where('user_type' ,'!=', 'Online');
        }
        elseif
        ($status == 'online_farmers'){
             $query->where('user_type' , 'Online');
        }

        elseif
        ($status == 'unverified'){
             $query->whereNull('verification_status');
        }


        else{
            $query->where('verification_status', $status);
        }
    }

    if (!empty($req->district)) {
        $query->where('district', $req->district);
        $talukas = Tehsil::where('district', $req->district)->get();
    }
    else{
        $talukas = Tehsil::all();
    }

    if (!empty($req->taluka)) {
        $query->where('tehsil', $req->taluka);
    }

    if (!empty($req->farmer_type)) {

        if($req->farmer_type == 'online'){
            $query->where('user_type','=', 'Online');
        }
        else{

            $query->where('user_type','!=', 'Online');

        }
    }



    if (!empty($req->user_id)) {
        $user = user::find( $req->user_id);
        $test = [];



        if($req->farmer_type_status_by_ao == 'total'){
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');

            $query->where('district', $user->district)
            ->whereIn('tehsil', $tehsils)
            ->whereIn('tappa', $tappas)
            ->whereIn('verification_status', [
             'rejected_by_ao',
            'verified_by_fa',
            'verified_by_lrd',
            'verified_by_ao',
                'rejected_by_lrd',
            ]);
        }


         if($req->farmer_type_status_by_ao == 'verified_by_lrd'){
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');

            $query->where('district', $user->district)
            ->whereIn('tehsil', $tehsils)
            ->whereIn('tappa', $tappas)
            ->whereIn('verification_status', [

            'verified_by_lrd',

            ]);
        }




        if($req->farmer_type_status_by_ao == 'in-Process'){
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');

            $query->where('district', $user->district)
            ->whereIn('tehsil', $tehsils)
            ->whereIn('tappa', $tappas)
            ->whereIn('verification_status', [

                'verified_by_ao',
                'verified_by_lrd',
                'rejected_by_lrd'
            ]);
        }

        if($req->farmer_type_status_by_ao == 'rejected'){
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');

            $query->where('district', $user->district)
            ->whereIn('tehsil', $tehsils)
                ->whereIn('tappa', $tappas)
            ->whereIn('verification_status', [
                'rejected_by_ao',
            ]);
        }

        if($req->farmer_type_status_by_ao == 'pending'){
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');

            $query->where('district', $user->district)
            ->whereIn('tehsil', $tehsils)
                ->whereIn('tappa', $tappas)
            ->whereIn('verification_status', [
                'verified_by_fa',
            ]);
        }



        if($req->farmer_type_status_by_dd == 'total'){

            $districts = json_decode($user->district ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');

            $query->whereIn('district', $districts)
            ->whereIn('tehsil', $tehsils)
            ->whereIn('tappa', $tappas)
            ->where(function($query) {
                $query->whereIn('verification_status', [
                    'verified_by_fa',
                    'rejected_by_fa',
                    'verified_by_ao',
                    'rejected_by_ao',
                    'rejected_by_lrd',
                    'verified_by_lrd'
                ])
                ->orWhereNull('verification_status');
            });
        }

         if($req->farmer_type_status_by_dd == 'process'){

            $districts = json_decode($user->district ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');

            $query->whereIn('district', $districts)
            ->whereIn('tehsil', $tehsils)
            ->whereIn('tappa', $tappas)
            ->where(function($query) {
                $query->whereIn('verification_status', [
                    'verified_by_fa',
                    'rejected_by_fa',
                    'verified_by_ao',
                    'rejected_by_ao',
                    'rejected_by_lrd',

                ])
                ->orWhereNull('verification_status');
            });
        }

         if($req->farmer_type_status_by_dd == 'verified_by_lrd'){

            $districts = json_decode($user->district ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $tappas = json_decode($user->tappas ?? '[]');

            $query->whereIn('district', $districts)
            ->whereIn('tehsil', $tehsils)
            ->whereIn('tappa', $tappas)
            ->where(function($query) {
                $query->whereIn('verification_status', [

                    'verified_by_lrd'
                ]);
            });
        }





        if($req->farmer_type_status == 'total'){
            $query->where('district', $user->district)
            ->where('tehsil', $user->tehsil)
            ->whereIn('tappa', is_array($user->tappas) ? $user->tappas : json_decode($user->tappas, true));

            $test[] = 'FA-TOTAL';
        }


        if($req->farmer_type_status == 'in-Process'){


            $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->where('tehsil', $user->tehsil)
                ->whereIn('tappa', $tappas);

            $query->whereIn('verification_status', [
                'verified_by_fa',
                'verified_by_ao',
                'rejected_by_ao',
                'rejected_by_lrd',
           ])->count();

            $test[] = 'FA-IN-PROCESS';

        }

        elseif($req->farmer_type_status == 'pending'){

             $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->where('tehsil', $user->tehsil)
                ->whereIn('tappa', $tappas)
                ->whereNull('verification_status');

        }

        elseif($req->farmer_type_status == 'verified_by_lrd'){

             $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->where('tehsil', $user->tehsil)
            ->whereIn('tappa', $tappas)
            ->where('verification_status','verified_by_lrd');

        }


        elseif($req->farmer_type_status == 'rejected'){

             $tappas = json_decode($user->tappas ?? '[]');
            $query->where('district', $user->district)
            ->where('tehsil', $user->tehsil)
            ->whereIn('tappa', $tappas)
            ->where('verification_status','rejected_by_fa');

        }


        elseif($req->farmer_type_status == 'online'){

            $tappas = json_decode($user->tappas ?? '[]');
             $query->where('user_type', 'Online')->where('district', $user->district)
            ->where('tehsil', $user->tehsil)
                ->whereIn('tappa', $tappas);

                  $test[] = 'FA-ONLINE';
        }
        elseif($req->farmer_type_status == 'self'){
              $tappas = json_decode($user->tappas ?? '[]');
            $query->where('user_type', '!=','Online')->where('district', $user->district)
            ->where('tehsil', $user->tehsil)
                ->whereIn('tappa', $tappas);
                  $test[] = 'FA-SELF';
        }

        elseif($req->farmer_type_status == 'total'){
            // $query->where('user_type', '!=','Online');
        }
        // dd($test);

        if($req->farmer_type_status_by_lrd == 'total'){

            $tappas = json_decode($user->tappas ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $query->where('district', $user->district)->whereIn('tehsil', $tehsils)
            ->whereIn('verification_status', [
                'verified_by_ao',
                'verified_by_lrd',
                'rejected_by_lrd'
            ]);

        }

        if($req->farmer_type_status_by_lrd == 'pending'){

            $tappas = json_decode($user->tappas ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $query->where('district', $user->district)->whereIn('tehsil', $tehsils)
            ->whereIn('verification_status', [
                'verified_by_ao',
            ]);

        }

        if($req->farmer_type_status_by_lrd == 'rejected'){

            $tappas = json_decode($user->tappas ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $query->where('district', $user->district)->whereIn('tehsil', $tehsils)
            ->whereIn('verification_status', [
                'rejected_by_lrd',
            ]);

        }

        if($req->farmer_type_status_by_lrd == 'verified'){

            $tappas = json_decode($user->tappas ?? '[]');
            $tehsils = json_decode($user->tehsil ?? '[]');
            $query->where('district', $user->district)->whereIn('tehsil', $tehsils)
            ->whereIn('verification_status', [
                'verified_by_lrd',
            ]);

        }






    }



    $districts = District::all();

    $totalFarmers = (clone $query)->count();

    $onlineFarmers = (clone $query)->where('user_type', 'Online')->count();
    $selfFarmers = $totalFarmers - $onlineFarmers;


    $farmers = $query->paginate(10)->appends($req->all());

    return view('pd_officer_panel.farmers',[
        'farmers'=>$farmers,
        'districts' => $districts,
        'talukas' => $talukas,
        'totalFarmers' => $totalFarmers,
        'onlineFarmers' => $onlineFarmers,
        'selfFarmers' => $selfFarmers,
    ]);
    }


    public function reporting(){
        $districts = District::all();
        return view('pd_officer_panel.reporting.index',['districts'=>$districts ]);
    }


    public function reporting_fetch(request $req){


        if($req->farmer_type == 'HardCopy'){
            $query = HardCopyFarmer::query();
        }else{

            $query = LandRevenueFarmerRegistation::query();
            if(empty($req->farmer_type) && $req->farmer_type == null){
                $query2 = HardCopyFarmer::query();


                // Check if district is set and not null, otherwise, fetch all
                if (!empty($req->district) && $req->district[0] !== null) {
                    $query2->whereIn('district', $req->district);
                }

                $acreFrom = $req->input('acre_from');
                $acreTo = $req->input('acre_to');

                if ($acreFrom !== null) {
                    $query2->where('total_landing_acre', '>=', $acreFrom);
                }

                if ($acreTo !== null) {
                    $query2->where('total_landing_acre', '<=', $acreTo);
                }



                // Apply filters only if they are not empty
                if (!empty($req->tehsil) && $req->tehsil[0] !== null) {
                    $query2->whereIn('tehsil', $req->tehsil);
                }

                if (!empty($req->tappa) && $req->tappa[0] !== null) {
                    $query2->whereIn('tappa', $req->tappa);
                }

                if (!empty($req->start_date) && $req->start_date == $req->end_date) {
                    $query2->whereDate('created_at', $req->start_date);
                } else {
                    if(!empty($req->start_date)){
                        $query2->whereBetween('created_at', [$req->start_date, $req->end_date]);
                    }

                }

                if (!empty($req->farmer_type) && $req->farmer_type !== null && $req->farmer_type !== 'HardCopy') {
                    $query2->where('user_type', $req->farmer_type);
                }

                if (!empty($req->verification_status) && $req->verification_status !== null) {
                    $query2->where('verification_status', $req->verification_status);
                }


                if (!empty($req->search) && $req->search !== null) {
                    $query2->where(function ($q) use ($req) {
                        $q->where('name', 'LIKE', "%{$req->search}%")
                        ->orWhere('father_name', 'LIKE', "%{$req->search}%")
                        ->orWhere('surname', 'LIKE', "%{$req->search}%")
                        ->orWhere('mobile', 'LIKE', "%{$req->search}%")
                        ->orWhere('cnic', 'LIKE', "%{$req->search}%")
                        ->orWhere('district', 'LIKE', "%{$req->search}%")
                        ->orWhere('tehsil', 'LIKE', "%{$req->search}%")
                        ->orWhere('tappa', 'LIKE', "%{$req->search}%")
                        ->orWhere('uc', 'LIKE', "%{$req->search}%"); // Add more columns as needed
                    });
                }












                $query->union($query2);
            }

        }






            // Check if district is set and not null, otherwise, fetch all
            if (!empty($req->district) && $req->district[0] !== null) {
                $query->whereIn('district', $req->district);
            }

            $acreFrom = $req->input('acre_from');
            $acreTo = $req->input('acre_to');

             if ($acreFrom !== null) {
                $query->where('total_landing_acre', '>=', $acreFrom);
            }

            if ($acreTo !== null) {
                $query->where('total_landing_acre', '<=', $acreTo);
            }



            // Apply filters only if they are not empty
            if (!empty($req->tehsil) && $req->tehsil[0] !== null) {
                $query->whereIn('tehsil', $req->tehsil);
            }

            if (!empty($req->tappa) && $req->tappa[0] !== null) {
                $query->whereIn('tappa', $req->tappa);
            }

            if (!empty($req->start_date) && $req->start_date == $req->end_date) {
                $query->whereDate('created_at', $req->start_date);
            } else {
                if(!empty($req->start_date)){
                    $query->whereBetween('created_at', [$req->start_date, $req->end_date]);
                }

            }

            if (!empty($req->farmer_type) && $req->farmer_type !== null && $req->farmer_type !== 'HardCopy') {
                $query->where('user_type', $req->farmer_type);
            }

            if (!empty($req->verification_status) && $req->verification_status !== null) {
                $query->where('verification_status', $req->verification_status);
            }


            if (!empty($req->search) && $req->search !== null) {
                $query->where(function ($q) use ($req) {
                    $q->where('name', 'LIKE', "%{$req->search}%")
                      ->orWhere('father_name', 'LIKE', "%{$req->search}%")
                      ->orWhere('surname', 'LIKE', "%{$req->search}%")
                      ->orWhere('mobile', 'LIKE', "%{$req->search}%")
                      ->orWhere('cnic', 'LIKE', "%{$req->search}%")
                      ->orWhere('district', 'LIKE', "%{$req->search}%")
                      ->orWhere('tehsil', 'LIKE', "%{$req->search}%")
                      ->orWhere('tappa', 'LIKE', "%{$req->search}%")
                      ->orWhere('uc', 'LIKE', "%{$req->search}%"); // Add more columns as needed
                });
            }


$totalFarmers = (clone $query)->count();

        $onlineFarmers = (clone $query)->where('user_type', 'Online')->count();
        $selfFarmers = $totalFarmers - $onlineFarmers;

        $totalAcres = (clone $query)->sum('total_landing_acre');
// $totalAcres = 0;

        // Paginate results and keep query parameters
        $farmers = $query->paginate(10)->appends($req->all());





        return view('pd_officer_panel.reporting.farmers',[
            'farmers' => $farmers,
            'requestData' => $req->all(), // Pass request data for hidden inputs
            'totalFarmers' => $totalFarmers,
            'onlineFarmers' => $onlineFarmers,
            'selfFarmers' => $selfFarmers,
            'totalAcres' => $totalAcres
         ]);
    }

    public function get_fa_list_district(request $req){

       if ($req->usertype == 'Field_Officer') {


            $users = User::with('fieldOfficer')
                ->select('id', 'usertype', 'user_id', 'name', 'number', 'cnic', 'email', 'district', 'tehsil', 'tappas')
                ->where('district', $req->district)
                ->where('usertype', $req->usertype)
                ->get()
                ->map(function ($user) {
                    $farmerCount = LandRevenueFarmerRegistation::where('district', $user->district)
                    ->where('tehsil', $user->tehsil)
                    ->whereIn('tappa', is_array($user->tappas) ? $user->tappas : json_decode($user->tappas, true))
                    // ->whereIn('verification_status', [
                    //         'verified_by_fa',
                    //         'verified_by_ao',
                    //         'verified_by_lrd',

                    //         'rejected_by_ao',

                    //         'rejected_by_lrd',
                    //         NULL

                    //     ])

                     ->where(function ($query) {
        $query->whereIn('verification_status', [
            'verified_by_fa',

            'verified_by_ao',
            'verified_by_lrd',
            'rejected_by_fa',

            'rejected_by_ao',
            'rejected_by_lrd',
        ])->orWhereNull('verification_status');
    })
                    ->count();

                    $user->farmers_count = $farmerCount;






                    $online_farmers = LandRevenueFarmerRegistation::where('district', $user->district)
                        ->where('tehsil', $user->tehsil)
                        ->whereIn('tappa', is_array($user->tappas) ? $user->tappas : json_decode($user->tappas, true))
                        ->where('user_type', 'Online')

                        ->count();

                    $user->online_farmers = $online_farmers;

                    $user->self = $farmerCount - $online_farmers;

                    $forwarded_to_ao = LandRevenueFarmerRegistation::where('district', $user->district)
                        ->where('tehsil', $user->tehsil)
                        ->whereIn('tappa', is_array($user->tappas) ? $user->tappas : json_decode($user->tappas, true))
                        ->whereIn('verification_status', [
                            // 'verified_by_fa',
                            // 'verified_by_ao',


                            // 'rejected_by_ao',

                            // 'rejected_by_lrd',

                             'rejected_by_ao',
                        'verified_by_fa',
                        'verified_by_lrd',
                        'verified_by_ao',
                         'rejected_by_lrd',


                        ])
                        ->count();


                        $verified_by_lrd = LandRevenueFarmerRegistation::where('district', $user->district)
                        ->where('tehsil', $user->tehsil)
                        ->whereIn('tappa', is_array($user->tappas) ? $user->tappas : json_decode($user->tappas, true))
                        ->whereIn('verification_status', [
                            'verified_by_lrd'
                        ])
                        ->count();



                     $user->verified_by_lrd = $verified_by_lrd;





                        $unverified = LandRevenueFarmerRegistation::where('district', $user->district)
                        ->where('tehsil', $user->tehsil)
                        ->whereIn('tappa', is_array($user->tappas) ? $user->tappas : json_decode($user->tappas, true))
                        // ->whereIn('verification_status',[
                        //     NULL

                        // ])
                        ->whereNull('verification_status')
                        ->count();




                         $rejected_by_fa = LandRevenueFarmerRegistation::where('district', $user->district)
                        ->where('tehsil', $user->tehsil)
                        ->whereIn('tappa', is_array($user->tappas) ? $user->tappas : json_decode($user->tappas, true))
                        ->where('verification_status',

                            'rejected_by_fa'

                        )
                        ->count();


                    $user->rejected_by_fa = $rejected_by_fa;


                    $user->unverified = $unverified;
                    $user->forwarded_to_ao = $forwarded_to_ao;
                    return $user;
                });
        }

        elseif ($req->usertype == 'Agri_Officer') {

            $agriUsers = User::with('agriOfficer')->select('id', 'usertype', 'user_id', 'name', 'number', 'cnic', 'email', 'district', 'tehsil', 'tappas')
            ->where('district', $req->district)
            ->where('usertype', 'Agri_Officer')
            ->get();

            $users = $agriUsers->map(function ($user) {
                $tehsils = json_decode($user->tehsil ?? '[]');
                $tappas = json_decode($user->tappas ?? '[]');

                $farmerCount = LandRevenueFarmerRegistation::where('district', $user->district)
                    ->whereIn('tehsil', $tehsils)
                    ->whereIn('tappa', $tappas)
                    ->whereIn('verification_status', [
                        'rejected_by_ao',
                        'verified_by_fa',
                        'verified_by_lrd',
                        'verified_by_ao',
                         'rejected_by_lrd',
                    ])
                    ->count();
                // Add farmers_count to match Field Officer structure
                $user->farmers_count = $farmerCount;


                $verified_by_lrd = LandRevenueFarmerRegistation::where('district', $user->district)
                    ->whereIn('tehsil', $tehsils)
                    ->whereIn('tappa', $tappas)
                    ->whereIn('verification_status', [

                         'verified_by_lrd',
                    ])
                    ->count();
                // Add farmers_count to match Field Officer structure
                $user->verified_by_lrd = $verified_by_lrd;




                $unverified = LandRevenueFarmerRegistation::where('district', $user->district)
                ->whereIn('tehsil', $tehsils)
                 ->whereIn('tappa', $tappas)
                ->whereIn('verification_status', [
                    'verified_by_fa'
                ])
                ->count();
                $user->unverified = $unverified;

                $forwarded_to_dd = LandRevenueFarmerRegistation::where('district', $user->district)
                       ->whereIn('tehsil', $tehsils)
                         ->whereIn('tappa', $tappas)
                        ->whereIn('verification_status', [

                           'verified_by_ao',

                            'rejected_by_lrd',
  'verified_by_lrd',

                        ])
                        ->count();
                $user->forwarded_to_dd = $forwarded_to_dd;


                $rejected_by_ao = LandRevenueFarmerRegistation::where('district', $user->district)
                       ->whereIn('tehsil', $tehsils)
                         ->whereIn('tappa', $tappas)
                        ->whereIn('verification_status', [
                            'rejected_by_ao',
                        ])
                        ->count();
                $user->rejected_by_ao = $rejected_by_ao;




                return $user;
            });

        }elseif ($req->usertype == 'DD_Officer') {




            $district = $req->district; // e.g., "Badin"

            $agriUsers = User::with('ddOfficer')->select('id', 'usertype', 'user_id', 'name', 'number', 'cnic', 'email', 'district', 'tehsil', 'tappas')
                ->where('district', 'LIKE', '%"'.$district.'"%') // Search inside ["Badin"]
                ->where('usertype', 'DD_Officer')
                ->get();



            $users = $agriUsers->map(function ($user) use ($district) { // Pass $district inside closure
                // Decode the user's district
                $districts = json_decode($user->district ?? '[]');

                $tehsils = json_decode($user->tehsil ?? '[]');
                $tappas = json_decode($user->tappas ?? '[]');

                // Make sure the current user's district is being used to count farmers for them
                if (in_array($district, $districts)) {
                    $farmerCount = LandRevenueFarmerRegistation::whereIn('district', $districts)
                    ->whereIn('tehsil', $tehsils)
                    ->whereIn('tappa', $tappas)
                     ->where(function($query) {
                            $query->whereIn('verification_status', [
                                'verified_by_fa',
                                'rejected_by_fa',
                                'verified_by_ao',
                                'rejected_by_ao',
                                'rejected_by_lrd',
                                'verified_by_lrd'
                            ])
                            ->orWhereNull('verification_status');
                        })
                        ->count();

                    // Add farmers_count to the user object
                    $user->farmers_count = $farmerCount;
                } else {
                    $user->farmers_count = 0;
                }




                $process = LandRevenueFarmerRegistation::whereIn('district', $districts)
                       ->whereIn('tehsil', $tehsils)
                         ->whereIn('tappa', $tappas)
                       ->where(function($query) {
                            $query->whereIn('verification_status', [
                                'verified_by_fa',
                                'rejected_by_fa',
                                'verified_by_ao',
                                'rejected_by_ao',
                                'rejected_by_lrd',
                            ])
                            ->orWhereNull('verification_status');
                        })
                        ->count();
                $user->process = $process;


                $verified_by_lrd = LandRevenueFarmerRegistation::whereIn('district', $districts)
                       ->whereIn('tehsil', $tehsils)
                         ->whereIn('tappa', $tappas)
                        ->whereIn('verification_status', [
                            'verified_by_lrd'
                        ])
                        ->count();
                $user->verified_by_lrd = $verified_by_lrd;




                // $verified_by_fa = LandRevenueFarmerRegistation::whereIn('district', $districts)
                // ->whereIn('tehsil', $tehsils)
                // ->whereIn('tappa', $tappas)
                // ->whereIn('verification_status', [
                //     'verified_by_fa',

                // ])
                // ->count();
                // $user->verified_by_fa = $verified_by_fa;

                // $verified_by_ao = LandRevenueFarmerRegistation::whereIn('district', $districts)
                // ->whereIn('tehsil', $tehsils)
                // ->whereIn('tappa', $tappas)
                // ->whereIn('verification_status', [

                //     'verified_by_ao',

                // ])
                // ->count();
                // $user->verified_by_ao = $verified_by_ao;

                // $verified_by_lrd = LandRevenueFarmerRegistation::whereIn('district', $districts)
                // ->whereIn('tehsil', $tehsils)
                // ->whereIn('tappa', $tappas)
                // ->whereIn('verification_status', [

                //     'verified_by_lrd'
                // ])
                // ->count();
                // $user->verified_by_lrd = $verified_by_lrd;


                // $rejected_by_fa = LandRevenueFarmerRegistation::whereIn('district', $districts)
                //        ->whereIn('tehsil', $tehsils)
                //         ->whereIn('tappa', $tappas)
                //         ->whereIn('verification_status', [

                //             'rejected_by_fa',
                //         ])
                //         ->count();
                // $user->rejected_by_fa = $rejected_by_fa;

                // $rejected_by_ao = LandRevenueFarmerRegistation::whereIn('district', $districts)
                //        ->whereIn('tehsil', $tehsils)
                //         ->whereIn('tappa', $tappas)
                //         ->whereIn('verification_status', [

                //             'rejected_by_ao',

                //         ])
                //         ->count();
                // $user->rejected_by_ao = $rejected_by_ao;

                // $rejected_by_lrd = LandRevenueFarmerRegistation::whereIn('district', $districts)
                //        ->whereIn('tehsil', $tehsils)
                //         ->whereIn('tappa', $tappas)
                //         ->whereIn('verification_status', [
                //             'rejected_by_lrd',

                //         ])
                //         ->count();
                // $user->rejected_by_lrd = $rejected_by_lrd;

                // $pending = LandRevenueFarmerRegistation::whereIn('district', $districts)
                // ->whereIn('tehsil', $tehsils)
                // ->whereIn('tappa', $tappas)
                // ->whereNull('verification_status')
                // ->count();
                // $user->pending = $pending;



                return $user;
            });

        }


        elseif ($req->usertype == 'Land_Revenue_Officer') {

 $tehsils = json_decode($user->tehsil ?? '[]');
                $tappas = json_decode($user->tappas ?? '[]');


            $district = $req->district; // e.g., "Badin"

            $agriUsers = User::with('lrdOfficer')->select('id', 'usertype', 'user_id', 'name', 'number', 'cnic', 'email', 'district', 'tehsil', 'tappas')
                ->where('district', $district) // Search inside ["Badin"]

                ->where('usertype', 'Land_Revenue_Officer')
                ->get();

            $users = $agriUsers->map(function ($user) use ($district) { // Pass $district inside closure
                // Decode the user's district
                $district = $user->district;

                $tehsils = json_decode($user->tehsil ?? '[]');
                $tappas = json_decode($user->tappas ?? '[]');

                    //Total
                    $farmerCount = LandRevenueFarmerRegistation::where('district', $district)->whereIn('tehsil', $tehsils)

                ->whereIn('tappa', $tappas)
                        ->whereIn('verification_status', [
                            'verified_by_ao',
                            'verified_by_lrd',
                            'rejected_by_lrd',
                            'verified_by_dd'
                        ])
                        ->count();

                    // Add farmers_count to the user object
                    $user->total_farmers = $farmerCount;


                    //Pending
                    // $unverified = LandRevenueFarmerRegistation::where('district', $district)
                    // ->whereIn('tehsil', $tehsils)

                    // ->whereIn('verification_status', [
                    //     'verified_by_ao'
                    // ])
                    // ->count();
                    // $user->unverified = $unverified;


                    //Verified
                    $verified_by_lrd = LandRevenueFarmerRegistation::where('district', $district)
                        ->whereIn('tehsil', $tehsils)

                ->whereIn('tappa', $tappas)
                            ->whereIn('verification_status', [
                                'verified_by_lrd',
                            ])
                            ->count();
                    $user->verified= $verified_by_lrd;


                    //Verified
                    $pending = LandRevenueFarmerRegistation::where('district', $district)
                        ->whereIn('tehsil', $tehsils)

                ->whereIn('tappa', $tappas)
                            ->whereIn('verification_status', [
                                'verified_by_ao',
                            ])
                            ->count();
                    $user->pending= $pending;


                    //Verified
                    $rejected = LandRevenueFarmerRegistation::where('district', $district)
                        ->whereIn('tehsil', $tehsils)

                ->whereIn('tappa', $tappas)
                            ->whereIn('verification_status', [
                                'rejected_by_lrd',
                            ])
                            ->count();
                    $user->rejected= $rejected;



                    // $user->unverified =  $farmerCount;

                return $user;
            });

        }

        elseif ($req->usertype == 'District_Officer')  {




            $district = $req->district; // e.g., "Badin"

            $agriUsers = User::with('adOfficer')->select('id', 'usertype', 'user_id', 'name', 'number', 'cnic', 'email', 'district', 'tehsil', 'tappas')
                ->where('district', 'LIKE', '%"'.$district.'"%') // Search inside ["Badin"]
                ->where('usertype', 'District_Officer')
                ->get();



            $users = $agriUsers->map(function ($user) use ($district) { // Pass $district inside closure
                // Decode the user's district
                $districts = json_decode($user->district ?? '[]');

                $tehsils = json_decode($user->tehsil ?? '[]');
                $tappas = json_decode($user->tappas ?? '[]');

                // Make sure the current user's district is being used to count farmers for them
                if (in_array($district, $districts)) {
                    $farmerCount = LandRevenueFarmerRegistation::whereIn('district', $districts)
                    ->whereIn('tehsil', $tehsils)
                    ->whereIn('tappa', $tappas)
                      ->where(function ($query) {
                        $query->whereIn('verification_status', [
                                'verified_by_fa',
                                'verified_by_ao',
                                'verified_by_lrd',
                                'rejected_by_lrd',
                                'rejected_by_ao',
                                'rejected_by_fa'
                            ])
                            ->orWhereNull('verification_status');
                    })
                        ->count();

                    // Add farmers_count to the user object
                    $user->farmers_count = $farmerCount;
                } else {
                    $user->farmers_count = 0;
                }


                $verified_by_fa = LandRevenueFarmerRegistation::whereIn('district', $districts)
                ->whereIn('tehsil', $tehsils)
                ->whereIn('tappa', $tappas)
                ->whereIn('verification_status', [
                    'verified_by_fa',

                ])
                ->count();
                $user->verified_by_fa = $verified_by_fa;

                $verified_by_ao = LandRevenueFarmerRegistation::whereIn('district', $districts)
                ->whereIn('tehsil', $tehsils)
                ->whereIn('tappa', $tappas)
                ->whereIn('verification_status', [

                    'verified_by_ao',

                ])
                ->count();
                $user->verified_by_ao = $verified_by_ao;

                $verified_by_lrd = LandRevenueFarmerRegistation::whereIn('district', $districts)
                ->whereIn('tehsil', $tehsils)
                ->whereIn('tappa', $tappas)
                ->whereIn('verification_status', [

                    'verified_by_lrd'
                ])
                ->count();
                $user->verified_by_lrd = $verified_by_lrd;


                $rejected_by_fa = LandRevenueFarmerRegistation::whereIn('district', $districts)
                       ->whereIn('tehsil', $tehsils)
                        ->whereIn('tappa', $tappas)
                        ->whereIn('verification_status', [

                            'rejected_by_fa',
                        ])
                        ->count();
                $user->rejected_by_fa = $rejected_by_fa;

                $rejected_by_ao = LandRevenueFarmerRegistation::whereIn('district', $districts)
                       ->whereIn('tehsil', $tehsils)
                        ->whereIn('tappa', $tappas)
                        ->whereIn('verification_status', [

                            'rejected_by_ao',

                        ])
                        ->count();
                $user->rejected_by_ao = $rejected_by_ao;

                $rejected_by_lrd = LandRevenueFarmerRegistation::whereIn('district', $districts)
                       ->whereIn('tehsil', $tehsils)
                        ->whereIn('tappa', $tappas)
                        ->whereIn('verification_status', [
                            'rejected_by_lrd',

                        ])
                        ->count();
                $user->rejected_by_lrd = $rejected_by_lrd;

                $pending = LandRevenueFarmerRegistation::whereIn('district', $districts)
                ->whereIn('tehsil', $tehsils)
                ->whereIn('tappa', $tappas)
                ->whereNull('verification_status')
                ->count();
                $user->pending = $pending;



                return $user;
            });

        }


        return view('pd_officer_panel.field_officer_list',[
            'users' => $users,
         ]);

    }


}
