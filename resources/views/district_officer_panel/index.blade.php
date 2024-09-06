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
        <!-- [ breadcrumb ] start -->
        <!-- <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">District Officer Dashboard</h2>
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

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Verified Farmers</p>
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

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">UnVerified Farmers</p>
                                                <h3 class="card-text text-amount">{{ $Unverifiedfarmeragiruser }}</h3>
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

            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <div>
                            <p> District : Hyderabad</p>
                        </div>
                    </div>
                    <div id="chart" style="width: 100%;"></div>
                </div>
            </div>

        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('district_officer_panel.include.footer_copyright_include')
</footer>

@include('district_officer_panel.include.footer_include')


<script>
    // Static data for demonstration
    var data = [
        {
            tehsil: 'Hyderabad City',
            totalFarmers: 100,
            verifiedFarmers: 70,
            unverifiedFarmers: 30
        },
        {
            tehsil: 'Qasimabad',
            totalFarmers: 80,
            verifiedFarmers: 50,
            unverifiedFarmers: 30
        },
        {
            tehsil: 'Latifabad',
            totalFarmers: 60,
            verifiedFarmers: 40,
            unverifiedFarmers: 20
        }
    ];

    var options = {
        series: [{
            name: 'Total Farmers',
            data: data.map(function(item) {
                return item.totalFarmers;
            })
        }, {
            name: 'Verified Farmers',
            data: data.map(function(item) {
                return item.verifiedFarmers;
            })
        }, {
            name: 'Unverified Farmers',
            data: data.map(function(item) {
                return item.unverifiedFarmers;
            })
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: true,
                dataLabels: {
                    position: 'top'
                }
            }
        },
        colors: ['#4a9065', '#40b66d', '#3ee54f'],
        dataLabels: {
            enabled: true,
            offsetX: -6,
            style: {
                fontSize: '12px',
                colors: ['#fff']
            }
        },
        xaxis: {
            categories: data.map(function(item) {
                return item.tehsil;
            }),
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>

</body>

</html>
