@include('admin_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('admin_panel.include.sidebar_include')
<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('admin_panel.include.navbar_include')
<style>
    .list-group
    {
        padding: 4px 4px!important;
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
                                                    <h3 class="card-text text-amount">3333</h3>
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
                                <a href="#">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title">Total Complaints</p>
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
                                <a href="#">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title">Closed Complaints</p>
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
                                <a href="#">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title">In-Progress Complaints</p>
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
                                <a href="#">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-title text-title">UnResolved Complaints</p>
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


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
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

</body>

</html>