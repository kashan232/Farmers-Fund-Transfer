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
                            <h2 class="mb-0">List Branches</h2>
                            <button id="create_bankbranches">Create</button>
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
                            @if (session()->has('bank-updated'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <strong>Success!</strong> {{ session('bank-updated') }}.
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
                                                    <th>City</th>
                                                    <th>Branch Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $bank)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $bank->city->title }}</td>
                                                    <td>{{ $bank->title }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);" id="edit_bankbranches" data-data="{{ $bank }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
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
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="row g-3" action="{{ route('bankbranches.store') }}" method="post">
                            @csrf
                            <input type="hidden" class="form-control" id="edit_id" name="edit_id">

                            <div class="col-md-12">
                                <label for="inputFirstName" class="form-label">City<span class="text-danger">*</span></label>
                                <select name="city_id" id="city_id" class="form-control">
                                    <option value="">Please City</option>
                                    @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="inputFirstName" class="form-label">Branch Name<span class="text-danger">*</span></label>
                                <input class="form-control" id="title" name="title" value="">
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


    $(document).on('click', '#create_bankbranches', function() {


        $('#city_id').val('').trigger('change');
        $('#edit_id').val('');
        $('#title').val('');


        $('#exampleModal').modal('show');
        $('#exampleModalLabel').html('Create Branch');
    })

    $(document).on('click', '#edit_bankbranches', function() {
        var data = $(this).data('data');
        $('#exampleModalLabel').html('Edit Branch');

        $('#city_id').val(data.city_id).trigger('change');
        $('#edit_id').val(data.id);
        $('#title').val(data.title);
        $('#exampleModal').modal('show');
    })
</script>

</html>
