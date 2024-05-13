@include('admin_panel.include.header_include')

<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    @include('admin_panel.include.navbar_include')

    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    @include('admin_panel.include.sidebar_include')

    <!--**********************************
            Sidebar end
        ***********************************-->

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Tappa</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('store-tappa') }}" method="POST">
                                    @csrf
                                    <div class="row">
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
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Tappa Name</label>
                                            <input type="text" name="tappa" class="form-control">
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
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
    @include('admin_panel.include.footer_copyright_include')
    <!--**********************************
            Footer end
        ***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('admin_panel.include.footer_include')

<script>
    $(document).ready(function() {
        $('#district').on('change', function() {
            var district = $(this).val();
            if (district) {
                $.ajax({
                    url: '{{ route("get-tehsils") }}',
                    type: 'POST',
                    data: { district: district, _token: '{{ csrf_token() }}' },
                    success: function(data) {
                        var tehsilSelect = $('#tehsil');
                        tehsilSelect.empty();
                        $.each(data, function(key, value) {
                            tehsilSelect.append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#tehsil').empty();
            }
        });
    });
</script>
</body>
</html>
