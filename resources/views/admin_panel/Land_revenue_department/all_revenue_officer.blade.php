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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Revenue Officer</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th><strong>Sno</strong></th>
                                            <th><strong>Full Name</strong></th>
                                            <th><strong>Contact Number</strong></th>
                                            <th><strong>Address</strong></th>
                                            <th><strong>Email Address</strong></th>
                                            <th><strong>District <br> Tehsil</strong></th>
                                            <th><strong>Username</strong></th>
                                            <th><strong>Lock</strong></th>
                                            <th class="text-end"><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_revenue as $revenue)
                                        <tr>
                                            <td><strong>{{ $loop->iteration }}</strong></td>
                                            <td>{{ $revenue->full_name }}</td>
                                            <td>{{ $revenue->contact_number }}</td>
                                            <td>{{ $revenue->address }}</td>
                                            <td>{{ $revenue->email_address }}</td>
                                            <td>{{ $revenue->district }} <br> {{ $revenue->tehsil }} </td>
                                            <td>{{ $revenue->username }}</td>
                                            <td>LOCK</td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end">
                                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                </div>
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
