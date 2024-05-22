<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .card {
        margin-bottom: 30px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
    }

    .card-title {
        margin: 0;
        padding: 10px 0;
    }

    .verified {
        background-color: #d4edda;
    }

    .unverified {
        background-color: #f8d7da;
    }

    .report-card {
        margin-bottom: 30px;
    }

    .report-header {
        background-color: #007bff;
        color: #fff;
    }

    .report-header h4 {
        margin: 0;
        padding: 10px;
    }

    .report-body {
        padding: 20px;
        background-color: #fff;
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

    #reportType,
    #startDate,
    #endDate,
    #districtFilter,
    #tehsilFilter,
    #statusFilter,
    #generateReportBtn {
        margin-bottom: 15px;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        padding: 10px 18px;
        border-bottom: 1px solid #ddd;
        background: #007bff;
        color: white;
    }

    table.dataTable tbody td {
        padding: 8px 18px;
    }

    table.dataTable {
        width: 100%;
        border-collapse: collapse;
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
                <div class="mt-5">
                    <h1>Farmers Reporting System</h1>
            
                    <!-- Report Filters -->
                    <div class="form-group">
                        <label for="reportType">Select Report Type:</label>
                        <select class="form-control" id="reportType">
                            <option value="approvedFarmers">Approved Farmers</option>
                            <option value="paymentDetails">Payment Details</option>
                            <!-- Add more report types as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="startDate">Start Date:</label>
                        <input type="date" class="form-control" id="startDate">
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date:</label>
                        <input type="date" class="form-control" id="endDate">
                    </div>
                    <div class="form-group">
                        <label for="districtFilter">Select District:</label>
                        <select class="form-control" id="districtFilter">
                            <option value="">All Districts</option>
                            <option value="Lahore">Lahore</option>
                            <option value="Faisalabad">Faisalabad</option>
                            <option value="Karachi">Karachi</option>
                            <option value="Islamabad">Islamabad</option>
                            <!-- Add more districts as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tehsilFilter">Select Tehsil:</label>
                        <select class="form-control" id="tehsilFilter">
                            <option value="">All Tehsils</option>
                            <option value="Gulberg">Gulberg</option>
                            <option value="Model Town">Model Town</option>
                            <option value="Defence">Defence</option>
                            <option value="F-8">F-8</option>
                            <!-- Add more tehsils as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="statusFilter">Select Status:</label>
                        <select class="form-control" id="statusFilter">
                            <option value="">All Statuses</option>
                            <option value="verified">Verified</option>
                            <option value="unverified">Unverified</option>
                        </select>
                    </div>
                    <button class="btn btn-primary mb-4" id="generateReportBtn">Generate Report</button>
            
                    <!-- Report Card -->
                    <div class="card report-card">
                        <div class="card-header report-header">
                            <h4 class="card-title">Report Results</h4>
                        </div>
                        <div class="card-body report-body">
                            <div class="table-responsive">
                                <table id="reportTable" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Farmer ID</th>
                                            <th>Name</th>
                                            <th>Contact Number</th>
                                            <th>Address</th>
                                            <th>District</th>
                                            <th>Tehsil</th>
                                            <th>Status</th>
                                            <th>Department</th>
                                            <th>Payment Details</th>
                                            <!-- Add more columns as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Report data will be dynamically populated here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                    <!-- Report Modal -->
                    <div class="modal fade" id="reportDetailsModal" tabindex="-1" role="dialog" aria-labelledby="reportDetailsModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reportDetailsModalLabel">Report Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Detailed information of selected report row will be displayed here -->
                                    <p id="reportDetails"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        var reportTable = $('#reportTable').DataTable();

        // Generate report button click event
        $('#generateReportBtn').on('click', function() {
            var reportType = $('#reportType').val();
            var startDate
            var startDate = $('#startDate').val();
            var endDate = $('#endDate').val();
            var district = $('#districtFilter').val();
            var tehsil = $('#tehsilFilter').val();
            var status = $('#statusFilter').val();

            // Generate dummy data for the report table based on the selected filters
            var reportData = [
                { id: '001', name: 'Muhammad Ali', contact: '123-456-7890', address: '123 Main St, Lahore', district: 'Lahore', tehsil: 'Gulberg', status: 'Unverified', department: 'Agriculture', payment: 'N/A' },
                { id: '002', name: 'Fatima Khan', contact: '987-654-3210', address: '456 Elm St, Faisalabad', district: 'Faisalabad', tehsil: 'Model Town', status: 'Verified', department: 'Agriculture', payment: 'PKR 1000' },
                { id: '003', name: 'Ahmed Raza', contact: '111-222-3333', address: '789 Maple St, Karachi', district: 'Karachi', tehsil: 'Defence', status: 'Unverified', department: 'Online', payment: 'N/A' },
                { id: '004', name: 'Asma Qureshi', contact: '444-555-6666', address: '101 Pine St, Islamabad', district: 'Islamabad', tehsil: 'F-8', status: 'Verified', department: 'Online', payment: 'PKR 2000' }
                // Add more dummy entries as needed
            ];

            // Apply filters to the report data
            var filteredData = reportData.filter(function(row) {
                var dateCheck = true; // Assume date filter is always true for simplicity
                var districtCheck = district ? row.district === district : true;
                var tehsilCheck = tehsil ? row.tehsil === tehsil : true;
                var statusCheck = status ? row.status.toLowerCase() === status : true;
                return dateCheck && districtCheck && tehsilCheck && statusCheck;
            });

            // Clear the current table data
            reportTable.clear();

            // Populate the table with filtered data
            filteredData.forEach(function(row) {
                reportTable.row.add([
                    row.id,
                    row.name,
                    row.contact,
                    row.address,
                    row.district,
                    row.tehsil,
                    row.status,
                    row.department,
                    row.payment
                ]).draw();
            });
        });

        // Row click event to show details in the modal
        $('#reportTable tbody').on('click', 'tr', function() {
            var data = reportTable.row(this).data();
            $('#reportDetails').html(`
                <strong>Farmer ID:</strong> ${data[0]}<br>
                <strong>Name:</strong> ${data[1]}<br>
                <strong>Contact Number:</strong> ${data[2]}<br>
                <strong>Address:</strong> ${data[3]}<br>
                <strong>District:</strong> ${data[4]}<br>
                <strong>Tehsil:</strong> ${data[5]}<br>
                <strong>Status:</strong> ${data[6]}<br>
                <strong>Department:</strong> ${data[7]}<br>
                <strong>Payment Details:</strong> ${data[8]}
            `);
            $('#reportDetailsModal').modal('show');
        });
    });
</script>
</body>
</html>
