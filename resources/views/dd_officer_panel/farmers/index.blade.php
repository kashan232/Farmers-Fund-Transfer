@include('dd_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('dd_officer_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('dd_officer_panel.include.navbar_include')
<!-- [ Header ] end -->

<style>
    .table-responsive{
        position: relative !important;

    }


</style>

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
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">
                                Farmers List
                            </h2>
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
                        <div class="dt-responsive">
                            <div id="dom-jqry_wrapper" class="dt-container dt-bootstrap5">
                                <div class="row mt-2 justify-content-md-center">
                                    <div class="col-12 ">
                                        <div class="table-responsive">
                                            <table id="example" class="display" style="width:100%" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info">
                                                <thead>
                                                    <tr>
                                                        <th>S#</th>
                                                        <th>Register By</th>
                                                        <th>Name</th>
                                                        <th>CNIC</th>
                                                        <th>Mobile</th>
                                                        <th>District</th>
                                                        <th>Tehsil</th>
                                                        <th>UC</th>
                                                        <th>Tappa</th>
                                                        <th>Village</th>
                                                        <th>Status</th>
                                                        <th>Reason</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($farmers as $farmer)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>
                                                            @if ($farmer->user_type == 'Online')
                                                            Online
                                                            @elseif($farmer->user_type == 'Field_Officer')
                                                            Field Assitant
                                                            @endif

                                                        </td>
                                                        <td>{{ $farmer->name }}</td>
                                                        <td>{{ $farmer->cnic }}</td>
                                                        <td>{{ $farmer->mobile }}</td>
                                                        <td>{{ $farmer->district }}</td>
                                                        <td>{{ $farmer->tehsil }}</td>
                                                        <td>{{ $farmer->uc }}</td>
                                                        <td>{{ $farmer->tappa }}</td>
                                                        <td>{{ $farmer->village }}</td>
                                                        <td>
                                                            @if ($farmer->verification_status == 'rejected_by_lrd')
                                                            <span class="badge text-bg-danger">Rejected By LRD</span>
                                                            @elseif($farmer->verification_status == 'rejected_by_ao')
                                                                <span class="badge text-bg-danger">Rejected By AO</span>
                                                            @elseif($farmer->verification_status == 'rejected_by_fa')
                                                                <span class="badge text-bg-danger">Rejected By FA</span>
                                                            @elseif($farmer->verification_status == 'verified_by_fa')
                                                                <span class="badge text-bg-info">Forwarded to AO</span>
                                                            @elseif($farmer->verification_status == 'verified_by_ao')
                                                                <span class="badge text-bg-info">Forwarded to LRD</span>
                                                            @elseif($farmer->verification_status == 'verified_by_lrd')
                                                                <span class="badge text-bg-success">Verified</span>
                                                            @elseif($farmer->verification_status == NULL)
                                                                <span class="badge text-bg-primary">Pending</span>
                                                            @endif
                                                        </td>
                                                        @if ($farmer->declined_reason != null || $farmer->declined_reason != '')
                                                        <td>
                                                            {{ $farmer->declined_reason }}
                                                        </td>
                                                        @else
                                                        <td></td>
                                                        @endif

                                                        <td>
                                                            <div style="display:flex">
                                                                {{-- @if($farmer->user_type != 'Agri_Officer' && $farmer->verification_status != 'verified_by_do')
                                                                <button type="button" class="btn btn-sm btn-success verifiy-btn "   data-id="{{ $farmer->id }}">Verify</button> &nbsp;
                                                                @endif --}}
                                                                {{-- @if($farmer->user_type == 'Agri_Officer' && $farmer->verification_status != 'verified_by_do')
                                                                <a class="btn btn-primary" href="{{route('dd-edit-farmer',$farmer->id)}}">Edit</a> &nbsp;
                                                                @endif --}}
                                                            {{-- <a class="btn btn-primary btn-sm" href="{{route('dd-view-farmers',$farmer->id)}}">View</a> --}}

                                                            <a class="btn btn-primary btn-sm" href="{{route('view-farmers-by-field-officer',$farmer->id)}}">View</a>

                                                            </div>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <nav class="d-flex justify-content-between align-items-center mb-3 flex-wrap mt-2">
                                        {{-- Pagination --}}
                                        <div>
                                            {{ $farmers->links() }}
                                        </div>

                                        {{-- Totals --}}
                                        <div class="text-end">
                                            <h6 >Total: {{ $totalFarmers }}</h6>

                                        </div>
                                    </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('dd_officer_panel.include.footer_copyright_include')
</footer>

@include('dd_officer_panel.include.footer_include')

 <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {

       table =  $('#example').DataTable({
            "pageLength": 5000, // Default number of rows per page
            "dom": 'Bfrt', // Only include the filter (search box), table, and pagination
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

        // Attach the change event listener after the dropdown is created
        $(document).on('change', '#tehsil', function(e) {
            e.preventDefault();
            var searchValue = $(this).val();
            if(searchValue !=  0){
                table.column(5).search('^' + searchValue + '$', true, false).draw();
            }
            else{
                table.column(5).search('').draw();
            }
        });


        $(document).on('change', '#user_type', function(e) {
            e.preventDefault();
            var searchValue = $(this).val();
            if(searchValue !=  0){
                table.column(0).search('^' + searchValue + '$', true, false).draw();
            }
            else{
                table.column(0).search('').draw();
            }
        });


    });


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
