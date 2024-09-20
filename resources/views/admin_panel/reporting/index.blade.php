@include('admin_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('admin_panel.include.sidebar_include')
<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('admin_panel.include.navbar_include')
<!-- [ Header ] end -->

<style>
    /* Darker placeholder color for the min_acre and max_acre fields */
    input::placeholder {
        color: #555;
        /* Change this to your desired darker color */
        opacity: 1;
        /* Ensures the placeholder text is not too transparent */
    }

    /* Adjust for specific input types if necessary */
    input[type="number"]::placeholder {
        color: #555;
        /* Darker placeholder */
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
                            <h2 class="mb-0">Create Report</h2>
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
                        <h5>Farmer Report</h5>
                    </div>
                    <div class="card-body">
                        @if (session()->has('report-added'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>Success!</strong> {{ session('report-added') }}.
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('reports-generate') }}" method="get" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <!-- Select Province -->
                                        <div class="col-6 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label" style="font-weight: 600;"> Province</label>
                                                <input type="text" class="form-control" name="Province" value="SINDH" readonly>
                                            </div>
                                        </div>

                                        <!-- Select District -->
                                        <div class="col-6 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label" style="font-weight: 600;">Select District</label>
                                                <select name="district" id="district" class="form-control">
                                                    <option value="" selected disabled>Select One</option>
                                                    <option value="All">All</option>
                                                    @foreach ($all_district as $district)
                                                    <option value="{{ $district->district }}">{{ $district->district }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <!-- Select Tehsil -->
                                        <div class="col-6 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label" style="font-weight: 600;">Select Tehsil</label>
                                                <select name="tehsil[]" id="tehsil" class="form-control js-example-basic-multiple" multiple="multiple">
                                                    <!-- Tehsils will be loaded based on district -->
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Acreage Range -->
                                        <div class="col-6 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label" style="font-weight: 600;">Acreage Range</label>
                                                <div class="d-flex">
                                                    <input type="number" name="min_acre" class="form-control" placeholder="Min Acre"> &nbsp;
                                                    <input type="number" name="max_acre" class="form-control ml-2" placeholder="Max Acre">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <!-- New Farmer Type -->
                                        <div class="col-6 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label" style="font-weight: 600;">Select Farmer Type</label>
                                                <select name="farmer_type" id="farmer_type" class="form-control">
                                                    <option value="">Select Farmer Type</option>
                                                    <option value="land_department">Land Department</option>
                                                    <option value="district_officer">District Officer</option>
                                                    <option value="field_assistant">Field Assistant</option>
                                                    <option value="online_farmers">Online Farmers</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Verify Status -->
                                        <div class="col-6 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label" style="font-weight: 600;">Verify Status</label>
                                                <select name="verify_status" id="verify_status" class="form-control">
                                                    <option value="">Select Verify Status</option>
                                                    <option value="Verified">Verified</option>
                                                    <option value="Unverified">Unverified</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <!-- Crop Type Filter -->
                                        <div class="col-6 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label" style="font-weight: 600;">Select Crop Type</label>
                                                <select name="crop_type[]" id="crop_type" class="form-control js-example-basic-multiple" multiple="multiple">
                                                    <option value="Wheat">Wheat</option>
                                                    <option value="Rice">Rice</option>
                                                    <option value="Cotton">Cotton</option>
                                                    <option value="Sugarcane">Sugarcane</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success">Generate Report</button>
                                        </div>
                                    </div>
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
                        $('select[name="tehsil[]"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="tehsil[]"]').append('<option value="' +
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