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
                            <h4 class="card-title">Exam Toppers</h4>
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
                                            <th><strong>ROLL NO.</strong></th>
                                            <th><strong>NAME</strong></th>
                                            <th><strong>Email</strong></th>
                                            <th><strong>Date</strong></th>
                                            <th><strong>Status</strong></th>
                                            <th class="text-end"><strong>Acttion</strong></th>
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
                                            <td><strong>542</strong></td>
                                            <td><div class="d-flex align-items-center"><img src="images/avatar/1.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">Dr. Jackson</span></div></td>
                                            <td>example@example.com	</td>
                                            <td>01 August 2020</td>
                                            <td><div class="d-flex align-items-center"><i class="fa fa-circle text-success me-1"></i> Successful</div></td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end">
                                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                    <input type="checkbox" class="form-check-input" id="customCheckBox3" required="">
                                                    <label class="form-check-label" for="customCheckBox3"></label>
                                                </div>
                                            </td>
                                            <td><strong>542</strong></td>
                                            <td><div class="d-flex align-items-center"><img src="images/avatar/2.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">Dr. Jackson</span></div></td>
                                            <td>example@example.com	</td>
                                            <td>01 August 2020</td>
                                            <td><div class="d-flex align-items-center"><i class="fa fa-circle text-danger me-1"></i> Canceled</div></td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end">
                                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                    <input type="checkbox" class="form-check-input" id="customCheckBox4" required="">
                                                    <label class="form-check-label" for="customCheckBox4"></label>
                                                </div>
                                            </td>
                                            <td><strong>542</strong></td>
                                            <td><div class="d-flex align-items-center"><img src="images/avatar/3.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">Dr. Jackson</span></div></td>
                                            <td>example@example.com	</td>
                                            <td>01 August 2020</td>
                                            <td><div class="d-flex align-items-center"><i class="fa fa-circle text-warning me-1"></i> Pending</div></td>
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
