<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="" href="{{ route('home') }}" aria-expanded="false">
                    <i class="fa-solid fa-gear fw-bold"></i>
                    <span class="nav-text">Dasboard</span>
                </a>

            </li>
            {{-- <li>
                <a class="" href="{{ route('land-approve-listing') }}" aria-expanded="false">
                    <i class="fa-solid fa-gear fw-bold"></i>
                    <span class="nav-text">Land approve Listing</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('verify-listing') }}">Verify Listing</a></li>
                    <li><a href="{{ route('unverify-listing') }}">Unverify Listing</a></li>
                </ul>
            </li> --}}

            <li>
                <a class="has-arrow ai-icon" href="#" aria-expanded="false">
                    <i class="fas fa-globe-europe"></i>
                    <span class="nav-text">Land approve List</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('land-approve-listing') }}">All</a></li>
                    <li><a href="{{ route('verify-listing') }}">Verify Listing</a></li>
                    <li><a href="{{ route('unverify-listing') }}">Unverify Listing</a></li>
                </ul>

            </li>
            <li>
                <a href="{{ route('Verify-screen') }}" aria-expanded="false">
                    <i class="fas fa-globe-europe"></i>
                    <span class="nav-text">Verification of Agriculture Farmers</span>
                </a>
            </li>
            <li>
                <a href="{{ route('report') }}" aria-expanded="false">
                    <i class="fas fa-globe-europe"></i>
                    <span class="nav-text">Reports</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" aria-expanded="false">
                        <i class="fas fa-user-plus"></i>
                        <span class="nav-text">{{ __('Log Out') }}</span>
                    </a>
                </form>
                                
            </li>
        </ul>
    </div>
</div>