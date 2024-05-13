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
                    <i class="fa-solid fa-gear fw-bold"></i>
                    <span class="nav-text">District</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('add-district') }}">Add</a></li>
                    <li><a href="{{ route('all-district') }}">List</a></li>
                </ul>

            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-gear fw-bold"></i>
                    <span class="nav-text">Tehsil</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('add-tehsil') }}">Add</a></li>
                    <li><a href="{{ route('all-tehsil') }}">List</a></li>
                </ul>

            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-gear fw-bold"></i>
                    <span class="nav-text">Area</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('add-area') }}">Add</a></li>
                    <li><a href="{{ route('all-area') }}">List</a></li>
                </ul>

            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-gear fw-bold"></i>
                    <span class="nav-text">Tappa</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('add-tappa') }}">Add</a></li>
                    <li><a href="{{ route('all-tappa') }}">List</a></li>
                </ul>

            </li>
        </ul>
    </div>
</div>
