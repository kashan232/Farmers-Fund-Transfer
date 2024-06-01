@include('agriculture_officer_panel.include.header_include')

<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    @include('agriculture_officer_panel.include.navbar_include')

    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    @include('agriculture_officer_panel.include.sidebar_include')

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
                            <h4 class="card-title">All District</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>CNIC</th>
                                            <th>District</th>
                                            <th>Tehsil</th>
                                            <th>UC</th>
                                            <th>Area</th>
                                            <th>Mobile</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_agriculture_farmers as $all_agriculture_farmer)
                                        <tr>
                                            <td>{{ $all_agriculture_farmer->name }}</td>
                                            <td>{{ $all_agriculture_farmer->cnic }}</td>
                                            <td>{{ $all_agriculture_farmer->district }}</td>
                                            <td>{{ $all_agriculture_farmer->tehsil }}</td>
                                            <td>{{ $all_agriculture_farmer->uc }}</td>
                                            <td>{{ $all_agriculture_farmer->area }}</td>
                                            <td>{{ $all_agriculture_farmer->mobile }}</td>
                                            <td>{{ $all_agriculture_farmer->verification_status }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa-solid fa-eye"></i></a>
                                                        <a href="" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa-solid fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </td>
                                        </tr>
                                        @endforeach
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
   @include('agriculture_officer_panel.include.footer_copyright_include')
    <!--**********************************
            Footer end
        ***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('agriculture_officer_panel.include.footer_include')

</body>
</html>
