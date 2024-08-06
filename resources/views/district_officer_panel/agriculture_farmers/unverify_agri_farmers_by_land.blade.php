@include('district_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('district_officer_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('district_officer_panel.include.navbar_include')
<!-- [ Header ] end -->


<div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Farmers Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <form id="verifyfarmers" action="{{ route('verify-unverify-agri-farmers-by-do') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="statusSelect">Status</label>
                                <input type="hidden" id="farmers_id" name="farmers_id" readonly>
                                <select class="form-control" id="statusSelect" name="verification_status">
                                    <option value="1">Verified</option>
                                    <option value="0">Unverified</option>
                                </select>
                            </div>
                            <div class="form-group" id="reasonBox" style="display: none;">
                                <label for="reasonTextarea">Reason</label>
                                <textarea class="form-control" id="reasonTextarea" name="declined_reason" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">List Unverify Agriculture Farmers</h2>
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
                                                        <th>Verify</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($all_agriculture_farmers as $all_agriculture_farmer)
                                                    <tr>
                                                        <td>{{ $all_agriculture_farmer->name }}</td>
                                                        <td>{{ $all_agriculture_farmer->cnic }}</td>
                                                        <td>{{ $all_agriculture_farmer->mobile }}</td>
                                                        <td>{{ $all_agriculture_farmer->district }}</td>
                                                        <td>{{ $all_agriculture_farmer->tehsil }}</td>
                                                        <td>{{ $all_agriculture_farmer->uc }}</td>
                                                        <td>{{ $all_agriculture_farmer->tappa }}</td>
                                                        <td>{{ $all_agriculture_farmer->village }}</td>
                                                        <td>

                                                            @if ($all_agriculture_farmer->verification_status == '2')
                                                            <span class="badge text-bg-success">e By Land Officer</span>
                                                            @elseif ($all_agriculture_farmer->verification_status == '0' && $all_agriculture_farmer->declined_reason != '')
                                                            <span class="badge text-bg-danger">Rejected by District Officer</span>
                                                            @else
                                                            <span class="badge text-bg-danger">Unverified</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalLive" data-id="{{ $all_agriculture_farmer->id }}">Verify</button>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{ route('view-do-farmers', ['id' => $all_agriculture_farmer->id]) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>&nbsp;
                                                            </div>
                                                        </td>
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
    @include('district_officer_panel.include.footer_copyright_include')
</footer>

@include('district_officer_panel.include.footer_include')
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
            if (this.value == '0') {
                reasonBox.style.display = 'block';
                document.getElementById('reasonTextarea').required = true;
            } else {
                reasonBox.style.display = 'none';
                document.getElementById('reasonTextarea').required = false;
            }
        });
    });
</script>

</body>

</html>