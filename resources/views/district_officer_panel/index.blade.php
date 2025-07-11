@include('district_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->

<!-- [ Sidebar Menu ] start -->
@include('district_officer_panel.include.sidebar_include')
<!-- [ Sidebar Menu ] end -->

<!-- [ Header Topbar ] start -->
@include('district_officer_panel.include.navbar_include')
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <div class="row">

             <div class="col-12">
                {{-- <h2 class="mb-4">Field Officers (FA)</h2> --}}
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="12" class="text-white text-center" style="    font-size: 20px;">
                                Field Asistants
                            </th>
                        </tr>
                        <tr>
                            <th style="width: 20px" >#</th>
                            <th>Name</th>
                            <th style="width: 500px" >Email</th>
                            <th style="width: 150px">District</th>
                            <th style="width: 150px">Tehsils</th>
                            <th style="width: 150px">Tappas</th>
                            <th style="width: 150px">Total Farmers</th>
                            <th style="width: 150px">In-Process</th>
                            <th style="width: 150px">Verified</th>
                            <th style="width: 150px">Rejected</th>
                            <th style="width: 150px">Pending</th>

                        </tr>
                    </thead>
                    <tbody>
                         @php
                            $faTotalFarmers = 0;
                            $faTotalInProcess = 0;
                            $faTotalverified = 0;
                            $faTotalRejected = 0;
                            $faTotalPending = 0;
                        @endphp
                        @foreach($fa_list as $index => $fa)

                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $fa->name }}</td>
                                <td>{{ $fa->email }}</td>
                                <td>{{ $fa->district }}</td>
                                <td>{{ $fa->tehsil }}</td>
                                <td>

                                    @php
                                        $tappa = json_decode($fa->tappas, true);
                                    @endphp

                                    @if (json_last_error() === JSON_ERROR_NONE && is_array($tappa))
                                        <div>
                                            @foreach($tappa as $index => $tappaItem)
                                                <span class="badge text-bg-success text-dark font-weight-bold tappa-badge {{ $index >= 4 ? 'd-none extra-tappa-' . $fa->id : '' }}">
                                                    {{ $tappaItem }}
                                                </span>
                                                @if($index < 3)
                                                    <br>
                                                @endif
                                            @endforeach

                                            @if(count($tappa) > 4)
                                                <a href="javascript:void(0);" id="toggle-link-{{ $fa->id }}" onclick="toggleTappas({{ $fa->id }})" class="text-primary d-block mt-1">
                                                    +{{ count($tappa) - 4 }}
                                                </a>
                                            @endif
                                        </div>
                                    @else
                                        <span class="badge text-bg-success text-dark font-weight-bold">
                                            {{ $fa->tappas }}
                                        </span>
                                    @endif
                                </td>

                                <td style="font-size: 18px;    font-weight: 600;">
                                <a href="{{ route('farmers-by-dd', ['user_id' => $fa->id, 'fa_total_farmers' => 'total_farmers']) }}"> {{ $fa->total_farmers }} </a>
                                </td>
                                <td style="font-size: 18px;    font-weight: 600;">
                                <a href="{{ route('farmers-by-dd', ['user_id' => $fa->id, 'fa_in_process' => 'in_process']) }}">    {{ $fa->in_process }} </a>
                                </td>
                                <td style="font-size: 18px;    font-weight: 600;">
                                    <a href="{{ route('farmers-by-dd', ['user_id' => $fa->id, 'fa_verified' => 'verified']) }}"> {{ $fa->verified }} </a>
                                </td>
                                <td style="font-size: 18px;    font-weight: 600;">
                                    <a href="{{ route('farmers-by-dd', ['user_id' => $fa->id, 'fa_rejected' => 'rejected']) }}"> {{ $fa->rejected }} </a>
                                </td>
                                <td style="font-size: 18px;    font-weight: 600;">
                                    <a href="{{ route('farmers-by-dd', ['user_id' => $fa->id, 'fa_pending' => 'pending']) }}"> {{ $fa->pending }} </a>
                                </td>
                            </tr>
                            @php
                                $faTotalFarmers += $fa->total_farmers;
                                $faTotalInProcess += $fa->in_process;
                                $faTotalverified += $fa->verified;
                                $faTotalRejected += $fa->rejected;
                                $faTotalPending += $fa->pending;
                            @endphp

                            @endforeach
                            <tr class="table-dark text-white font-weight-bold">
                                <td colspan="6" class="text-center">Total</td>
                                <td style="font-size: 18px;">{{ $faTotalFarmers }}</td>
                                <td style="font-size: 18px;">{{ $faTotalInProcess }}</td>
                                <td style="font-size: 18px;">{{ $faTotalverified }}</td>
                                <td style="font-size: 18px;">{{ $faTotalRejected }}</td>
                                <td style="font-size: 18px;">{{ $faTotalPending }}</td>
                            </tr>
                    </tbody>
                </table>
                </div>

                {{-- <h2 class="mb-4 mt-5">Agri Officers (AO)</h2> --}}
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="11" class="text-white text-center" style="    font-size: 20px;">
                                Agri Officers
                            </th>
                        </tr>
                        <tr>
                            <th style="width: 20px" >#</th>
                            <th>Name</th>
                            <th style="width: 500px" >Email</th>
                            <th style="width: 150px">District</th>
                            <th style="width: 150px">Tehsils</th>
                            <th style="width: 150px">Tappas</th>
                            <th style="width: 150px">Total Farmers</th>
                            <th style="width: 150px">In-Process</th>
                            {{-- <th style="width: 150px">Verified</th> --}}
                            <th style="width: 150px">Rejected</th>
                            <th style="width: 150px">Pending</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $totalFarmers = 0;
                            $totalInProcess = 0;
                            $totalRejected = 0;
                            $totalPending = 0;
                        @endphp

                        @foreach($ao_list as $index => $ao)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $ao->name }}</td>
                                <td>{{ $ao->email }}</td>
                                <td>{{ $ao->district }}</td>
                                <td>{{ implode(', ', json_decode($ao->tehsil ?? '[]')) }}</td>
                                <td>

                                    @php
                                        $tappa = json_decode($ao->tappas, true);
                                    @endphp

                                    @if (json_last_error() === JSON_ERROR_NONE && is_array($tappa))
                                        <div>
                                            @foreach($tappa as $index => $tappaItem)
                                                <span class="badge text-bg-success text-dark font-weight-bold tappa-badge {{ $index >= 4 ? 'd-none extra-tappa-' . $ao->id : '' }}">
                                                    {{ $tappaItem }}
                                                </span>
                                                @if($index < 3)
                                                    <br>
                                                @endif
                                            @endforeach

                                            @if(count($tappa) > 4)
                                                <a href="javascript:void(0);" id="toggle-link-{{ $ao->id }}" onclick="toggleTappas({{ $ao->id }})" class="text-primary d-block mt-1">
                                                    +{{ count($tappa) - 4 }}
                                                </a>
                                            @endif
                                        </div>
                                    @else
                                        <span class="badge text-bg-success text-dark font-weight-bold">
                                            {{ $ao->tappas }}
                                        </span>
                                    @endif
                                </td>
                                <td style="font-size: 18px;    font-weight: 600;">
                                    <a href="{{ route('farmers-by-dd', ['user_id' => $ao->id, 'ao_total_farmers' => 'total_farmers']) }}"> {{ $ao->total_farmers }} </a>
                                </td>
                                <td style="font-size: 18px;    font-weight: 600;">
                                    <a href="{{ route('farmers-by-dd', ['user_id' => $ao->id, 'ao_in_process' => 'in_process']) }}">  {{ $ao->in_process }} </a>
                                </td>
                                {{-- <td style="font-size: 18px;    font-weight: 600;">{{ $ao->verified }}</td> --}}
                                <td style="font-size: 18px;    font-weight: 600;">
                                    <a href="{{ route('farmers-by-dd', ['user_id' => $ao->id, 'ao_rejected' => 'rejected']) }}">  {{ $ao->rejected }} </a>
                                </td>
                                <td style="font-size: 18px;    font-weight: 600;">
                                    <a href="{{ route('farmers-by-dd', ['user_id' => $ao->id, 'ao_pending' => 'pending']) }}"> {{ $ao->pending }} </a>
                                </td>
                            </tr>
                            @php
                                $totalFarmers += $ao->total_farmers;
                                $totalInProcess += $ao->in_process;
                                $totalRejected += $ao->rejected;
                                $totalPending += $ao->pending;
                            @endphp

                        @endforeach
                        <tr class="table-dark text-white font-weight-bold">
                            <td colspan="6" class="text-center">Total</td>
                            <td style="font-size: 18px;">
                                 {{ $totalFarmers }}
                            </td>
                            <td style="font-size: 18px;">
                                 {{ $totalInProcess }}
                            </td>
                            {{-- <td style="font-size: 18px;">{{ $totalVerified }}</td> --}}
                            <td style="font-size: 18px;">
                                 {{ $totalRejected }}
                            </td>
                            <td style="font-size: 18px;">
                                  {{ $totalPending }}
                            </td>
                        </tr>

                    </tbody>
                </table>
                </div>

                {{-- <h2 class="mb-4 mt-5">Land Revenue Officers (LRD)</h2> --}}
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="11"  class="text-white text-center" style="    font-size: 20px;">
                                Land Revenue Officers
                            </th>
                        </tr>
                        <tr>
                            <th style="width: 20px" >#</th>
                            <th>Name</th>
                            <th style="width: 500px" >Email</th>
                            <th style="width: 150px">District</th>
                            <th style="width: 150px">Tehsils</th>
                            <th style="width: 150px">Tappas</th>
                              <th style="width: 150px">Total Farmers</th>
                            <th style="width: 150px">Verified</th>
                            <th style="width: 150px">Rejected</th>
                            <th style="width: 150px">Pending</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $lrdTotalFarmers = 0;
                            $lrdTotalverified = 0;
                            $lrdTotalRejected = 0;
                            $lrdTotalPending = 0;
                        @endphp
                        @foreach($lrd_list as $index => $lrd)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $lrd->name }}</td>
                                <td>{{ $lrd->email }}</td>
                                <td>{{ $lrd->district }}</td>
                                <td>{{ implode(', ', json_decode($lrd->tehsil ?? '[]')) }}</td>
                                <td>

                                    @php
                                        $tappa = json_decode($lrd->tappas, true);
                                    @endphp

                                    @if (json_last_error() === JSON_ERROR_NONE && is_array($tappa))
                                        <div>
                                            @foreach($tappa as $index => $tappaItem)
                                                <span class="badge text-bg-success text-dark font-weight-bold tappa-badge {{ $index >= 4 ? 'd-none extra-tappa-' . $lrd->id : '' }}">
                                                    {{ $tappaItem }}
                                                </span>
                                                @if($index < 3)
                                                    <br>
                                                @endif
                                            @endforeach

                                            @if(count($tappa) > 4)
                                                <a href="javascript:void(0);" id="toggle-link-{{ $lrd->id }}" onclick="toggleTappas({{ $lrd->id }})" class="text-primary d-block mt-1">
                                                    +{{ count($tappa) - 4 }}
                                                </a>
                                            @endif
                                        </div>
                                    @else
                                        <span class="badge text-bg-success text-dark font-weight-bold">
                                            {{ $lrd->tappas }}
                                        </span>
                                    @endif
                                </td>
                                <td style="font-size: 18px;    font-weight: 600;">
                                    <a href="{{ route('farmers-by-dd', ['user_id' => $lrd->id, 'lrd_total_farmers' => 'total_farmers']) }}"> {{ $lrd->total_farmers }} </a>
                                </td>
                                <td style="font-size: 18px;    font-weight: 600;">
                                    <a href="{{ route('farmers-by-dd', ['user_id' => $lrd->id, 'lrd_verified' => 'verified']) }}">  {{ $lrd->verified }} </a>
                                </td>
                                <td style="font-size: 18px;    font-weight: 600;">
                                    <a href="{{ route('farmers-by-dd', ['user_id' => $lrd->id, 'lrd_rejected' => 'rejected']) }}"> {{ $lrd->rejected }} </a>
                                </td>
                                <td style="font-size: 18px;    font-weight: 600;">
                                    <a href="{{ route('farmers-by-dd', ['user_id' => $lrd->id, 'lrd_pending' => 'pending']) }}">  {{ $lrd->pending }} </a>
                                </td>
                            </tr>
                            @php
                                $lrdTotalFarmers += $lrd->total_farmers;
                                $lrdTotalverified += $lrd->verified;
                                $lrdTotalRejected += $lrd->rejected;
                                $lrdTotalPending += $lrd->pending;
                            @endphp

                        @endforeach
                        <tr class="table-dark text-white font-weight-bold">
                            <td colspan="6" class="text-center">Total</td>
                            <td style="font-size: 18px;">{{ $lrdTotalFarmers }}</td>
                            <td style="font-size: 18px;">{{ $lrdTotalverified }}</td>
                            {{-- <td style="font-size: 18px;">{{ $totalVerified }}</td> --}}
                            <td style="font-size: 18px;">{{ $lrdTotalRejected }}</td>
                            <td style="font-size: 18px;">{{ $lrdTotalPending }}</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>


            
{{--
            <!-- Total Farmers Card -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">Total Number of Farmers</p>
                                <h3 class="card-text text-amount">{{$fa_total_Registered_Farmers}}</h3>
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


                <!-- Verified Farmers Card -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">Verified BY LRD</p>
                                <h3 class="card-text text-amount">{{$Verifiedfarmeragiruser}}</h3>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape green-icon-bg">
                                    <i class="fas fa-user-check" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                <!-- Verified Farmers Card -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">Rejected BY LRD</p>
                                <h3 class="card-text text-amount">{{$rejected_by_lrd}}</h3>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape green-icon-bg">
                                    <i class="fas fa-user-check" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






                <!-- Verified Farmers Card -->
                <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">In-Process Farmers</p>
                                <h3 class="card-text text-amount">{{$Processfarmeragiruser}}</h3>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape green-icon-bg">
                                    <i class="fas fa-user-check" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Rejected Farmers Card -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">Pending Farmers by FA</p>
                                <h3 class="card-text text-amount">{{$Unverifiedfarmeragiruser}}</h3>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape green-icon-bg">
                                    <i class="fas fa-user-times" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">
                                    Farmers Registered By FA
                                </p>
                                <h3 class="card-text text-amount">{{$userFarmers}}</h3>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape green-icon-bg">
                                    <i class="fas fa-user-times" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="card-title text-title">Online Farmers Registration</p>
                                <h3 class="card-text text-amount">{{$onlineFarmers}}</h3>
                            </div>
                            <div class="col-auto">
                                <div class="icon-shape green-icon-bg">
                                    <i class="fas fa-user-times" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="districtFarmersChart" width="1000" height="400px"></canvas>
                    </div>
                </div>
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3>District Wise Officers</h3>
                        <div class="row tables">
                            <div class="table-responsive">

                                @php
                                $totalLRD = 0;
                                $totalDD = 0;
                                $totalFO = 0;
                                $totalAO = 0;

                                foreach ($districtStats as $row) {
                                    $totalLRD += $row['Land_Revenue_Officer'];
                                    $totalDD += $row['DD_Officer'];
                                    $totalFO += $row['Field_Officer'];
                                    $totalAO += $row['Agri_Officer'];
                                }
                            @endphp

                            <table class="col-12 table table-bordered mt-4" >
                                <thead>
                                    <tr>
                                        <th>Officers</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Land Revenue Officers</td>
                                        <td>
                                            <a href="{{ route('fa_list_by_ad', ['district' => $row['district'], 'usertype' => 'Land_Revenue_Officer']) }}">
                                                {{ $totalLRD }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Deputy Director Officers</td>
                                        <td>
                                            <a href="{{ route('fa_list_by_ad', ['district' => $row['district'], 'usertype' => 'DD_Officer']) }}">
                                                {{ $totalDD }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Field Officers</td>
                                        <td>
                                            <a href="{{ route('fa_list_by_ad', ['district' => $row['district'], 'usertype' => 'Field_Officer']) }}">
                                                {{ $totalAO }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Agricuture Officers</td>
                                        <td>
                                            <a href="{{ route('fa_list_by_ad', ['district' => $row['district'], 'usertype' => 'Agri_Officer']) }}">
                                                {{ $totalLRD }}
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
 --}}

            <!-- Farmer Registration Charts -->
            {{-- <div class="col-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <p>Farmer Registration Source Overview (Field Officer & Online Farmers)</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 p-3">
                            <div class="chart-heading text-center pt-2 pb-2" style="font-weight: bold;">Field Officer</div>
                            <div class="chart-wrapper">
                                <div class="chart" id="fieldOfficerRegistrationChart"></div>
                            </div>
                        </div>
                        <div class="col-md-6 p-3">
                            <div class="chart-heading text-center pt-2 pb-2" style="font-weight: bold;">Online Farmer Registration</div>
                            <div class="chart-wrapper">
                                <div class="chart" id="onlinefarmers"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tehsil-Wise Farmer Statistics -->
            <div class="col-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <p> Tehsil-wise Farmers Statistics</p>
                    </div>
                    <div id="districtOfficerTehsilWiseRegistrationChart"></div>
                </div>
            </div>

            <!-- Field Officer Count Chart -->
            <div class="col-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <p>Field Officer</p>
                    </div>
                    <div id="fieldOfficerChart"></div>
                </div>
            </div> --}}
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<footer class="pc-footer">
    @include('district_officer_panel.include.footer_copyright_include')
</footer>

@include('district_officer_panel.include.footer_include')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function() {
        $('.example').DataTable( {
            dom: 'frtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
</script>

<script>
    const ctx = document.getElementById('districtFarmersChart').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [
                {
                    label: 'Verified Farmers',
                    data: @json($verified),
                    backgroundColor: 'rgba(40, 167, 69, 0.7)', // green
                },
                {
                    label: 'Unverified Farmers',
                    data: @json($unverified),
                    backgroundColor: 'rgba(220, 53, 69, 0.7)', // red
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'District Wise Farmers (Verified vs Unverified)'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                },
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true,
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Farmers'
                    }
                }
            }
        }
    });
</script>


</body>

</html>
