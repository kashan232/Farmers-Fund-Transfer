<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .form-section {
        margin-top: 20px;
    }

    .form-section h4 {
        margin-bottom: 20px;
    }

    .filter-group {
        margin-bottom: 20px;
    }

    .filter-group label {
        display: block;
        margin-bottom: 5px;
    }

    .table-container {
        margin-top: 30px;
    }
</style>
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
            <div class="col-12">
                <div class="mt-5">
                    <div class="form-section">
                        <h4>Payment Management</h4>
                        <form id="paymentForm">
                            <div class="filter-group">
                                <label for="district">District</label>
                                <select id="district" class="form-control">
                                    <option value="">Select District</option>
                                    <option value="Lahore">Lahore</option>
                                    <option value="Karachi">Karachi</option>
                                    <option value="Faisalabad">Faisalabad</option>
                                    <!-- Add more districts as needed -->
                                </select>
                            </div>
                            <div class="filter-group">
                                <label for="tehsil">Tehsil</label>
                                <select id="tehsil" class="form-control">
                                    <option value="">Select Tehsil</option>
                                    <option value="Model Town">Model Town</option>
                                    <option value="Saddar">Saddar</option>
                                    <option value="Gulberg">Gulberg</option>
                                    <!-- Add more tehsils as needed -->
                                </select>
                            </div>
                            <div class="filter-group">
                                <label for="farmer">Farmer</label>
                                <select id="farmer" class="form-control">
                                    <option value="">Select Farmer</option>
                                    <option value="Farmer 1|123456|Verified">Farmer 1 - Verified</option>
                                    <option value="Farmer 2|234567|Verified">Farmer 2 - Verified</option>
                                    <option value="Farmer 3|345678|Verified">Farmer 3 - Verified</option>
                                    <!-- Add more farmers as needed -->
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary" id="distributePaymentBtn">Distribute
                                Payment</button>
                        </form>
                    </div>
                    <div class="table-container">
                        <h5>Payment Distribution</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>District</th>
                                    <th>Tehsil</th>
                                    <th>Farmer Name</th>
                                    <th>Account Number</th>
                                    <th>Payment Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="paymentTableBody">
                                <!-- Payment rows will be dynamically added here -->
                            </tbody>
                        </table>
                        <button class="btn btn-success" id="generatePDFBtn">Generate PDF</button>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script>
    $(document).ready(function() {
        $('#distributePaymentBtn').on('click', function() {
            // Get selected values
            const district = $('#district').val();
            const tehsil = $('#tehsil').val();
            const farmerData = $('#farmer').val().split('|');

            if (district && tehsil && farmerData.length === 3) {
                const farmerName = farmerData[0];
                const accountNumber = farmerData[1];
                const status = farmerData[2];

                // Ensure the farmer is verified
                if (status === 'Verified') {
                    // Simulate adding a payment entry
                    const paymentRow = `
                        <tr>
                            <td>${district}</td>
                            <td>${tehsil}</td>
                            <td>${farmerName}</td>
                            <td>${accountNumber}</td>
                            <td>1000</td> <!-- Example payment amount -->
                            <td>${status}</td>
                        </tr>
                    `;

                    $('#paymentTableBody').append(paymentRow);

                    // Clear the form
                    $('#paymentForm')[0].reset();
                } else {
                    alert('Only verified farmers can receive payments.');
                }
            } else {
                alert('Please select district, tehsil, and farmer.');
            }
        });

        $('#generatePDFBtn').on('click', function() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            doc.text("Payment Distribution Report", 10, 10);

            const tableContent = [];
            $('#paymentTableBody tr').each(function() {
                const row = [];
                $(this).find('td').each(function() {
                    row.push($(this).text());
                });
                tableContent.push(row);
            });

            doc.autoTable({
                head: [['District', 'Tehsil', 'Farmer Name', 'Account Number', 'Payment Amount', 'Status']],
                body: tableContent
            });

            doc.save('payment_distribution_report.pdf');
        });
    });
</script>
</body>

</html>
