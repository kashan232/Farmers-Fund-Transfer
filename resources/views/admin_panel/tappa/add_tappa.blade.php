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
                            <h2 class="mb-0">Create Tappa</h2>
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
                        <h5>Tappa</h5>
                    </div>
                    <div class="card-body">
                        @if (session()->has('district-added'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>Success!</strong> {{ session('district-added') }}.
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('store-tappa') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
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

                                    <div class="mb-12 col-md-12">
                                        <label class="form-label">Select Tehsil</label>
                                        <select name="tehsil" id="tehsil" class="form-control">
                                            <option value="" selected disabled>Select District First</option>
                                        </select>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Tappa Name</label>
                                            <input type="text" name="tappa" class="form-control">
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
    });
</script>

</body>
</html>