@include('admin_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    @include('admin_panel.include.sidebar_include')
</nav>

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
<header class="pc-header">
    @include('admin_panel.include.navbar_include')
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
                            <h2 class="mb-0">List Tappa</h2>
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
                            @if (session()->has('tappa-updated'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <strong>Success!</strong> {{ session('tappa-updated') }}.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div id="dom-jqry_wrapper" class="dt-container dt-bootstrap5">
                                <div class="row mt-2 justify-content-between">
                                    <div class="col-md-auto me-auto ">
                                        <div class="dt-length"><select name="dom-jqry_length" aria-controls="dom-jqry" class="form-select form-select-sm" id="dt-length-0">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select></div>
                                    </div>
                                    <div class="col-md-auto ms-auto ">
                                        <div class="dt-search"><label for="dt-search-0">Search:</label><input type="search" class="form-control form-control-sm" id="dt-search-0" placeholder="" aria-controls="dom-jqry"></div>
                                    </div>
                                </div>
                                <div class="row mt-2 justify-content-md-center">
                                    <div class="col-12 ">
                                        <table id="dom-jqry" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th>Sno</th>
                                                    <th>District</th>
                                                    <th>Tehsil</th>
                                                    <th>Tappa</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($all_tappa as $tappa )
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $tappa->district }}</td>
                                                    <td>{{ $tappa->tehsil }}</td>
                                                    <td>{{ $tappa->tappa }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" id="edit_tappa"  data-data="{{ $tappa }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                            <a href="#"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-2 justify-content-between">
                                    <div class="col-md-auto me-auto ">
                                        <div class="dt-info" aria-live="polite" id="dom-jqry_info" role="status">Showing 1 to 10 of 20 entries</div>
                                    </div>
                                    <div class="col-md-auto ms-auto ">
                                        <div class="dt-paging paging_full_numbers">
                                            <ul class="pagination">
                                                <li class="dt-paging-button page-item disabled"><a class="page-link first" aria-controls="dom-jqry" aria-disabled="true" aria-label="First" data-dt-idx="first" tabindex="-1">«</a></li>
                                                <li class="dt-paging-button page-item disabled"><a class="page-link previous" aria-controls="dom-jqry" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1">‹</a></li>
                                                <li class="dt-paging-button page-item active"><a href="#" class="page-link" aria-controls="dom-jqry" aria-current="page" data-dt-idx="0" tabindex="0">1</a></li>
                                                <li class="dt-paging-button page-item"><a href="#" class="page-link" aria-controls="dom-jqry" data-dt-idx="1" tabindex="0">2</a></li>
                                                <li class="dt-paging-button page-item"><a href="#" class="page-link next" aria-controls="dom-jqry" aria-label="Next" data-dt-idx="next" tabindex="0">›</a></li>
                                                <li class="dt-paging-button page-item"><a href="#" class="page-link last" aria-controls="dom-jqry" aria-label="Last" data-dt-idx="last" tabindex="0">»</a></li>
                                            </ul>
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
        {{-- Modal for edit  --}}

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Tappa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="row g-3" action="{{ route('store-tappa') }}" method="post">
                            @csrf
                            <input type="hidden" class="form-control" id="edit_id" name="edit_id" >
                            <div class="col-md-12">
                            <label class="form-label">Select District</label>
                            <select name="district" id="district" class="form-control" required>
                                <option value="" selected disabled>Select One</option>
                                @foreach ($all_district as $district)
                                <option value="{{ $district->district }}">
                                    {{ $district->district }}
                                </option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-md-12">
                            <label class="form-label">Select Tehsil</label>
                            <select name="tehsil" id="tehsil" class="form-control" required>
                                <option value="" selected disabled>Select One</option>
                                @foreach ($all_tehsil as $tehsil)
                                <option value="{{ $tehsil->tehsil }}">
                                    {{ $tehsil->tehsil }}
                                </option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-md-12">
                                <label for="inputFirstName" class="form-label">Tappa<span class="text-danger">*</span></label>
                                <input class="form-control"  id="tappa" name="tappa" value="" >
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

        {{-- Model end --}}




    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    @include('admin_panel.include.footer_copyright_include')
</footer>

@include('admin_panel.include.footer_include')

</body>
<script>
     $(document).ready(function() {
        $('select[name="district"]').on('change', function() {
            var district = $(this).val();
            if (district) {
                $.ajax({
                    url: '{{ route('get-tehsils') }}',
                    type: 'GET',
                    data: {
                        district: district
                    },
                    success: function(data) {
                        $('select[name="tehsil"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="tehsil"]').append('<option value="' +
                                value + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="tehsil"]').empty();
            }
        });
    });

     $(document).on('click','#edit_tappa',function(){
        var data = $(this).data('data');
        $.ajax({
            url: '{{ route('get-tehsils') }}',
            type: 'GET',
            data: {
                district: data.district
            },
            success: function(res) {
                $('select[name="tehsil"]').empty();
                $.each(res, function(key, value) {
                    var selected = value === data.tehsil ? 'selected' : '';
                    $('select[name="tehsil"]').append(`<option value="${value}" ${selected}>${value}</option>`);
                });
            }
        });
        $('#edit_id').val(data.id);
        $('#district').val(data.district);
        $('#tappa').val(data.tappa);
        $('#exampleModal').modal('show');
    })
</script>
</html>
