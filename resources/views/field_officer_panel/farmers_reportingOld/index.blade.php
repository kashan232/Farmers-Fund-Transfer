@include('agriculture_officer_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
    @include('agriculture_officer_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
    @include('agriculture_officer_panel.include.navbar_include')
<!-- [ Header ] end -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
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

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-4" style="justify-content: center; display: flex; align-items: center;">
                            <label for="" style="width: 200px">Filter By Status:</label>
                            <select  id="filter_by_status" class="form-control">
                                <option value="">All</option>
                                <option value="Verified">Verified</option>
                                <option value="Unverified">Unverified</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-responsive">
                            <div id="dom-jqry_wrapper" class="dt-container dt-bootstrap5">
                                <div class="row mt-2 justify-content-between">

                                <div class="row mt-2 justify-content-md-center">
                                    <div class="col-12 ">
                                        <div class="table-responsive">
                                            <table id="reports-table" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info" style="width: 100%;">
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
                                                            @if ($all_agriculture_farmer->verification_status === 'Verified')
                                                            <span class="badge text-bg-success">{{$all_agriculture_farmer->verification_status}}</span>
                                                            @else
                                                            <span class="badge text-bg-danger">{{$all_agriculture_farmer->verification_status}}</span>
                                                            @endif
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
    @include('agriculture_officer_panel.include.footer_copyright_include')
</footer>

@include('agriculture_officer_panel.include.footer_include')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
       table = $('#reports-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });


    $('#filter_by_status').on('change', function() {
            var status = this.value;
            if(status != '')
            {
                table.columns(8).search('^' + status + '$', true, false).draw();
            }
            else
            {
                table.columns(8).search('').draw();
            }
        });
  </script>
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
