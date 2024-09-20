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
                            <h2 class="mb-0">verified Farmers</h2>
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
                            </tr>
                        </thead>

                        
                        <tbody>
                            <tr>
                                <td>Ali Khan</td>
                                <td>42101-1234567-9</td>
                                <td>0301-1234567</td>
                                <td>Karachi</td>
                                <td>Korangi</td>
                                <td>UC-1</td>
                                <td>Tappa A</td>
                                <td>Shah Faisal Colony</td>
                                <td>
                                    <span class="badge text-bg-success">Verified</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Ayesha Bibi</td>
                                <td>61101-9876543-1</td>
                                <td>0321-9876543</td>
                                <td>Islamabad</td>
                                <td>Rawat</td>
                                <td>UC-5</td>
                                <td>Tappa B</td>
                                <td>Bahria Town</td>
                                <td>
                                    <span class="badge text-bg-success">Verified</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Mohammad Aslam</td>
                                <td>33100-7654321-5</td>
                                <td>0333-7654321</td>
                                <td>Lahore</td>
                                <td>Raiwind</td>
                                <td>UC-2</td>
                                <td>Tappa C</td>
                                <td>Green Town</td>
                                <td>
                                    <span class="badge text-bg-success">Verified</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Zainab Fatima</td>
                                <td>42201-1112233-6</td>
                                <td>0345-1112233</td>
                                <td>Karachi</td>
                                <td>Gulshan</td>
                                <td>UC-3</td>
                                <td>Tappa D</td>
                                <td>Gulistan-e-Jauhar</td>
                                <td>
                                    <span class="badge text-bg-success">Verified</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Ahmed Raza</td>
                                <td>34201-2223344-7</td>
                                <td>0300-2223344</td>
                                <td>Faisalabad</td>
                                <td>Samundri</td>
                                <td>UC-8</td>
                                <td>Tappa E</td>
                                <td>D Ground</td>
                                <td>
                                    <span class="badge text-bg-success">Verified</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Khalid Mehmood</td>
                                <td>35202-3334455-8</td>
                                <td>0302-3334455</td>
                                <td>Multan</td>
                                <td>Shujabad</td>
                                <td>UC-10</td>
                                <td>Tappa F</td>
                                <td>Qasim Bela</td>
                                <td>
                                    <span class="badge text-bg-success">Verified</span>
                                </td>                                
                            </tr>
                            <tr>
                                <td>Sadia Malik</td>
                                <td>51201-4445566-2</td>
                                <td>0336-4445566</td>
                                <td>Rawalpindi</td>
                                <td>Muridke</td>
                                <td>UC-4</td>
                                <td>Tappa G</td>
                                <td>Pindi Bhattian</td>
                                <td>
                                    <span class="badge text-bg-success">Verified</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Hassan Ali</td>
                                <td>61101-5556677-3</td>
                                <td>0324-5556677</td>
                                <td>Quetta</td>
                                <td>Ziarat</td>
                                <td>UC-6</td>
                                <td>Tappa H</td>
                                <td>Satellite Town</td>
                                <td>
                                    <span class="badge text-bg-success">Verified</span>
                                </td>
                            </tr>
                        </tbody>

                        <tbody>
                            <!-- <tr>
                                <td>Edward Clarke</td>
                                <td>Dolore tempora delec</td>
                                <td>Est odio quisquam et</td>
                                <td>Hyderabad</td>
                                <td>Hyderabad</td>
                                <td>seri</td>
                                <td>ADDITIONAL HUSSAIN KHAN THORO</td>
                                <td>Sint soluta adipisci</td>
                                <td>
                                    <span class="badge text-bg-success">Verified</span>
                                </td>
                            </tr> -->
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