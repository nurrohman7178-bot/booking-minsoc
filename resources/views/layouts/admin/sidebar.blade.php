<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

<style>
    #content {
        animation: fadePage 0.25s ease;
    }

    @keyframes fadePage {
        from {
            opacity: 0;
            transform: translateY(5px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Menu aktif */
    .sidebar .nav-item.active .nav-link {
        background-color: #dff7e9;
        color: #10b981;
        border-radius: 3px;
    }

    /* Icon menu aktif */
    .sidebar .nav-item.active .nav-link i {
        color: #10b981;
    }

    /* Menu aktif saat hover */
    .sidebar .nav-item.active .nav-link:hover {
        background-color: #dff7e9;
        color: #10b981;
    }
</style>
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar" style="background-color:white;">
    {{-- Brand --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <i class="fas fa-fw fa-futbol" style="color:#10b981;"></i>
        </div>
        <div class="sidebar-brand-text">
            Minisoccer <span style="color:#10b981;">Book</span>
        </div>
    </a>

    {{-- Dashboard --}}
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    {{-- Customer --}}
    <li class="nav-item {{ request()->routeIs('customer.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('customer.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Customer Data</span>
        </a>
    </li>

    {{-- Booking --}}
    <li class="nav-item {{ request()->routeIs('booking.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('booking.index') }}">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Booking Data</span>
        </a>
    </li>

    {{-- Schedule --}}
    <li class="nav-item {{ request()->routeIs('schedule.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('schedule.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Schedule Data</span>
        </a>
    </li>

    {{-- Notification --}}
    <li class="nav-item {{ request()->routeIs('notification.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('notification.index') }}">
            <i class="fas fa-fw fa-bell"></i>
            <span>Notification</span>
        </a>
    </li>

    {{-- Setting --}}
    <li class="nav-item {{ request()->routeIs('setting.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('setting.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Setting</span>
        </a>
    </li>
</ul>
