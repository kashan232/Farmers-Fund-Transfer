@include('admin_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
    @include('admin_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
    @include('admin_panel.include.navbar_include')
<!-- [ Header ] end -->

<style>
     .select2-selection--single {
        height: 40px !important;
    }

    .select2-selection--single .select2-selection__rendered{
        line-height: 40px !important;
    }
    .select2-selection--single .select2-selection__arrow{
        top: 8px !important;
    }


    .select2-container--default .select2-selection--multiple {
        padding-top: 5px !important;
    }



    .select2-container--default {
        width: 100% !important;
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
                        <h5>@if(!isset($field_officer)) Create Field Officer @else  Update Field Officer @endif</h5>
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

                                    @if(isset($field_officer))
                                        <input type="hidden" name="edit_id" value="{{$field_officer->id ?? ''}}">
                                    @endif

                                    <div class="row">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" value="{{$field_officer->full_name ?? ''}}" name="full_name" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Email Address</label>
                                            <input type="email" class="form-control"  value="{{$field_officer->email_address ?? ''}}" name="email_address" required>
                                            @error('email_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" class="form-control"  value=" {{$field_officer->contact_number ?? ''}} " name="contact_number" required maxlength="11" max="11" minlength="11" min="11" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Cnic</label>
                                            <input type="text" class="form-control" name="cnic"  value="{{ $field_officer->cnic ?? '' }}" >
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="mb-6 col-md-12">
                                            <label class="form-label">Select District</label>
                                            <select name="district" id="district" class="form-control">
                                                @foreach ($districts as $district)
                                                    <option value="{{$district->district}}"  @if(isset($field_officer)) {{ ($district->district == $field_officer->district) ? 'selected':'' }}  @endif>{{$district->district}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="mb-6 col-md-6">
                                            <label class="form-label">Select District Officer</label>
                                            <select name="district_officer" id="district_officer" class="form-control">
                                                @if(isset($field_officer))
                                                @foreach ($district_officers as $district_officer)
                                                <option value="{{$district_officer->id}}"  {{ ($district_officer->id == $field_officer->admin_or_user_id) ? 'selected':'' }}>{{$district_officer->full_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div> --}}
                                    </div>


                                    <div class="row mt-2">
                                        <div class="mb-3 col-md-12">
                                            <label>Select Tehsil</label><br>
                                            <select name="tehsil" id="tehsil" required class="form-control--input js-example-basic-single" style="width:100%;" >
                                                @if(isset($field_officer))
                                                @foreach ($tehsils as $tehsil)
                                                    <option {{ ($tehsil->tehsil == $field_officer->tehsil) ? 'selected':'' }} value="{{$tehsil->tehsil}}">{{$tehsil->tehsil}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>






{{--
                                    <div class="row mt-2">
                                        <div class="mb-3 col-md-12">
                                            <label>UC</label><br>
                                            <select name="ucs" id="uc"  class="form-control--input js-example-basic-single" style="width:100%;" >
                                                @if(isset($field_officer))
                                                @if($field_officer->ucs != null && is_array(json_decode($field_officer->ucs)))
                                                @foreach (json_decode($field_officer->ucs) as $uc )
                                                <option selected value="{{$uc}}">{{$uc}}</option>
                                                @endforeach
                                                @endif
                                                @endif
                                            </select>
                                        </div>
                                    </div> --}}

                                    <div class="row mt-2">
                                        <div class="mb-3 col-md-12">
                                            <label>Tappa</label><br>
                                            <select name="tappa" id="tappa"  class="form-control--input js-example-basic-single " style="width:100%;" >
                                                @if(isset($field_officer) )
                                                    @if($field_officer->tappas != null )

                                                            <option selected value="{{$field_officer->tappas}}">{{$field_officer->tappas}}</option>

                                                    @endif
                                                @endif
                                            </select>
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

        $('.js-example-basic-single').select2({

});

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
                        var ucSelect = $('select[name="ucs"]');
                        ucSelect.empty();
                        $.each(response.ucs, function(index, value) {
                            ucSelect.append('<option value="' + value + '">' + value + '</option>');
                        });

                        // Populate Tappa dropdown
                        var tappaSelect = $('select[name="tappa"]');
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
