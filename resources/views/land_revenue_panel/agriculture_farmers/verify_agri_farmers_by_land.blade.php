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
                            <h2 class="mb-0">Agriculture verified Farmers</h2>
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
                                <div class="row mt-2 justify-content-between">
                                    <div class="col-md-auto me-auto ">
                                        <div class="dt-length"><select name="dom-jqry_length" aria-controls="dom-jqry" class="form-select form-select-sm" id="dt-length-0">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select></div>
                                    </div>
                                    <div class="col-md-auto ms-auto ">
                                        <div class="dt-search"><label for="dt-search-0">Search:</label><input type="search" class="form-control form-control-sm" id="dt-search-0" placeholder="" aria-controls="dom-jqry"></div>
                                    </div>
                                </div>
                                <div class="row mt-2 justify-content-md-center">
                                    <div class="col-12 ">
                                        <div class="table-responsive">
                                            <table id="dom-jqry" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>CNIC</th>
                                                        <th>District</th>
                                                        <th>Tehsil</th>
                                                        <th>UC</th>
                                                        <th>Area</th>
                                                        <th>Mobile</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($all_agriculture_farmers as $all_agriculture_farmer)
                                                    <tr>
                                                        <td>{{ $all_agriculture_farmer->name }}</td>
                                                        <td>{{ $all_agriculture_farmer->cnic }}</td>
                                                        <td>{{ $all_agriculture_farmer->district }}</td>
                                                        <td>{{ $all_agriculture_farmer->tehsil }}</td>
                                                        <td>{{ $all_agriculture_farmer->uc }}</td>
                                                        <td>{{ $all_agriculture_farmer->area }}</td>
                                                        <td>{{ $all_agriculture_farmer->mobile }}</td>
                                                        <td>
                                                            @if ($all_agriculture_farmer->verification_status === 'Verified')
                                                            <span class="badge text-bg-success">Verified</span>
                                                            @else
                                                            <span class="badge text-bg-danger">Unverified</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2 justify-content-between">
                                    <div class="col-md-auto me-auto ">
                                        <div class="dt-info" aria-live="polite" id="dom-jqry_info" role="status">Showing 1 to 10 of 20 entries</div>
                                    </div>
                                    <div class="col-md-auto ms-auto ">
                                        <div class="dt-paging paging_full_numbers">
                                            <ul class="pagination">
                                                <li class="dt-paging-button page-item disabled"><a class="page-link first" aria-controls="dom-jqry" aria-disabled="true" aria-label="First" data-dt-idx="first" tabindex="-1">«</a></li>
                                                <li class="dt-paging-button page-item disabled"><a class="page-link previous" aria-controls="dom-jqry" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1">‹</a></li>
                                                <li class="dt-paging-button page-item active"><a href="#" class="page-link" aria-controls="dom-jqry" aria-current="page" data-dt-idx="0" tabindex="0">1</a></li>
                                                <li class="dt-paging-button page-item"><a href="#" class="page-link" aria-controls="dom-jqry" data-dt-idx="1" tabindex="0">2</a></li>
                                                <li class="dt-paging-button page-item"><a href="#" class="page-link next" aria-controls="dom-jqry" aria-label="Next" data-dt-idx="next" tabindex="0">›</a></li>
                                                <li class="dt-paging-button page-item"><a href="#" class="page-link last" aria-controls="dom-jqry" aria-label="Last" data-dt-idx="last" tabindex="0">»</a></li>
                                            </ul>
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