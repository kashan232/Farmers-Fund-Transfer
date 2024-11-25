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
                    <div class="all-card p-0" >
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Tehsil</p>
                                                <h3 class="card-text text-amount">{{ $tehsilCount }}</h3>
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
                                                <p class="card-title text-title">Total Farmers</p>
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

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="box--sec">
                    <div class="top-heading">
                        <p>Farmers Statistics</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 p-3">
                            <div class="chart-heading text-center pt-2 pb-2" style="font-weight: bold;">Online Farmer Registration</div>
                            <div class="chart-wrapper">
                                <div class="chart" id="onlinefarmers"></div>
                            </div>
                        </div>
                        <div class="col-md-4 p-3">
                            <div class="chart-heading text-center pt-2 pb-2" style="font-weight: bold;">District officer</div>
                            <div class="chart-wrapper">
                                <div class="chart" id="distirct_officer"></div>
                            </div>
                        </div>
                        <div class="col-md-4 p-3">
                            <div class="chart-heading text-center pt-2 pb-2" style="font-weight: bold;">Field Officer</div>
                            <div class="chart-wrapper">
                                <div class="chart" id="fieldOfficerRegistrationChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tehsil-Wise Farmer Statistics -->
            <div class="col-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <p>District Wise Farmers Registration</p>
                    </div>
                    <div id="districtOfficerTehsilWiseRegistrationChart"></div>
                </div>
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <div>
                            <p> Tehsil wise land claim</p>
                        </div>
                    </div>
                    <div id="landChart" style="width: 100%;"></div>
                </div>
            </div>



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
    // Data for Hyderabad district with verified farmers

     // Donut Charts Data and Configurations
     const ownFarmerData = [100, 80, 20];
    const district_data = [120, 90, 30];
    const fieldOfficerData = [90, 70, 20];

    function renderDonutChart(elementId, data, total) {
        const options = {
            series: data,
            chart: {
                type: 'donut',
                height: 400
            },
            labels: ['Registered Farmers', 'Verified Farmers', 'Rejected Farmers'],
            colors: ['#4ba064', '#5cc183', '#d9534f'],
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
    renderDonutChart("#distirct_officer", district_data, 120);
    renderDonutChart("#fieldOfficerRegistrationChart", fieldOfficerData, 90);

var data = [
    {
        tehsil: 'Hyderabad City',
        totalFarmers: 100,
        verifiedFarmers: 70
    },
    {
        tehsil: 'Qasimabad',
        totalFarmers: 80,
        verifiedFarmers: 50
    },
    {
        tehsil: 'Latifabad',
        totalFarmers: 60,
        verifiedFarmers: 40
    }
];



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
        colors: ['#4ba064', '#5cc183', '#d9534f'],
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

// Data for Tehsil-wise land claims (in acres)
var data = [
    {
        tehsil: 'Hyderabad City',
        totalLandholding: 100,
        totalAreaHari: 40,
        selfCultivatedLand: 50,
        fallowLand: 10
    },
    {
        tehsil: 'Qasimabad',
        totalLandholding: 80,
        totalAreaHari: 30,
        selfCultivatedLand: 40,
        fallowLand: 10
    },
    {
        tehsil: 'Latifabad',
        totalLandholding: 60,
        totalAreaHari: 25,
        selfCultivatedLand: 30,
        fallowLand: 5
    }
];

var options = {
    series: [{
        name: 'Total Landholding (Acre)',
        data: data.map(function(item) {
            return item.totalLandholding;
        })
    }, {
        name: 'Area with Hari(s)',
        data: data.map(function(item) {
            return item.totalAreaHari;
        })
    }, {
        name: 'Self-Cultivated Land',
        data: data.map(function(item) {
            return item.selfCultivatedLand;
        })
    }, {
        name: 'Fallow Land',
        data: data.map(function(item) {
            return item.fallowLand;
        })
    }],
    chart: {
        type: 'bar',
        height: 400,
        stacked: true,
        toolbar: {
            show: false
        },
        animations: {
            enabled: true,
            easing: 'easeinout',
            speed: 800
        }
    },
    plotOptions: {
        bar: {
            horizontal: true,
            barHeight: '60%',
            borderRadius: 8,  // Rounded bars for cleaner look
        }
    },
    colors: ['#3e7350', '#40b66d', '#3ee54f', '#a2fb8c'],  // Defined color scheme
    dataLabels: {
        enabled: true,
        style: {
            fontSize: '12px',
            fontWeight: 'bold',
            colors: ['#ffffff']  // Data label color in white for better contrast
        },
        formatter: function(val) {
            return val + " acres"; // Proper acre display in data labels
        }
    },
    xaxis: {
        categories: data.map(function(item) {
            return item.tehsil;
        }),
        title: {
            text: 'Landholding (Acres)',
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
                return val.toFixed(0) + ' acres'; // Show acres properly with no decimals
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
        borderColor: '#e0e0e0'  // Soft gridlines for cleaner layout
    },
    tooltip: {
        enabled: true,
        shared: true,
        intersect: false,
        y: {
            formatter: function(val) {
                return val + " acres";  // Tooltip showing acres for better context
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
var chart = new ApexCharts(document.querySelector("#landChart"), options);
chart.render();


</script>

</body>
</html>
