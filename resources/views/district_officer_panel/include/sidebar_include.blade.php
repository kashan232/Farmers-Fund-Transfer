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
                        <span class="pc-mtext">Farmers</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('do-farmers') }}">All Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('do-create-farmer') }}">Create Farmer</a>
                        </li>
                    </ul>
                </li>



                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('lrd-farmers') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">LRD Farmers</span>
                    </a>
                </li> --}}

                {{-- <li class="pc-item pc-hasmenu">
                    <a href="{{ route('all-field-officer-by-do') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-shield"></i>
                        </span>
                        <span class="pc-mtext">Field Assistants</span>
                    </a>
                </li> --}}


                <!-- <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                        </span>
                        <span class="pc-mtext">Field Assistant</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href=""></a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('create-field-officer-by-do') }}">Create Field Assistant</a>
                        </li>
                    </ul>
                </li> -->

                {{-- <li class="pc-item pc-hasmenu">
                    <a href="{{ route('agri-farmers') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-friends"></i>
                        </span>
                        <span class="pc-mtext">A-O Farmers</span>
                    </a>
                </li> --}}

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('field-farmers') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-shield"></i>
                        </span>
                        <span class="pc-mtext">Farmers</span>
                    </a>
                </li>

                {{-- <li class="pc-item pc-hasmenu">
                    <a href="{{ route('online-farmers') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-globe-europe"></i>
                        </span>
                        <span class="pc-mtext">Online Farmers</span>
                    </a>
                </li> --}}

            <li class="pc-item pc-hasmenu">
                <a href="{{ route('reporting-farmers-by-do') }}" class="pc-link">
                    <span class="pc-micon">
                        <i class="fas fa-chart-bar"></i>
                    </span>
                    <span class="pc-mtext">Reporting</span>
                </a>
            </li>
            <li class="pc-item pc-hasmenu">
                <a href="{{ route('passwordChange') }}" class="pc-link">
                    <span class="pc-micon">
                        <i class="fas fa-chart-bar"></i>
                    </span>
                    <span class="pc-mtext">Change Password</span>
                </a>
            </li>


            </ul>
        </div>
    </div>
</nav>
