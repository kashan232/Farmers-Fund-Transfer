<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<style>
    .verified { background-color: #d4edda; }
    .unverified { background-color: #f8d7da; }
/* Custom CSS for better styling */
body {
    font-family: Arial, sans-serif;
}

h1 {
    text-align: center;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

.card {
    margin-bottom: 30px;
}

.modal-header {
    background-color: #007bff;
    color: #fff;
    border-bottom: none;
}

.modal-title {
    color: #fff;
}

.modal-body {
    padding: 20px;
}

.modal-footer {
    justify-content: center;
    border-top: none;
}

.modal-footer button {
    margin-right: 10px;
}

.verified {
    background-color: #d4edda;
}

.unverified {
    background-color: #f8d7da;
}
</style>
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
                <div class=" mt-5">
                    <h1>Verification of Agriculture Farmers' Land Claims</h1>
                    
                    <div class="form-group">
                        <label for="statusFilter">Filter by Status:</label>
                        <select class="form-control" id="statusFilter">
                            <option value="">All</option>
                            <option value="Verified">Verified</option>
                            <option value="Unverified">Unverified</option>
                        </select>
                    </div>
                    
                    <!-- Agriculture Department Registered Farmers -->
                    <div class="card mb-5">
                        <div class="card-header">
                            <h4 class="card-title">Agriculture Department Registered Farmers</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="agricultureTable" class="display" style="min-width: 845px">
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
                                            <th>Reason</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="unverified">
                                            <td>001</td>
                                            <td>Muhammad Ali</td>
                                            <td>123-456-7890</td>
                                            <td>123 Main St, Lahore</td>
                                            <td>Lahore</td>
                                            <td>Gulberg</td>
                                            <td>Wheat</td>
                                            <td>Unverified</td>
                                            <td>Incomplete Documents</td>
                                            <td><button class="btn btn-primary btn-sm verify-btn">Verify</button></td>
                                        </tr>
                                        <tr class="verified">
                                            <td>002</td>
                                            <td>Fatima Khan</td>
                                            <td>987-654-3210</td>
                                            <td>456 Elm St, Faisalabad</td>
                                            <td>Faisalabad</td>
                                            <td>Model Town</td>
                                            <td>Rice</td>
                                            <td>Verified</td>
                                            <td>N/A</td>
                                            <td><button class="btn btn-secondary btn-sm" disabled>Verified</button></td>
                                        </tr>
                                        <!-- More dummy entries can be added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                    <!-- Online Registered Farmers -->
                    <div class="card mb-5">
                        <div class="card-header">
                            <h4 class="card-title">Online Registered Farmers</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="onlineTable" class="display" style="min-width: 845px">
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
                                            <th>Reason</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="unverified">
                                            <td>003</td>
                                            <td>Ahmed Raza</td>
                                            <td>111-222-3333</td>
                                            <td>789 Maple St, Karachi</td>
                                            <td>Karachi</td>
                                            <td>Defence</td>
                                            <td>Cotton</td>
                                            <td>Unverified</td>
                                            <td>Missing Land Title</td>
                                            <td><button class="btn btn-primary btn-sm verify-btn">Verify</button></td>
                                        </tr>
                                        <tr class="verified">
                                            <td>004</td>
                                            <td>Asma Qureshi</td>
                                            <td>444-555-6666</td>
                                            <td>101 Pine St, Islamabad</td>
                                            <td>Islamabad</td>
                                            <td>F-8</td>
                                            <td>Vegetables</td>
                                            <td>Verified</td>
                                            <td>N/A</td>
                                            <td><button class="btn btn-secondary btn-sm" disabled>Verified</button></td>
                                        </tr>
                                        <!-- More dummy entries can be added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                    <!-- Farmer Details Modal -->
                    <div class="modal fade" id="farmerDetailsModal" tabindex="-1" role="dialog" aria-labelledby="farmerDetailsModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="farmerDetailsModalLabel">Farmer Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="farmerDetailsForm">
                                        <div class="form-group">
                                            <label for="farmerName">Name</label>
                                            <input type="text" class="form-control" id="farmerName" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="farmerContact">Contact Number</label>
                                            <input type="text" class="form-control" id="farmerContact" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="farmerAddress">Address</label>
                                            <input type="text" class="form-control" id="farmerAddress" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="farmerDistrict">District</label>
                                            <input type="text" class="form-control" id="farmerDistrict" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="farmerTehsil">Tehsil</label>
                                            <input type="text" class="form-control" id="farmerTehsil" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="farmerCropType">Crop Type</label>
                                            <input type="text" class="form-control" id="farmerCropType" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="farmerStatus">Status</label>
                                            <input type="text" class="form-control" id="farmerStatus" readonly>
                                        </div>
                                        <div class="form-group" id="reasonGroup" style="display: none;">
                                            <label for="unverifyReason">Reason for Unverification</label>
                                            <textarea class="form-control" id="unverifyReason" rows="3"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="verifyButton">Verify</button>
                                    <button type="button" class="btn btn-danger" id="unverifyButton">Unverify</button>
                                </div>
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
    @include('land_revenue_panel.include.footer_copyright_include')
    <!--**********************************
            Footer end
        ***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('land_revenue_panel.include.footer_include')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var agricultureTable = $('#agricultureTable').DataTable();
            var onlineTable = $('#onlineTable').DataTable();

            // Filter by status
            $('#statusFilter').on('change', function() {
                var status = $(this).val();
                agricultureTable.columns(7).search(status).draw();
                onlineTable.columns(7).search(status).draw();
            });

            // Verify button click event for both tables
            function handleVerifyButtonClick(table) {
                table.on('click', '.verify-btn', function() {
                    var tr = $(this).closest('tr');
                    var data = table.row(tr).data();
                    $('#farmerName').val(data[1]);
                    $('#farmerContact').val(data[2]);
                    $('#farmerAddress').val(data[3]);
                    $('#farmerDistrict').val(data[4]);
                    $('#farmerTehsil').val(data[5]);
                    $('#farmerCropType').val(data[6]);
                    $('#farmerStatus').val(data[7]);
                    $('#unverifyReason').val(data[8]);

                    if (data[7] === 'Unverified') {
                        $('#reasonGroup').show();
                    } else {
                        $('#reasonGroup').hide();
                    }

                    $('#verifyButton').data('row', tr);
                    $('#unverifyButton').data('row', tr);
                    $('#farmerDetailsModal').modal('show');
                });
            }

            handleVerifyButtonClick(agricultureTable);
            handleVerifyButtonClick(onlineTable);

            // Confirm verification
            $('#verifyButton').on('click', function() {
                var tr = $(this).data('row');
                agricultureTable.row(tr).cell(7).data('Verified').draw();
                agricultureTable.row(tr).cell(8).data('N/A').draw();
                onlineTable.row(tr).cell(7).data('Verified').draw();
                onlineTable.row(tr).cell(8).data('N/A').draw();
                tr.removeClass('unverified').addClass('verified');
                tr.find('.verify-btn').removeClass('btn-primary').addClass('btn-secondary').text('Verified').attr('disabled', true);
                $('#farmerDetailsModal').modal('hide');
            });

            // Confirm unverification
            $('#unverifyButton').on('click', function() {
                var tr = $(this).data('row');
                var reason = $('#unverifyReason').val();
                agricultureTable.row(tr).cell(7).data('Unverified').draw();
                agricultureTable.row(tr).cell(8).data(reason).draw();
                onlineTable.row(tr).cell(7).data('Unverified').draw();
                onlineTable.row(tr).cell(8).data(reason).draw();
                tr.removeClass('verified').addClass('unverified');
                tr.find('.verify-btn').removeClass('btn-secondary').addClass('btn-primary').text('Verify').removeAttr('disabled');
                $('#farmerDetailsModal').modal('hide');
            });
        });
    </script>
</body>
</html>
