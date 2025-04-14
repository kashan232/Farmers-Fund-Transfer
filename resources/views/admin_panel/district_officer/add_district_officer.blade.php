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
                            <h2 class="mb-0">Additional Director Officer</h2>
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
                        <h5>Additional Director </h5>
                    </div>
                    <div class="card-body">
                        @if (session()->has('officer-added'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>Success!</strong> {{ session('officer-added') }}.
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('store-district-officer') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="full_name" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" name="contact_number" required maxlength="11" max="11" minlength="11" min="11" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control" name="address" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Email Address</label>
                                            <input type="email" class="form-control" name="email_address" required>
                                            @error('email_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Select District</label>
                                            <select name="district[]" id="district" class="form-control js-example-basic-multiple" required multiple="multiple" >
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
                                        <div class="mb-3 col-md-12">
                                            <label>Select Tehsil</label><br>
                                            <select name="tehsil[]" id="tehsil" required class="form-control--input js-example-basic-multiple" style="width:100%;" multiple="multiple">
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="row mt-2">
                                        <div class="mb-3 col-md-12">
                                            <label>UC</label><br>
                                            <select name="ucs[]" id="uc"  class="form-control--input js-example-basic-multiple" style="width:100%;" multiple="multiple">
                                            </select>
                                        </div>
                                    </div> --}}

                                    <div class="row mt-2">
                                        <div class="mb-3 col-md-12">
                                            <label>Tappa</label><br>
                                            <select name="tappa[]" id="tappa"  class="form-control--input js-example-basic-multiple" style="width:100%;" multiple="multiple">
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success mt-4">Submit</button>
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
        $('select[name="district[]"]').on('change', function() {
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

                        $('select[name="tehsil[]"]').append('<option value="all">All</option>');

                        $.each(data, function(key, value) {
                            $('select[name="tehsil[]"]').append('<option value="' +
                                value + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="tehsil[]"]').empty();
            }
        });

    // Handle "All" selection logic
    $(document).on('change', 'select[name="tehsil[]"]', function () {
        var selectedOptions = $(this).val() || [];
        if (selectedOptions.includes("all")) {
            // Select all options when "All" is chosen
            $(this).find('option').prop('selected', true);
        } else {
            // If "All" is not selected, ensure it stays deselected
            $(this).find('option[value="all"]').prop('selected', false);
        }
        $(this).find('option[value="all"]').prop('selected', false);
        // Refresh Select2 UI
        $(this).trigger('change.select2');

         // After "All" is handled, call the get-ucs function
        handleGetUcsRequest();
    });


// Function to handle the get-ucs request with selected tehsil values
function handleGetUcsRequest() {
    var district = $('select[name="district[]"]').val();
    var tehsil = $('select[name="tehsil[]"]').val();  // Get selected tehsil values

    // If "All" is selected, we need to remove "all" from the selected values
    if (tehsil.includes("all")) {
        tehsil = tehsil.filter(function(value) {
            return value !== "all";  // Remove "all" from the selected list
        });
    }

    // Only trigger AJAX if district and tehsil are selected and valid
    if (district && tehsil.length > 0) {
        $.ajax({
            url: '{{ route("get-ucs") }}',
            type: 'GET',
            data: {
                district: district,
                tehsil: tehsil // Send selected tehsil values (excluding "All")
            },
            success: function(response) {

                // Populate Tappa dropdown
                var tappaSelect = $('select[name="tappa[]"]');
                tappaSelect.empty();
                $('select[name="tappa[]"]').append('<option value="all">All</option>');

                $.each(response.Tappas, function(index, value) {
                    tappaSelect.append('<option value="' + value + '">' + value + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    } else {
        // Clear UC and Tappa dropdowns if district or tehsil is empty
        // $('select[name="ucs"]').empty();
        $('select[name="tappa[]"]').empty();
    }
}

         // Handle "All" selection logic
        $(document).on('change', 'select[name="tappa[]"]', function () {
            var selectedOptions = $(this).val() || [];
            if (selectedOptions.includes("all")) {
                // Select all options when "All" is chosen
                $(this).find('option').prop('selected', true);
            } else {
                // If "All" is not selected, ensure it stays deselected
                $(this).find('option[value="all"]').prop('selected', false);
            }
            $(this).find('option[value="all"]').prop('selected', false);
            // Refresh Select2 UI
            $(this).trigger('change.select2');
        });

    });
</script>


{{-- <script>
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

        $('select[name="tehsil[]"]').on('change', function() {
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
</script> --}}

</body>

</html>
