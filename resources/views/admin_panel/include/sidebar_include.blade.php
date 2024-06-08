<div class="navbar-wrapper">
            <div class="m-header">
                <a href="#" class="b-brand text-primary">
                    <img src="../assets/images/logoswat.png" alt="logo image" class="logo-lg" style="width: 100px!important; height:100px!important;" />
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <li class="pc-item pc-hasmenu">
                        <a href="{{ route('home') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-gauge"></i>
                            </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>

                    <!-- <li class="pc-item">
                        <a href="#" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-chart-pie"></i>
                            </span>
                            <span class="pc-mtext">Chart</span>
                        </a>
                    </li> -->
                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-globe"></i>
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
                                <i class="ph-duotone ph-buildings"></i>
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
                                <i class="ph-duotone ph-buildings"></i>
                            </span>
                            <span class="pc-mtext">Area</span>
                            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item">
                                <a class="pc-link" href="{{ route('add-area') }}">Add</a>
                            </li>
                            <li class="pc-item">
                                <a class="pc-link" href="{{ route('all-area') }}">List</a>
                            </li>
                        </ul>
                    </li>

                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link">
                        <span class="pc-micon">
                                <i class="ph-duotone ph-buildings"></i>
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
                                <i class="ph-duotone ph-buildings"></i>
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

                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-user-plus"></i>
                            </span>
                            <span class="pc-mtext">Agriculture</span>
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
                                <i class="ph-duotone ph-user-plus"></i>
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

                    
                    <li class="pc-item">
                        <a href="#" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-globe"></i>
                            </span>
                            <span class="pc-mtext">Reports</span>
                        </a>
                    </li>


                </ul>

            </div>

        </div>