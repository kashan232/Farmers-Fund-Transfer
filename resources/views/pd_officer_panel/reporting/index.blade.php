@include('pd_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->

<!-- [ Sidebar Menu ] start -->
@include('pd_officer_panel.include.sidebar_include')
<!-- [ Sidebar Menu ] end -->

<!-- [ Header Topbar ] start -->
@include('pd_officer_panel.include.navbar_include')
<!-- [ Header ] end -->



<style>
   .tables nav{
        display: flex;
        justify-content: right;

    }
</style>
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Farmer Report</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('dg.farmers.reporting.fetch') }}" method="post" >
                                    @csrf


                                    <div class="row mt-2">

                                        <div class="col-4 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label" style="font-weight: 600;">Districts</label>
                                                <div class="d-flex">
                                                    <select multiple name="district[]" id="district" class="form-control js-example-basic-multiple">
                                                        <option value=""> All Districts</option>
                                                        @foreach ($districts as $district)
                                                            <option value="{{$district->district}}">{{$district->district}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label" style="font-weight: 600;">Taluka</label>
                                                <div class="d-flex">
                                                    <select multiple name="taluka[]" id="taluka" class="form-control js-example-basic-multiple">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label" style="font-weight: 600;">Tappa</label>
                                                <div class="d-flex">
                                                    <select multiple name="tappa[]" id="tappa" class="form-control js-example-basic-multiple">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Date Range -->


{{--
                                        <div class="col-6 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label" style="font-weight: 600;">Date Range</label>
                                                <div class="d-flex">
                                                    <input type="hidden" name="start_date" id="start_date" >
                                                    <input type="hidden" name="end_date" id="end_date" >
                                                    <input type="text" id="daterange" name="" class="form-control"> &nbsp;
                                                </div>
                                            </div>
                                        </div> --}}
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
    @include('pd_officer_panel.include.footer_copyright_include')
</footer>

@include('pd_officer_panel.include.footer_include')

<script>
    $(document).ready(function () {

        $('#district').change(function () {
            var district_id = $(this).val();
            var url = "{{ route('get-tehsils', ':district_id') }}".replace(':district_id', district_id);
            $('#taluka').html('<option value="">Loading...</option>');

            if (district_id) {
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                                district: district_id
                            },
                    success: function (data) {
                        $('#taluka').html('<option value="">All Taluka</option>');
                        $.each(data, function (key, district) {

                            console.log(data);
                            $('#taluka').append('<option value="' + district+ '">' + district + '</option>');
                        });
                    }
                });
            } else {
                $('#taluka').html('<option value="">Select District First</option>');
            }
        });


        $('#taluka').change(function () {
            var taluka_id = $(this).val();
            var url = "{{ route('get-ucs', ':taluka_id') }}".replace(':taluka_id', taluka_id);
            $('#tappa').html('<option value="">Loading...</option>');
            var district = $('#district').val();
            if (taluka_id) {
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        district: district,
                        tehsil: taluka_id
                    },
                    success: function (data) {
                        $('#tappa').html('<option value="">All UCs</option>');

                        $.each(data.Tappas, function(index, value) {
                            $('#tappa').append('<option value="' + value + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#tappa').html('<option value="">Select Taluka First</option>');
            }
        });


    });
    </script>

</body>

</html>
