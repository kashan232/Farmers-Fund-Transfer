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

        

        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('land_revenue_panel.include.footer_copyright_include')
</footer>

@include('land_revenue_panel.include.footer_include')


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
