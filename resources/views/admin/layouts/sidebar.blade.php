<div class="main-menu">
    <!-- Brand Logo -->
    <div class="logo-box">
        <h2>Nabil Rent</h2>
    </div>

    <!-- Menu -->
    <div data-simplebar>
        <ul class="app-menu">

            <li class="menu-title">Menu Utama</li>

            {{-- Dashboard --}}
            <li class="menu-item">
                <a href="{{ route('admin.dashboard') }}"
                   class="menu-link waves-effect {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="menu-icon">
                        <i class="bx bx-home-smile"></i>
                    </span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>

            <li class="menu-title">Manajemen</li>

            {{-- Kendaraan --}}
            <li class="menu-item">
                <a href="{{ route('admin.kendaraan.index') }}"
                   class="menu-link waves-effect {{ request()->routeIs('admin.kendaraan.*') ? 'active' : '' }}">
                    <span class="menu-icon">
                        <i class="bx bx-car"></i>
                    </span>
                    <span class="menu-text">Kendaraan</span>
                </a>
            </li>

            {{-- Penyewaan --}}
            <li class="menu-item">
                <a href="{{ route('admin.penyewaan.index') }}"
                   class="menu-link waves-effect {{ request()->routeIs('admin.penyewaan.*') ? 'active' : '' }}">
                    <span class="menu-icon">
                        <i class="bx bx-receipt"></i>
                    </span>
                    <span class="menu-text">Penyewaan</span>
                </a>
            </li>

        </ul>
    </div>
</div>
