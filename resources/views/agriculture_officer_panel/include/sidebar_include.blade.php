        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="index.html" class="b-brand text-primary">
                    <img src="../assets/images/swat-logo.png" alt="logo image" class="logo-lg" style="max-width:60px;" />
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

                </ul>

            </div>

        </div>