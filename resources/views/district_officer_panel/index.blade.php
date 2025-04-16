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

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3>District Wise Field Officers</h3>
                        <div class="row tables">
                            <div class="table-responsive">

                                <table class="table table-bordered example" id="">
                                    {{-- <thead>
                                        <th>Districts</th>
                                        <th>Total Field Officers</th>
                                    </thead>
                                    <tbody>
                                        @foreach($usersByDistrict as $data)
                                            <tr>
                                                <td>{{ $data->district }}</td>
                                                <td><a href="{{ route('fa_list_by_dg',$data->district) }}">{{ $data->total_users }}</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody> --}}
                                    <thead>
                                        <tr>
                                            <th>District</th>
                                            <th>Field Officer</th>
                                            <th>Agri Officer</th>
                                            <th>DD Officer</th>
                                            <th>Land Revenue Officer</th>
                                            <th>Additional Director</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($districtStats as $row)
                                            <tr>
                                                <td>{{ $row['district'] }}</td>
                                                <td>
                                                    <a href="{{ route('fa_list_by_dg', ['district' => $row['district'], 'usertype' => 'Field_Officer']) }}">
                                                        {{ $row['Field_Officer'] }}
                                                    </a>
                                                </td>

                                                {{-- <td><a href="{{ route('fa_list_by_dg',$row['district']) }}"> {{ $row['Field_Officer'] }}</a></td> --}}
                                                <td>
                                                    <a href="{{ route('fa_list_by_dg', ['district' => $row['district'], 'usertype' => 'Agri_Officer']) }}">
                                                        {{ $row['Agri_Officer'] }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('fa_list_by_dg', ['district' => $row['district'], 'usertype' => 'DD_Officer']) }}">
                                                        {{ $row['DD_Officer'] }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('fa_list_by_dg', ['district' => $row['district'], 'usertype' => 'Land_Revenue_Officer']) }}">
                                                        {{ $row['Land_Revenue_Officer'] }}
                                                    </a>
                                                </td>
                                              
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


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

<!-- Chart Scripts -->
<script>
    // Donut Charts Data and Configurations
    const ownFarmerData = [100, 80, 20];
    const fieldOfficerData = [90, 70, 20];

    function renderDonutChart(elementId, data, total) {
        const options = {
            series: data,
            chart: {
                type: 'donut',
                height: 400
            },
            labels: ['Registered Farmers', 'Verified Farmers', 'Rejected Farmers'],
            colors: ['#dfd930', '#5cc183', '#d9534f'],
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
        colors: ['#dfd930', '#5cc183', '#d9534f'],
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
