<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mt-3">
        <a href="{{ url('/') }}" class="app-brand-link">
            {{-- <span class="app-brand-logo">
                <img src="{{ asset('assets/img/logo.png') }}" />
            </span> --}}
            {{-- <span class="app-brand-text demo menu-text fw-bold">{{ config('app.name') }}</span> --}}
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item ">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-home"></i>
                <div data-i18n="{{ __('لوحة التحكم') }}">{{ __('لوحة التحكم') }}</div>
            </a>
        </li>

        <!-- Dashboards -->
        @canany(['users.index', 'roles.index'])
            <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="{{ __('الإدارة') }}">{{ __('الإدارة') }}</div>
                </a>

                <ul class="menu-sub">
                    @can('users.index')
                        <li class="menu-item">
                            <a href="{{ route('users.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-mail"></i>
                                <div data-i18n="{{ __('إدارة المستخدمين') }}">{{ __('إدارة المستخدمين') }}</div>
                            </a>
                        </li>
                    @endcan
                    @can('roles.index')
                        <li class="menu-item">
                            <a href="{{ route('roles.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-mail"></i>
                                <div data-i18n="{{ __('ادارة الصلاحيات') }}">{{ __('ادارة الصلاحيات') }}</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcanany
    </ul>
</aside>
<!-- / Menu -->
