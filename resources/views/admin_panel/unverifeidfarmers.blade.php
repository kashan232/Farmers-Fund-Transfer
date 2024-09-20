@include('admin_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('admin_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('admin_panel.include.navbar_include')
<!-- [ Header ] end -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class=dangerUnUnverified>Unverified Farmers</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="reports-table" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>CNIC</th>
                                <th>Mobile</th>
                                <th>District</th>
                                <th>Tehsil</th>
                                <th>UC</th>
                                <th>Tappa</th>
                                <th>Village</th>
                                <th>Status</th>
                                <th>Declined Reason</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Bilal Ahmed</td>
                                <td>42101-1122334-5</td>
                                <td>0301-1122334</td>
                                <td>Karachi</td>
                                <td>Landhi</td>
                                <td>UC-9</td>
                                <td>Tappa I</td>
                                <td>Malir</td>
                                <td>
                                    <span class="badge text-bg-danger">UnVerified</span>
                                </td>
                                <td>Incorrect CNIC Format</td>
                            </tr>
                            <tr>
                                <td>Sana Khan</td>
                                <td>61101-2233445-6</td>
                                <td>0315-2233445</td>
                                <td>Islamabad</td>
                                <td>Bani Gala</td>
                                <td>UC-7</td>
                                <td>Tappa J</td>
                                <td>Chak Shahzad</td>
                                <td>
                                    <span class="badge text-bg-danger">UnVerified</span>
                                </td>
                                <td>Missing Address Details</td>
                            </tr>
                            <tr>
                                <td>Farhan Ali</td>
                                <td>33100-3344556-7</td>
                                <td>0332-3344556</td>
                                <td>Lahore</td>
                                <td>Shalimar</td>
                                <td>UC-11</td>
                                <td>Tappa K</td>
                                <td>Model Town</td>
                                <td>
                                    <span class="badge text-bg-danger">UnVerified</span>
                                </td>
                                <td>Duplicate CNIC</td>
                            </tr>
                            <tr>
                                <td>Mariam Bibi</td>
                                <td>42201-4455667-8</td>
                                <td>0347-4455667</td>
                                <td>Karachi</td>
                                <td>Clifton</td>
                                <td>UC-12</td>
                                <td>Tappa L</td>
                                <td>Defence</td>
                                <td>
                                    <span class="badge text-bg-danger">UnVerified</span>
                                </td>
                                <td>Incomplete Land Ownership Proof</td>
                            </tr>
                            <tr>
                                <td>Usman Raza</td>
                                <td>34201-5566778-9</td>
                                <td>0304-5566778</td>
                                <td>Faisalabad</td>
                                <td>Saddar</td>
                                <td>UC-13</td>
                                <td>Tappa M</td>
                                <td>Peoples Colony</td>
                                <td>
                                    <span class="badge text-bg-danger">UnVerified</span>
                                </td>
                                <td>Inaccurate GPS Data</td>
                            </tr>
                            <tr>
                                <td>Shahid Mehmood</td>
                                <td>35202-6677889-1</td>
                                <td>0322-6677889</td>
                                <td>Multan</td>
                                <td>Cantt</td>
                                <td>UC-14</td>
                                <td>Tappa N</td>
                                <td>Shershah</td>
                                <td>
                                    <span class="badge text-bg-danger">UnVerified</span>
                                </td>
                                <td>Missing Documentation</td>
                            </tr>
                            <tr>
                                <td>Rabia Malik</td>
                                <td>51201-7788990-2</td>
                                <td>0331-7788990</td>
                                <td>Rawalpindi</td>
                                <td>Saddar</td>
                                <td>UC-15</td>
                                <td>Tappa O</td>
                                <td>Peshawar Road</td>
                                <td>
                                    <span class="badge text-bg-danger">UnVerified</span>
                                </td>
                                <td>Incorrect CNIC Information</td>
                            </tr>
                            <tr>
                                <td>Zeeshan Ali</td>
                                <td>61101-8899001-3</td>
                                <td>0320-8899001</td>
                                <td>Quetta</td>
                                <td>Sibi</td>
                                <td>UC-16</td>
                                <td>Tappa P</td>
                                <td>Musa Colony</td>
                                <td>
                                    <span class="badge text-bg-danger">UnVerified</span>
                                </td>
                                <td>Verification Incomplete</td>
                            </tr>
                        </tbody>




                    </table>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('admin_panel.include.footer_copyright_include')
</footer>

@include('admin_panel.include.footer_include')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script>
    // $(document).ready(function() {
    //     $('#reports-table').DataTable({
    //         dom: 'Bfrtip',
    //         buttons: [
    //             'copyHtml5',
    //             'excelHtml5',
    //             'csvHtml5',
    //             'pdfHtml5'
    //         ]
    //     });
    // });
</script>
</body>

</html>