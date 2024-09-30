@include('admin_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('admin_panel.include.sidebar_include')
<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('admin_panel.include.navbar_include')
<style>
    .list-group {
        --bs-list-group-item-padding-x: 10px !important;
        --bs-list-group-item-padding-y: 6.666667px !important;
    }
</style>
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
                                <a href="#">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title">Total District</p>
                                                    <h3 class="card-text text-amount">56</h3>
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
                                <a href="#">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title"> Total Taluka </p>
                                                    <h3 class="card-text text-amount">168</h3>
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
                                <a href="#">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title">Total Complaints</p>
                                                    <h3 class="card-text text-amount">800</h3>
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
                                <a href="#">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title">Closed Complaints</p>
                                                    <h3 class="card-text text-amount">400</h3>
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
                                <a href="#">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title">In-Progress Complaints</p>
                                                    <h3 class="card-text text-amount">200</h3>
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
                                <a href="#">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title">UnResolved Complaints</p>
                                                    <h3 class="card-text text-amount">200</h3>
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


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-8">
                <div class="card">
                    <canvas id="complaintsChart" width="600" height="500"></canvas>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-info">
                    <div class="text-center pt-3 pb-3 w-100 bg-dark">
                        <h3 class="text-white mb-0">Districts</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Badin">Badin</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Ghotki">Ghotki</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Jacobabad">Jacobabad</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Kashmore">Kashmore</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Larkana">Larkana</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Mirpur Khas">Mirpur Khas</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Shaheed Benazirabad">Shaheed Benazirabad</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Sanghar">Sanghar</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Sukkur">Sukkur</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Tando Muhammad Khan">Tando Muhammad Khan</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Thatta">Thatta</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Sujawal">Sujawal</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Dadu">Dadu</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Hyderabad">Hyderabad</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Jamshoro">Jamshoro</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Khairpur">Khairpur</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Matiari">Matiari</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Naushahro Feroze">Naushahro Feroze</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Qambar Shahdadkot">Qambar Shahdadkot</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Shikarpur">Shikarpur</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Tando Allahyar">Tando Allahyar</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Tharparkar">Tharparkar</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Umerkot">Umerkot</a>
                                    </li>
                                    <li class="list-group-item district-link" style="font-size: 12px;">
                                        <a href="#" data-district-name="Malir">Malir</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-12 text-center mt-2">
                                <a href="#" class="btn btn-dark btn-sm">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('admin_panel.include.footer_copyright_include')
</footer>

@include('admin_panel.include.footer_include')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var cityLabels = ['Badin', 'Hyderabad', 'Dadu', 'Matiari', 'Umerkot']; // Static city labels
var complaintData1 = [10, 20, 15, 8, 12]; // Static data for 'Un-Resolved' complaints
var complaintData2 = [5, 7, 6, 3, 4]; // Static data for 'In-Progress' complaints
var complaintData3 = [25, 30, 20, 10, 15]; // Static data for 'Closed' complaints

var ctx = document.getElementById('complaintsChart').getContext('2d');

var complaintsChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: cityLabels,
        datasets: [{
                label: 'Un-Resolved',
                data: complaintData1,
                backgroundColor: 'rgba(49, 178, 67, 1)',
                borderColor: 'rgb(49, 178, 67, 1)',
                borderWidth: 1
            },
            {
                label: 'In-Progress',
                data: complaintData2,
                backgroundColor: 'rgba(64, 182, 109, 1)',
                borderColor: 'rgb(64, 182, 109, 1)',
                borderWidth: 1
            },
            {
                label: 'Closed',
                data: complaintData3,
                backgroundColor: 'rgba(73, 143, 100, 1)',
                borderColor: 'rgb(73, 143, 100, 1)',
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            x: {
                type: 'category',
            },
            y: {
                beginAtZero: true,
            }
        }
    }
});

</script>
</body>

</html>