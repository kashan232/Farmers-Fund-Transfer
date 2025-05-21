@include('pd_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->

<!-- [ Sidebar Menu ] start -->
@include('pd_officer_panel.include.sidebar_include')
<!-- [ Sidebar Menu ] end -->

<!-- [ Header Topbar ] start -->
@include('pd_officer_panel.include.navbar_include')
<!-- [ Header ] end -->



<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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
                                                        <option value="all"> All Districts</option>
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
                                                    <select multiple name="tehsil[]" id="tehsil" class="form-control js-example-basic-multiple">

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

                                        <div class="col-4 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label" style="font-weight: 600;">Date Range</label>
                                                <div class="d-flex">
                                                    <input type="hidden" name="start_date" id="start_date" >
                                                    <input type="hidden" name="end_date" id="end_date" >
                                                    <input type="text" id="daterange" name="" class="form-control"> &nbsp;
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label" style="font-weight: 600;">Farmer Type</label>
                                                <select name="farmer_type" id="" class="form-control">
                                                    <option value="">Select Farmer Type</option>
                                                    <option value="Online">Online</option>
                                                    <option value="Field_Officer">Field Officer</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-4 mt-2">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label" style="font-weight: 600;">Verification Status</label>
                                                <select name="verification_status" id="" class="form-control">
                                                    <option value="">Select Verification Status</option>

                                                    <option value="rejected_by_fa">REJECTED BY FA OFFICER</option>
                                                    <option value="verified_by_fa">VERIFIED BY FA OFFICER</option>

                                                    <option value="rejected_by_ao">REJECTED BY AO OFFICER</option>
                                                    <option value="verified_by_ao">VERIFIED BY AO OFFICER</option>

                                                    <option value="rejected_by_dd">REJECTED BY DD OFFICER</option>
                                                    <option value="verified_by_dd">VERIFIED BY DD OFFICER</option>

                                                    <option value="rejected_by_lrd">REJECTED LRD OFFICER</option>
                                                    <option value="verified_by_lrd">VERIFIED LRD OFFICER</option>

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
    @include('pd_officer_panel.include.footer_copyright_include')
</footer>

@include('pd_officer_panel.include.footer_include')

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(document).ready(function () {



        $(function() {
            $('#daterange').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                $('#start_date').val(start.format('YYYY-MM-DD'));
                $('#end_date').val(end.format('YYYY-MM-DD'));
            });
        });


        // $('#district').change(function () {
        //     var district_id = $(this).val();
        //     var url = "{{ route('get-tehsils', ':district_id') }}".replace(':district_id', district_id);
        //     $('#taluka').html('<option value="">Loading...</option>');

        //     if (district_id) {
        //         $.ajax({
        //             url: url,
        //             type: "GET",
        //             data: {
        //                         district: district_id
        //                     },
        //             success: function (data) {
        //                 $('#taluka').html('<option value="">All Taluka</option>');
        //                 $.each(data, function (key, district) {

        //                     console.log(data);
        //                     $('#taluka').append('<option value="' + district+ '">' + district + '</option>');
        //                 });
        //             }
        //         });
        //     } else {
        //         $('#taluka').html('<option value="">Select District First</option>');
        //     }
        // });


        // $('#taluka').change(function () {
        //     var taluka_id = $(this).val();
        //     var url = "{{ route('get-ucs', ':taluka_id') }}".replace(':taluka_id', taluka_id);
        //     $('#tappa').html('<option value="">Loading...</option>');
        //     var district = $('#district').val();
        //     if (taluka_id) {
        //         $.ajax({
        //             url: url,
        //             type: "GET",
        //             data: {
        //                 district: district,
        //                 tehsil: taluka_id
        //             },
        //             success: function (data) {
        //                 $('#tappa').html('<option value="">All Tappas</option>');

        //                 $.each(data.Tappas, function(index, value) {
        //                     $('#tappa').append('<option value="' + value + '">' + value + '</option>');
        //                 });
        //             }
        //         });
        //     } else {
        //         $('#tappa').html('<option value="">Select Taluka First</option>');
        //     }
        // });

        // $('#tappa').off('change').on('change', function () {
        //     if ($(this).val().includes("")) {
        //         $('#tappa option').prop('selected', true);
        //     }
        // });


    });
    </script>



<script>
    $(document).ready(function() {
     

    // Handle "All" selection logic
    $(document).on('change', 'select[name="district[]"]', function () {
        
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
        handleGetTehsilsRequest();
    });

        

    function handleGetTehsilsRequest() {
        var district = $('select[name="district[]"]').val();

        // If "All" is selected, we need to remove "all" from the selected values
        if (district.includes("all")) {
            district = district.filter(function(value) {
                return value !== "all";  // Remove "all" from the selected list
            });
        }

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



    }




        
   
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


</body>

</html>
