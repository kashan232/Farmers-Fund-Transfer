@include('agri_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
    @include('agri_officer_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
    @include('agri_officer_panel.include.navbar_include')
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

<div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Farmers Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <form id="verifyfarmers" action="{{ route('verify-farmer-by-ao') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="statusSelect">Status</label>
                                <input type="hidden" id="farmer_id" name="farmer_id"  value="" readonly>
                                <select class="form-control" id="statusSelect" name="verification_status">
                                    <option value="verified_by_ao">Verified</option>
                                    <option value="rejected_by_ao">Unverified</option>
                                </select>
                            </div>
                            <div class="form-group" id="reasonBox" style="display: none;">
                                <label for="reasonTextarea">Reason</label>
                                <select id="reasonTextarea" name="declined_reason" class="form-control">
                                    <option value="Banks Details Not Valid">Banks Details Not Valid</option>
                                    <option value="Form Seven(07) Not Valid">Form Seven(07) Not Valid</option>
                                    <option value="Attachments are not cleared">Attachments are not cleared</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                <td>{{ $data->name }}</td>
                                <th>Father's Name</th>
                                <td colspan="3">{{ $data->father_name }}</td>
                            </tr>
                            <tr>

                                <th>CNIC</th>
                                <td>{{ $data->cnic }}</td>
                                <th>Mobile</th>
                                <td colspan="3">{{ $data->mobile }}</td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td>{{ $data->district }}</td>
                                <th>Tehsil</th>
                                <td colspan="3">{{ $data->tehsil }}</td>
                            </tr>
                            <tr>
                                <th>UC</th>
                                <td>{{ $data->uc }}</td>
                                <th>Tappa</th>
                                <td colspan="3">{{ $data->tappa }}</td>
                            </tr>
                            <tr>
                                <th>DHA</th>
                                <td>{{ $data->dah }}</td>
                                <th>Village</th>
                                <td colspan="3">{{ $data->village }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $data->gender }}</td>

                                <th>House Type</th>
                                <td>{{ $data->house_type }}</td>

                                <th>Owner Type</th>
                                <td>{{ $data->owner_type }}</td>
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
                                <td>{{ $data->female_children_under16 }}</td>
                                <td colspan="4">{{ $data->female_Adults_above16 }}</td>
                            </tr>
                            <tr>
                                <td>Male</td>
                                <td>{{ $data->male_children_under16 }}</td>
                                <td colspan="4">{{ $data->male_Adults_above16 }}</td>
                            </tr>
                            <tr>
                                <th colspan="6">Next of kin</th>
                            </tr>
                            <tr>
                                <th>Fullname</th>
                                <th>CNIC</th>
                                <th colspan="4">Mobile</th>
                            </tr>
                            <tr>
                                <td>{{ $data->full_name_of_next_kin ?? '-'}}</td>
                                <td>{{ $data->cnic_of_next_kin ?? '-' }}</td>
                                <td colspan="4">{{ $data->mobile_of_next_kin ?? '-' }}</td>
                            </tr>


                            <tr>
                                <th colspan="6">LANDHOLDING & CROPPING</th>
                            </tr>
                            <tr>
                                <th>Total Landing Acre</th>
                                <td>{{ $data->total_landing_acre }}</td>
                                <th>Total Area With Hari</th>
                                <td colspan="3">{{ $data->total_area_with_hari }}</td>
                            </tr>
                            <tr>
                                <th>Total Area Cultivated Land</th>
                                <td>{{ $data->total_area_cultivated_land }}</td>
                                <th>Total Fallow Land</th>
                                <td  colspan="3">{{ $data->total_fallow_land }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>Cnic Number</th>
                                <th>Contact Number</th>
                                <th colspan="3">Total Area (Acre)</th>
                            </tr>
                            @if(is_array($data->title_name))
                            @foreach (json_decode($data->title_name) as $index => $title_names)
                            <tr>
                                <td>{{$title_names}}</td>
                                <td>{{json_decode($data->title_cnic)[$index]}}</td>
                                <td>{{json_decode($data->title_number)[$index]}}</td>
                                <td colspan="3">{{json_decode($data->title_area)[$index]}}</td>
                            </tr>
                            @endforeach
                            @endif


                            <tr>
                                <th colspan="6">CROP STATUS (Rabi Season)</th>
                            </tr>
                            <tr>
                                <th>Crop</th>
                                <th>Area</th>
                                <th colspan="4">Average yield</th>
                            </tr>
                            @if(is_array($data->crops))
                            @foreach (json_decode($data->crops) as $index => $crops)
                            <tr>
                                <td>{{$crops}}</td>
                                <td>{{json_decode($data->crop_area)[$index]}}</td>
                                <td colspan="4">{{json_decode($data->crop_average_yeild)[$index]}}</td>
                            </tr>
                            @endforeach
                            @endif

                            <tr>
                                <th colspan="6">Physical Assets Currently Owned</th>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    @if(is_array($data->physical_asset_item))
                                    @foreach (json_decode($data->physical_asset_item) as $physical_asset_item)
                                    <span class="badge text-bg-dark">{{$physical_asset_item}}</span>
                                    @endforeach
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th colspan="6">Livestock and Poultry Assets Currently Owned</th>
                            </tr>
                            <tr>
                                <th>Animal Name</th>
                                <th colspan="6">Numbers</th>
                            </tr>
                            @if(is_array($data->animal_name))
                            @foreach (json_decode($data->animal_name) as $index => $animal_name)
                            <tr>
                                <td>{{$animal_name}}</td>
                                <td colspan="6">{{json_decode($data->animal_qty)[$index]}}</td>
                            </tr>
                            @endforeach
                            @endif
                            <tr>
                                <th>Source of irrigation</th>
                                <th colspan="6">If Tube Wall</th>
                            </tr>
                            <tr>
                                <td>{{$data->source_of_irrigation }}</td>
                                <td colspan="6">{{($data->source_of_irrigation_energy == '') ? '-' : $data->source_of_irrigation_energy }}</td>
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
                                <td>{{$data->area_length }}</td>
                                <td>{{$data->line_status }}</td>
                                <td>lined length: {{$data->lined_length }}</td>
                                <td colspan="4">Total Command Area:{{$data->total_command_area }}</td>
                            </tr>

                            <tr>
                                <th colspan="6">BANK & ACCOUNT DETAILS</th>
                            </tr>

                            <tr>
                                <th>Account Title</th>
                                <td>{{ $data->account_title }}</td>
                                <th>Account No</th>
                                <td colspan="6">{{ $data->account_no }}</td>
                            </tr>
                            <tr>
                                <th>Bank Name</th>
                                <td>{{ $data->bank_name }}</td>
                                <th>Branch Name</th>
                                <td colspan="6">{{ $data->branch_name }}</td>
                            </tr>
                            <tr>
                                <th>IBAN Number</th>
                                <td>{{ $data->IBAN_number }}</td>
                                <th>Branch Code</th>
                                <td colspan="6">{{ $data->branch_code }}</td>
                            </tr>

                            <tr>
                                <th colspan="6">DOCUMENT UPLOADED/ COLLECTED</th>
                            </tr>

                            <tr>
                                <th>Front ID Card</th>
                                <td><img src="{{ asset('land_farmers/front_id_card/' . $data->front_id_card) }}" alt="Front ID Card" width="100"></td>
                                <th>Back ID Card</th>
                                <td colspan="6"><img src="{{ asset('land_farmers/back_id_card/' . $data->back_id_card) }}" alt="Back ID Card" width="100"></td>
                            </tr>
                            <tr>
                                <th>Upload Land Proof</th>
                                <td><img src="{{ asset('land_farmers/upload_land_proof/' . $data->upload_land_proof) }}" alt="Upload Land Proof" width="100"></td>
                                <th>Upload Other Attach</th>
                                <td colspan="6"><img src="{{ asset('land_farmers/upload_other_attach/' . $data->upload_other_attach) }}" alt="Upload Other Attach" width="100"></td>
                            </tr>
                            <tr>
                                <th>Upload Farmer Pic</th>
                                <td><img src="{{ asset('land_farmers/upload_farmer_pic/' . $data->upload_farmer_pic) }}" alt="Upload Farmer Pic" width="100"></td>
                                <th>Upload Cheque Pic</th>
                                <td colspan="6"><img src="{{ asset('land_farmers/upload_cheque_pic/' . $data->upload_cheque_pic) }}" alt="Upload Cheque Pic" width="100"></td>
                            </tr>
                        </table>
                        @if($data->user_type != 'Agri_Officer' && $data->verification_status != 'verified_by_do')
                            <button type="button" class="btn btn-sm btn-success verifiy-btn "   data-id="{{ $data->id }}">Verify</button> &nbsp;
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('agri_officer_panel.include.footer_copyright_include')
</footer>

@include('agri_officer_panel.include.footer_include')

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


    $(document).ready(function() {
    // Event listener for opening the modal


    $('.verifiy-btn').on('click', function() {
            var farmerId = $(this).data('id');
            $('#farmer_id').val(farmerId);
            $('#exampleModalLive').modal('show');
        });

    // Event listener for changing the status
    $('#statusSelect').on('change', function() {
        var reasonBox = $('#reasonBox');
        if ($(this).val() == 'rejected_by_ao') {
            reasonBox.show();
            $('#reasonTextarea').prop('required', true);

        } else {
            reasonBox.hide();
            $('#reasonTextarea').prop('required', false);
        }
    });


});
</script>


</body>
</html>
