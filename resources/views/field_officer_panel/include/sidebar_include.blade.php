<nav class="pc-sidebar" style="background:#033323;">
    <div class="navbar-wrapper">
        <div class="m-header" style="justify-content: center;">
            <a href="#" class="b-brand text-primary">
                <img src="../assets/images/Sindh_Hari_Card.png" alt="logo image" class="logo-lg" style="max-width:120px;" />
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
                    <a href="{{ route('farmers-list-field-officer') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">All Farmers</span>
                    </a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('farmer-create-by-field-officer') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">Add Farmers</span>
                    </a>
                </li>


                {{--
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
                            <a class="pc-link" href="{{ route('add-agri-farmers') }}">Add Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-agri-farmers') }}">All Farmers</a>
                        </li>
                    </ul>
                </li>


                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-check"></i>
                        </span>
                        <span class="pc-mtext">Farmers Verification </span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('agri-unverify-farmers') }}">Unverify Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('agri-verify-farmers') }}">Verified Farmers</a>
                        </li>
                    </ul>
                </li>
                --}}


                {{-- <li class="pc-item pc-hasmenu">
                    <a href="{{ route('agri-officer-reporting') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">Reporting</span>
                    </a>
                </li> --}}

            </ul>

        </div>

    </div>
</nav>
