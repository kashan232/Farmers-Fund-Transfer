@include('pd_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->

<!-- [ Sidebar Menu ] start -->
@include('pd_officer_panel.include.sidebar_include')
<!-- [ Sidebar Menu ] end -->

<!-- [ Header Topbar ] start -->
@include('pd_officer_panel.include.navbar_include')
<!-- [ Header ] end -->



<style>
   .tables nav{
        display: flex;
        justify-content: right;

    }
    #example1_length
    {
        margin-top: 6px !important;
        margin-left: 50px !important;
    }
</style>
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">

        @php

        //  if($users[0]->usertype == 'Agri_Officer'){


        //            $tehsilTappas = [];

        //             foreach ($users as $user) {
        //                 $tehsil = json_decode($user->tehsil, true)[0]; // since it's like ["badin"]
        //                 $tappas = json_decode($user->tappas, true);

        //                 if (!isset($tehsilTappas[$tehsil])) {
        //                     $tehsilTappas[$tehsil] = [];
        //                 }

        //                 foreach ($tappas as $tappa) {
        //                     $tehsilTappas[$tehsil][] = $tappa;
        //                 }
        //             }

        //             // Now count unique tappas per tehsil
        //             $tehsilTappasCount = [];

        //             foreach ($tehsilTappas as $tehsil => $tappas) {
        //                 $tehsilTappasCount[$tehsil] = count(array_unique($tappas));
        //             }


        //             foreach ($tehsilTappas as $tehsil => $tappas) {
        //                 $uniqueTappas = array_unique($tappas);

        //                 echo "<h5>Tehsil:</h5> {$tehsil}<br>";
        //                 echo "Tappas Count: " . count($uniqueTappas) . "<br>";
        //                 echo "Tappas: ";

        //                 foreach ($uniqueTappas as $tappa) {
        //                     echo "<span class='badge text-bg-primary text-white font-weight-bold me-1'>{$tappa}</span> ";
        //                 }

        //                 echo "<br><br>";
        //             }


        //         }
// if ($users[0]->usertype == 'Field_Officer') {
//     $tehsilTappas = [];

//     // Step 1: Collect tappas grouped by tehsil (repeating allowed)
//     foreach ($users as $user) {
//         $tehsil = $user->tehsil;
//         $tappas = json_decode($user->tappas, true);

//         if (!isset($tehsilTappas[$tehsil])) {
//             $tehsilTappas[$tehsil] = [];
//         }

//         foreach ($tappas as $tappa) {
//             $tehsilTappas[$tehsil][] = $tappa; // Keep repeated tappas
//         }
//     }

//     // Step 2: Display tehsil-wise total tappas (including duplicates)
//     foreach ($tehsilTappas as $tehsil => $tappas) {
//         echo "<h5 class='mt-4'>Tehsil: <span class='text-success'>{$tehsil}</span></h5>";
//         echo "Total Count: " . count($tappas) . "<br>";
//         echo "Tappas Name: ";

//         foreach ($tappas as $tappa) {
//             echo "<span class='badge text-bg-primary text-white font-weight-bold me-1'>{$tappa}</span> ";
//         }

//         echo "<br><br>";
//     }
// }





        @endphp

        <div class="row">
{{-- {{dd($users);}} --}}

                @php
                $groupedData = '';
                // dd($users);
                if($users[0]->usertype == 'Field_Officer'){

                    $groupedData_total= $users->groupBy('tehsil')->map(function ($group) {
                        return $group->sum('farmers_count');
                    });

                    $groupedData_forwarded_to_ao = $users->groupBy('tehsil')->map(function ($group) {
                        return $group->sum('forwarded_to_ao');
                    });

                    $groupedData_online_farmers = $users->groupBy('tehsil')->map(function ($group) {
                        return $group->sum('online_farmers');
                    });

                    $groupedData_pending = $users->groupBy('tehsil')->map(function ($group) {
                        return $group->sum('unverified');
                    });


                    $groupedData_rejected_by_fa = $users->groupBy('tehsil')->map(function ($group) {
                        return $group->sum('rejected_by_fa');
                    });

                    $groupedData_self = $users->groupBy('tehsil')->map(function ($group) {
                        return $group->sum('self');
                    });


                     $groupedData_verified_by_lrd = $users->groupBy('tehsil')->map(function ($group) {
                        return $group->sum('verified_by_lrd');
                    });



                }



                if($users[0]->usertype == 'Land_Revenue_Officer'){
                    $groupedData = $users->groupBy('tehsil')->map(function ($group) {
                        return $group->sum('total_farmers');
                    });


                }



                if($users[0]->usertype == 'Agri_Officer'){
                    $groupedData_farmers_count = $users->groupBy('tehsil')->map(function ($group) {
                        return $group->sum('farmers_count');
                    });

                    $groupedData_forwarded_to_dd = $users->groupBy('tehsil')->map(function ($group) {
                        return $group->sum('forwarded_to_dd');
                    });

                    $groupedData_rejected_by_ao = $users->groupBy('tehsil')->map(function ($group) {
                        return $group->sum('rejected_by_ao');
                    });

                    $groupedData_unverified = $users->groupBy('tehsil')->map(function ($group) {
                        return $group->sum('unverified');
                    });


                    $groupedData_verified_by_lrd = $users->groupBy('tehsil')->map(function ($group) {
                        return $group->sum('verified_by_lrd');
                    });





                //    $tehsilTappas = [];

                //     foreach ($users as $user) {
                //         $tehsil = json_decode($user->tehsil, true)[0]; // since it's like ["badin"]
                //         $tappas = json_decode($user->tappas, true);

                //         if (!isset($tehsilTappas[$tehsil])) {
                //             $tehsilTappas[$tehsil] = [];
                //         }

                //         foreach ($tappas as $tappa) {
                //             $tehsilTappas[$tehsil][] = $tappa;
                //         }
                //     }

                //     // Now count unique tappas per tehsil
                //     $tehsilTappasCount = [];

                //     foreach ($tehsilTappas as $tehsil => $tappas) {
                //         $tehsilTappasCount[$tehsil] = count(array_unique($tappas));
                //     }


                //     foreach ($tehsilTappas as $tehsil => $tappas) {
                //         $uniqueTappas = array_unique($tappas);

                //         echo "<h5>Tehsil:</h5> {$tehsil}<br>";
                //         echo "Tappas Count: " . count($uniqueTappas) . "<br>";
                //         echo "Tappas: ";

                //         foreach ($uniqueTappas as $tappa) {
                //             echo "<span class='badge text-bg-primary text-white font-weight-bold me-1'>{$tappa}</span> ";
                //         }

                //         echo "<br><br>";
                //     }


                }

                @endphp



                @if(!empty($groupedData_total))

                @if($users[0]->usertype == 'Field_Officer')
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S#</th>
                                    <th>Tehsil</th>
                                    <th>Total</th>
                                    <th>Forwarded to AO</th>
                                    {{-- <th>Verified By LRD</th> --}}
                                    <th>Pending</th>
                                    <th>Rejected by FA</th>
                                    <th>Self</th>
                                    <th>Online Farmers</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach($groupedData_total as $tehsil => $total)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ ucfirst($tehsil) }}</td>
                                        <td>{{ $total }}</td>
                                        <td>{{ $groupedData_forwarded_to_ao[$tehsil] ?? 0 }}</td>

                                        {{-- <td>{{ $groupedData_verified_by_lrd[$tehsil] ?? 0 }}</td> --}}

                                        <td>{{ $groupedData_pending[$tehsil] ?? 0 }}</td>
                                        <td>{{ $groupedData_rejected_by_fa[$tehsil] ?? 0 }}</td>
                                        <td>{{ $groupedData_self[$tehsil] ?? 0 }}</td>
                                        <td>{{ $groupedData_online_farmers[$tehsil] ?? 0 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                @endif



                @if(!empty($groupedData_farmers_count))
                @if($users[0]->usertype == 'Agri_Officer')
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S#</th>
                                    <th>Tehsil</th>
                                    <th>Total Farmers</th>
                                    {{-- <th>Verified By LRD</th> --}}
                                    <th>In-Process</th>
                                    <th>Rejected</th>
                                    <th>Pending</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach($groupedData_farmers_count as $tehsil => $total)
                                    <tr>
                                         <td>{{ $i++ }}</td>
                                        {{-- <td>{{ ucfirst($tehsil) }}</td> --}}

                                        <td>{{ str_replace(['[', ']', '"'], '', $tehsil) }}</td>


                                        <td>{{ $groupedData_farmers_count[$tehsil] ?? 0 }}</td>

                                        {{-- <td>{{ $groupedData_verified_by_lrd[$tehsil] ?? 0 }}</td> --}}


                                        <td>{{ $groupedData_forwarded_to_dd[$tehsil] ?? 0 }}</td>
                                        <td>{{ $groupedData_rejected_by_ao[$tehsil] ?? 0 }}</td>
                                        <td>{{ $groupedData_unverified[$tehsil] ?? 0 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                @endif







{{--
                <div class="col-lg-12">
                    <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th colspan="3" style="text-align: center;">
                                    @if($users[0]->usertype == 'Agri_Officer')
                                    Received by FA
                                    @elseif($users[0]->usertype == 'Land_Revenue_Officer')
                                    Received by AO
                                    @else
                                    FORWARDED TO AO
                                    @endif
                                     -  TEHSIL WISE COUNT </th>
                            </tr>
                            <tr>
                                <th>S#</th>
                                <th>TEHSIL</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($groupedData))
                            @foreach ($groupedData as $index => $tehsil)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ str_replace(['[', ']', '"'], '', $index) }}</td>

                                    <td>{{ $tehsil }}</td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
 --}}






                {{-- @foreach ($groupedData as $ttehsil => $totalFarmers)

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card" style="    background-color: #ffff55;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <p class="card-title text-title" style="color: #000000 !important;">{{ $ttehsil }}</p>
                                        <h3 class="card-text text-amount" style="color: #000000 !important;">{{ $totalFarmers }}</h3>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon-shape green-icon-bg">
                                            <i class="fas fa-user" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                @endforeach --}}



                {{-- @if($users[0]->usertype == 'Agri_Officer')
                <div class="col-lg-12">
                    <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th colspan="3" style="text-align: center;">FORWARDED TO LRD TEHSIL WISE COUNT</th>
                            </tr>
                            <tr>
                                <th>S#</th>
                                <th>TEHSIL</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($verified_by_ao))
                            @foreach ($verified_by_ao as $index => $tehsil)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ str_replace(['[', ']', '"'], '', $index) }}</td>

                                    <td>{{ $tehsil }}</td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                @endif --}}



            <div class="col-sm-12">





                <div class="card">
                    <div class="card-body">
                        <div class="dt-responsive">
                            <div id="dom-jqry_wrapper" class="dt-container dt-bootstrap5">
                                <div class="row mt-2 justify-content-md-center">
                                    <div class="col-12  tables">
                                        <div class="table-responsive ">
                                            <style>
                                                .small-placeholder::placeholder {
                                                    font-size: 11px;
                                                }
                                            </style>

                                            {{-- <div class="row mb-2">
                                                <div class="col-md-5">
                                                    <form action="{{ route('dg.farmers') }}" method="get" class="d-flex">
                                                        <input type="text" name="search" id="" class=" small-placeholder form-control me-2" placeholder="Search by Name, Email, Mobile, CNIC">
                                                        <input type="submit" name="" id="" value="Search" class="btn btn-primary">
                                                    </form>
                                                </div>
                                            </div> --}}





                                            <table id="example1" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Password</th>
                                                        <th>Contact</th>
                                                        <th>CNIC</th>
                                                        <th>District</th>
                                                        <th>Tehsils</th>
                                                        <th>Tappas</th>
                                                        <th>Total Farmers</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $user)



                                                        <tr>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>

                                                            <td>
                                                                @if($user->usertype == 'Field_Officer')
                                                                    {{$user->fieldOfficer->password  ??  'N/A'}}
                                                                @elseif($user->usertype == 'Agri_Officer')
                                                                    {{$user->agriOfficer->password  ?? 'N/A'}}
                                                                @elseif($user->usertype == 'DD_Officer')
                                                                    {{$user->ddOfficer->password  ?? 'N/A'}}
                                                                @elseif($user->usertype == 'Land_Revenue_Officer')
                                                                    {{$user->lrdOfficer->password  ?? 'N/A'}}
                                                                @elseif($user->usertype == 'District_Officer')
                                                                    {{$user->adOfficer->password  ?? 'N/A'}}
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if($user->usertype == 'Field_Officer')
                                                                    {{$user->fieldOfficer->contact_number  ??  'Not Given'}}
                                                                @elseif($user->usertype == 'Agri_Officer')
                                                                    {{$user->agriOfficer->contact_number  ?? 'Not Given'}}
                                                                @elseif($user->usertype == 'DD_Officer')
                                                                    {{$user->ddOfficer->contact_number  ?? 'Not Given'}}
                                                                @elseif($user->usertype == 'Land_Revenue_Officer')
                                                                    {{$user->lrdOfficer->contact_number  ?? 'Not Given'}}
                                                                @elseif($user->usertype == 'District_Officer')
                                                                    {{$user->adOfficer->contact_number  ?? 'Not Given'}}
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if($user->usertype == 'Field_Officer')
                                                                    {{$user->fieldOfficer->cnic  ??  'Not Given'}}
                                                                @elseif($user->usertype == 'Agri_Officer')
                                                                    {{$user->agriOfficer->cnic  ?? 'Not Given'}}
                                                                @elseif($user->usertype == 'DD_Officer')
                                                                    {{$user->ddOfficer->cnic  ?? 'Not Given'}}
                                                                @elseif($user->usertype == 'Land_Revenue_Officer')
                                                                    {{$user->lrdOfficer->cnic  ?? 'Not Given'}}
                                                                @elseif($user->usertype == 'District_Officer')
                                                                    {{$user->adOfficer->cnic  ?? 'Not Given'}}
                                                                @endif
                                                            </td>


                                                            {{-- <td>{{ ($user->cnic == '') ? 'Not Given':$user->cnic }}</td> --}}
                                                            <td>

                                                                @php
                                                                    $tappa = json_decode($user->district, true);
                                                                @endphp

                                                                @if (json_last_error() === JSON_ERROR_NONE && is_array($tappa))
                                                                    <div>
                                                                        @foreach($tappa as $index => $tappaItem)
                                                                            <span class="badge text-bg-success text-dark font-weight-bold tappa-badge {{ $index >= 4 ? 'd-none extra-tappa-' . $user->id : '' }}">
                                                                                {{ $tappaItem }}
                                                                            </span>
                                                                            @if($index < 3)
                                                                                <br>
                                                                            @endif
                                                                        @endforeach

                                                                        @if(count($tappa) > 4)
                                                                            <a href="javascript:void(0);" id="toggle-link-{{ $user->id }}" onclick="toggleTappas({{ $user->id }})" class="text-primary d-block mt-1">
                                                                                +{{ count($tappa) - 4 }}
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                @else
                                                                    <span class="badge text-bg-success text-dark font-weight-bold">
                                                                        {{ $user->district }}
                                                                    </span>
                                                                @endif
                                                            </td>



                                                            <td>

                                                                @php
                                                                    $tappa = json_decode($user->tehsil, true);
                                                                @endphp

                                                                @if (json_last_error() === JSON_ERROR_NONE && is_array($tappa))
                                                                    <div>
                                                                        @foreach($tappa as $index => $tappaItem)
                                                                            <span class="badge text-bg-success text-dark font-weight-bold tappa-badge {{ $index >= 4 ? 'd-none extra-tappa-' . $user->id : '' }}">
                                                                                {{ $tappaItem }}
                                                                            </span>
                                                                            @if($index < 3)
                                                                                <br>
                                                                            @endif
                                                                        @endforeach

                                                                        @if(count($tappa) > 4)
                                                                            <a href="javascript:void(0);" id="toggle-link-{{ $user->id }}" onclick="toggleTappas({{ $user->id }})" class="text-primary d-block mt-1">
                                                                                +{{ count($tappa) - 4 }}
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                @else
                                                                    <span class="badge text-bg-success text-dark font-weight-bold">
                                                                        {{ $user->tehsil }}
                                                                    </span>
                                                                @endif
                                                            </td>



                                                            <td>

                                                                @php
                                                                    $tappa = json_decode($user->tappas, true);
                                                                @endphp

                                                                @if (json_last_error() === JSON_ERROR_NONE && is_array($tappa))
                                                                    <div>
                                                                        @foreach($tappa as $index => $tappaItem)
                                                                            <span class="badge text-bg-success text-dark font-weight-bold tappa-badge {{ $index >= 4 ? 'd-none extra-tappa-' . $user->id : '' }}">
                                                                                {{ $tappaItem }}
                                                                            </span>
                                                                            @if($index < 3)
                                                                                <br>
                                                                            @endif
                                                                        @endforeach

                                                                        @if(count($tappa) > 4)
                                                                            <a href="javascript:void(0);" id="toggle-link-{{ $user->id }}" onclick="toggleTappas({{ $user->id }})" class="text-primary d-block mt-1">
                                                                                +{{ count($tappa) - 4 }}
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                @else
                                                                    <span class="badge text-bg-success text-dark font-weight-bold">
                                                                        {{ $user->tappas }}
                                                                    </span>
                                                                @endif
                                                            </td>



                                                            <td style="text-align: left; font-size:12px; font-weight: 700;;">
                                                                @if($user->usertype != 'Land_Revenue_Officer') Total Farmers:

                                                                <span style="font-size:15px">
                                                                    @if($user->usertype == 'Field_Officer')
                                                                        <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status' => 'total']) }}"> {{ $user->farmers_count }} </a>
                                                                    @endif
                                                                    @if($user->usertype == 'Agri_Officer')
                                                                        <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status_by_ao' => 'total']) }}"> {{ $user->farmers_count }} </a>
                                                                    @endif
                                                                    @if($user->usertype == 'DD_Officer')
                                                                        <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status_by_dd' => 'total']) }}"> {{ $user->farmers_count }} </a>
                                                                    @endif

                                                                    @if($user->usertype == 'District_Officer')
                                                                        <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status_by_ad' => 'total']) }}"> {{ $user->farmers_count }} </a>
                                                                    @endif
                                                                </span> <br>@endif

                                                                @if($user->usertype == 'Field_Officer')
                                                                <span style="font-size:12px">
                                                                    Verified By LRD = <span style="font-size:15px"> <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status' => 'verified_by_lrd']) }}"> {{ $user->verified_by_lrd }} </a> </span> <br>

                                                                    In-Process  = <span style="font-size:15px"> <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status' => 'in-Process']) }}"> {{ $user->forwarded_to_ao }} </a> </span> <br>
                                                                    Pending = <span style="font-size:15px"> <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status' => 'pending']) }}"> {{ $user->unverified }} </a> </span> <br>
                                                                    Rejected = <span style="font-size:15px"> <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status' => 'rejected']) }}"> {{ $user->rejected_by_fa }} </a> </span> <br>

                                                                    Online =  <span style="font-size:15px"> <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status' => 'online']) }}"> {{ $user->online_farmers }} </a> </span> <br>
                                                                    Self = <span style="font-size:15px"> <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status' => 'self']) }}"> {{ $user->self }} </a> </span>
                                                                </span>
                                                                @endif <!-- This is from withCount('farmers') -->



                                                                @if($user->usertype == 'Agri_Officer'  ) <span style="font-size:12px">
                                                                    {{-- Verified By LRD  = <span style="font-size:15px"> <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status_by_ao' => 'verified_by_lrd']) }}">  {{ $user->verified_by_lrd }} </a> </span> <br> --}}

                                                                    In-Process  = <span style="font-size:15px"> <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status_by_ao' => 'in-Process']) }}">  {{ $user->forwarded_to_dd }} </a> </span> <br>
                                                                    Rejected = <span style="font-size:15px"> <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status_by_ao' => 'rejected']) }}"> {{ $user->rejected_by_ao }} </a> </span> <br>
                                                                    Pending = <span style="font-size:15px"> <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status_by_ao' => 'pending']) }}"> {{ $user->unverified }} </a> </span>  </span>   @endif <!-- This is from withCount('farmers') -->
                                                                @if($user->usertype == 'Land_Revenue_Officer')
                                                                <span style="font-size:12px">
                                                                    Total Farmers  = <span style="font-size:15px"> <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status_by_lrd' => 'total']) }}"> {{ $user->total_farmers }} </a> </span> <br>
                                                                    Verified  = <span style="font-size:15px">  <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status_by_lrd' => 'verified']) }}"> {{ $user->verified }} </a>  </span> <br>
                                                                    Pending = <span style="font-size:15px">  <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status_by_lrd' => 'pending']) }}"> {{ $user->pending }}  </a>  </span> <br>
                                                                    Rejected = <span style="font-size:15px">  <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status_by_lrd' => 'rejected']) }}"> {{ $user->rejected }}  </a>  </span>

                                                                </span>
                                                                @endif <!-- This is from withCount('farmers') -->



                                                                 @if($user->usertype == 'DD_Officer')
                                                                <span style="font-size:12px">
                                                                    In-Process = <span style="font-size:15px"> <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status_by_dd' => 'process']) }}"> {{ $user->process }} </a> </span> <br>
                                                                    Verified By LRD = <span style="font-size:15px"> <a href="{{ route('dg.farmers', ['user_id' => $user->id, 'farmer_type_status_by_dd' => 'verified_by_lrd']) }}"> {{ $user->verified_by_lrd }} </a> </span> <br>
                                                                    {{-- Verified By LRD = <span style="font-size:15px"> {{ $user->verified_by_lrd }} </span> <br>



                                                                    Pending = <span style="font-size:15px"> {{ $user->pending }} </span> <br> --}}


                                                                </span>
                                                                 @endif <!-- This is from withCount('farmers') -->



                                                                @if($user->usertype == 'District_Officer')
                                                                 <span style="font-size:12px">
                                                                    Verified By FA= <span style="font-size:15px"> {{ $user->verified_by_fa }} </span> <br>
                                                                    Verified By AO= <span style="font-size:15px"> {{ $user->verified_by_ao }} </span> <br>
                                                                    Verified By LRD= <span style="font-size:15px"> {{ $user->verified_by_lrd }} </span> <br>

                                                                    Rejected By FA= <span style="font-size:15px"> {{ $user->rejected_by_fa }} </span> <br>
                                                                    Rejected By AO= <span style="font-size:15px"> {{ $user->rejected_by_ao }} </span> <br>
                                                                    Rejected By LRD= <span style="font-size:15px"> {{ $user->rejected_by_lrd }} </span> <br>

                                                                    Pending = <span style="font-size:15px"> {{ $user->pending }} </span> <br>


                                                                </span>
                                                                 @endif <!-- This is from withCount('farmers') -->


                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>


                                        </div>
                                        {{-- {{ $users->links() }} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<footer class="pc-footer">
    @include('pd_officer_panel.include.footer_copyright_include')
</footer>

@include('pd_officer_panel.include.footer_include')
<script>
    function toggleTappas(id) {
        const extraTappas = document.querySelectorAll('.extra-tappa-' + id);
        const toggleLink = document.getElementById('toggle-link-' + id);
        let isHidden = extraTappas[0].classList.contains('d-none');

        extraTappas.forEach(function(el) {
            el.classList.toggle('d-none');
        });

        if (isHidden) {
            toggleLink.textContent = 'Show Less';
        } else {
            toggleLink.textContent = '+' + extraTappas.length;
        }
    }
</script>


<!-- Chart Scripts -->
<script>

    table = $('#example1').DataTable({
        "pageLength": 25, // Default number of rows per page
        "dom": 'Bfrtilp', // Only include the filter (search box), table, and pagination
        "processing": true, // Optional: for large datasets
        "deferRender": true, // Improves performance by rendering rows only when needed
        "order": [
            [0, 'asc']
        ], // Default ordering of the first column (optional)
        "buttons": [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        'lengthMenu': [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "language": {
            "search": "Search:" // Customize the search box label (optional)
        }
    });

    // Donut Charts Data and Configurations
    const ownFarmerData = [100, 80, 20];
    const landRevenueData = [120, 90, 30];
    const fieldOfficerData = [90, 70, 20];

    function renderDonutChart(elementId, data, total) {
        const options = {
            series: data,
            chart: {
                type: 'donut',
                height: 400
            },
            labels: ['Registered Farmers', 'Verified Farmers', 'Rejected Farmers'],
            colors: ['#dfd930', '#d9534f', '#5cc183'],
            dataLabels: {
                enabled: true,
                formatter: (val) => val.toFixed(1) + '%'
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%',
                        labels: {
                            show: true,
                            total: {
                                show: true,
                                label: 'Total',
                                formatter: () => total
                            }
                        }
                    }
                }
            },
            legend: {
                position: 'bottom'
            }
        };
        new ApexCharts(document.querySelector(elementId), options).render();
    }

    renderDonutChart("#onlinefarmers", ownFarmerData, 100);
    renderDonutChart("#landRevenueChart", landRevenueData, 120);
    renderDonutChart("#fieldOfficerRegistrationChart", fieldOfficerData, 90);

    const districtOfficerOptions = {
        series: [{
            name: 'Registered Farmers',
            data: [50, 70, 40]
        }, {
            name: 'Verified Farmers',
            data: [30, 50, 20]
        }, {
            name: 'Rejected Farmers',
            data: [10, 5, 10]
        }],
        chart: {
            type: 'bar',
            height: 500
        },
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '60%',
                endingShape: 'rounded'
            }
        },
        colors: ['#dfd930', '#d9534f', '#5cc183'],
        xaxis: {
            categories: ['Hyderabad City', 'Qasimabad', 'Latifabad'], // Replace with actual Tehsil names
        },
        yaxis: {
            title: {
                text: 'Tehsils'
            }
        },
        legend: {
            position: 'top'
        },
        tooltip: {
            y: {
                formatter: (val) => `${val} farmers`
            }
        }
    };

    new ApexCharts(document.querySelector("#districtOfficerTehsilWiseRegistrationChart"), districtOfficerOptions).render();
    // Field Officer Count Chart Data and Configurations
    const fieldOfficerOptions = {
        series: [{
            name: 'Field Officers',
            data: [10, 7, 5]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: true,
                borderRadius: 8,
                barHeight: '60%'
            }
        },
        colors: ['#3e7350'],
        dataLabels: {
            enabled: true,
            formatter: (val) => `${val} officers`
        },
        xaxis: {
            categories: ['Hyderabad City', 'Qasimabad', 'Latifabad'],
            title: {
                text: 'Field Officer Count'
            }
        },
        yaxis: {
            title: {
                text: 'Tehsil'
            }
        }
    };
    new ApexCharts(document.querySelector("#fieldOfficerChart"), fieldOfficerOptions).render();
</script>

</body>

</html>
