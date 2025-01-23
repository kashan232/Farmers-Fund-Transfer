@include('land_revenue_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
    @include('land_revenue_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
    @include('land_revenue_panel.include.navbar_include')
<!-- [ Header ] end -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">


<style>
    .table-responsive{
        position: relative !important;
        padding-top: 2% !important;
    }


</style>
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
                                <form id="verifyfarmers" action="{{ route('verify-farmer-by-land-officer') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="statusSelect">Status</label>
                                        <input type="hidden" id="farmer_id" name="farmer_id"  value="" readonly>
                                        <select class="form-control" id="statusSelect" name="verification_status">
                                            <option value="verified_by_lo">Verified</option>

                                           <option value="rejected_by_lo">Unverified</option>

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

                        <div class="dt-responsive">
                            <div id="dom-jqry_wrapper" class="dt-container dt-bootstrap5">
                                <div class="row mt-2 justify-content-md-center">
                                    <div class="col-12">
                                        <div class="table-responsive" id="table-responsive">
                                            <table id="example"  style="width:100%" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info">
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
                                                    @foreach($all_land_farmers as $all_land_farmer)

                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>

                                                                @if ($all_land_farmer->user_type == 'Online')
                                                                Online
                                                                @elseif($all_land_farmer->user_type == 'Field_Officer')
                                                                Field Assitant
                                                                @else
                                                                Agriculture Farmers
                                                                @endif


                                                        </td>
                                                        <td>{{ $all_land_farmer->name }}</td>
                                                        <td>{{ $all_land_farmer->cnic }}</td>
                                                        <td>{{ $all_land_farmer->mobile }}</td>
                                                        <td>{{ $all_land_farmer->district }}</td>
                                                        <td>{{ $all_land_farmer->tehsil }}</td>
                                                        <td>{{ $all_land_farmer->uc }}</td>
                                                        <td>{{ $all_land_farmer->tappa }}</td>
                                                        <td>{{ $all_land_farmer->village }}</td>
                                                        <td>
                                                            @if ($all_land_farmer->verification_status == 1 && $all_land_farmer->declined_reason == '')
                                                            <span class="badge bg-success">Verified by AO</span>
                                                            @elseif($all_land_farmer->verification_status == 'verified_by_lo')
                                                            <span class="badge text-bg-success">Approved Farmers</span>
                                                            @elseif($all_land_farmer->declined_reason != null || $all_land_farmer->declined_reason != '')
                                                            <span class="badge bg-danger">Rejected</span>
                                                            @elseif ($all_land_farmer->declined_reason != '' && $all_land_farmer->verification_status == 2)
                                                            <span class="badge text-bg-danger">Rejected</span>
                                                            @else
                                                            <span class="badge text-bg-primary">Forwarded by DD</span>
                                                            @endif
                                                        </td>
                                                        @if ($all_land_farmer->declined_reason != null || $all_land_farmer->declined_reason != '')
                                                        <td>
                                                            {{ $all_land_farmer->declined_reason }}
                                                        </td>
                                                        @else
                                                        <td></td>
                                                        @endif

                                                        <td>
                                                            <div class="d-flex">
                                                            <a class="btn btn-primary btn-sm" href="{{route('view-farmers-by-field-officer',$all_land_farmer->id)}}">View</a>

                                                                {{-- <button type="button" class="btn btn-sm btn-success verifiy-btn "   data-id="{{ $all_land_farmer->id }}">Verify</button> &nbsp; --}}
                                                                {{-- <a href="{{ route('view-land-farmers', ['id' => $all_land_farmer->id]) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>&nbsp; --}}
                                                                {{-- <a href="{{ route('ed  it-land-farmers', ['id' => $all_land_farmer->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>&nbsp; --}}
                                                                {{-- <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>&nbsp; --}}
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="float:right; margin-top:10px">
                                            {{ $all_land_farmers->links() }}
                                        </div>

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
    @include('land_revenue_panel.include.footer_copyright_include')
</footer>

@include('land_revenue_panel.include.footer_include')
</body>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script>

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

        if ($(this).val() == 'rejected_by_lo') {
            reasonBox.show();
            $('#reasonTextarea').prop('required', true);

        } else {
            reasonBox.hide();
            $('#reasonTextarea').prop('required', false);
        }
    });
});

    $(document).ready(function() {

       table =  $('#example').DataTable({
            "pageLength": 100, // Default number of rows per page
            "dom": 'frt', // Only include the filter (search box), table, and pagination
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

        $('#example_wrapper').before(`
            <div class="col-3" style="position: absolute; top:1%" >
                <select name="tehsil" id="tehsil" class="form-control">
                    <option value="0">Please Select Tehsil</option>
                    @foreach ($tehsils as $tehsil)
                        <option value="{{$tehsil->tehsil}}">{{$tehsil->tehsil}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3" style="position: absolute; top:1%; left:250px;" >
                <select  id="user_type" class="form-control">
                    <option value="">Select Type</option>
                    <option value="Online">Online</option>
                    <option value="Field Assitant">Field Assitant</option>
                </select>
            </div>
        `);

    });
</script>
</html>
