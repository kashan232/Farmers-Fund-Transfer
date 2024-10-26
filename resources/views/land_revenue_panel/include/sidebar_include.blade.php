<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header" style="justify-content: center;">
            <a href="#" class="b-brand text-primary">
                <img src="{{asset('')}}/assets/images/Sindh_Hari_Card.png" alt="logo image" class="#logo-lg" style="max-width:120px;" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('home') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>


                {{-- <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-shield"></i>
                        </span>
                        <span class="pc-mtext">Agriculture Farmers</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-agri-farmers-by-land') }}">Agriculture Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('unverify-agri-farmers-by-land') }}">Unverify Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('verify-agri-farmers-by-land') }}">Verified Farmers</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user"></i>

                        </span>
                        <span class="pc-mtext">Agriculture User Farmers</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-agriuser-farmers-by-land') }}">Agriculture User Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('unverify-agriuser-farmers-by-land') }}">Unverify Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('verify-agriuser-farmers-by-land') }}">Verified Farmers</a>
                        </li>
                    </ul>
                </li> --}}


                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-plus"></i>
                        </span>
                        <span class="pc-mtext">Farmers Registration</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('add-land-farmers') }}">Add Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-land-farmers') }}">All Farmers</a>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('field-officer-farmers-list-by-land-officer') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">Field Officer Farmers</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('district-officer-farmers-list-by-land-officer') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">District Officer Farmers</span>
                    </a>
                </li>

                {{-- <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-check"></i>

                        </span>
                        <span class="pc-mtext">Land Verification</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('verifications-land-farmers') }}">land Revenue Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('unverify-farmers-by-land') }}">Unverify Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('verify-farmers-by-land') }}">Verified Farmers</a>
                        </li>
                    </ul>
                </li> --}}

                {{-- <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-check"></i>

                        </span>
                        <span class="pc-mtext">Online Farmer Verification</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('verifications-online-farmers') }}">Online Farmer Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('unverify-online-farmers-by-land') }}">Unverify Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('verify-online-farmers-by-land') }}">Verified Farmers</a>
                        </li>
                    </ul>
                </li> --}}

                {{-- <li class="pc-item pc-hasmenu">
                    <a href="{{ route('reporting-farmers-by-land-officer') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">Reporting</span>
                    </a>
                </li> --}}

                <li class="pc-item pc-hasmenu">
                    <a href="{{route('upload.excel.index')}}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="pc-mtext">Upload Excel Farmer</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('reporting-farmers-by-land-officer') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">Reporting</span>
                    </a>
                </li>
            </ul>

        </div>

    </div>
</nav>
