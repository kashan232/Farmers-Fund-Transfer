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
                                <form action="{{route('reports-generate')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6 mt-2">
                                            <div class="mb-12 col-md-12">
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
                                        </div>
                                        <div class="col-6 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label">Select Tehsil</label>
                                                <select name="tehsil[]" id="tehsil" class="col-12 form-control--input js-example-basic-multiple" multiple="multiple" required>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Select Farmer Type</label>
                                            <select name="farmer_type" id="farmer_type" class="form-control" required>
                                                <option value="" >Select Farmer Type</option>
                                                <option value="agriculture_farmers" >Agriculture farmers</option>
                                                <option value="land_farmers" >Land farmers</option>
                                                <option value="online_farmers" >Online farmers</option>
                                                <option value="agriculture_user_farmers" >Agriculture user farmers</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Verify Status</label>
                                            <select name="verify_status" id="verify_status" class="form-control" required>
                                                <option value="" >Select Verify Status</option>
                                                <option value="Verified" >Verified</option>
                                                <option value="Unverified" >Unverified</option>
                                            </select>
                                        </div>
                                    </div>



                                    <button type="submit" class="btn btn-primary mt-4">Search</button>
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
