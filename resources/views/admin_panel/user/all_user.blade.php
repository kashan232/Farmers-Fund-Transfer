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
                            <h2 class="mb-0">List User</h2>
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
                                    <div class="col-12 table-responsive">
                                        <table id="dom-jqry" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th>Sno</th>
                                                    <th>Name</th>
                                                    <th>CNIC</th>
                                                    <th>District</th>
                                                    <th>Tehsil</th>
                                                    <th>UC</th>
                                                    <th>Tappa</th>
                                                    <th>Mobile No</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($all_user as $user )
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->user_name }}</td>
                                                    <td>{{ $user->cnic }}</td>
                                                    <td>{{ $user->district }}</td>
                                                    <td>
                                                        @php
                                                        $tehsil = json_decode($user->tehsil);
                                                        @endphp
                                                        @if(is_array($tehsil))
                                                        @foreach($tehsil as $tehsil)
                                                        {{ $tehsil }}<br>
                                                        @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @php
                                                        $userUcArray = json_decode($user->ucs);
                                                        @endphp
                                                        @if(is_array($userUcArray))
                                                        @foreach($userUcArray as $uc)
                                                        {{ $uc }}<br>
                                                        @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @php
                                                        $usertappaArray = json_decode($user->tappas);
                                                        @endphp
                                                        @if(is_array($usertappaArray))
                                                        @foreach($usertappaArray as $tappa)
                                                        {{ $tappa }}<br>
                                                        @endforeach
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->number }}</td>
                                                    <td><img src="{{asset($user->img)}}" alt="" width="50px" height="50px"></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="/edit-user/{{$user->id}}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
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
