@include('field_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('field_officer_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('field_officer_panel.include.navbar_include')
<!-- [ Header ] end -->

<style>
    .dt-buttons {
        display: none !important;
    }

    .table-responsive {
        position: relative !important;
        /* padding-top: 5% !important; */
    }

    .table-responsive nav{
        float: right !important;
        /* margin-top: 1% !important; */
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
                            <h2 class="mb-0">Registered Farmers</h2>
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
                                    <div class="col-12">

                                        <div class="table-responsive">

                                            <div style="display: flex;" class="mb-3">
                                                <div class="col-3 " style="top:1%;" >
                                                    <label for="">Registration Status</label>
                                                    <select  id="user_type" class="form-control">
                                                        <option value="">Select Type</option>
                                                        <option value="Online">Online</option>
                                                    </select>
                                                </div>
                                                <div class="col-3 mx-3  " style="   top:1%;" >
                                                    <label for="">Verification Status</label>
                                                    <select  id="form_status" class="form-control">
                                                        <option value="">All</option>
                                                        <option value="Unverified">Un-verified</option>
                                                        <option value="Forward to AO">verified</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <table id="example1" class="display" style="width:100%" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info">
                                                <thead>
                                                    <tr>
                                                        <th>Sno</th>
                                                        <th>Type</th>
                                                        <th>Name</th>
                                                        <th>CNIC</th>
                                                        <th>Mobile</th>
                                                        <th>District</th>
                                                        <th>Taluka</th>
                                                        <th>UC</th>
                                                        <th>Tappa</th>
                                                        <th>Village</th>
                                                        <th>Status</th>
                                                        <th>Reason</th>
                                                        {{-- <th>Status</th> --}}
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($farmers as $farmer)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{!! ($farmer->user_type == 'Online') ? 'Online':'Field Assistant <br><b>'.$farmer->user->name.'<b>'   !!}</td>
                                                        <td>{{ $farmer->name }}</td>
                                                        <td>{{ $farmer->cnic }}</td>
                                                        <td>{{ $farmer->mobile }}</td>
                                                        <td>{{ $farmer->district }}</td>
                                                        <td>{{ $farmer->tehsil }}</td>
                                                        <td>{{ $farmer->uc }}</td>
                                                        <td>{{ $farmer->tappa }}</td>
                                                        <td>{{ $farmer->village }}</td>

                                                        <td>
                                                            @if ($farmer->verification_status == 'verified_by_lrd')
                                                            <span class="badge text-bg-success text-dark font-weight-bold">Verified</span>
                                                            @elseif($farmer->verification_status == 'verified_by_fa')
                                                            <span class="badge  text-bg-success text-dark font-weight-bold" >Forward to AO</span>
                                                            @elseif($farmer->verification_status == 'verified_by_ao')
                                                            <span class="badge  text-bg-success text-dark font-weight-bold" >Forward to DD</span>
                                                            @elseif($farmer->verification_status == 'verified_by_dd')
                                                            <span class="badge  text-bg-success text-dark font-weight-bold" >Forward to LRD</span>

                                                            @elseif($farmer->verification_status == 'rejected_by_ao')
                                                            <span class="badge text-bg-danger text-dark font-weight-bold">Rejected By AO</span>
                                                            @elseif($farmer->verification_status == 'rejected_by_dd')
                                                            <span class="badge text-bg-danger text-dark font-weight-bold">Rejected By DD</span>
                                                            @elseif($farmer->verification_status == 'rejected_by_lrd')
                                                            <span class="badge text-bg-danger text-dark font-weight-bold">Rejected By LRD</span>

                                                            @else
                                                            <span class="badge text-bg-primary text-white font-weight-bold">Unverified</span>
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
                                                            @if($farmer->verification_status != 'verified_by_fa' && $farmer->verification_status != 'verified_by_ao' && $farmer->verification_status != 'verified_by_dd' && $farmer->verification_status != 'verified_by_lrd')
                                                            <div class="d-flex">
                                                                {{-- <a href="{{ route('farmer-view-by-field-officer', ['id' => $farmer->id]) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>&nbsp; --}}


                                                                <a href="{{ route('farmer-edit-by-field-officer', ['id' => $farmer->id]) }}" class="btn  btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>&nbsp;


                                                                <a href="{{route('view-farmers-by-field-officer',$farmer->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                                            </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{-- {{$farmers->links()}} --}}
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
    @include('field_officer_panel.include.footer_copyright_include')
</footer>

@include('field_officer_panel.include.footer_include')

</body>
<script>
    $(document).ready(function() {

        table = $('#example1').DataTable({
            "pageLength": 100, // Default number of rows per page
            "dom": 'lfrtip', // Only include the filter (search box), table, and pagination
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
            if (searchValue != 0) {
                table.column(4).search('^' + searchValue + '$', true, false).draw();
            } else {
                table.column(4).search('').draw();
            }
        });

        $(document).on('change', '#user_type', function(e) {
            e.preventDefault();
            var searchValue = $(this).val();
            if (searchValue != 0) {
                table.column(1).search('^' + searchValue + '$', true, false).draw();
            } else {
                table.column(1).search('').draw();
            }
        });

        $(document).on('change', '#form_status', function(e) {
            e.preventDefault();
            var searchValue = $(this).val();
            if (searchValue != 0) {
                table.column(10).search('^' + searchValue + '$', true, false).draw();
            } else {
                table.column(10).search('').draw();
            }
        });




        //  <div class="col-3" style="position: absolute; top:1%" >
        //          <select name="tehsil" id="tehsil" class="form-control">
        //              <option value="0">Please Select Tehsil</option>
        //              @foreach ($tehsils as $tehsil)
        //                  <option value="{{$tehsil->tehsil}}">{{$tehsil->tehsil}}</option>
        //              @endforeach
        //          </select>
        //      </div>
//         $('#example1_wrapper').before(`



//  `);

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
            if ($(this).val() == 'rejected_by_do') {
                reasonBox.show();
                $('#reasonTextarea').prop('required', true);

            } else {
                reasonBox.hide();
                $('#reasonTextarea').prop('required', false);
            }
        });
    });
</script>

</html>
