<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo.svg') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>

                <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/vibrancy-logo.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/vibrancy-logo.png') }}" alt="" height="19">
                    </span>
                </a>
            </div>

            <button type="{{ route('admin.dashboard') }}" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                        <span key="t-profile">Profile</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i>
                        <span key="t-my-wallet">My
                            Wallet</span></a>
                    <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i
                            class="bx bx-wrench font-size-16 align-middle me-1"></i> <span
                            key="t-settings">Settings</span></a>
                    <a class="dropdown-item" href="auth-lock-screen.html"><i
                            class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Lock
                            screen</span></a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('admin.logout') }}" id="logout-form">
                    @csrf
                    <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();"><i
                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                            key="t-logout">Logout</span></a>    
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>

<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="{{ route('admin.dashboard') }}"
                            id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Dashboards</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="{{ route('admin.user.index') }}" id="topnav-dashboard"
                            role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Users Management
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout"
                            role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-layouts">Products Management</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <div class="dropdown">
                                <!-- <a class="nav-link dropdown-toggle arrow-none" href="{{ route('admin.category.create') }}"
                                    id="topnav-dashboard" role="button">
                                    <i class="bx bx-plus-circle me-2"></i><span key="t-dashboards">Add Category
                                    </span>
                                </a> -->
                                <a class="nav-link dropdown-toggle arrow-none" href="{{ route('admin.category.index') }}"
                                    id="topnav-dashboard" role="button">
                                    <i class="bx bx-list-ul me-2"></i><span key="t-dashboards">Category List
                                    </span>
                                </a>
                                <!-- <a class="nav-link dropdown-toggle arrow-none" href="{{ route('admin.products.create') }}"
                                    id="topnav-dashboard" role="button">
                                    <i class="bx bx-plus-circle me-2"></i><span key="t-dashboards">Add Product
                                    </span>
                                </a> -->
                                <a class="nav-link dropdown-toggle arrow-none" href="{{ route('admin.products.index') }}"
                                    id="topnav-dashboard" role="button">
                                    <i class="bx bx-list-ul me-2"></i><span key="t-dashboards">Products List
                                    </span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="{{ route('admin.orders.index') }}" id="topnav-dashboard"
                            role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Orders Management
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                            role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Marketing and Promotions
                            </span>
                        </a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="javascript:void(0)"
                            id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Content Management
                            </span>
                        </a>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout"
                            role="button">
                            <i class="bx bx-layout me-2"></i><span key="t-layouts">Content Management</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="{{ route('admin.contact.index') }}">Contact Us</a>
                                <a class="nav-link dropdown-toggle arrow-none" href="{{ route('admin.blog.index') }}"
                                    id="topnav-dashboard" role="button">
                                    <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Blogs
                                    </span>
                                </a>
                                <a class="nav-link dropdown-toggle arrow-none" href="{{ route('admin.testimonial.index') }}"
                                    id="topnav-dashboard" role="button">
                                    <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Testimonials
                                    </span>
                                </a>
                                {{-- <div class="dropdown-menu" aria-labelledby="topnav-layout-verti">
                                    <a href="layouts-compact-sidebar.html" class="dropdown-item"
                                        key="t-compact-sidebar">Compact Sidebar</a>
                                    <a href="layouts-icon-sidebar.html" class="dropdown-item"
                                        key="t-icon-sidebar">Icon Sidebar</a>
                                    <a href="layouts-boxed.html" class="dropdown-item" key="t-boxed-width">Boxed
                                        Width</a>
                                    <a href="layouts-preloader.html" class="dropdown-item"
                                        key="t-preloader">Preloader</a>
                                    <a href="layouts-colored-sidebar.html" class="dropdown-item"
                                        key="t-colored-sidebar">Colored Sidebar</a>
                                    <a href="layouts-scrollable.html" class="dropdown-item"
                                        key="t-scrollable">Scrollable</a>
                                </div> --}}
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="javascript:void(0)" id="topnav-dashboard"
                            role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Settings
                            </span>
                        </a>
                    </li>

                    {{-- <li class="nav-item dropdown">
                        <!--<a class="nav-link dropdown-toggle arrow-none" href="javascript:void(0)"-->
                        <!--    id="topnav-dashboard" role="button">-->
                        <!--    <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Contact Us-->
                        <!--    </span>-->
                        <!--</a>-->
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#"
                            id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Blogs
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#"
                            id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Testimonials
                            </span>
                        </a>
                    </li> --}}


                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout"
                            role="button">
                            <i class="bx bx-layout me-2"></i><span key="t-layouts">Layouts</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                    id="topnav-layout-verti" role="button">
                                    <span key="t-vertical">Vertical</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-layout-verti">
                                    <a href="layouts-compact-sidebar.html" class="dropdown-item"
                                        key="t-compact-sidebar">Compact Sidebar</a>
                                    <a href="layouts-icon-sidebar.html" class="dropdown-item"
                                        key="t-icon-sidebar">Icon Sidebar</a>
                                    <a href="layouts-boxed.html" class="dropdown-item" key="t-boxed-width">Boxed
                                        Width</a>
                                    <a href="layouts-preloader.html" class="dropdown-item"
                                        key="t-preloader">Preloader</a>
                                    <a href="layouts-colored-sidebar.html" class="dropdown-item"
                                        key="t-colored-sidebar">Colored Sidebar</a>
                                    <a href="layouts-scrollable.html" class="dropdown-item"
                                        key="t-scrollable">Scrollable</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                    id="topnav-layout-hori" role="button">
                                    <span key="t-horizontal">Horizontal</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-layout-hori">
                                    <a href="layouts-horizontal.html" class="dropdown-item"
                                        key="t-horizontal">Horizontal</a>
                                    <a href="layouts-hori-topbar-light.html" class="dropdown-item"
                                        key="t-topbar-light">Topbar Light</a>
                                    <a href="layouts-hori-boxed-width.html" class="dropdown-item"
                                        key="t-boxed-width">Boxed Width</a>
                                    <a href="layouts-hori-preloader.html" class="dropdown-item"
                                        key="t-preloader">Preloader</a>
                                    <a href="layouts-hori-colored-header.html" class="dropdown-item"
                                        key="t-colored-topbar">Colored Header</a>
                                    <a href="layouts-hori-scrollable.html" class="dropdown-item"
                                        key="t-scrollable">Scrollable</a>
                                </div>
                            </div>
                        </div>
                    </li> --}}

                </ul>
            </div>
        </nav>
    </div>
</div>
