<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SMARTYLAB</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        @if (\Auth::user()->Type_User == -99)
            <a class="nav-link" href="/admin">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        @elseif(\Auth::user()->Type_User == 1)
            <a class="nav-link" href="/client/maison">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        @endif

    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Clients
    </div>
    @if(\Auth::user()->Type_User == 1)
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="/client/maisons">
            <i class="fas fa-fw fa-house-user"></i>
            <span>Maison</span>
        </a>
    </li>
    @elseif (\Auth::user()->Type_User == -99)
        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/maisons">
                <i class="fas fa-fw fa-house-user"></i>
                <span>Maisons</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/clients">
                <i class="fas fa-fw fa-user"></i>
                <span>Clients</span>
            </a>
        </li>

@endif
<!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
