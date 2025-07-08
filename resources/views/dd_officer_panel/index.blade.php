@include('dd_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->

<!-- [ Sidebar Menu ] start -->
@include('dd_officer_panel.include.sidebar_include')
<!-- [ Sidebar Menu ] end -->

<!-- [ Header Topbar ] start -->
@include('dd_officer_panel.include.navbar_include')
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-12">
                <div class="dashboard">
                    <div class="all-card" style="padding: 0px !important;">
                        <div class="row">
                            <!-- Total Farmers Card -->
                            {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Total Farmers</p>
                                                <h3 class="card-text text-amount">{{ $agriUserfarmersCount }}</h3>
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
                                                <p class="card-title text-title">Verified By LRD</p>
                                                <h3 class="card-text text-amount">{{ $Verifiedfarmeragiruser }}</h3>
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


                             <!-- Rejected Farmers Card -->
                             <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Reject BY LRD</p>
                                                <h3 class="card-text text-amount">{{ $rejected_by_lrd }}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-user-times" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}



                        </div>
                    </div>
                </div>
            </div>

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

                                <td style="font-size: 18px;    font-weight: 600;">{{ $fa->total_farmers }}</td>
                                <td style="font-size: 18px;    font-weight: 600;">{{ $fa->in_process }}</td>
                                <td style="font-size: 18px;    font-weight: 600;">{{ $fa->verified }}</td>
                                <td style="font-size: 18px;    font-weight: 600;">{{ $fa->rejected }}</td>
                                <td style="font-size: 18px;    font-weight: 600;">{{ $fa->pending }}</td>
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
                                <td style="font-size: 18px;    font-weight: 600;">{{ $ao->total_farmers }}</td>
                                <td style="font-size: 18px;    font-weight: 600;">{{ $ao->in_process }}</td>
                                {{-- <td style="font-size: 18px;    font-weight: 600;">{{ $ao->verified }}</td> --}}
                                <td style="font-size: 18px;    font-weight: 600;">{{ $ao->rejected }}</td>
                                <td style="font-size: 18px;    font-weight: 600;">{{ $ao->pending }}</td>
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
                            <td style="font-size: 18px;">{{ $totalFarmers }}</td>
                            <td style="font-size: 18px;">{{ $totalInProcess }}</td>
                            {{-- <td style="font-size: 18px;">{{ $totalVerified }}</td> --}}
                            <td style="font-size: 18px;">{{ $totalRejected }}</td>
                            <td style="font-size: 18px;">{{ $totalPending }}</td>
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
                                <td style="font-size: 18px;    font-weight: 600;">{{ $lrd->total_farmers }}</td>
                                <td style="font-size: 18px;    font-weight: 600;">{{ $lrd->verified }}</td>
                                <td style="font-size: 18px;    font-weight: 600;">{{ $lrd->rejected }}</td>
                                <td style="font-size: 18px;    font-weight: 600;">{{ $lrd->pending }}</td>
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



            <!-- Farmer Registration Charts -->
            {{-- <div class="col-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <p>Farmer Registration</p>
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
            </div> --}}

            <!-- Tehsil-Wise Farmer Statistics -->
            {{-- <div class="col-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <p>Farmers Statistics</p>
                    </div>
                    <div id="districtOfficerTehsilWiseRegistrationChart"></div>
                </div>
            </div> --}}
        </div>
    </div>
</div>

<footer class="pc-footer">
    @include('dd_officer_panel.include.footer_copyright_include')
</footer>

@include('dd_officer_panel.include.footer_include')
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
            labels: ['Registered Farmers', 'Rejected Farmers', ' Verified Farmers'],
            colors: ['#dfd930', '#d9534f', '#3f8a5c'],
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
    renderDonutChart("#fieldOfficerRegistrationChart", fieldOfficerData, 90);

    const districtOfficerOptions = {
        series: [{
            name: 'Registered Farmers',
            data: [50, 70, 40]
        }, {
            name: 'Rejected Farmers',
            data: [30, 50, 20]
        }, {
            name: 'Verified Farmers',
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
        colors: ['#dfd930', '#d9534f', '#3f8a5c'],
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

</script>

</body>

</html>
