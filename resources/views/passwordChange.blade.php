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
                            <h2 class="mb-0">Change Password</h2>
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
                            @if (session()->has('city-updated'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <strong>Success!</strong> {{ session('city-updated') }}.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div id="dom-jqry_wrapper" class="dt-container dt-bootstrap5">
                                <div class="row mt-2 justify-content-md-center">
                                    <form action="{{ route('updatePassword') }}" method="post">
                                        @csrf
                                        <div class="col-12">
                                            <div class="col-md-12">
                                                <label class="form-label">Old Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control mt-1 mb-2" name="oldPassword">
                                                @error('oldPassword') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label">New Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control mt-1 mb-2" name="password">
                                                @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control mt-1 mb-2" name="password_confirmation">
                                            </div>

                                            <div class="col-md-2">
                                                <input class="form-control mt-4 btn btn-primary" type="submit" value="Update">
                                            </div>
                                        </div>

                                        @if(session('success'))
                                            <p class="text-success mt-2">{{ session('success') }}</p>
                                        @endif
                                    </form>

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

                        <form class="row g-3" action="{{ route('cities.store') }}" method="post">
                            @csrf
                            <input type="hidden" class="form-control" id="edit_id" name="edit_id">

                            <div class="col-md-12">
                                <label for="inputFirstName" class="form-label">City<span class="text-danger">*</span></label>
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


    $(document).on('click', '#create_city', function() {
        $('#exampleModal').modal('show');
    })

    $(document).on('click', '#edit_city', function() {
        var data = $(this).data('data');
        $('#edit_id').val(data.id);
        $('#title').val(data.title);
        $('#exampleModal').modal('show');
    })
</script>

</html>
