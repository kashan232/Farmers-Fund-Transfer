@include('land_revenue_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
    @include('land_revenue_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
    @include('land_revenue_panel.include.navbar_include')
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
                            <h2 class="mb-0">Land Revenue Farmers</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-responsive">
                            <div id="dom-jqry_wrapper" class="dt-container dt-bootstrap5">
                                <div class="row mt-2 justify-content-md-center">
                                    <div class="col-12 ">
                                        <div class="table-responsive">
                                        <table id="example" class="display" style="width:100%" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>CNIC</th>
                                                        <th>Mobile</th>
                                                        <th>District</th>
                                                        <th>Tehsil</th>
                                                        <th>UC</th>
                                                        <th>Tappa</th>
                                                        <th>Village</th>
                                                        <th>Status</th>
                                                        <th>Declined Reason</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($all_land_farmers as $all_land_farmer)
                                                    <tr>
                                                        <td>{{ $all_land_farmer->name }}</td>
                                                        <td>{{ $all_land_farmer->cnic }}</td>
                                                        <td>{{ $all_land_farmer->mobile }}</td>
                                                        <td>{{ $all_land_farmer->district }}</td>
                                                        <td>{{ $all_land_farmer->tehsil }}</td>
                                                        <td>{{ $all_land_farmer->uc }}</td>
                                                        <td>{{ $all_land_farmer->tappa }}</td>
                                                        <td>{{ $all_land_farmer->village }}</td>
                                                        <td>
                                                            @if ($all_land_farmer->verification_status === 'Verified')
                                                            <span class="badge text-bg-success">Verified</span>
                                                            @else
                                                            <span class="badge text-bg-danger">Unverified</span>
                                                            @endif
                                                        </td>
                                                        @if ($all_land_farmer->verification_status === 'Unverified')
                                                        @if (is_null($all_land_farmer->declined_reason))
                                                        <td>-</td>
                                                        @else
                                                        <td>{{ $all_land_farmer->declined_reason }}</td>
                                                        @endif
                                                        @else
                                                        <td>-</td>
                                                        @endif

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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
    @include('land_revenue_panel.include.footer_copyright_include')
</footer>

@include('land_revenue_panel.include.footer_include')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Event listener for opening the modal
        var exampleModalLive = document.getElementById('exampleModalLive');
        exampleModalLive.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var farmerId = button.getAttribute('data-id');
            var farmersIdInput = exampleModalLive.querySelector('#farmers_id');
            farmersIdInput.value = farmerId;
        });

        // Event listener for changing the status
        var statusSelect = document.getElementById('statusSelect');
        statusSelect.addEventListener('change', function() {
            var reasonBox = document.getElementById('reasonBox');
            if (this.value === 'Unverified') {
                reasonBox.style.display = 'block';
            } else {
                reasonBox.style.display = 'none';
            }
        });
    });
</script>

</body>

</html>
