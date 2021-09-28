<div class="sidebar" data-color="purple" data-background-color="white">
    {{-- Logo --}}
    <div class="logo">
        <a href="{{ route('admin.dashboard')  }}" class="simple-text logo-normal">
            @lang('app.name')
        </a>
    </div>

    {{-- Nav --}}
    <div class="sidebar-wrapper">
        <ul class="nav">
            {{-- Dashboard --}}
            <li class="nav-item {{ Route::is('admin.dashboard.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>@lang('dashboard.sidebar.home.title')</p>
                </a>
            </li>

                {{-- User --}}
                <li class="nav-item {{ Route::is('admin.user.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                        <i class="material-icons">manage_accounts</i>

                        <p>@lang('dashboard.sidebar.user.title')</p>
                    </a>
                </li>

            {{-- Permission --}}

            <!-- <li class="nav-item {{ Route::is('admin.permission.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.permission.index') }}">
                    <i class="material-icons">group</i>

                    <p>@lang('dashboard.sidebar.permission.title')</p>
                </a>
            </li> -->

            {{-- Role --}}

                <li class="nav-item {{ request()->routeIs('admin.role.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.role.index') }}">
                        <i class="material-icons">group</i>

                        <p>@lang('dashboard.sidebar.role.title')</p>
                    </a>
                </li>

            {{-- Calendar --}}
                <li class="nav-item {{ Route::is('admin.calendar.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.calendar.index') }}">
                        <i class="material-icons">event_note</i>

                        <p>@lang('dashboard.sidebar.calendar.title')</p>
                    </a>
                </li>

            {{-- Product --}}
            <li class="nav-item {{ request()->routeIs('admin.product.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.product.index') }}">
                    <i class="material-icons">brush</i>
                    <p>@lang('dashboard.sidebar.product.title')</p>
                </a>
            </li>

            {{-- Service --}}
            <li class="nav-item {{ request()->routeIs('admin.service.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.service.index') }}">
                    <i class="material-icons">design_services</i>
                    <p>@lang('dashboard.sidebar.service.title')</p>
                </a>
            </li>


            {{-- Provider --}}
            <li class="nav-item {{ Route::is('admin.provider.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.provider.index') }}">
                    <i class="material-icons">store</i>
                    <p>@lang('dashboard.sidebar.provider.title')</p>
                </a>
            </li>

            {{-- Shopping --}}
            <li class="nav-item {{ request()->routeIs('admin.shopping.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.shopping.index') }}">
                    <i class="material-icons">shopping_bag</i>
                    <p>@lang('dashboard.sidebar.shopping.title')</p>
                </a>
            </li>

            {{-- Application --}}
            <li class="nav-item {{ request()->routeIs('admin.application.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.application.index') }}">
                    <i class="material-icons">list_alt</i>
                    <p>@lang('dashboard.sidebar.application.title')</p>
                </a>
            </li>

            {{-- Sale --}}
            <li class="nav-item {{ request()->routeIs('admin.sale') ? 'active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="material-icons">point_of_sale</i>
                    <p>@lang('dashboard.sidebar.sale.title')</p>
                </a>
            </li>
        </ul>
    </div>
</div>
