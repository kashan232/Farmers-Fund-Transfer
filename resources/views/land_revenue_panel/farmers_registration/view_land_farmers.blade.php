@include('land_revenue_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    @include('land_revenue_panel.include.sidebar_include')
</nav>

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
<header class="pc-header">
    @include('land_revenue_panel.include.navbar_include')
</header>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Farmer Details</h2>
                            <button onclick="generatePDF()" class="btn btn-danger mt-3">Download PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered" id="farmer-details-table">
                            <tr>
                                <th>Name</th>
                                <td>{{ $all_land_farmers->name }}</td>
                            </tr>
                            <tr>
                                <th>Father's Name</th>
                                <td>{{ $all_land_farmers->father_name }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $all_land_farmers->gender }}</td>
                            </tr>
                            <tr>
                                <th>CNIC</th>
                                <td>{{ $all_land_farmers->cnic }}</td>
                            </tr>
                            <tr>
                                <th>Province</th>
                                <td>{{ $all_land_farmers->province }}</td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td>{{ $all_land_farmers->district }}</td>
                            </tr>
                            <tr>
                                <th>Tehsil</th>
                                <td>{{ $all_land_farmers->tehsil }}</td>
                            </tr>
                            <tr>
                                <th>UC</th>
                                <td>{{ $all_land_farmers->uc }}</td>
                            </tr>
                            <tr>
                                <th>Tappa</th>
                                <td>{{ $all_land_farmers->tappa }}</td>
                            </tr>
                            <tr>
                                <th>Area</th>
                                <td>{{ $all_land_farmers->area }}</td>
                            </tr>
                            <tr>
                                <th>Chak/Goth/Killi</th>
                                <td>{{ $all_land_farmers->chak_goth_killi }}</td>
                            </tr>
                            <tr>
                                <th>Khasra/Survey</th>
                                <td>{{ $all_land_farmers->khasra_survey }}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{ $all_land_farmers->mobile }}</td>
                            </tr>
                            <tr>
                                <th>Area Category</th>
                                <td>{{ $all_land_farmers->area_category }}</td>
                            </tr>
                            <tr>
                                <th>Ownership</th>
                                <td>{{ $all_land_farmers->ownership }}</td>
                            </tr>
                            <tr>
                                <th>Aid Type</th>
                                <td>{{ $all_land_farmers->aid_type }}</td>
                            </tr>
                            <tr>
                                <th>Cheque Amount</th>
                                <td>{{ $all_land_farmers->cheque_amount }}</td>
                            </tr>
                            <tr>
                                <th>Cheque Number</th>
                                <td>{{ $all_land_farmers->cheque_number }}</td>
                            </tr>
                            <tr>
                                <th>Bank Branch Name</th>
                                <td>{{ $all_land_farmers->bank_branch_name }}</td>
                            </tr>
                            <tr>
                                <th>Bank Branch Code</th>
                                <td>{{ $all_land_farmers->bank_branch_code }}</td>
                            </tr>
                            <tr>
                                <th>Bank Account Title</th>
                                <td>{{ $all_land_farmers->bank_account_title }}</td>
                            </tr>
                            <tr>
                                <th>Bank Account Number</th>
                                <td>{{ $all_land_farmers->bank_account_number }}</td>
                            </tr>
                            <tr>
                                <th>Latitude</th>
                                <td>{{ $all_land_farmers->latitude }}</td>
                            </tr>
                            <tr>
                                <th>Longitude</th>
                                <td>{{ $all_land_farmers->longitude }}</td>
                            </tr>
                            <tr>
                                <th>Front ID Card</th>
                                <td><img src="{{ asset('land_farmers/front_id_card/' . $all_land_farmers->front_id_card) }}" alt="Front ID Card" width="100"></td>
                            </tr>
                            <tr>
                                <th>Back ID Card</th>
                                <td><img src="{{ asset('land_farmers/back_id_card/' . $all_land_farmers->back_id_card) }}" alt="Back ID Card" width="100"></td>
                            </tr>
                            <tr>
                                <th>Upload Land Proof</th>
                                <td><img src="{{ asset('land_farmers/upload_land_proof/' . $all_land_farmers->upload_land_proof) }}" alt="Upload Land Proof" width="100"></td>
                            </tr>
                            <tr>
                                <th>Upload Other Attach</th>
                                <td><img src="{{ asset('land_farmers/upload_other_attach/' . $all_land_farmers->upload_other_attach) }}" alt="Upload Other Attach" width="100"></td>
                            </tr>
                            <tr>
                                <th>Upload Farmer Pic</th>
                                <td><img src="{{ asset('land_farmers/upload_farmer_pic/' . $all_land_farmers->upload_farmer_pic) }}" alt="Upload Farmer Pic" width="100"></td>
                            </tr>
                            <tr>
                                <th>Upload Cheque Pic</th>
                                <td><img src="{{ asset('land_farmers/upload_cheque_pic/' . $all_land_farmers->upload_cheque_pic) }}" alt="Upload Cheque Pic" width="100"></td>
                            </tr>
                            <tr>
                                <th>Verification Status</th>
                                <td>
                                    @if ($all_land_farmers->verification_status === 'Verified')
                                    <span class="badge text-bg-success">Verified</span>
                                    @else
                                    <span class="badge text-bg-danger">Unverified</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Declined Reason</th>
                                @if ($all_land_farmers->verification_status === 'Unverified')
                                @if (is_null($all_land_farmers->declined_reason))
                                <td>-</td>
                                @else
                                <td>{{ $all_land_farmers->declined_reason }}</td>
                                @endif
                                @else
                                <td>-</td>
                                @endif
                            </tr>

                            <tr>
                                <th>Verification by</th>
                                <td>{{ $all_land_farmers->verification_by }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $all_land_farmers->created_at->diffForHumans()}}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $all_land_farmers->updated_at->diffForHumans() }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('land_revenue_panel.include.footer_copyright_include')
</footer>

@include('land_revenue_panel.include.footer_include')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

<script>
    function generatePDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        const table = document.getElementById('farmer-details-table');

        // Use autoTable to generate the PDF from the HTML table
        doc.autoTable({
            html: table,
            startY: 10,
            theme: 'grid'
        });

        doc.save('farmer_details.pdf');
    }
</script>


</body>
</html>