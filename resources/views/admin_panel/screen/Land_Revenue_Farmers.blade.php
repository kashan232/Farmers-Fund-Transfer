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
                            <h4 class="card-title">Registered Land Revenue Farmers</h4>
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
                                            <th>Land Area (acres)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>101</td>
                                            <td>Aisha Ahmed</td>
                                            <td>456-789-0123</td>
                                            <td>789 Oak St, Multan</td>
                                            <td>Multan</td>
                                            <td>Sadar</td>
                                            <td>10</td>
                                        </tr>
                                        <tr>
                                            <td>102</td>
                                            <td>Abdul Rahman</td>
                                            <td>321-654-0987</td>
                                            <td>321 Pine St, Rawalpindi</td>
                                            <td>Rawalpindi</td>
                                            <td>Raja Bazaar</td>
                                            <td>5</td>
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