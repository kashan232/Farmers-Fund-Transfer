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
                                                <p class="card-title text-title">All Farmers</p>
                                                <h3 class="card-text text-amount">{{ \App\Models\LandRevenueFarmerRegistation::where('admin_or_user_id' , Auth::user()->id)->count() }}</h3>
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

                            {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">District / Tehsil</p>
                                                <h3 class="card-text text-amount">{{ $districtCount }} / {{ $tehsilCount }}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-city" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Tappa</p>
                                                <h3 class="card-text text-amount">{{ $tappaCount }}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-store-alt" aria-hidden="true"></i>
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
                                                <p class="card-title text-title">UC</p>
                                                <h3 class="card-text text-amount">{{ $ucCount }}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-warehouse" aria-hidden="true"></i>
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
            {{-- <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="box--sec">
                    <div id="chart2"></div>
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
            </div> --}}

        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('field_officer_panel.include.footer_copyright_include')
</footer>

@include('field_officer_panel.include.footer_include')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var options = {
            chart: {
                type: 'bar',
                height: 450,
                stacked: true,
                toolbar: {
                    show: false
                },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 800,
                    animateGradually: {
                        enabled: true,
                        delay: 150
                    }
                }
            },
            series: [{
                name: 'Farmers Status',
                data: [500, 300, 150] // Example data: Total Farmers, Verified Farmers, Unverified Farmers
            }],
            xaxis: {
                categories: ['Total Farmers', 'Verified Farmers', 'Unverified Farmers'],
                title: {
                    text: 'Categories',
                    style: {
                        fontSize: '14px',
                        fontWeight: 'bold',
                        color: '#333'
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Number of Farmers',
                    style: {
                        fontSize: '14px',
                        fontWeight: 'bold',
                        color: '#333'
                    }
                },
                labels: {
                    formatter: function(val) {
                        return val;
                    }
                }
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    barHeight: '50%',
                    distributed: true
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return val;
                },
                style: {
                    fontSize: '12px',
                    colors: ['#fff']
                }
            },
            colors: ['#1c5a32', '#1ea954', '#1de231'],
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f9f9f9', 'transparent'], // alternating row colors
                    opacity: 0.5
                }
            },
            tooltip: {
                theme: 'dark',
                y: {
                    formatter: function(val) {
                        return val + " farmers";
                    }
                }
            },
            title: {
                text: 'Farmers Status',
                align: 'center',
                style: {
                    fontSize: '20px',
                    color: '#333'
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();
    });
</script>


<script>
    // Static data for demonstration
    var data = [{
            tehsil: 'Tehsil 1',
            totalFarmers: 100,
            verifiedFarmers: 70,
            unverifiedFarmers: 30
        },
        {
            tehsil: 'Tehsil 2',
            totalFarmers: 80,
            verifiedFarmers: 50,
            unverifiedFarmers: 30
        },
        {
            tehsil: 'Tehsil 3',
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
