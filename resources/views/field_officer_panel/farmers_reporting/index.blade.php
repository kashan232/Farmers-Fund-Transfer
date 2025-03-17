@include('field_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('field_officer_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('field_officer_panel.include.navbar_include')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


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
                                <h2 class="mb-0">Reporting</h2>
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
                                    <form action="{{ route('view.reporting-farmers-by-field-officer') }}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <input class="form-control" type="hidden" readonly value="{{ $district }}" name="district">
                                        <input class="form-control" type="hidden" readonly value="{{ $tehsil }}" name="tehsil">

                                        <div class="row mt-2">

                                            <div class="col-6 mt-2">
                                                <div class="mb-12 col-md-12">
                                                    <label class="form-label" style="font-weight: 600;">House Type</label>
                                                    <div class="d-flex">
                                                        <select name="house_type" id="" class="form-control">
                                                            <option value="">Choose House Type</option>
                                                            <option value="kacha_house">Kacha</option>
                                                            <option value="pakka_house">Pakka</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 mt-2">
                                                <div class="mb-12 col-md-12">
                                                    <label class="form-label" style="font-weight: 600;">Owner Type</label>
                                                    <div class="d-flex">
                                                        <select name="owner_type" id="" class="form-control">
                                                            <option value="">Choose Owner Type</option>
                                                            <option value="owner">owner</option>
                                                            <option value="makadedar">makadedar</option>
                                                            <option value="sharecropper">sharecropper</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Acreage Range -->
                                            <div class="col-6 mt-2">
                                                <div class="mb-12 col-md-12">
                                                    <label class="form-label" style="font-weight: 600;">Acreage Range</label>
                                                    <div class="d-flex">
                                                        <input type="text" name="min_acre" class="form-control" placeholder="Min Acre" oninput="if (!/[0-9]/.test(this.value)) { this.value = this.value.replace(/\./g, ''); } this.value = this.value.replace(/[^0-9.]/g, '').replace(/(?!^)(\..*)\..*/g, '$1').slice(0, 20)"> &nbsp;
                                                        <input type="text" name="max_acre" class="form-control ml-2" placeholder="Max Acre" oninput="if (!/[0-9]/.test(this.value)) { this.value = this.value.replace(/\./g, ''); } this.value = this.value.replace(/[^0-9.]/g, '').replace(/(?!^)(\..*)\..*/g, '$1').slice(0, 20)">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Date Range -->



                                            <div class="col-6 mt-2">
                                                <div class="mb-12 col-md-12">
                                                    <label class="form-label" style="font-weight: 600;">Date Range</label>
                                                    <div class="d-flex">
                                                        <input type="hidden" name="start_date" id="start_date" >
                                                        <input type="hidden" name="end_date" id="end_date" >
                                                        <input type="text" id="daterange" name="" class="form-control"> &nbsp;
                                                    </div>
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
        @include('field_officer_panel.include.footer_copyright_include')
  </footer>

    @include('field_officer_panel.include.footer_include')


    <script>


        $(document).ready(function() {

            $(function() {
                $('#daterange').daterangepicker({
                    opens: 'left'
                }, function(start, end, label) {
                    $('#start_date').val(start.format('YYYY-MM-DD'));
                    $('#end_date').val(end.format('YYYY-MM-DD'));
                });
            });


        $('.js-example-basic-multiple').select2();

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
