@include('agriculture_user_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
@include('agriculture_user_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
@include('agriculture_user_panel.include.navbar_include')
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
                            <h2 class="mb-0">Agriculture User Farmers</h2>
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
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="example" class="display" style="width:100%" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info">
                                                <thead>
                                                    <tr>
                                                        <th>Sno</th>
                                                        <th>Name</th>
                                                        <th>CNIC</th>
                                                        <th>Mobile</th>
                                                        <th>District</th>
                                                        <th>Tehsil</th>
                                                        <th>UC</th>
                                                        <th>Tappa</th>
                                                        <th>Village</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($all_agriuser_farmers as $all_agriuser_farmer)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $all_agriuser_farmer->name }}</td>
                                                        <td>{{ $all_agriuser_farmer->cnic }}</td>
                                                        <td>{{ $all_agriuser_farmer->mobile }}</td>
                                                        <td>{{ $all_agriuser_farmer->district }}</td>
                                                        <td>{{ $all_agriuser_farmer->tehsil }}</td>
                                                        <td>{{ $all_agriuser_farmer->uc }}</td>
                                                        <td>{{ $all_agriuser_farmer->tappa }}</td>
                                                        <td>{{ $all_agriuser_farmer->village }}</td>

                                                        
                                                        <td>

                                                            @if ($all_agriuser_farmer->verification_status == '0')
                                                            <span class="badge text-bg-danger">Rejected By District Officer</span>
                                                            
                                                            @else
                                                            <span class="badge text-bg-success">{{ $all_agriuser_farmer->verification_status }}</span>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{ route('view-agriuser-farmers', ['id' => $all_agriuser_farmer->id]) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>&nbsp;
                                                                <a href="{{ route('edit-agriuser-farmers', ['id' => $all_agriuser_farmer->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>&nbsp;
                                                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>&nbsp;
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
    @include('agriculture_user_panel.include.footer_copyright_include')
</footer>

@include('agriculture_user_panel.include.footer_include')

</body>

</html>