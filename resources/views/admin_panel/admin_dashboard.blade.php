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
                                <a href="{{ route('farmers') }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title">Total Farmers</p>
                                                    <h3 class="card-text text-amount">{{ $subsidyfarmers }}</h3>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon-shape green-icon-bg">
                                                        <i class="fas fa-user" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <a href="{{ route('all-district') }}">
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
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <a href="{{ route('all-tappa') }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title">Tappa / UC</p>
                                                    <h3 class="card-text text-amount">250 / 500</h3>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon-shape green-icon-bg">
                                                        <i class="fas fa-store-alt" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <a href="{{ route('all-revenue-officer') }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title">Land Officer</p>
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
                                </a>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <a href="{{ route('all-user') }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title">District Officer</p>
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
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <a href="{{ route('all-agri-officer') }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title">Field Officer</p>
                                                    <h3 class="card-text text-amount">23</h3>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon-shape green-icon-bg">
                                                        <i class="fas fa-user-shield" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- <div id="chart" class="chart"></div> -->
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="box--sec">
                    <div class="top-heading">
                        <div>
                            <p> District Wise Details Of Farmers</p>
                        </div>
                    </div>
                    <div id="horizontalBarFarmersChart" class="chart"></div>

                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="box--sec">
                    <div class="top-heading">
                        <div>
                            <p> District Wise Land Claim Of Farmers</p>
                        </div>
                    </div>
                    <div id="landClaimChart" class="chart"></div>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- not working -->
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
            var totalRegistrations = 220; // Adjust this to the actual total number of registrations
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
                series: [80, 50, 40, 30], // Updated values: [Online, Land Department, District Officer, Field Officer]
                colors: ['#4ba064', '#2a7d4a', '#1ea954', '#1de231'],
                labels: ['Online Registrations', 'Land Department Registrations', 'District Officer Registrations', 'Field Officer Registrations'],
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total Registrations',
                                    formatter: function() {
                                        return totalRegistrations; // Display the total number of registrations in the center
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
                        // Display the count, not the percentage
                        return opts.w.globals.series[opts.seriesIndex];
                    },
                    style: {
                        fontSize: '14px',
                        colors: ["#fff"]
                    }
                },
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'center'
                },
                title: {
                    text: 'Farmer Registration Overview by Role',
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
                            return val + " registrations"; // Show count in tooltip
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart2"), options);
            chart.render();
        });
    </script>

    <script>
        var data = [{
                "label": "Badin",
                "value": 39094
            },
            {
                "label": "Dadu",
                "value": 20113
            },
            {
                "label": "Ghotki",
                "value": 20820
            },
            {
                "label": "Hyderabad",
                "value": 3064
            },
            {
                "label": "Jacobabad",
                "value": 9928
            },
            {
                "label": "Jamshoro",
                "value": 9327
            },
            {
                "label": "Kashmore",
                "value": 6086
            },
            {
                "label": "Khairpur",
                "value": 42161
            },
            {
                "label": "Larkana",
                "value": 14672
            },
            {
                "label": "Matiari",
                "value": 6934
            },
            {
                "label": "Mirpur Khas",
                "value": 21591
            },
            {
                "label": "Naushahro Feroze",
                "value": 23919
            },
            {
                "label": "Shaheed Benazirabad",
                "value": 26911
            },
            {
                "label": "Sanghar",
                "value": 37071
            },
            {
                "label": "Shikarpur",
                "value": 12535
            },
            {
                "label": "Sukkur",
                "value": 14312
            },
            {
                "label": "Tando Muhammad Khan",
                "value": 2704
            },
            {
                "label": "Tharparkar",
                "value": 1067
            },
            {
                "label": "Thatta",
                "value": 3707
            },
            {
                "label": "Sujawal",
                "value": 4692
            },
            {
                "label": "Malir",
                "value": 267
            },
            {
                "label": "Qambar Shahdadkot",
                "value": 0
            },
            {
                "label": "Tando Allahyar",
                "value": 0
            },
            {
                "label": "Umerkot",
                "value": 0
            },
            {
                "label": "8 num",
                "value": 0
            }
        ];

        var options = {
            series: [{
                data: data.map(function(item) {
                    return item.value
                })
            }],
            chart: {
                type: 'bar',
                height: 600
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true
                }
            },
            xaxis: {
                categories: data.map(function(item) {
                    return item.label
                })
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '12px',
                    colors: ['#fff']
                }
            },
            colors: ['#3f8a5c'] // Same green color as in the image you shared
        };

        var chart = new ApexCharts(document.querySelector("#horizontalBarFarmersChart"), options);
        chart.render();
    </script>

    <script>
        var landData = [{
                "label": "Badin",
                "value": 50000
            }, // Example land claim in acres
            {
                "label": "Dadu",
                "value": 35000
            },
            {
                "label": "Ghotki",
                "value": 45000
            },
            {
                "label": "Hyderabad",
                "value": 25000
            },
            {
                "label": "Jacobabad",
                "value": 30000
            },
            {
                "label": "Jamshoro",
                "value": 20000
            },
            {
                "label": "Kashmore",
                "value": 40000
            },
            {
                "label": "Khairpur",
                "value": 55000
            },
            {
                "label": "Larkana",
                "value": 30000
            },
            {
                "label": "Matiari",
                "value": 15000
            },
            {
                "label": "Mirpur Khas",
                "value": 28000
            },
            {
                "label": "Naushahro Feroze",
                "value": 35000
            },
            {
                "label": "Shaheed Benazirabad",
                "value": 32000
            },
            {
                "label": "Sanghar",
                "value": 47000
            },
            {
                "label": "Shikarpur",
                "value": 24000
            },
            {
                "label": "Sukkur",
                "value": 29000
            },
            {
                "label": "Tando Muhammad Khan",
                "value": 18000
            },
            {
                "label": "Tharparkar",
                "value": 10000
            },
            {
                "label": "Thatta",
                "value": 22000
            },
            {
                "label": "Sujawal",
                "value": 26000
            },
            {
                "label": "Malir",
                "value": 5000
            },
            {
                "label": "Qambar Shahdadkot",
                "value": 15000
            },
            {
                "label": "Tando Allahyar",
                "value": 12000
            },
            {
                "label": "Umerkot",
                "value": 14000
            },
            {
                "label": "8 num",
                "value": 9000
            }
        ];

        var options = {
            series: [{
                data: landData.map(function(item) {
                    return item.value
                })
            }],
            chart: {
                type: 'bar',
                height: 600
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true
                }
            },
            xaxis: {
                categories: landData.map(function(item) {
                    return item.label
                })
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '12px',
                    colors: ['#000']
                }
            },
            colors: ['#40b66d'], // Green color to represent land
            title: {
                text: 'District-wise Land Claim (in Acres)',
                align: 'center',
                margin: 10,
                style: {
                    fontSize: '18px',
                    fontWeight: 'bold',
                    color: '#333'
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#landClaimChart"), options);
        chart.render();
    </script>

    </body>

    </html>
