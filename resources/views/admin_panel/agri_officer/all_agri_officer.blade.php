@include('admin_panel.include.header_include')
<!-- [ Pre-loader ] End -->
<!-- [ Sidebar Menu ] start -->
    @include('admin_panel.include.sidebar_include')

<!-- [ Sidebar Menu ] end -->
<!-- [ Header Topbar ] start -->
    @include('admin_panel.include.navbar_include')
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
                            <h2 class="mb-0">All Agriculture Officer</h2>
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
                                        <table id="dom-jqry" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th><strong>Sno</strong></th>
                                                    <th><strong>Full Name</strong></th>
                                                    <th><strong>Contact Number</strong></th>
                                                    <th><strong>Cnic</strong></th>
                                                    <th><strong>Email Address</strong></th>
                                                    <th><strong>District </strong></th>
                                                    <th><strong>Tehsils</strong></th>
                                                    <th><strong>Tappa</strong></th>
                                                    <th><strong>Username</strong></th>
                                                    <th><strong>Password</strong></th>
                                                    <th class="text-end"><strong>Action</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($all_agri as $agri)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $agri->full_name }}</td>
                                                    <td>{{ $agri->contact_number }}</td>
                                                    <td>{{ $agri->cnic }}</td>
                                                    <td>{{ $agri->email_address }}</td>
                                                    <td>{{ $agri->district }}</td>
                                                    <td>
                                                        @php
                                                            $tehsil = json_decode($agri->tehsil);
                                                        @endphp
                                                        @if(is_array($tehsil))
                                                            @foreach($tehsil as $index => $tehsilItem)
                                                                @if($index < 4)
                                                                    {{ $tehsilItem }}@if($index < 3), @endif
                                                                @endif
                                                            @endforeach

                                                            @if(count($tehsil) > 4)
                                                                +{{ count($tehsil) - 4 }}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @php
                                                            $tappa = json_decode($agri->tappas);
                                                        @endphp
                                                        @if(is_array($tappa))
                                                            @foreach($tappa as $index => $tappaItem)
                                                                @if($index < 4)
                                                                <span class="badge text-bg-success text-dark font-weight-bold">{{ $tappaItem }}</span> <b> @if($index < 3)  </b> <br> @endif
                                                                @endif
                                                            @endforeach

                                                            @if(count($tappa) > 4)
                                                                +{{ count($tappa) - 4 }}
                                                            @endif
                                                        @endif
                                                    </td>


                                                        <td>{{ $agri->username }}</td>
                                                        <td>{{ $agri->password }}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{route('agri-officer-edit',$agri->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
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
    @include('admin_panel.include.footer_copyright_include')
</footer>

@include('admin_panel.include.footer_include')

</body>

</html>
