@include('admin_panel.include.header_include')

<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    @include('admin_panel.include.navbar_include')

    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    @include('admin_panel.include.sidebar_include')

    <!--**********************************
            Sidebar end
        ***********************************-->

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Registered Agriculture Farmers</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Farmer ID</th>
                                            <th>Name</th>
                                            <th>Contact Number</th>
                                            <th>Address</th>
                                            <th>District</th>
                                            <th>Tehsil</th>
                                            <th>Crop Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>001</td>
                                            <td>Muhammad Ali</td>
                                            <td>123-456-7890</td>
                                            <td>123 Main St, Lahore</td>
                                            <td>Lahore</td>
                                            <td>Gulberg</td>
                                            <td>Wheat</td>
                                            <td><button class="btn btn-success btn-sm">Verified</button></td>
                                        </tr>
                                        <tr>
                                            <td>002</td>
                                            <td>Fatima Khan</td>
                                            <td>987-654-3210</td>
                                            <td>456 Elm St, Faisalabad</td>
                                            <td>Faisalabad</td>
                                            <td>Model Town</td>
                                            <td>Rice</td>
                                            <td><button class="btn btn-danger btn-sm">Unverified</button></td>
                                        </tr>
                                        <!-- More dummy entries can be added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
    @include('admin_panel.include.footer_copyright_include')
    <!--**********************************
            Footer end
        ***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('admin_panel.include.footer_include')
</body>

</html>