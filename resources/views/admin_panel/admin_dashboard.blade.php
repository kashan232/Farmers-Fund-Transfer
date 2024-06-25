@include('admin_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    @include('admin_panel.include.sidebar_include')
</nav>
<style>
    .box--sec {
        width: 100%;
        box-shadow: 0px 0px 10px 0px #7777;
        background-color: #fff;
        border-radius: 8px;

    }

    .top-heading {
        border-radius: 8px 8px 0 0;
        border-bottom: 1px solid #eee;
        background-color: #4ba0647d;
        padding: 5px 0px;
    }

    .top-heading p {
        color: #000;
        padding-top: 10px !important;
        padding: 0px 30px;
        font-size: 20px;
        font-weight: 600;
    }

    #myChart {
        width: 100% !important;
    }
</style>

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
<header class="pc-header">
    @include('admin_panel.include.navbar_include')
</header>
<!-- [ Header ] end -->



<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Home</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Admin Dashboard</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="dashboard">
                    <div class="all-card">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-pink">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">District / Tehsil</p>
                                                <h2 class="card-text text-amount">{{ $district_counts }} / {{ $tehsil_counts }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-area">
                                                    <i class="fas fa-city" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-orange">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Tappa</p>
                                                <h2 class="card-text text-amount">{{ $tappas_count }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-pie">
                                                    <i class="fas fa-store-alt" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-yellow">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">UC</p>
                                                <h2 class="card-text text-amount">{{ $ucs_counts }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-yellow">
                                                    <i class="fas fa-warehouse" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-blue">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">User</p>
                                                <h2 class="card-text text-amount">{{ $AgriUser }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-skyblue">
                                                    <i class="fas fa-user" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-bluedark">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Agriculture</p>
                                                <h2 class="card-text text-amount">{{ $AgricultureOfficer }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-blue">
                                                    <i class="fas fa-user-shield" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-green">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Land Revenue</p>
                                                <h2 class="card-text text-amount">{{ $LandRevenueDepartment }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-green">
                                                    <i class="fas fa-user-tie" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-blue">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Total Farmers</p>
                                                <h2 class="card-text text-amount">{{ $totalEntries }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-skyblue">
                                                    <i class="fas fa-user" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-bluedark">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Verified Farmers</p>
                                                <h2 class="card-text text-amount">{{ $TotalVerifiedfarmers }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-blue">
                                                    <i class="fas fa-user-check" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-green">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">UnVerified Farmers</p>
                                                <h2 class="card-text text-amount">{{ $TotalUnverifiedfarmer }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-green">
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
            {{-- graph one --}}
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <div>
                            <p> District Wise Agriculture Farmers</p>
                        </div>
                    </div>
                    <div id="chart" style="width: 100%;"></div>
                </div>
            </div>
            {{-- graph one end --}}

            {{-- graph 2 --}}
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <div>
                            <p> District Wise Land Revenue Farmers</p>
                        </div>
                    </div>
                    <div id="chart2" style="width: 100%;"></div>
                </div>
            </div>
            {{-- graph 2 end --}}

            {{-- graph 3 --}}
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <div>
                            <p> District Wise Online Registered Farmers</p>
                        </div>
                    </div>
                    <div id="chart3" style="width: 100%;"></div>
                </div>
            </div>
            {{-- graph 3 end --}}

            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
        @include('admin_panel.include.footer_copyright_include')
    </footer>

    @include('admin_panel.include.footer_include')

    <script>
        var data = <?= json_encode($data) ?>;
        var options = {
            series: [{
                data: data.map(function(item) {
                    return item.value
                }),
            }],
            chart: {
                type: 'bar',
                height: 300,

            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            xaxis: {
                categories: data.map(function(item) {
                    return item.label
                }),
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

    <script>
        var data = <?= json_encode($data2) ?>;
        var options = {
            series: [{
                data: data.map(function(item) {
                    return item.value
                }),
            }],
            chart: {
                type: 'bar',
                height: 300,

            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            xaxis: {
                categories: data.map(function(item) {
                    return item.label
                }),
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();
    </script>

    <script>
        var data = <?= json_encode($data3) ?>;
        var options = {
            series: [{
                data: data.map(function(item) {
                    return item.value
                }),
            }],
            chart: {
                type: 'bar',
                height: 300,

            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            xaxis: {
                categories: data.map(function(item) {
                    return item.label
                }),
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart3"), options);
        chart.render();
    </script>

    </body>

    </html>