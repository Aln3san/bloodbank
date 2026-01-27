<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ __('messages.bloodbank') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder={{ __('messages.search') }}
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Starter Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a href={{ route('dashboard') }} class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('messages.dashboard') }}
                        </p>
                    </a>
                </li>

                @can('read clients')
                <li class="nav-item">
                    <a href={{ route('clients.index') }} class="nav-link">
                        <i class="fas fa-user"></i>
                        <p>
                            {{ __('messages.clients') }}
                        </p>
                    </a>
                </li>
                @endcan
                
                @can('read users')
                <li class="nav-item">
                    <a href={{ route('users.index') }} class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            {{ __('messages.users') }}
                        </p>
                    </a>
                </li>
                @endcan

                @can('read roles')
                <li class="nav-item">
                    <a href={{ route('roles.index') }} class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            {{ __('messages.roles') }}
                        </p>
                    </a>
                </li>
                @endcan

                @can('read governorates')      
                <li class="nav-item">
                    <a href={{ route('governorates.index') }} class="nav-link">
                        <i class="fas fa-city"></i>
                        <p>
                            {{ __('messages.governorates') }}
                        </p>
                    </a>
                </li>
                @endcan

                @can('read cities')
                <li class="nav-item">
                    <a href={{ route('cities.index') }} class="nav-link">
                        <i class="fas fa-building"></i>
                        <p>
                            {{ __('messages.cities') }}
                        </p>
                    </a>
                </li>
                @endcan

                @can('read categories')
                <li class="nav-item">
                    <a href={{ route('categories.index') }} class="nav-link">
                        <i class="fas fa-stream"></i>
                        <p>
                            {{ __('messages.categories') }}
                        </p>
                    </a>
                </li>
                @endcan

                @can('read posts')
                <li class="nav-item">
                    <a href={{ route('posts.index') }} class="nav-link">
                        <i class="fas fa-newspaper"></i>
                        <p>
                            {{ __('messages.posts') }}
                        </p>
                    </a>
                </li>
                @endcan

                @can('read contacts')
                <li class="nav-item">
                    <a href={{ route('contacts.index') }} class="nav-link">
                        <i class="fas fa-id-card-alt"></i>
                        <p>
                            {{ __('messages.contacts') }}
                        </p>
                    </a>
                </li>
                @endcan

                @can('read donations')
                <li class="nav-item">
                    <a href={{ route('donations.index') }} class="nav-link">
                        <i class="fas fa-hand-holding-usd"></i>
                        <p>
                            {{ __('messages.donations') }}
                        </p>
                    </a>
                </li>
                @endcan

                @can('read settings')
                <li class="nav-item">
                    <a href={{ route('settings.index') }} class="nav-link">
                        <i class="fas fa-cogs"></i>
                        <p>
                            {{ __('messages.settings') }}
                        </p>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
