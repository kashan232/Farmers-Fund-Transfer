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
                            <h2 class="mb-0">Create User</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Agriculture User</h5>
                    </div>
                    <div class="card-body">
                        @if (session()->has('user-added'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>Success!</strong> {{ session('user-added') }}.
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('store-user') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="user_name">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" name="number">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">CNIC</label>
                                            <input type="text" class="form-control" name="cnic">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Select District</label>
                                            <select name="district" id="district" class="form-control">
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($all_district as $district)
                                                <option value="{{ $district->district }}">
                                                    {{ $district->district }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Select Tehsil</label>
                                            <select name="tehsil" id="tehsil" class="form-control">
                                                <option value="" selected disabled>Select District First</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="mb-3 col-md-12">
                                            <label>UC</label><br>
                                            <select name="ucs[]" id="uc" class="form-control--input js-example-basic-multiple" style="width:100%;" multiple="multiple">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="mb-3 col-md-12">
                                            <label>Tappa</label><br>
                                            <select name="tappa[]" id="tappa" class="form-control--input js-example-basic-multiple" style="width:100%;" multiple="multiple">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h5>Uploaded Documents</h5>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="row mt-2">
                                                    <div class="mb-6 col-md-6">
                                                        <label class="form-label">Upload Your pictures</label>
                                                        <input type="file" name="img" class="form-control">
                                                    </div>
                                                    <div class="mb-6 col-md-6">
                                                        <label class="form-label">Upload Your CNIC</label>
                                                        <input type="file" name="cnic_img" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="mb-6 col-md-6">
                                                        <label class="form-label">Upload Your FORM VII / VIII
                                                            /Affidavit</label>
                                                        <input type="file" name="form_img" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                </form>
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
    @include('admin_panel.include.footer_copyright_include')
</footer>

@include('admin_panel.include.footer_include')

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

        $('select[name="tehsil"]').on('change', function() {
            var district = $('select[name="district"]').val();
            var tehsil = $(this).val();

            if (district && tehsil) {
                $.ajax({
                    url: '{{ route("get-ucs") }}',
                    type: 'GET',
                    data: {
                        district: district,
                        tehsil: tehsil
                    },
                    success: function(response) {
                        // Populate UC dropdown
                        var ucSelect = $('select[name="ucs[]"]');
                        ucSelect.empty();
                        $.each(response.ucs, function(index, value) {
                            ucSelect.append('<option value="' + value + '">' + value + '</option>');
                        });

                        // Populate Tappa dropdown
                        var tappaSelect = $('select[name="tappa[]"]');
                        tappaSelect.empty();
                        $.each(response.Tappas, function(index, value) {
                            tappaSelect.append('<option value="' + value + '">' + value + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                $('select[name="uc"]').empty();
                $('select[name="tappa"]').empty();
            }
        });
    });
</script>

</body>

</html>