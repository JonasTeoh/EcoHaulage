<aside class="main-sidebar sidebar-dark-primary elevation-4" style = "position:fixed; height: 100%">

    <a href="/home" class="brand-link">
        <img src="../../../../../../../../../../dist/img/sadmPic2.png" alt="AdminLTE Logo" class="brand-image "
            style="position:fixed;">
        <br>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../../../../../../../dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/profile" class="d-block">
                    <img style=" position:absolute; top:10px; left:10px; border-radius:50%">
                    {{ Auth::user()->name }}
                </a>
            </div>
        </div>


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
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

                <li class="nav-item">
                    <a href="{{ url('/home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @can(['user-list', 'role-list', 'permission-list'])
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-key"></i>
                            <p>
                                Roles/Permission
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('user-list')
                                <li class="nav-item" style = "position:relative; left:15px;">
                                    <a href="{{ url('/users') }}" class="nav-link">
                                        <i class="nav-icon fa-solid fa-user"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                            @endcan
                            @can('role-list')
                                <li class="nav-item" style = "position:relative; left:15px;">
                                    <a href="{{ url('/roles') }}" class="nav-link">
                                        <i class="nav-icon fa-solid fa-address-card"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                            @endcan
                            @can('permission-list')
                                <li class="nav-item" style = "position:relative; left:15px;">
                                    <a href="{{ url('/permissions') }}" class="nav-link">
                                        <i class="nav-icon fa-solid fa-fingerprint"></i>
                                        <p>Permission</p>
                                    </a>
                                    <br>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('customer-list')
                    <li class="nav-item">
                        <a href="{{ url('/customer') }}" class="nav-link">
                            <i class="nav-icon fa-solid fa-list"></i>
                            <p>Customer Info</p>
                        </a>
                    </li>
                @endcan
                @can('import-list')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-book"></i>
                            <p>
                                Import
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" style = "position:relative; left:15px;">
                                <a href="{{ url('/course') }}" class="nav-link">
                                    <i class="nav-icon fa-solid fa-list"></i>
                                    <p>List</p>
                                </a>
                            </li>
                            @can('import-create')
                                <li class="nav-item" style = "position:relative; left:15px;">
                                    <a href="{{ url('/course/create') }}" class="nav-link">
                                        <i class="nav-icon fa-solid fa-circle-plus"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('export-list')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-book"></i>
                            <p>
                                Export
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" style = "position:relative; left:15px;">
                                <a href="{{ url('/exports') }}" class="nav-link">
                                    <i class="nav-icon fa-solid fa-list"></i>
                                    <p>List</p>
                                </a>
                            </li>
                            @can('export-create')
                                <li class="nav-item" style = "position:relative; left:15px;">
                                    <a href="{{ url('/course/create') }}" class="nav-link">
                                        <i class="nav-icon fa-solid fa-circle-plus"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('driver-view')
                    <li class="nav-item">
                        <a href="{{ url('/driver') }}" class="nav-link">
                            <i class="nav-icon fa-solid fa-list"></i>
                            <p>Driver</p>
                        </a>
                    </li>
                @endcan

            </ul>

        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
