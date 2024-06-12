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
                        <h5>Personal Details</h5>
                    </div>
                    <div class="card-body">
                        @if (session()->has('user-added'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <strong>Success!</strong> {{ session('user-added') }}.
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('store-user') }}" method="POST">
                                    @csrf
                                    <div class="row mt-2">
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="user_name" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" name="number" class="form-control">
                                        </div>

                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control">
                                        </div>

                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">CNIC</label>
                                            <input type="text" name="cnic" class="form-control">
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Dictrict</label>
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
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Select Tehsil</label>
                                            <select name="tehsil" id="tehsil" class="form-control">
                                                <option value="" selected disabled>Select District First</option>
                                            </select>
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">UC</label>
                                            <select name="uc" id="editprojectName" class="form-control"
                                            onchange="populateEmployeeID()">
                                            <option value="" selected disabled>Select One</option>
                                            @foreach ($all_uc as $uc)
                                                <option value="{{ $uc->uc }}">
                                                    {{ $uc->uc }}
                                                </option>
                                            @endforeach
                                        </select>
                                        </div>

                                    </div>
                                    <div class="card-header">
                                        <h5>Login Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row mt-2">
                                                    <div class="mb-6 col-md-6">
                                                        <label class="form-label">Password</label>
                                                        <input type="password" name="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h5>Uploaded Documents</h5>
                                    </div>
                                    <div class="card-body">
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
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
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
</body>
</html>
<!-- Add jQuery CDN if not already included -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
</script>
<script>
    function populateEmployeeID() {
        // Get the selected employee's name
        var uc = document.getElementById("editprojectName").value;

        // Loop through all employees to find the matching one
        @foreach ($all_uc as $uc)
            var uc_name = "{{ $uc->uc }}";
            if (uc_name === uc) {
                // If the names match, populate the employee ID field
                document.getElementById("emp_id").value = "{{ $uc->id }}";
                break; // Stop the loop
            }
        @endforeach
    }
</script>
