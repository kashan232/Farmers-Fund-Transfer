@include('land_revenue_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('land_revenue_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('land_revenue_panel.include.navbar_include')
<!-- [ Header ] end -->



<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="dashboard">
                    <div class="all-card p-0">
                        <div class="row">

                           <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Total Farmers</p>
                                                <h3 class="card-text text-amount">{{ $total_farmers }}</h3>
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
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Verified Farmers</p>
                                                <h3 class="card-text text-amount">{{ $verified_farmers }}</h3>
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
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Rejected Farmers</p>
                                                <h3 class="card-text text-amount">{{ $rejected_farmers }}</h3>
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

                        </div>
                    </div>
                </div>
            </div>

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

            <div class="col-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <p>Verification Status by Authority (AO, DD, LRD)</p>
                    </div>
                    <div class="row">
                        <!-- AO Chart -->
                        <div class="col-md-4 p-3">
                            <div class="chart-heading text-center pt-2 pb-2" style="font-weight: bold;">AO Status</div>
                            <div class="chart-wrapper">
                                <div class="chart" id="aoRegistrationChart"></div>
                            </div>
                        </div>
                        <!-- DD Chart -->
                        <div class="col-md-4 p-3">
                            <div class="chart-heading text-center pt-2 pb-2" style="font-weight: bold;">DD Status</div>
                            <div class="chart-wrapper">
                                <div class="chart" id="ddRegistrationChart"></div>
                            </div>
                        </div>
                        <!-- LRD Chart -->
                        <div class="col-md-4 p-3">
                            <div class="chart-heading text-center pt-2 pb-2" style="font-weight: bold;">LRD Status</div>
                            <div class="chart-wrapper">
                                <div class="chart" id="lrdRegistrationChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}




        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('land_revenue_panel.include.footer_copyright_include')
</footer>

@include('land_revenue_panel.include.footer_include')
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

<script>
    // AO Data and Chart
const aoData = [120, 30, 90]; // Example: Total, Rejected, Verified
renderDonutChart("#aoRegistrationChart", aoData, 120);

// DD Data and Chart
const ddData = [150, 50, 100]; // Example: Total, Rejected, Verified
renderDonutChart("#ddRegistrationChart", ddData, 150);

// LRD Data and Chart
const lrdData = [200, 60, 140]; // Example: Total, Rejected, Verified
renderDonutChart("#lrdRegistrationChart", lrdData, 200);

// Render Donut Chart Function
function renderDonutChart(elementId, data, total) {
    const options = {
        series: data,
        chart: {
            type: 'donut',
            height: 400
        },
        labels: ['Total Farmers', 'Rejected Farmers', 'Verified Farmers'],
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

</script>
</body>

</html>
