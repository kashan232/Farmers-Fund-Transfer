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
                            <h2 class="mb-0">Reports</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="reports-table" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Name</th>
                                <th>CNIC</th>
                                <th>District</th>
                                <th>Tehsil</th>
                                <th>UC</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Declined Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$data->getTable()}}</td>
                                <td>{{$data->cnic}}</td>
                                <td>{{$data->district}}</td>
                                <td>{{$data->tehsil}}</td>
                                <td>{{$data->uc}}</td>
                                <td>{{$data->mobile}}</td>
                                <td><span style="background: {{ ($data->verification_status == 'Unverified') ? 'red' : 'blue' }}" class="badge badge-info">{{$data->verification_status}}</span></td>
                                @if ($data->verification_status === 'Unverified')
                                                        @if (is_null($data->declined_reason))
                                                        <td>-</td>
                                                        @else
                                                        <td>{{ $data->declined_reason }}</td>
                                                        @endif
                                                        @else
                                                        <td>-</td>
                                                        @endif
                                <td class="text-center">
                                    @if ($data->getTable() == 'agriculture_farmers_registrations')
                                    <a href="/view-reports/{{$data->id}}/AgricultureFarmersRegistration" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                    @elseif ($data->getTable() == 'land_revenue_farmer_registations')
                                    <a href="/view-reports/{{$data->id}}/LandRevenueFarmerRegistation" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                    @elseif ($data->getTable() == 'online_farmer_registrations')
                                    <a href="/view-reports/{{$data->id}}/OnlineFarmerRegistration" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                    @else
                                    <a href="/view-reports/{{$data->id}}/AgricultureUserFarmerRegistration" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#reports-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
</script>
</body>

</html>
