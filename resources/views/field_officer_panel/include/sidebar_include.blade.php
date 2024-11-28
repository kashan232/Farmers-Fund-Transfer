<nav class="pc-sidebar" style="background:#033323;">
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
                    <a href="{{ route('farmer-create-by-field-officer') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">Add Farmers</span>
                    </a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('farmers-list-field-officer') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">Farmers List</span>
                    </a>
                </li>


                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('reporting-farmers-by-field-officer') }}" class="pc-link">
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
