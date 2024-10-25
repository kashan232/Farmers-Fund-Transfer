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
                                                <p class="card-title text-title">Field Officers</p>
                                                <h3 class="card-text text-amount">10</h3>
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
                    <div id="farmersChart"></div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <div>
                            <p> Field Officer</p>
                        </div>
                    </div>
                    <div id="fieldOfficerChart"></div>
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
    // Data for Tehsil-wise farmer counts under a district officer
var data = [
    {
        tehsil: 'Hyderabad City',
        totalFarmers: 150,
        verifiedFarmers: 120,
        pendingFarmers: 30
    },
    {
        tehsil: 'Qasimabad',
        totalFarmers: 100,
        verifiedFarmers: 80,
        pendingFarmers: 20
    },
    {
        tehsil: 'Latifabad',
        totalFarmers: 90,
        verifiedFarmers: 70,
        pendingFarmers: 20
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
        name: 'Pending Farmers',
        data: data.map(function(item) {
            return item.pendingFarmers;
        })
    }],
    chart: {
        type: 'bar',
        height: 400,
        stacked: true,  // Stacked bar to show different statuses of farmers
        toolbar: {
            show: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: true,
            borderRadius: 8,  // Rounded bars for smooth appearance
            barHeight: '60%'
        }
    },
    colors: ['#3e7350', '#40b66d', '#a2fb8c'],  // Colors for Total, Verified, and Pending farmers
    dataLabels: {
        enabled: true,
        style: {
            fontSize: '12px',
            fontWeight: 'bold',
            colors: ['#ffffff']  // Data label color in white for contrast
        },
        formatter: function(val) {
            return val + " farmers";  // Proper label showing farmer count
        }
    },
    xaxis: {
        categories: data.map(function(item) {
            return item.tehsil;
        }),
        title: {
            text: 'Farmers Count',
            style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
            }
        },
        labels: {
            style: {
                colors: '#4a4a4a',
                fontSize: '12px'
            },
            formatter: function(val) {
                return val.toFixed(0) + ' farmers';  // Show whole numbers with 'farmers'
            }
        }
    },
    yaxis: {
        title: {
            text: 'Tehsil',
            style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
            }
        }
    },
    grid: {
        strokeDashArray: 4,
        borderColor: '#e0e0e0'  // Soft gridlines for clean appearance
    },
    tooltip: {
        enabled: true,
        shared: true,
        intersect: false,
        y: {
            formatter: function(val) {
                return val + " farmers";  // Tooltip showing farmer counts
            }
        },
        style: {
            fontSize: '13px'
        }
    },
    legend: {
        position: 'top',
        horizontalAlign: 'center',
        fontSize: '14px',
        labels: {
            colors: '#4a4a4a'
        }
    }
};

// Render the chart
var chart = new ApexCharts(document.querySelector("#farmersChart"), options);
chart.render();

// Data for Field Officer counts in each tehsil
var data = [
    {
        tehsil: 'Hyderabad City',
        totalFieldOfficers: 10
    },
    {
        tehsil: 'Qasimabad',
        totalFieldOfficers: 7
    },
    {
        tehsil: 'Latifabad',
        totalFieldOfficers: 5
    }
];

var options = {
    series: [{
        name: 'Field Officers',
        data: data.map(function(item) {
            return item.totalFieldOfficers;
        })
    }],
    chart: {
        type: 'bar',
        height: 350,
        toolbar: {
            show: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: true,
            borderRadius: 8,  // Rounded bars
            barHeight: '60%'
        }
    },
    colors: ['#3e7350'],  // Green color for Field Officers
    dataLabels: {
        enabled: true,
        style: {
            fontSize: '12px',
            fontWeight: 'bold',
            colors: ['#ffffff']  // White text for contrast
        },
        formatter: function(val) {
            return val + " officers";  // Label shows number of field officers
        }
    },
    xaxis: {
        categories: data.map(function(item) {
            return item.tehsil;
        }),
        title: {
            text: 'Field Officer Count',
            style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
            }
        },
        labels: {
            style: {
                colors: '#4a4a4a',
                fontSize: '12px'
            },
            formatter: function(val) {
                return val.toFixed(0) + ' officers';  // Show whole numbers with 'officers'
            }
        }
    },
    yaxis: {
        title: {
            text: 'Tehsil',
            style: {
                fontSize: '14px',
                fontWeight: 'bold',
                color: '#333'
            }
        }
    },
    grid: {
        strokeDashArray: 4,
        borderColor: '#e0e0e0'  // Soft gridlines
    },
    tooltip: {
        enabled: true,
        y: {
            formatter: function(val) {
                return val + " officers";  // Tooltip shows officer count
            }
        },
        style: {
            fontSize: '13px'
        }
    },
    legend: {
        show: false  // No legend needed for a single data series
    }
};

// Render the chart
var chart = new ApexCharts(document.querySelector("#fieldOfficerChart"), options);
chart.render();
</script>

</body>

</html>
