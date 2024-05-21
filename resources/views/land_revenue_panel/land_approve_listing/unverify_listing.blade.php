@include('land_revenue_panel.include.header_include')

<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    @include('land_revenue_panel.include.navbar_include')

    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    @include('land_revenue_panel.include.sidebar_include')

    <!--**********************************
            Sidebar end
        ***********************************-->

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">UnVerify Listing</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Property ID</th>
                                        <th>Title/Name of Property</th>
                                        <th>Location</th>
                                        <th>Owner's Name <br>Number</th>
                                        <th>District <br> Tehsil</th>
                                        <th>Land Area <br> Land Type</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Approval Status</th>
                                        <th>Approval Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>101</td>
                                        <td>Shams</td>
                                        <td>Latifabad Hyderabad</td>
                                        <td>Mr. Raza <br> 031777777</td>
                                        <td>Hyderabad <br> Latifabad</td>
                                        <td>1Acres <br> Agricultural Land:</td>
                                        <td>50LAc</td>
                                        <td>Kindly Approve</td>
                                        <td><button class="btn btn-danger">unverify</button></td>
                                        <td>21-5-2024</td>
                                    </tr>
                                    <tr>
                                        <td>101</td>
                                        <td>Shams</td>
                                        <td>Latifabad Hyderabad</td>
                                        <td>Mr. Raza <br> 031777777</td>
                                        <td>Hyderabad <br> Latifabad</td>
                                        <td>1Acres <br> Agricultural Land:</td>
                                        <td>50LAc</td>
                                        <td>Kindly Approve</td>
                                        <td><button class="btn btn-danger">unverify</button></td>
                                        <td>21-5-2024</td>
                                    </tr>
                                    <tr>
                                        <td>101</td>
                                        <td>Shams</td>
                                        <td>Latifabad Hyderabad</td>
                                        <td>Mr. Raza <br> 031777777</td>
                                        <td>Hyderabad <br> Latifabad</td>
                                        <td>1Acres <br> Agricultural Land:</td>
                                        <td>50LAc</td>
                                        <td>Kindly Approve</td>
                                        <td><button class="btn btn-danger">unverify</button></td>
                                        <td>21-5-2024</td>
                                    </tr>
                                    <tr>
                                        <td>101</td>
                                        <td>Shams</td>
                                        <td>Latifabad Hyderabad</td>
                                        <td>Mr. Raza <br> 031777777</td>
                                        <td>Hyderabad <br> Latifabad</td>
                                        <td>1Acres <br> Agricultural Land:</td>
                                        <td>50LAc</td>
                                        <td>Kindly Approve</td>
                                        <td><button class="btn btn-danger">unverify</button></td>
                                        <td>21-5-2024</td>
                                    </tr>
                                </tbody>
                            </table>
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
    @include('land_revenue_panel.include.footer_copyright_include')
    <!--**********************************
            Footer end
        ***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('land_revenue_panel.include.footer_include')

</body>

</html>
