@include('field_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('field_officer_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('field_officer_panel.include.navbar_include')
<!-- [ Header ] end -->

<style>
    @media only screen and (max-width: 600px) {
        .dashboard-btns {
            display: unset !important;
        }
    }
</style>

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="dashboard">
                    <div class="all-card">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class=" dashboard-btns" style="display: none">
                                    <button class="btn btn-sm btn-primary mb-4">Add Farmer</button>
                                    <button class="btn btn-sm btn-primary mb-4">Farmers List</button>
                                    <button class="btn btn-sm btn-primary mb-4">Reporting</button>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title" style="font-size: 12px">Total Registered Farmers</p>
                                                <h3 class="card-text text-amount">{{ $fa_total_Registered_Farmers }}</h3>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape green-icon-bg">
                                                    <i class="fas fa-users" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">In-Process Farmers</p>
                                                <h3 class="card-text text-amount">{{ $onProcessFarmer }}</h3>
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


                            <div class="col-lg-6 col-md-6 col-sm-6">
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

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Unverified Farmers</p>
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


                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title"> My Registered Farmers</p>
                                                <h3 class="card-text text-amount">{{ $myRegisteredFarmers }}</h3>
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


                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Online Farmers </p>
                                                <h3 class="card-text text-amount">{{ $onlineFarmers }}</h3>
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


            <!-- Farmer Status Chart -->
            <div class="col-lg-12 ">
                <div class="box--sec">
                    <div class="top-heading">
                        <div>
                            <p> Farmers Rejection Status Overview </p>
                        </div>
                    </div>
                    <div id="farmerRejectionStatusBarChart"></div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('field_officer_panel.include.footer_copyright_include')
</footer>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@include('field_officer_panel.include.footer_include')
<!-- Farmer Completion Status Chart Script -->
<script>
    const rejectedByAO = 15;
    const rejectedByDD = 10;
    const rejectedByLRD = 5;

    const rejectionStatusOptions = {
        series: [
            {
                name: 'Rejected by AO',
                data: [rejectedByAO]
            },
            {
                name: 'Rejected by DD',
                data: [rejectedByDD]
            },
            {
                name: 'Rejected by LRD',
                data: [rejectedByLRD]
            }
        ],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '50%'
            }
        },
        colors: ['#5bbf83', '#d9534f', '#dfd930'],
        dataLabels: {
            enabled: true
        },
        xaxis: {
            categories: ['Rejection Status'],
            title: {
                text: 'Number of Farmers'
            }
        },
        yaxis: {
            title: {
                text: 'Rejection Category'
            }
        },
        legend: {
            position: 'top'
        }
    };

    new ApexCharts(document.querySelector("#farmerRejectionStatusBarChart"), rejectionStatusOptions).render();
</script>
</body>
</html>
