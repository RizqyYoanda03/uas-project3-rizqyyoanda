<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark sidebar-scroll" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="text-center mb-2 mt-2">
            <img class="mb-2" src="img/logo.png" alt="" width="130" height="100">
        </div>
        <div class="sidebar-brand-text mx-2">Hybrid Mart</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    @if (auth()->user()->role == 'Admin')
    <hr class="sidebar-divider my-2">

    <li class="nav-item {{ Request::is('user') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('user') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span></a>
    </li>
    @endif

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Request::is('kategori') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('kategori') }}">
            <i class="fas fa-folder"></i>
            <span>Kategori</span></a>
    </li>

    @if (auth()->user()->role == 'Manajer Stok' || auth()->user()->role == 'pegawai' || auth()->user()->role == 'Pelanggan')
    <hr class="sidebar-divider my-0">
    
    <li class="nav-item {{ Request::is('stok') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('stok') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>Stok</span></a>
    </li>
    @endif

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Request::is('keranjang') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('keranjang') }}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Keranjang</span></a>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Request::is('transaction') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('transaction') }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Transaksi</span></a>
    </li>

    @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Pelanggan')
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Request::is('checkout') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('checkout') }}">
            <i class="fas fa-fw fa-shopping-bag"></i>
            <span>Checkout</span></a>
    </li>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
