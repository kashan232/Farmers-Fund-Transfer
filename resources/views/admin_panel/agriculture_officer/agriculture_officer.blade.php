@include('admin_panel.include.header_include')

<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    @include('admin_panel.include.navbar_include')

    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    @include('admin_panel.include.sidebar_include')

    <!--**********************************
            Sidebar end
        ***********************************-->

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create Agriculture Extension Field Officer</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('store-agri-officer') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="full_name">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" name="contact_number">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control" name="address" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Email Address</label>
                                            <input type="email" class="form-control" name="email_address">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Select District</label>
                                            <select name="district" id="editprojectName" class="form-control">
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($all_district as $district)
                                                <option value="{{ $district->district }}">
                                                    {{ $district->district }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Select Tehsil</label>
                                            <select name="tehsil" id="editprojectName" class="form-control">
                                                <option value="" selected disabled>Select One</option>
                                                @foreach ($all_tehsil as $tehsil)
                                                <option value="{{ $tehsil->tehsil }}">
                                                    {{ $tehsil->tehsil }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
    @include('admin_panel.include.footer_copyright_include')
    <!--**********************************
            Footer end
        ***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

@include('admin_panel.include.footer_include')

</body>

</html>