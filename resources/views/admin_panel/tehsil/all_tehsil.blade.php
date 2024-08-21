@include('admin_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('admin_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('admin_panel.include.navbar_include')
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
                            <h2 class="mb-0">List Tehsil</h2>
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
                            @if (session()->has('tehsil-updated'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <strong>Success!</strong> {{ session('tehsil-updated') }}.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div id="dom-jqry_wrapper" class="dt-container dt-bootstrap5">
                                <div class="row mt-2 justify-content-md-center">
                                    <div class="col-12 ">
                                        <table id="dom-jqry" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th>Sno</th>
                                                    <th>District Name</th>
                                                    <th>Tehsil</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ( $all_tehsil as $tehsil )
                                                <tr>
                                                    <td><strong>{{ $loop->iteration }}</strong></td>
                                                    <td>{{ $tehsil->district }}</td>
                                                    <td>{{ $tehsil->tehsil }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" id="edit_tehsil" data-data="{{ $tehsil }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                            {{-- <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit Tehsil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="{{ route('store-tehsil') }}" method="post">
                            @csrf
                            <input type="hidden" class="form-control" id="edit_id" name="edit_id">
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
                                <label for="inputFirstName" class="form-label">Tehsil<span class="text-danger">*</span></label>
                                <input class="form-control" id="tehsil" name="tehsil" value="">
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
    $(document).on('click', '#edit_tehsil', function() {
        var data = $(this).data('data');

        $('#edit_id').val(data.id);
        $('#district').val(data.district);
        $('#tehsil').val(data.tehsil);
        $('#exampleModal').modal('show');
    })
</script>

</html>