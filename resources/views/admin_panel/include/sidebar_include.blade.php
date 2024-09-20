<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header" style="justify-content: center;">
            <a href="#" class="b-brand text-primary">
                <img src="assets/images/Sindh_Hari_Card.png" alt="logo image" class="logo-lg" style="max-width:100px;" />
            </a>
            <!-- <h3 class="mt-2" style="font-size: 13px;text-align:center;color:#e5e5e5;letter-spacing: 1px;"><span style="font-size: 24px;letter-spacing: 3px;line-height: 1.5;">Sindh</span> <br> Hari Card</h3> -->
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar custom-navbar">
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('home') }}" class="nav-link-a pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('farmers') }}" class="nav-link-a pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="pc-mtext">Farmers</span>
                    </a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="pc-mtext">Agriculture  User</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('add-user') }}">Add</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-user') }}">List</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-shield"></i>
                        </span>
                        <span class="pc-mtext">Agriculture Officer</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('agri-officer-create') }}">Create Officer</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-agri-officer') }}">All Officer</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-tie"></i>
                        </span>
                        <span class="pc-mtext">Land Revenue</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('add-revenue-officer') }}">Create Officer</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-revenue-officer') }}">All Officer</a>
                        </li>
                    </ul>
                </li>


                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-tie"></i>
                        </span>
                        <span class="pc-mtext">District Officer</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('district-officer-create') }}">Create Officer</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-district-officer') }}">All Officer</a>
                        </li>
                    </ul>
                </li>


                <!-- <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-tie"></i>
                        </span>
                        <span class="pc-mtext">Caller User</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('caller-user-create') }}">Create Caller User</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-caller-user') }}">All Caller Users</a>
                        </li>
                    </ul>
                </li> -->



                <!-- <li class="pc-item">
                    <a href="{{ route('reporting') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class=""></i>
                        </span>
                        <span class="pc-mtext"></span>
                    </a>
                </li> -->

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('reporting') }}" class="nav-link-a pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-chart-bar"></i>
                        </span>
                        <span class="pc-mtext">Reports</span>
                    </a>
                </li>


                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-building"></i>
                        </span>
                        <span class="pc-mtext">District</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('add-district') }}">Add</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-district') }}">List</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-city"></i>
                        </span>
                        <span class="pc-mtext">Tehsil</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('add-tehsil') }}">Add</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-tehsil') }}">List</a>
                        </li>
                    </ul>
                </li>


                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-store-alt"></i>
                        </span>
                        <span class="pc-mtext">Tappa</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('add-tappa') }}">Add</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-tappa') }}">List</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-warehouse"></i>
                        </span>
                        <span class="pc-mtext">UC</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('add-uc') }}">Add</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-uc') }}">List</a>
                        </li>
                    </ul>
                </li>


            </ul>

        </div>

    </div>
</nav>
