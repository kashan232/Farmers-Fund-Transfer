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
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Home</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Agriculture User Dashboard</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="dashboard">
                    <div class="all-card">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-pink">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">District / Tehsil</p>
                                                <h2 class="card-text text-amount"> {{ $districtCount }} / {{ $tehsilCount }} </h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-area">
                                                    <i class="fas fa-city" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-orange">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Tappa</p>
                                                <h2 class="card-text text-amount">{{ $tappaCount }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-pie">
                                                    <i class="fas fa-store-alt" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-yellow">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">UC</p>
                                                <h2 class="card-text text-amount">{{ $ucCount }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-yellow">
                                                    <i class="fas fa-warehouse" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-blue">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Total Farmers</p>
                                                <h2 class="card-text text-amount">{{ $agriUserfarmersCount }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-skyblue">
                                                    <i class="fas fa-user" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-bluedark">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">Verified Farmers</p>
                                                <h2 class="card-text text-amount">{{ $Verifiedfarmeragiruser }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-blue">
                                                    <i class="fas fa-user-shield" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body border-left-green">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-title text-title">UnVerified Farmers</p>
                                                <h2 class="card-text text-amount">{{ $Unverifiedfarmeragiruser }}</h2>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon-shape icon-green">
                                                    <i class="fas fa-user-tie" aria-hidden="true"></i>
                                                </div>
                                            </div>
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