<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="" href="{{ route('home') }}" aria-expanded="false">
                    <i class="fa-solid fa-gear fw-bold"></i>
                    <span class="nav-text">Dasboard</span>
                </a>

            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-globe-europe"></i>
                    <span class="nav-text">District</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('add-district') }}">Add</a></li>
                    <li><a href="{{ route('all-district') }}">List</a></li>
                </ul>

            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-city"></i>
                    <span class="nav-text">Tehsil</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('add-tehsil') }}">Add</a></li>
                    <li><a href="{{ route('all-tehsil') }}">List</a></li>
                </ul>

            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-building"></i>
                    <span class="nav-text">Area</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('add-area') }}">Add</a></li>
                    <li><a href="{{ route('all-area') }}">List</a></li>
                </ul>

            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-boxes"></i>
                    <span class="nav-text">Tappa</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('add-tappa') }}">Add</a></li>
                    <li><a href="{{ route('all-tappa') }}">List</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-user-plus"></i>
                    <span class="nav-text">Agriculture Officer</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('agri-officer-create') }}">Create Officer</a></li>
                    <li><a href="{{ route('all-agri-officer') }}">All Officer</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-user-plus"></i>
                    <span class="nav-text">Land Revenue</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('add-revenue-officer') }}">Create Officer</a></li>
                    <li><a href="{{ route('all-revenue-officer') }}">All Officer</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-user-plus"></i>
                    <span class="nav-text">Farmers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('Agriculture-Farmers') }}">Agriculture Farmers</a></li>
                    <li><a href="{{ route('Land-Revenue-Farmers') }}">Land Revenue Farmers</a></li>
                    <li><a href="{{ route('Online-Farmers') }}">Online Farmers</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>