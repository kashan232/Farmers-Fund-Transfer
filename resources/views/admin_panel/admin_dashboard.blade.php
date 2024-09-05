@include('admin_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('admin_panel.include.sidebar_include')
<!-- [ Header Topbar ] start -->
@include('admin_panel.include.navbar_include')
<style>
    .chart {
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }
</style>
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
                                                <p class="card-title text-title">District / Tehsil</p>
                                                <h3 class="card-text text-amount">32 / 168</h3>
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
                                                <p class="card-title text-title">Tappa</p>
                                                <h3 class="card-text text-amount">250</h3>
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
                                                <h3 class="card-text text-amount">500</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-warehouse" aria-hidden="true"></i>
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
                                                <p class="card-title text-title">Agriculture User</p>
                                                <h3 class="card-text text-amount">20</h3>
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
                                                <p class="card-title text-title">Agriculture Officer</p>
                                                <h3 class="card-text text-amount">{{ $AgricultureOfficer }}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-user-shield" aria-hidden="true"></i>
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
                                                <p class="card-title text-title">Land Revenue</p>
                                                <h3 class="card-text text-amount">{{ $LandRevenueDepartment }}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-user-tie" aria-hidden="true"></i>
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
                                                <h3 class="card-text text-amount">{{ $totalEntries }}</h3>
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
                                                <h3 class="card-text text-amount">{{ $TotalVerifiedfarmers }}</h3>
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
                                                <h3 class="card-text text-amount">{{ $TotalUnverifiedfarmer }}</h3>
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
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div id="chart" class="chart"></div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div id="chart2" class="chart"></div>
            </div>


            <!-- {{-- graph one --}} -->
            <!-- <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <div>
                            <p> District Wise Agriculture Farmers</p>
                        </div>
                    </div>
                    <div id="chart" style="width: 100%;"></div>
                </div>
            </div> -->
            <!-- {{-- graph one end --}} -->

            <!-- {{-- graph 2 --}} -->
            <!-- <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <div>
                            <p> District Wise Land Revenue Farmers</p>
                        </div>
                    </div>
                    <div id="chart2" style="width: 100%;"></div>
                </div>
            </div> -->
            <!-- {{-- graph 2 end --}} -->

            <!-- {{-- graph 3 --}} -->
            <!-- <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="box--sec">
                    <div class="top-heading">
                        <div>
                            <p> District Wise Online Registered Farmers</p>
                        </div>
                    </div>
                    <div id="chart3" style="width: 100%;"></div>
                </div>
            </div> -->
            <!-- {{-- graph 3 end --}} -->

            <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                <div class="tabel--box">
                    <div class="table-responsive">
                        <table class="table table-hover bg-white">
                            <thead class="text-center" style="background:#2A7D4A;">
                                <tr>
                                    <th scope="col">District</th>
                                    <th scope="col">Total Farmers</th>
                                    <th scope="col">Withdraw Farmers</th>
                                    <th scope="col">Withdraw Amount</th>
                                    <th scope="col">Remaining Farmers</th>
                                    <th scope="col">Persentage Served</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>Badin</td>
                                    <td>12,794</td>
                                    <td>8,590</td>
                                    <td>179,229,500</td>
                                    <td>4,204</td>
                                    <td>67%</td>
                                </tr>
                                <tr>
                                    <td>DADU </td>
                                    <td>9617</td>
                                    <td>7,055</td>
                                    <td>199,081,500</td>
                                    <td>2562</td>
                                    <td>73%</td>
                                </tr>
                                <tr>
                                    <td>GHOTKI </td>
                                    <td>9,349 </td>
                                    <td>6,652</td>
                                    <td>173,447,500</td>
                                    <td>2,697</td>
                                    <td>71%</td>
                                </tr>

                                <tr>
                                    <td>HYDERABAD </td>
                                    <td>517 </td>
                                    <td>356 </td>
                                    <td>9,317,000</td>
                                    <td>161 </td>
                                    <td>69%</td>
                                </tr>

                                <tr>
                                    <td>JACOBABAD</td>
                                    <td>4351</td>
                                    <td>3,128</td>
                                    <td>97,623,500</td>
                                    <td>1223</td>
                                    <td>72%</td>
                                </tr>

                                <tr>
                                    <td>JAMSHORO </td>
                                    <td>3220</td>
                                    <td>1,867</td>
                                    <td>54,477,000</td>
                                    <td>1353</td>
                                    <td>58%</td>
                                </tr>

                                <tr>
                                    <td>KAMBAR SHAHDADKOT</td>
                                    <td>9,052</td>
                                    <td>6,669</td>
                                    <td>195,494,000</td>
                                    <td>2,383</td>
                                    <td>74%</td>
                                </tr>

                                <tr>
                                    <td>KASHMORE </td>
                                    <td>2,718</td>
                                    <td>1,960</td>
                                    <td>66,326,500</td>
                                    <td>758 </td>
                                    <td>72%</td>
                                </tr>


                                <tr>
                                    <td>KHAIRPUR </td>
                                    <td>20,952</td>
                                    <td>15,118</td>
                                    <td>365,920,000</td>
                                    <td>5,834</td>
                                    <td>72%</td>
                                </tr>



                                <tr>
                                    <td>LARKANA </td>
                                    <td>9177</td>
                                    <td>6897</td>
                                    <td>172,080500</td>
                                    <td>2,280</td>
                                    <td>75%</td>
                                </tr>


                                <tr>
                                    <td>MALIR </td>
                                    <td>70 </td>
                                    <td>56 </td>
                                    <td>2,017,000</td>
                                    <td>14</td>
                                    <td>80%</td>
                                </tr>


                                <tr>
                                    <td>MATIARI </td>
                                    <td>4114</td>
                                    <td>2938 </td>
                                    <td>69,018,000</td>
                                    <td>1176</td>
                                    <td>71%</td>
                                </tr>


                                <tr>
                                    <td>MIRPUR KHAS</td>
                                    <td>11,904</td>
                                    <td>6,298</td>
                                    <td>118,058,000</td>
                                    <td>5,606 </td>
                                    <td>53%</td>
                                </tr>


                                <tr>
                                    <td>NAUSHAHRO FEROZE</td>
                                    <td>12,801</td>
                                    <td>9,075</td>
                                    <td>231,506,000</td>
                                    <td>3,726</td>
                                    <td>71%</td>
                                </tr>

                                <tr>
                                    <td>SANGHAR </td>
                                    <td>25,362</td>
                                    <td>16,310</td>
                                    <td>313,654,500</td>
                                    <td>9,052</td>
                                    <td>64%</td>
                                </tr>

                                <tr>
                                    <td>SHAHEED BENAZIRABAD</td>
                                    <td>17,347</td>
                                    <td>12,372</td>
                                    <td>294,321,000</td>
                                    <td>4,975</td>
                                    <td>71%</td>
                                </tr>

                                <tr>
                                    <td>SHIKARPUR </td>
                                    <td>7415</td>
                                    <td>5183 </td>
                                    <td>129330500 </td>
                                    <td>2232</td>
                                    <td>70%</td>
                                </tr>

                                <tr>
                                    <td>SUJAWAL </td>
                                    <td>3,759</td>
                                    <td>2,554</td>
                                    <td>46,114,000</td>
                                    <td>1,205</td>
                                    <td>68%</td>
                                </tr>

                                <tr>
                                    <td>SUKKUR </td>
                                    <td>6473 </td>
                                    <td>4349</td>
                                    <td>118278500</td>
                                    <td>2,124</td>
                                    <td>67%</td>
                                </tr>

                                <tr>
                                    <td>TANDO ALLAH YAR</td>
                                    <td>4,058</td>
                                    <td>2,657</td>
                                    <td>61,205,000</td>
                                    <td>1,401</td>
                                    <td>65%</td>
                                </tr>

                                <tr>
                                    <td>TANDO MUHAMMAD KHAN</td>
                                    <td>1,914</td>
                                    <td>1,186</td>
                                    <td>26,400,000</td>
                                    <td>728 </td>
                                    <td>62%</td>
                                </tr>

                                <tr>
                                    <td>THARPARKAR </td>
                                    <td>687 </td>
                                    <td>390 </td>
                                    <td>5,109,500 </td>
                                    <td>297 </td>
                                    <td>57%</td>
                                </tr>

                                <tr>
                                    <td>THATTA </td>
                                    <td>2,602 </td>
                                    <td>1,832 </td>
                                    <td>38,785,000 </td>
                                    <td>770 </td>
                                    <td>70%</td>
                                </tr>

                                <tr>
                                    <td>UMER KOT</td>
                                    <td>5675</td>
                                    <td>3,363</td>
                                    <td>61,711,500</td>
                                    <td>2312</td>
                                    <td>59%</td>
                                </tr>

                                <tr>
                                    <td>Rest of Pakistan</td>
                                    <td>1,450</td>
                                    <td>1,346</td>
                                    <td>26,212,000</td>
                                    <td>104 </td>
                                    <td>93%</td>
                                </tr>

                                <tr>
                                    <td style="font-weight: bold;">Total </td>
                                    <td style="font-weight: bold;">185,928 </td>
                                    <td style="font-weight: bold;">128,201</td>
                                    <td style="font-weight: bold;">3,054,717,500 </td>
                                    <td style="font-weight: bold;">57,727</td>
                                    <td style="font-weight: bold;">69%</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
        @include('admin_panel.include.footer_copyright_include')
    </footer>

    @include('admin_panel.include.footer_include')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                chart: {
                    type: 'bar',
                    height: 450,
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
                    name: 'AO',
                    data: [30, 40, 35, 50]
                }, {
                    name: 'LD',
                    data: [20, 30, 25, 40]
                }, {
                    name: 'AU',
                    data: [10, 15, 20, 25]
                }, {
                    name: 'Online',
                    data: [15, 25, 20, 30]
                }],
                xaxis: {
                    categories: ['Badin', 'Dadu', 'Ghotki', 'Hyderabad'],
                    title: {
                        text: 'Districts'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Number of Registrations'
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        dataLabels: {
                            position: 'top'
                        }
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val;
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#304758"]
                    }
                },
                colors: ['#2A7D4A', '#1EA954', '#1DE231', '#93FB79'],
                grid: {
                    borderColor: '#e7e7e7',
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // alternating row colors
                        opacity: 0.5
                    }
                },
                tooltip: {
                    theme: 'dark',
                    y: {
                        formatter: function(val) {
                            return val + " registrations";
                        }
                    }
                },
                title: {
                    text: 'Farmer Registrations by District',
                    align: 'center',
                    style: {
                        fontSize: '20px',
                        color: '#333'
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        });
    </script>


    <script>
       document.addEventListener('DOMContentLoaded', function() {
    var totalFarmers = 220; // This will be the total number of farmers
    var options = {
        chart: {
            type: 'donut',
            height: 450,
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
        series: [70, 50, 40, 30, 20, 10], // Series data representing farmers
        colors: ['#2A7D4A', '#1EA954', '#1DE231', '#93FB79', '#EAD93F', '#F0B10F'],
        labels: ['Draft', 'Unverified', 'Verified', 'Verification Requested', 'Approved by District Officer', 'Sent to Land Department'],
        plotOptions: {
            pie: {
                donut: {
                    labels: {
                        show: true,
                        total: {
                            show: true,
                            label: 'Total Farmers',
                            formatter: function() {
                                return totalFarmers;  // Show the total number of farmers in the center
                            },
                            style: {
                                fontSize: '18px',
                                fontWeight: 'bold',
                                color: '#333'
                            }
                        }
                    }
                }
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function(val, opts) {
                // Only show the number, not the percentage
                return opts.w.globals.series[opts.seriesIndex];
            },
            style: {
                fontSize: '14px',
                colors: ["#fff"] // Color of the number inside the doughnut
            }
        },
        legend: {
            position: 'bottom'
        },
        title: {
            text: 'Farmer Registration Status',
            align: 'center',
            style: {
                fontSize: '20px',
                color: '#333'
            }
        },
        tooltip: {
            theme: 'dark',
            y: {
                formatter: function(val) {
                    return val + " registrations";  // Tooltip showing the number of registrations
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart2"), options);
    chart.render();
});

    </script>

    <!-- <script>
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
                    name: 'Draft',
                    data: [10, 20, 15, 25]
                }, {
                    name: 'Unverified',
                    data: [5, 10, 7, 12]
                }, {
                    name: 'Verified',
                    data: [8, 12, 10, 14]
                }, {
                    name: 'Verification Requested',
                    data: [4, 6, 5, 7]
                }, {
                    name: 'Approved by District Officer',
                    data: [6, 8, 7, 9]
                }, {
                    name: 'Sent to Land Department',
                    data: [3, 5, 4, 6]
                }],
                xaxis: {
                    categories: ['Badin', 'Dadu', 'Ghotki', 'Hyderabad'],
                    title: {
                        text: 'Districts',
                        style: {
                            fontSize: '14px',
                            fontWeight: 'bold',
                            color: '#333'
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Number of Registrations',
                        style: {
                            fontSize: '14px',
                            fontWeight: 'bold',
                            color: '#333'
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val;
                    },
                    style: {
                        fontSize: '12px',
                        colors: ["#304758"]
                    }
                },
                colors: ['#00E396', '#FEB019', '#FF4560', '#775DD0', '#66DA26', '#546E7A'].map(color => lightenColor(color, 40)),
                grid: {
                    borderColor: '#e7e7e7',
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // alternating row colors
                        opacity: 0.5
                    }
                },
                tooltip: {
                    theme: 'dark',
                    y: {
                        formatter: function(val) {
                            return val + " registrations";
                        }
                    }
                },
                title: {
                    text: 'Farmer Registration Status   ',
                    align: 'center',
                    style: {
                        fontSize: '20px',
                        color: '#333'
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart2"), options);
            chart.render();

            function lightenColor(color, percent) {
                var num = parseInt(color.slice(1), 16),
                    amt = Math.round(2.55 * percent),
                    R = (num >> 16) + amt,
                    G = (num >> 8 & 0x00FF) + amt,
                    B = (num & 0x0000FF) + amt;
                return '#' + (0x1000000 + (R < 255 ? R < 1 ? 0 : R : 255) * 0x10000 + (G < 255 ? G < 1 ? 0 : G : 255) * 0x100 + (B < 255 ? B < 1 ? 0 : B : 255)).toString(16).slice(1);
            }
        });
    </script> -->



    <!-- <script>
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
                    colors: {
                        ranges: [{
                            from: 0,
                            to: Infinity,
                            color: '#4ba064'
                        }]
                    }
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
    </script> -->

    <!-- <script>
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
                    colors: {
                        ranges: [{
                            from: 0,
                            to: Infinity,
                            color: '#4ba064'
                        }]
                    }
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
    </script> -->

    <!-- <script>
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
                    colors: {
                        ranges: [{
                            from: 0,
                            to: Infinity,
                            color: '#4ba064'
                        }]
                    }
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
    </script> -->

    </body>

    </html>