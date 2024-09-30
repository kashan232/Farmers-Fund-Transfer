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
                            <h2 class="mb-0">Field Officer</h2>
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
                        <h5>Registration Form</h5>
                    </div>
                    <div class="card-body">
                        @if (session()->has('officer-added'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>Success!</strong> {{ session('officer-added') }}.
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('store-field-officer-by-admin') }}" method="post">
                                    @csrf

                                    @if(isset($data))
                                        <input type="hidden" name="edit_id" value="{{$data->id}}">
                                    @endif

                                    <div class="row">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" value="@if(isset($data)) {{$data->full_name}} @endif" name="full_name" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Email Address</label>
                                            <input type="email" class="form-control"  value="@if(isset($data)) {{$data->email_address}} @endif" name="email_address" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" class="form-control"  value="@if(isset($data)) {{$data->contact_number}} @endif" name="contact_number" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control" name="address" rows="3" required > @if(isset($data)) {{$data->address}} @endif</textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Select District</label>
                                                <select name="district" id="district" class="form-control">
                                                    @foreach ($districts as $district)
                                                        <option value="{{$district->district}}">{{$district->district}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="mb-6 col-md-6">
                                            <label class="form-label">Select District Officer</label>
                                            <select name="district_officer" id="district_officer" class="form-control">

                                            </select>
                                        </div>
                                    </div>


                                    <div class="row mt-2">
                                        <div class="mb-3 col-md-12">
                                            <label>Select Tehsil</label><br>
                                            <select name="tehsil[]" id="tehsil" required class="form-control--input js-example-basic-multiple" style="width:100%;" multiple="multiple">
                                                @if(isset($data))
                                                @foreach ($tehsils as $tehsil)
                                                    <option {{ (in_array($tehsil->tehsil,json_decode($data->tehsil))) ? 'selected':'' }} value="{{$tehsil->tehsil}}">{{$tehsil->tehsil}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>







                                    <div class="row mt-2">
                                        <div class="mb-3 col-md-12">
                                            <label>UC</label><br>
                                            <select name="ucs[]" id="uc" required class="form-control--input js-example-basic-multiple" style="width:100%;" multiple="multiple">
                                                @if(isset($data))
                                                @foreach (json_decode($data->ucs) as $uc )
                                                <option selected value="{{$uc}}">{{$uc}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="mb-3 col-md-12">
                                            <label>Tappa</label><br>
                                            <select name="tappa[]" id="tappa" required class="form-control--input js-example-basic-multiple" style="width:100%;" multiple="multiple">
                                                @if(isset($data))
                                                @foreach (json_decode($data->tappas) as $tappa )
                                                <option selected value="{{$tappa}}">{{$tappa}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" required name="username" value="@if(isset($data)) {{$data->username}} @endif">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" required name="password" >
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
        $('select[name="district"]').on('change', function() {
            var district = $(this).val();
            if (district) {



                $.ajax({
                    url: '{{ route('get-district-officers') }}',
                    type: 'GET',
                    data: {
                        district: district
                    },
                    success: function(data) {
                        $('select[name="district_officer"]').empty();
                        $.each(data, function(key, value) {

                            $('select[name="district_officer"]').append('<option value="' +
                            value.id + '">' + value.full_name + '</option>');
                        });
                    }
                });



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
