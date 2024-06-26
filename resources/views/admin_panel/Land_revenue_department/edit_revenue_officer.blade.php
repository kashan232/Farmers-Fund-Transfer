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
                            <h2 class="mb-0">Edit Land Revenue Department</h2>
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
                        <h5>District</h5>
                    </div>
                    <div class="card-body">
                        @if (session()->has('officer-added'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>Success!</strong> {{ session('officer-added') }}.
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('store-revenue-officer') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$data->id}}" name="edit_id">
                                    <div class="row">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="full_name" value="{{$data->full_name}}" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" name="contact_number" value="{{$data->contact_number}}" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control" name="address" rows="3" required>{{$data->address}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Email Address</label>
                                            <input type="email" class="form-control" name="email_address" value="{{$data->email_address}}" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Select District</label>
                                            <select name="district" id="district" class="form-control" required >
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($all_district as $district)
                                                <option value="{{ $district->district }}" {{($district->district == $data->district) ? 'selected':''}} >
                                                    {{ $district->district }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Select Tehsil</label>
                                            <select name="tehsil[]" id="tehsil" class="form-control--input js-example-basic-multiple" style="width:100%;" multiple="multiple" required>
                                                @foreach (json_decode($data->tehsil) as $tehsil)
                                                <option value="{{ $tehsil }}" selected>
                                                    {{ $tehsil }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="mb-3 col-md-12">
                                            <label>UC</label><br>
                                            <select name="ucs[]" id="uc" class="form-control--input js-example-basic-multiple" style="width:100%;" multiple="multiple" required>
                                                @foreach (json_decode($data->ucs) as $ucs)
                                                <option value="{{ $ucs }}" selected>
                                                    {{ $ucs }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="mb-3 col-md-12">
                                            <label>Tappa</label><br>
                                            <select name="tappa[]" id="tappa" class="form-control--input js-example-basic-multiple" style="width:100%;" multiple="multiple" required>
                                                @foreach (json_decode($data->tappas) as $tappas)
                                                <option value="{{ $tappas }}" selected>
                                                    {{ $tappas }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Username</label>
                                            <input type="text" required class="form-control" name="username" value="{{$data->username}}">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Password</label>
                                            <input type="password" required class="form-control" name="password">
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
</script>

</body>
</html>
