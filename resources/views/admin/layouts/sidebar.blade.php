<div class="main-menu">

    <!-- Brand -->
    <div class="logo-box text-center py-4">
        <h2 class="fw-bold mb-0">AlamRent</h2>
        <small class="text-muted">Car Rental System</small>
    </div>

    <!-- Navigation -->
    <div data-simplebar>
        <ul class="app-menu">

            <!-- Section -->
            <li class="menu-title text-uppercase">Navigasi</li>

            {{-- Dashboard --}}
            <li class="menu-item">
                <a href="{{ route('admin.dashboard') }}"
                   class="menu-link waves-effect {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="menu-icon">
                        <i class="bx bx-grid-alt"></i>
                    </span>
                    <span class="menu-text">Overview</span>
                </a>
            </li>

            <!-- Section -->
            <li class="menu-title text-uppercase">Data Master</li>

            {{-- Kendaraan --}}
            <li class="menu-item">
                <a href="{{ route('admin.kendaraan.index') }}"
                   class="menu-link waves-effect {{ request()->routeIs('admin.kendaraan.*') ? 'active' : '' }}">
                    <span class="menu-icon">
                        <i class="bx bx-car-garage"></i>
                    </span>
                    <span class="menu-text">Data Kendaraan</span>
                </a>
            </li>

            {{-- Penyewaan --}}
            <li class="menu-item">
                <a href="{{ route('admin.penyewaan.index') }}"
                   class="menu-link waves-effect {{ request()->routeIs('admin.penyewaan.*') ? 'active' : '' }}">
                    <span class="menu-icon">
                        <i class="bx bx-wallet"></i>
                    </span>
                    <span class="menu-text">Transaksi Sewa</span>
                </a>
            </li>

        </ul>
    </div>
</div>
