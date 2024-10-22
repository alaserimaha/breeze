        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="ti ti-menu-2 ti-sm"></i>
                </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <ul class="navbar-nav flex-row align-items-center ms-auto">

                    <!-- Style Switcher -->
                    <li class="nav-item me-2 me-xl-0">
                        <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                            <i class="ti ti-md"></i>
                        </a>
                    </li>
                    <!--/ Style Switcher -->



                    <!-- User -->
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                            data-bs-toggle="dropdown">
                            <div class="avatar " style="width:6rem; height:5rem">
                                <img src="{{ asset('assets/img/logo.png') }}" class="logo" />
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="pages-account-settings-account.html">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar " style="width:6rem; height:5rem">
                                                <img src="{{ asset('assets/img/logo.png') }}" class="logo" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                            <small class="text-muted">
                                                @foreach (Auth::user()->roles as $role)
                                                    <span class="badge bg-primary">{{ $role->role_name }}</span>
                                                @endforeach
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            {{-- <li>
                                <a class="dropdown-item" href="pages-profile-user.html">
                                    <i class="ti ti-user-check me-2 ti-sm"></i>
                                    <span class="align-middle">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="pages-account-settings-account.html">
                                    <i class="ti ti-settings me-2 ti-sm"></i>
                                    <span class="align-middle">Settings</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="pages-account-settings-billing.html">
                                    <span class="d-flex align-items-center align-middle">
                                        <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                                        <span class="flex-grow-1 align-middle">Billing</span>
                                        <span
                                            class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20">2</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="pages-help-center-landing.html">
                                    <i class="ti ti-lifebuoy me-2 ti-sm"></i>
                                    <span class="align-middle">Help</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="pages-faq.html">
                                    <i class="ti ti-help me-2 ti-sm"></i>
                                    <span class="align-middle">FAQ</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="pages-pricing.html">
                                    <i class="ti ti-currency-dollar me-2 ti-sm"></i>
                                    <span class="align-middle">Pricing</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li> --}}
                            @if (Auth::user()->companyContact)
                                <li>
                                    <a class="dropdown-item" href="{{ route('iam.logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ti ti-logout me-2 ti-sm"></i>
                                        <span class="align-middle">تسجيل الخروج</span>
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('iam.logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            @else
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form-cas').submit();">
                                        <i class="ti ti-logout me-2 ti-sm"></i>
                                        <span class="align-middle">تسجيل الخروج</span>
                                    </a>
                                </li>
                                <form id="logout-form-cas" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            @endif
                        </ul>
                    </li>
                    <!--/ User -->
                </ul>
            </div>


        </nav>

        <!-- / Navbar -->
