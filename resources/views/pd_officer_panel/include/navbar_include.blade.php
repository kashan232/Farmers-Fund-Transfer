<header class="pc-header" style="background-color: #fff!important;">
<div class="header-wrapper"> <!-- [Mobile Media Block] start -->
    <div class="me-auto pc-mob-drp">
        <ul class="list-unstyled">
            <!-- ======= Menu collapse Icon ===== -->
            <li class="pc-h-item pc-sidebar-collapse">
                <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="pc-h-item pc-sidebar-popup">
                <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>

        </ul>
    </div>
    <!-- [Mobile Media Block end] -->
    <div class="ms-auto">
        <ul class="list-unstyled">
            <li class="dropdown pc-h-item">
                <a class="text-dark pt-1" style="font-weight: 700;">
                    {{-- {{


                            match (Auth::user()->usertype) {
                                    'PD_Officer' => 'PD OFFICER',
                                    'DG_Officer' => 'DG Officer', && email = Ministry@benazirharicard.gos.pk soo 'Ministry'
                                    default => 'N/A',
                                }

                        }} --}}

                        @php
    $user = Auth::user();

    if ($user->usertype === 'DG_Officer' && $user->email === 'Ministry@benazirharicard.gos.pk') {
        $label = 'Ministry';
    } elseif ($user->usertype === 'PD_Officer') {
        $label = 'PROJECT DIRECTOR';
    } elseif ($user->usertype === 'DG_Officer') {
        $label = 'DIRECTOR GENERAL';
    } else {
        $label = 'N/A';
    }
@endphp

{{ $label }}

                </a>
            </li>

            <li class="dropdown pc-h-item header-user-profile">
                <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                    <img src="{{asset('')}}/assets/images/user/land-officer.png" alt="user-image" class="user-avtar" />
                </a>
                <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                        <h5 class="m-0">Profile</h5>
                    </div>
                    <div class="dropdown-body">
                        <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                            <ul class="list-group list-group-flush w-100">
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="{{asset('')}}/assets/images/user/land-officer.png" alt="user-image" class="wid-50 rounded-circle" />
                                        </div>
                                        @if (Auth::check())
                                        <div class="flex-grow-1 mx-3">
                                            <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                                            <a class="link-primary">{{ Auth::user()->email }}</a>
                                        </div>
                                        @else
                                        <div class="flex-grow-1 mx-3">
                                            <h5 class="mb-0">Guest</h5>
                                            <a class="link-primary">Please log in</a>
                                        </div>
                                        @endif
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <!-- <a href="#" class="dropdown-item">
                                        <span class="d-flex align-items-center">
                                            <i class="ph-duotone ph-key"></i>
                                            <span>Change password</span>
                                        </span>
                                    </a> -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-power"></i>
                                                <span>Logout</span>
                                            </span>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
</header>
