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
                            <h4 class="card-title">All Tehsil</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th style="width:50px;">
                                                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                    <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th><strong>Sno</strong></th>
                                            <th><strong>District Name</strong></th>
                                            <th><strong>Tehsil</strong></th>
                                            <th class="text-end"><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                    <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                                    <label class="form-check-label" for="customCheckBox2"></label>
                                                </div>
                                            </td>
                                            <td><strong>1</strong></td>
                                            <td>Mirpur Khas</td>
                                            <td>HUSSAIN BUX MARI</td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end">
                                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
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
