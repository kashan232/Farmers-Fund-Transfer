@include('field_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('field_officer_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('field_officer_panel.include.navbar_include')
<!-- [ Header ] end -->



<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <!-- <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Home</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Agriculture Officer Dashboard</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="dashboard">
                    <div class="all-card">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Total Farmers</p>
                                                <h3 class="card-text text-amount">0</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-city" aria-hidden="true"></i>
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
                                                <p class="card-title text-title">Incomplete Farmers</p>
                                                <h3 class="card-text text-amount">0</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-city" aria-hidden="true"></i>
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
                                                <p class="card-title text-title">Complete Farmers</p>
                                                <h3 class="card-text text-amount">0</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-city" aria-hidden="true"></i>
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


            <!-- Farmer Status Chart -->
            <div class="col-lg-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <div>
                            <p> Farmer Completion Status </p>
                        </div>
                    </div>
                    <div id="farmerStatusHorizontalBarChart"></div>
                </div>
            </div>

            <!-- Tehsil-wise Farmer Count Chart -->
            <div class="col-lg-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <div>
                            <p> Tehsil-Wise Farmer Count </p>
                        </div>
                    </div>
                    <div id="tehsilWiseFarmerChart"></div>
                </div>
            </div>



        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('field_officer_panel.include.footer_copyright_include')
</footer>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@include('field_officer_panel.include.footer_include')
<!-- Farmer Completion Status Chart Script -->
<script>
    const completeFarmers = 80;
    const incompleteFarmers = 20;

    const farmerStatusOptions = {
        series: [{
                name: 'Complete Farmers',
                data: [completeFarmers]
            },
            {
                name: 'Incomplete Farmers',
                data: [incompleteFarmers]
            }
        ],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '50%'
            }
        },
        colors: ['#4a9668', '#5be969'],
        dataLabels: {
            enabled: true
        },
        xaxis: {
            categories: ['Farmers'],
            title: {
                text: 'Number of Farmers'
            }
        },
        yaxis: {
            title: {
                text: 'Farmer Status'
            }
        },
        legend: {
            position: 'top'
        }
    };

    new ApexCharts(document.querySelector("#farmerStatusHorizontalBarChart"), farmerStatusOptions).render();
</script>


<!-- Tehsil-Wise Farmer Count Chart Script -->
<script>
    const tehsilNames = ['Tehsil 1', 'Tehsil 2', 'Tehsil 3'];
    const totalFarmers = [100, 150, 120];
    const verifiedFarmers = [70, 100, 80];
    const unverifiedFarmers = [30, 50, 40];

    const tehsilWiseOptions = {
        series: [{
                name: 'Total Farmers',
                data: totalFarmers
            },
            {
                name: 'Verified Farmers',
                data: verifiedFarmers
            },
            {
                name: 'Unverified Farmers',
                data: unverifiedFarmers
            }
        ],
        chart: {
            type: 'bar',
            height: 400
        },
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '60%',
                endingShape: 'rounded'
            }
        },
        colors: ['#4ba064', '#5cc183', '#d9534f'],
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '12px',
                colors: ["#304758"]
            }
        },
        xaxis: {
            title: {
                text: 'Number of Farmers'
            }
        },
        yaxis: {
            categories: tehsilNames,
            title: {
                text: 'Tehsils'
            }
        },
        legend: {
            position: 'top'
        },
        tooltip: {
            y: {
                formatter: val => `${val} farmers`
            }
        }
    };

    new ApexCharts(document.querySelector("#tehsilWiseFarmerChart"), tehsilWiseOptions).render();
</script>


</body>

</html>