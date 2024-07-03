@include('agriculture_user_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
    @include('agriculture_user_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
    @include('agriculture_user_panel.include.navbar_include')
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
                                <th colspan="6">GROWER INFORMATION</th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $all_agriuser_farmers->name }}</td>
                                <th>Father's Name</th>
                                <td colspan="3">{{ $all_agriuser_farmers->father_name }}</td>
                            </tr>
                            <tr>

                                <th>CNIC</th>
                                <td>{{ $all_agriuser_farmers->cnic }}</td>
                                <th>Mobile</th>
                                <td colspan="3">{{ $all_agriuser_farmers->mobile }}</td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td>{{ $all_agriuser_farmers->district }}</td>
                                <th>Tehsil</th>
                                <td colspan="3">{{ $all_agriuser_farmers->tehsil }}</td>
                            </tr>
                            <tr>
                                <th>UC</th>
                                <td>{{ $all_agriuser_farmers->uc }}</td>
                                <th>Tappa</th>
                                <td colspan="3">{{ $all_agriuser_farmers->tappa }}</td>
                            </tr>
                            <tr>
                                <th>DHA</th>
                                <td>{{ $all_agriuser_farmers->dah }}</td>
                                <th>Village</th>
                                <td colspan="3">{{ $all_agriuser_farmers->village }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $all_agriuser_farmers->gender }}</td>

                                <th>House Type</th>
                                <td>{{ $all_agriuser_farmers->house_type }}</td>

                                <th>Owner Type</th>
                                <td>{{ $all_agriuser_farmers->owner_type }}</td>
                            </tr>
                            <tr>
                                <th colspan="6">FAMILY COMPOSITION</th>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <th>Children < 16 years</th>
                                <th colspan="4">Adults > 16 years</th>
                            </tr>
                            <tr>
                                <td>Female</td>
                                <td>{{ $all_agriuser_farmers->female_children_under16 }}</td>
                                <td colspan="4">{{ $all_agriuser_farmers->female_Adults_above16 }}</td>
                            </tr>
                            <tr>
                                <td>Male</td>
                                <td>{{ $all_agriuser_farmers->male_children_under16 }}</td>
                                <td colspan="4">{{ $all_agriuser_farmers->male_Adults_above16 }}</td>
                            </tr>
                            <tr>
                                <th colspan="6">LANDHOLDING & CROPPING</th>
                            </tr>
                            <tr>
                                <th>Total Landing Acre</th>
                                <td>{{ $all_agriuser_farmers->total_landing_acre }}</td>
                                <th>Total Area With Hari</th>
                                <td colspan="3">{{ $all_agriuser_farmers->total_area_with_hari }}</td>
                            </tr>
                            <tr>
                                <th>Total Area Cultivated Land</th>
                                <td>{{ $all_agriuser_farmers->total_area_cultivated_land }}</td>
                                <th>Total Fallow Land</th>
                                <td  colspan="3">{{ $all_agriuser_farmers->total_fallow_land }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>Cnic Number</th>
                                <th>Contact Number</th>
                                <th colspan="3">Total Area (Acre)</th>
                            </tr>
                            @foreach (json_decode($all_agriuser_farmers->title_name) as $index => $title_names)
                            <tr>
                                <td>{{$title_names}}</td>
                                <td>{{json_decode($all_agriuser_farmers->title_cnic)[$index]}}</td>
                                <td>{{json_decode($all_agriuser_farmers->title_number)[$index]}}</td>
                                <td colspan="3">{{json_decode($all_agriuser_farmers->title_area)[$index]}}</td>
                            </tr>
                            @endforeach


                            <tr>
                                <th colspan="6">CROP STATUS (Rabi Season)</th>
                            </tr>
                            <tr>
                                <th>Crop</th>
                                <th>Area</th>
                                <th colspan="4">Average yield</th>
                            </tr>
                            @foreach (json_decode($all_agriuser_farmers->crops) as $index => $crops)
                            <tr>
                                <td>{{$crops}}</td>
                                <td>{{json_decode($all_agriuser_farmers->crop_area)[$index]}}</td>
                                <td colspan="4">{{json_decode($all_agriuser_farmers->crop_average_yeild)[$index]}}</td>
                            </tr>
                            @endforeach

                            <tr>
                                <th colspan="6">Physical Assets Currently Owned</th>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    @foreach (json_decode($all_agriuser_farmers->physical_asset_item) as $physical_asset_item)
                                    <span class="badge text-bg-dark">{{$physical_asset_item}}</span>
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <th colspan="6">Livestock and Poultry Assets Currently Owned</th>
                            </tr>
                            <tr>
                                <th>Animal Name</th>
                                <th colspan="6">Numbers</th>
                            </tr>
                            @foreach (json_decode($all_agriuser_farmers->animal_name) as $index => $animal_name)
                            <tr>
                                <td>{{$animal_name}}</td>
                                <td colspan="6">{{json_decode($all_agriuser_farmers->animal_qty)[$index]}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <th>Source of irrigation</th>
                                <th colspan="6">If Tube Wall</th>
                            </tr>
                            <tr>
                                <td>{{$all_agriuser_farmers->source_of_irrigation }}</td>
                                <td colspan="6">{{($all_agriuser_farmers->source_of_irrigation_energy == '') ? '-' : $all_agriuser_farmers->source_of_irrigation_energy }}</td>
                            </tr>
                            <tr>
                                <th colspan="6">Status of water courses</th>
                            </tr>
                            <tr>
                                <th>Total Length</th>
                                <th >If Lined/Unlined</th>
                                <th colspan="6">If Lined</th>
                            </tr>
                            <tr>
                                <td>{{$all_agriuser_farmers->area_length }}</td>
                                <td>{{$all_agriuser_farmers->line_status }}</td>
                                <td>lined length: {{$all_agriuser_farmers->lined_length }}</td>
                                <td colspan="4">Total Command Area:{{$all_agriuser_farmers->total_command_area }}</td>
                            </tr>

                            <tr>
                                <th colspan="6">BANK & ACCOUNT DETAILS</th>
                            </tr>

                            <tr>
                                <th>Account Title</th>
                                <td>{{ $all_agriuser_farmers->account_title }}</td>
                                <th>Account No</th>
                                <td colspan="6">{{ $all_agriuser_farmers->account_no }}</td>
                            </tr>
                            <tr>
                                <th>Bank Name</th>
                                <td>{{ $all_agriuser_farmers->bank_name }}</td>
                                <th>Branch Name</th>
                                <td colspan="6">{{ $all_agriuser_farmers->branch_name }}</td>
                            </tr>
                            <tr>
                                <th>IBAN Number</th>
                                <td>{{ $all_agriuser_farmers->IBAN_number }}</td>
                                <th>Branch Code</th>
                                <td colspan="6">{{ $all_agriuser_farmers->branch_code }}</td>
                            </tr>

                            <tr>
                                <th colspan="6">DOCUMENT UPLOADED/ COLLECTED</th>
                            </tr>

                            <tr>
                                <th>Front ID Card</th>
                                <td><img src="{{ asset('agri_user_farmers/front_id_card/' . $all_agriuser_farmers->front_id_card) }}" alt="Front ID Card" width="100"></td>
                                <th>Back ID Card</th>
                                <td colspan="6"><img src="{{ asset('agri_user_farmers/back_id_card/' . $all_agriuser_farmers->back_id_card) }}" alt="Back ID Card" width="100"></td>
                            </tr>
                            <tr>
                                <th>Upload Land Proof</th>
                                <td><img src="{{ asset('agri_user_farmers/upload_land_proof/' . $all_agriuser_farmers->upload_land_proof) }}" alt="Upload Land Proof" width="100"></td>
                                <th>Upload Other Attach</th>
                                <td colspan="6"><img src="{{ asset('agri_user_farmers/upload_other_attach/' . $all_agriuser_farmers->upload_other_attach) }}" alt="Upload Other Attach" width="100"></td>
                            </tr>
                            <tr>
                                <th>Upload Farmer Pic</th>
                                <td><img src="{{ asset('agri_user_farmers/upload_farmer_pic/' . $all_agriuser_farmers->upload_farmer_pic) }}" alt="Upload Farmer Pic" width="100"></td>
                                <th>Upload Cheque Pic</th>
                                <td colspan="6"><img src="{{ asset('agri_user_farmers/upload_cheque_pic/' . $all_agriuser_farmers->upload_cheque_pic) }}" alt="Upload Cheque Pic" width="100"></td>
                            </tr>

                            <tr>
                                <th colspan="6">SURVEYOR / ENUMERATOR DETAILS</th>
                            </tr>

                            <tr>
                                <th>Verification Status</th>
                                <td>
                                    @if ($all_agriuser_farmers->verification_status === 'Verified')
                                    <span class="badge text-bg-success">Verified</span>
                                    @else
                                    <span class="badge text-bg-danger">Unverified</span>
                                    @endif
                                </td>
                                <th>Declined Reason</th>
                                @if ($all_agriuser_farmers->verification_status === 'Unverified')
                                @if (is_null($all_agriuser_farmers->declined_reason))
                                <td colspan="6">-</td>
                                @else
                                <td colspan="6">{{ $all_agriuser_farmers->declined_reason }}</td>
                                @endif
                                @else
                                <td colspan="6">-</td>
                                @endif
                            </tr>

                            <tr>
                                <th>Verification by</th>
                                <td>{{ $all_agriuser_farmers->verification_by }}</td>

                                <th>Created At</th>
                                <td>{{ $all_agriuser_farmers->created_at->diffForHumans()}}</td>

                                <th>Updated At</th>
                                <td>{{ $all_agriuser_farmers->updated_at->diffForHumans() }}</td>
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
    @include('agriculture_user_panel.include.footer_copyright_include')
</footer>

@include('agriculture_user_panel.include.footer_include')

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
