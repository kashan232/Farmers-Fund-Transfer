@include('pd_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->

<!-- [ Sidebar Menu ] start -->
@include('pd_officer_panel.include.sidebar_include')
<!-- [ Sidebar Menu ] end -->

<!-- [ Header Topbar ] start -->
@include('pd_officer_panel.include.navbar_include')
<!-- [ Header ] end -->



<style>
   .tables nav{
        display: flex;
        justify-content: right;
    }
</style>
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-12">
                <div class="dashboard">
                    <div class="all-card">
                        <div class="row">
                            <!-- Total Farmers Card -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Total Farmers</p>
                                                <h3 class="card-text text-amount">{{$fa_total_Registered_Farmers}}</h3>
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



                             <!-- Verified Farmers Card -->
                             <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">On Process Farmers</p>
                                                <h3 class="card-text text-amount">{{$Processfarmeragiruser}}</h3>
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

                            <!-- Verified Farmers Card -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Verified Farmers</p>
                                                <h3 class="card-text text-amount">{{$Verifiedfarmeragiruser}}</h3>
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
                            <!-- Rejected Farmers Card -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Unverified Farmers</p>
                                                <h3 class="card-text text-amount">{{$Unverifiedfarmeragiruser}}</h3>
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




                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>District Wise Field Officers</h3>
                                        <div class="row tables">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th>Districts</th>
                                                    <th>Total Field Officers</th>
                                                </thead>
                                                <tbody>
                                                    @foreach($usersByDistrict as $data)
                                                        <tr>
                                                            <td>{{ $data->district }}</td>
                                                            <td>{{ $data->total_users }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $usersByDistrict->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>District Wise Farmers</h3>
                                        <div class="row tables">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th>Districts</th>
                                                    <th>Total Farmers</th>
                                                </thead>
                                                <tbody>
                                                    @foreach($farmersByDistrict as $data)
                                                        <tr>
                                                            <td>{{ $data->district }}</td>
                                                            <td>{{ $data->total_farmers }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                       
                                    </div>
                                    {{ $farmersByDistrict->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<footer class="pc-footer">
    @include('pd_officer_panel.include.footer_copyright_include')
</footer>

@include('pd_officer_panel.include.footer_include')

<!-- Chart Scripts -->
<script>
    // Donut Charts Data and Configurations
    const ownFarmerData = [100, 80, 20];
    const landRevenueData = [120, 90, 30];
    const fieldOfficerData = [90, 70, 20];

    function renderDonutChart(elementId, data, total) {
        const options = {
            series: data,
            chart: {
                type: 'donut',
                height: 400
            },
            labels: ['Registered Farmers', 'Verified Farmers', 'Rejected Farmers'],
            colors: ['#dfd930', '#d9534f', '#5cc183'],
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
    renderDonutChart("#landRevenueChart", landRevenueData, 120);
    renderDonutChart("#fieldOfficerRegistrationChart", fieldOfficerData, 90);

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
        colors: ['#dfd930', '#d9534f', '#5cc183'],
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
    // Field Officer Count Chart Data and Configurations
    const fieldOfficerOptions = {
        series: [{
            name: 'Field Officers',
            data: [10, 7, 5]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: true,
                borderRadius: 8,
                barHeight: '60%'
            }
        },
        colors: ['#3e7350'],
        dataLabels: {
            enabled: true,
            formatter: (val) => `${val} officers`
        },
        xaxis: {
            categories: ['Hyderabad City', 'Qasimabad', 'Latifabad'],
            title: {
                text: 'Field Officer Count'
            }
        },
        yaxis: {
            title: {
                text: 'Tehsil'
            }
        }
    };
    new ApexCharts(document.querySelector("#fieldOfficerChart"), fieldOfficerOptions).render();
</script>

</body>

</html>
