@include('admin_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('admin_panel.include.sidebar_include')
<!-- [ Header Topbar ] start -->
@include('admin_panel.include.navbar_include')
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
                                                <h2 class="card-text text-amount">32 / 168</h2>
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
                                                <h2 class="card-text text-amount">250</h2>
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
                                                <h2 class="card-text text-amount">500</h2>
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
                                                <p class="card-title text-title">Agriculture User</p>
                                                <h2 class="card-text text-amount">20</h2>
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
                                                <p class="card-title text-title">Agriculture Officer</p>
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
                                    <div class="card-body" style="border-left: 4px solid #005362;">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Total Farmers</p>
                                                <h2 class="card-text text-amount">{{ $totalEntries }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape " style="background:#005362;">
                                                    <i class="fas fa-user" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body" style="border-left: 4px solid #033323;">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Verified Farmers</p>
                                                <h2 class="card-text text-amount">{{ $TotalVerifiedfarmers }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape" style="background:#4ba064;">
                                                    <i class="fas fa-user-check" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body" style="border-left: 4px solid #cf0000;">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">UnVerified Farmers</p>
                                                <h2 class="card-text text-amount">{{ $TotalUnverifiedfarmer }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape" style="background:#cf0000;">
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
            <!-- {{-- graph one --}} -->
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
            <!-- {{-- graph one end --}} -->

            <!-- {{-- graph 2 --}} -->
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
            <!-- {{-- graph 2 end --}} -->

            <!-- {{-- graph 3 --}} -->
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
            <!-- {{-- graph 3 end --}} -->

            <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
              <div class="tabel--box">
                <div class="table-responsive">
                  <table class="table table-striped border">
                    <thead class="text-center">
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
                        <td style="font-weight: bold; border-bottom: 1px solid #000;">Total </td>
                        <td style="border-bottom: 1px solid #000;">185,928 </td>
                        <td style="border-bottom: 1px solid #000;">128,201</td>
                        <td style="border-bottom: 1px solid #000;">3,054,717,500 </td>
                        <td style="border-bottom: 1px solid #000;">57,727</td>
                        <td style="border-bottom: 1px solid #000;">69%</td>
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
    </script>

    </body>

    </html>