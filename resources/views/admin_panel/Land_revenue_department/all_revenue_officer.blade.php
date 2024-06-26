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



<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">List Revenue Officer</h2>
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
                                                        <th><strong>Sno</strong></th>
                                                        <th><strong>Full Name</strong></th>
                                                        <th><strong>Contact Number</strong></th>
                                                        <th><strong>Address</strong></th>
                                                        <th><strong>Email Address</strong></th>
                                                        <th><strong>District <br> Tehsil</strong></th>
                                                        <th><strong>UC</strong></th>
                                                        <th><strong>Tappa</strong></th>
                                                        <th><strong>Username</strong></th>
                                                        <th class="text-end"><strong>Action</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($all_revenue as $revenue)
                                                    <tr>
                                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                                        <td>{{ $revenue->full_name }}</td>
                                                        <td>{{ $revenue->contact_number }}</td>
                                                        <td>{{ $revenue->address }}</td>
                                                        <td>{{ $revenue->email_address }}</td>
                                                        <td>
                                                            @php
                                                            $tehsil = json_decode($revenue->tehsil);
                                                            @endphp
                                                            @if(is_array($tehsil))
                                                            @foreach($tehsil as $tehsil)
                                                            {{ $tehsil }}<br>
                                                            @endforeach
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @php
                                                            $userUcArray = json_decode($revenue->ucs);
                                                            @endphp
                                                            @if(is_array($userUcArray))
                                                            @foreach($userUcArray as $uc)
                                                            {{ $uc }}<br>
                                                            @endforeach
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @php
                                                            $usertappaArray = json_decode($revenue->tappas);
                                                            @endphp
                                                            @if(is_array($usertappaArray))
                                                            @foreach($usertappaArray as $tappa)
                                                            {{ $tappa }}<br>
                                                            @endforeach
                                                            @endif
                                                        </td>
                                                        <td>{{ $revenue->username }}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="/edit-revenue-officer/{{$revenue->id}}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                            </div>
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
    @include('admin_panel.include.footer_copyright_include')
</footer>

@include('admin_panel.include.footer_include')

</body>

</html>
