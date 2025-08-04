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


                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('farmers-by-dd') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="pc-mtext">Farmers</span>
                    </a>
                </li>

                {{-- <li class="pc-item pc-hasmenu">
                    <a href="{{ route('passwordChange') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-chart-bar"></i>
                        </span>
                        <span class="pc-mtext">Change Password</span>
                    </a>
                </li> --}}


                {{-- <li class="pc-item pc-hasmenu">
                    <a href="{{ route('reporting-farmers-by-ao') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-chart-bar"></i>

                        </span>
                        <span class="pc-mtext">Reporting</span>
                    </a>
                </li> --}}



                {{--
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-check"></i>
                        </span>
                        <span class="pc-mtext">Land Verification</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('unverify-farmers-by-do') }}">Unverify Farmers</a>
                </li>
                <li class="pc-item">
                    <a class="pc-link" href="{{ route('verify-farmers-by-do') }}">Verified Farmers</a>
                </li>
            </ul>
            </li>

            <li class="pc-item pc-hasmenu">
                <a href="#!" class="pc-link">
                    <span class="pc-micon">
                        <i class="fas fa-user-check"></i>

                    </span>
                    <span class="pc-mtext">Online Farmers</span>
                    <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                </a>
                <ul class="pc-submenu">
                    <li class="pc-item">
                        <a class="pc-link" href="{{ route('unverify-online-farmers-by-do') }}">Unverify Farmers</a>
                    </li>
                    <li class="pc-item">
                        <a class="pc-link" href="{{ route('verify-online-farmers-by-do') }}">Verified Farmers</a>
                    </li>
                </ul>
            </li> --}}
            </ul>
        </div>
    </div>
</nav>
