<style>
    /* .nav-link-a.pc-link::after {
        content: '';
        display: block;
        width: 100%;
        height: 2px;
        background-color: #4ba064;
        position: absolute;
        bottom: 0;
        left: 0;
    } */

    .pc-sidebar .pc-navbar>.pc-item.active>.pc-link:after {
        background: #4ba064 !important;
    }


    .pc-sidebar .pc-navbar>.pc-item.active>.pc-link {
        color: #fff;
    }
</style>
<nav class="pc-sidebar" style="background:#033323;">
    <div class="navbar-wrapper">
        <div class="m-header" style="justify-content: center;">
            <!-- <a href="#" class="b-brand text-primary">
                <img src="../assets/images/govtlogos.png" alt="logo image" class="logo-lg" style="max-width:120px;" />
            </a> -->
            <h3 class="mt-2" style="font-size: 13px;text-align:center;color:#e5e5e5;letter-spacing: 1px;"><span style="font-size: 24px;letter-spacing: 3px;line-height: 1.5;">Sindh</span> <br> Hari Card</h3>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('home') }}" class="pc-link" style="color: #ebe5e5!important;">
                        <span class="pc-micon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>


                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link" style="color: #ebe5e5!important;">
                        <span class="pc-micon">
                            <i class="fas fa-user-plus"></i>
                        </span>
                        <span class="pc-mtext">Farmers Registration</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('add-agriuser-farmers') }}" style="color: #ebe5e5!important;">Add Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('all-agriuser-farmers') }}" style="color: #ebe5e5!important;">All Farmers</a>
                        </li>
                    </ul>
                </li>


                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link" style="color: #ebe5e5!important;">
                        <span class="pc-micon">
                            <i class="fas fa-user-check"></i>
                        </span>
                        <span class="pc-mtext">Farmers Verification </span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('agriuser-unverify-farmers') }}" style="color: #ebe5e5!important;">Unverify Farmers</a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{ route('agriuser-verify-farmers') }}" style="color: #ebe5e5!important;">Verified Farmers</a>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>

    </div>
</nav>