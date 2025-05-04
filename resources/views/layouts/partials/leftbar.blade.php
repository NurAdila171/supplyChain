<div id="kt_app_sidebar" class="app-sidebar  flex-column "
     data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
     data-kt-drawer-width="250px" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

    <div
        class="d-flex flex-column justify-content-between h-100 hover-scroll-overlay-y my-2 d-flex flex-column"
        id="kt_app_sidebar_main"
        data-kt-scroll="true"
        data-kt-scroll-activate="true"
        data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_header"
        data-kt-scroll-wrappers="#kt_app_main"
        data-kt-scroll-offset="5px">
        <div
            id="#kt_app_sidebar_menu"
            data-kt-menu="true"
            data-kt-menu-expand="false"
            class="flex-column-fluid menu menu-column menu-rounded menu-active-bg mb-7">

            <div class="menu-item">
                <a class="menu-link {{ request()->segment(1) == 'dashboard' ? 'active':'' }}"
                   href="{{ route('dashboard') }}">
                    <span class="menu-bullet">
                        <span class="fa fa-home"></span>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </div>

            <hr/>
            @can('role_admin')
                <div data-kt-menu-trigger="click"
                     class="menu-item here menu-accordion {{ in_array(request()->segment(1), ['produk', 'bahan']) ? 'show':'' }}">
                    <span class="menu-link"><span class="menu-icon"><i
                                class="ki-duotone ki-element-11 fs-1"><span
                                    class="fa fs-5 fa-money-bill"></span></i></span><span
                            class="menu-title">Produk</span><span class="menu-arrow"></span></span>

                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item"><a
                                class="menu-link {{ request()->segment(1) == 'produk' ? 'active':'' }}"
                                href="{{ route('produk.index') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Daftar Produk</span></a></div>
                    </div>

                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item"><a class="menu-link {{ request()->segment(1) == 'bahan' ? 'active':'' }}"
                                                  href="{{ route('bahan.index') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Daftar Bahan</span></a></div>
                    </div>
                </div>
            @endcan

            <div data-kt-menu-trigger="click"
                 class="menu-item here menu-accordion {{ in_array(request()->segment(1), ['penjualan', 'pembelian']) ? 'show':'' }}">
                <span class="menu-link"><span class="menu-icon"><i
                            class="ki-duotone ki-element-11 fs-1"><span
                                class="fa fs-5 fa-cart-shopping"></span></i></span><span
                        class="menu-title">Transaksi</span><span class="menu-arrow"></span></span>

                @can('role_kasir')
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item"><a
                                class="menu-link {{ request()->segment(1) == 'penjualan' && request()->segment(2) == ''  ? 'active':'' }}"
                                href="{{ route('penjualan.index') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Daftar Penjualan</span></a></div>
                    </div>
                @endcan

                @can('role_supplier')
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item"><a
                                class="menu-link {{ request()->segment(1) == 'pembelian' && (request()->segment(2) == '' || is_numeric(request()->segment(2))) ? 'active':'' }}"
                                href="{{ route('pembelian.index') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Daftar Pembelian</span></a></div>
                        <div class="menu-item"><a
                                class="menu-link {{ request()->segment(1) == 'pembelian' && request()->segment(2) == 'beli' ? 'active':'' }}"
                                href="{{ route('pembelian.beli') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Beli Bahan</span></a></div>
                        <div class="menu-item"><a
                                class="menu-link {{ request()->segment(1) == 'pembelian' && request()->segment(2) == 'keranjang' ? 'active':'' }}"
                                href="{{ route('pembelian.keranjang') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Keranjang</span></a></div>
                    </div>
                @endcan
            </div>

            @can('role_admin')
                <div data-kt-menu-trigger="click"
                     class="menu-item here menu-accordion {{ in_array(request()->segment(1), ['user']) ? 'show':'' }}">
                    <span class="menu-link"><span class="menu-icon"><i
                                class="ki-duotone ki-element-11 fs-1"><span
                                    class="fa fs-5 fa-user"></span></i></span><span
                            class="menu-title">User Manager</span><span class="menu-arrow"></span></span>

                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item"><a
                                class="menu-link {{ request()->segment(1) == 'user' ? 'active':'' }}"
                                href="{{ route('user.index') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Daftar User</span></a></div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
</div>
