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
                            <h4 class="card-title">Registered Online Farmers</h4>
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
                                            <th>Registration Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>201</td>
                                            <td>Maryam Ali</td>
                                            <td>789-012-3456</td>
                                            <td>987 Maple St, Lahore</td>
                                            <td>Lahore</td>
                                            <td>Garden Town</td>
                                            <td>2024-05-20</td>
                                        </tr>
                                        <tr>
                                            <td>202</td>
                                            <td>Ahmed Hassan</td>
                                            <td>012-345-6789</td>
                                            <td>654 Birch St, Faisalabad</td>
                                            <td>Faisalabad</td>
                                            <td>D Ground</td>
                                            <td>2024-05-19</td>
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