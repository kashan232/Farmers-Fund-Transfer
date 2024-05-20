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
                    <span class="nav-text">Farmers Registration</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('add-agri-farmers') }}">Add Farmers</a></li>
                        <li><a href="{{ route('all-agri-farmers') }}">All Farmers</a></li>
                </ul>
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