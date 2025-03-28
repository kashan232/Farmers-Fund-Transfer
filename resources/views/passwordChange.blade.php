{{-- @include('admin_panel.include.header_include') --}}
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
{{-- @include('admin_panel.include.sidebar_include') --}}

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
{{-- @include('admin_panel.include.navbar_include') --}}
<!-- [ Header ] end -->
<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <title>Admin & Dashboard</title> --}}
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective." />
    <meta name="author" content="phoenixcoded" />
    <link rel="icon" href="{{asset('')}}assets/images/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('')}}assets/css/plugins/jsvectormap.min.css">
    <link href="../../../../fonts.googleapis.com/css23da6.css?family=Public+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('')}}assets/fonts/tabler-icons.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/fonts/feather.css">
    <link rel="stylesheet" href="{{asset('')}}assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="{{asset('')}}assets/fonts/material.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="{{asset('')}}assets/css/style-preset.css">
    <link rel="stylesheet" href="{{asset('select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light" style="background-color: #e7e3e0;">
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
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
