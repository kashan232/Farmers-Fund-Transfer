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




                {{--
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('verify-farmers') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">Verified Farmers</span>
                    </a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('do-unverify-farmers') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">Unverified Farmers</span>
                    </a>
                </li> --}}

                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-shield"></i>
                        </span>
                        <span class="pc-mtext">Field Officers</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-field-officer-by-do') }}">All Field Officers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('create-field-officer-by-do') }}">Create Field Officer</a>
                        </li>
                    </ul>
                </li>


            {{--
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-user-shield"></i>
                        </span>
                        <span class="pc-mtext">Agriculture Farmers</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('unverify-agri-farmers-by-do') }}">Unverify Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('verify-agri-farmers-by-do') }}">Verified Farmers</a>
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
                            <a class="pc-link" href="{{ route('unverify-agriuser-farmers-by-do') }}">Unverify Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('verify-agriuser-farmers-by-do') }}">Verified Farmers</a>
                        </li>
                    </ul>
                </li>
            --}}



            <li class="pc-item pc-hasmenu">
                <a href="{{ route('reporting-farmers-by-do') }}" class="pc-link">
                    <span class="pc-micon">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="pc-mtext">Reporting</span>
                </a>
            </li>



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
