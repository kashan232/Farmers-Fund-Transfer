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
                            <th style="width: 150px">Tappa</th>
                            <th style="width: 150px">Total Farmers</th>
                            <th style="width: 150px">In-Process</th>
                            <th style="width: 150px">Verified</th>
                            <th style="width: 150px">Rejected</th>
                            <th style="width: 150px">Pending</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fa_list as $index => $fa)
                        {{dd($fa);}}
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $fa->name }}</td>
                                <td>{{ $fa->email }}</td>
                                <td>{{ $fa->district }}</td>
                                <td>{{ $fa->tehsil }}</td>
                                <td>{{ $fa->tappas }}</td>
                                <td>{{ $fa->total_farmers }}</td>
                                <td>{{ $fa->in_process }}</td>
                                <td>{{ $fa->verified }}</td>
                                <td>{{ $fa->rejected }}</td>
                                <td>{{ $fa->pending }}</td>
                            </tr>
                        @endforeach
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
                            <th style="width: 150px">Total Farmers</th>
                            <th style="width: 150px">In-Process</th>
                            <th style="width: 150px">Verified</th>
                            <th style="width: 150px">Rejected</th>
                            <th style="width: 150px">Pending</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ao_list as $index => $ao)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $ao->name }}</td>
                                <td>{{ $ao->email }}</td>
                                <td>{{ $ao->district }}</td>
                                <td>{{ implode(', ', json_decode($ao->tehsil ?? '[]')) }}</td>
                                 <td>{{ $fa->total_farmers }}</td>
                                <td>{{ $fa->in_process }}</td>
                                <td>{{ $fa->verified }}</td>
                                <td>{{ $fa->rejected }}</td>
                                <td>{{ $fa->pending }}</td>
                            </tr>
                        @endforeach
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
                              <th style="width: 150px">Total Farmers</th>
                            <th style="width: 150px">Verified</th>
                            <th style="width: 150px">Rejected</th>
                            <th style="width: 150px">Pending</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lrd_list as $index => $lrd)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $lrd->name }}</td>
                                <td>{{ $lrd->email }}</td>
                                <td>{{ $lrd->district }}</td>
                                <td>{{ implode(', ', json_decode($lrd->tehsil ?? '[]')) }}</td>
                                <td>{{ $fa->total_farmers }}</td>
                                <td>{{ $fa->verified }}</td>
                                <td>{{ $fa->rejected }}</td>
                                <td>{{ $fa->pending }}</td>
                            </tr>
                        @endforeach
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
