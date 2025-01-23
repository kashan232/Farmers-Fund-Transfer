@include('field_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('field_officer_panel.include.sidebar_include')
<style>
    .bottom--impo th {
        padding-right: 28px !important;
        font-size: 22px !important;
        color: #000 !important;
        text-align: center;
    }

    .h-5 {
        width: 30px;
    }

    .leading-5 {
        padding: 15px 0px;

    }

    .leading-5 span:nth-child(3) {
        color: red;
        font-weight: 500;
    }

    .dataTables_info {
        display: none;
    }

    .dataTables_paginate {
        display: none;
    }
</style>
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
                            <h2 class="mb-0">Reports</h2>
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
                                <th>SN</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>CNIC</th>
                                <th>Mobile</th>
                                <th>District</th>
                                <th>Tehsil</th>
                                <th>UC</th>
                                <th>Tappa</th>
                                <th>Dah</th>
                                <th>Village</th>
                                <th>Gender</th>
                                <th>House Type</th>
                                <th>Owner Type</th>
                                <th>Female Children Under 16</th>
                                <th>Female Adults Above 16</th>
                                <th>Male Children Under 16</th>
                                <th>Male Adults Above 16</th>
                                <th>Total Landing Acre</th>
                                <th>Total Area with Hari</th>
                                <th>Total Area Cultivated Land</th>
                                <th>Total Fallow Land</th>
                                <th>Title Name</th>
                                <th>Title CNIC</th>
                                <th>Title Number</th>
                                <th>Title Area</th>
                                <th>Crops</th>
                                <th>Crop Area</th>
                                <th>Crop Average Yield</th>
                                <th>Physical Asset Item</th>
                                <th>Animal Name</th>
                                <th>Animal Quantity</th>
                                <th>Source of Irrigation</th>
                                <th>Source of Irrigation Energy</th>
                                <th>Lined Length</th>
                                <th>Total Command Area</th>
                                <th>Area Length</th>
                                <th>Line Status</th>
                                <th>Account Title</th>
                                <th>Account No</th>
                                <th>Bank Name</th>
                                <th>Branch Name</th>
                                <th>IBAN Number</th>
                                <th>Branch Code</th>
                                <th>Verification Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $farmer)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $farmer->name }}</td>
                                <td>{{ $farmer->father_name }}</td>
                                <td>{{ $farmer->cnic }}</td>
                                <td>{{ $farmer->mobile }}</td>
                                <td>{{ $farmer->district }}</td>
                                <td>{{ $farmer->tehsil }}</td>
                                <td>{{ $farmer->uc }}</td>
                                <td>{{ $farmer->tappa }}</td>
                                <td>{{ $farmer->dah }}</td>
                                <td>{{ $farmer->village }}</td>
                                <td>{{ $farmer->gender }}</td>
                                <td>{{ $farmer->house_type }}</td>
                                <td>{{ $farmer->owner_type }}</td>
                                <td>{{ $farmer->female_children_under16 }}</td>
                                <td>{{ $farmer->female_Adults_above16 }}</td>
                                <td>{{ $farmer->male_children_under16 }}</td>
                                <td>{{ $farmer->male_Adults_above16 }}</td>
                                <td>{{ $farmer->total_landing_acre }}</td>
                                <td>{{ $farmer->total_area_with_hari }}</td>
                                <td>{{ $farmer->total_area_cultivated_land }}</td>
                                <td>{{ $farmer->total_fallow_land }}</td>
                                <td>{{ is_array(json_decode($farmer->title_name)) ? implode(', ', json_decode($farmer->title_name)) : $farmer->title_name }}</td>
                                <td>{{ is_array(json_decode($farmer->title_cnic)) ? implode(', ', json_decode($farmer->title_cnic)) : $farmer->title_cnic }}</td>
                                <td>{{ is_array(json_decode($farmer->title_number)) ? implode(', ', json_decode($farmer->title_number)) : $farmer->title_number }}</td>
                                <td>{{ is_array(json_decode($farmer->title_area)) ? implode(', ', json_decode($farmer->title_area)) : $farmer->title_area }}</td>
                                <td>{{ is_array(json_decode($farmer->crops)) ? implode(', ', json_decode($farmer->crops)) : $farmer->crops }}</td>
                                <td>{{ is_array(json_decode($farmer->crop_area)) ? implode(', ', json_decode($farmer->crop_area)) : $farmer->crop_area }}</td>
                                <td>{{ is_array(json_decode($farmer->crop_average_yield)) ? implode(', ', json_decode($farmer->crop_average_yield)) : $farmer->crop_average_yield }}</td>
                                <td>{{ is_array(json_decode($farmer->physical_asset_item)) ? implode(', ', json_decode($farmer->physical_asset_item)) : $farmer->physical_asset_item }}</td>
                                <td>{{ is_array(json_decode($farmer->animal_name)) ? implode(', ', json_decode($farmer->animal_name)) : $farmer->animal_name }}</td>
                                <td>{{ is_array(json_decode($farmer->animal_qty)) ? implode(', ', json_decode($farmer->animal_qty)) : $farmer->animal_qty }}</td>
                                <td>{{ $farmer->source_of_irrigation }}</td>
                                <td>{{ $farmer->source_of_irrigation_engery }}</td>
                                <td>{{ $farmer->lined_length }}</td>
                                <td>{{ $farmer->total_command_area }}</td>
                                <td>{{ $farmer->area_length }}</td>
                                <td>{{ $farmer->line_status }}</td>
                                <td>{{ $farmer->account_title }}</td>
                                <td>{{ $farmer->account_no }}</td>
                                <td>{{ $farmer->bank_name }}</td>
                                <td>{{ $farmer->branch_name }}</td>
                                <td>{{ $farmer->IBAN_number }}</td>
                                <td>{{ $farmer->branch_code }}</td>
                                <td>{{ $farmer->verification_status }}</td>
                                <td>{{ $farmer->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $farmer->updated_at->format('Y-m-d H:i') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="56">No farmers found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    <div class="py-1">
                        {{ $data->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('field_officer_panel.include.footer_copyright_include')
</footer>

@include('field_officer_panel.include.footer_include')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#reports-table').DataTable({
            "pageLength": 100, // Default number of rows per page
            "dom": 'Bfrtip', // Only include the filter (search box), table, and pagination
            "processing": true, // Optional: for large datasets
            "deferRender": true, // Improves performance by rendering rows only when needed
            "order": [
                [0, 'asc']
            ], // Default ordering of the first column (optional)
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "language": {
                "search": "Search:" // Customize the search box label (optional)
            }
        });
    });
</script>
</body>

</html>
