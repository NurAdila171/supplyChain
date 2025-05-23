<div id="kt_app_header" class="app-header  d-flex flex-column flex-stack ">
    <div class="d-flex align-items-center flex-stack flex-grow-1">
        <div class="app-header-logo d-flex align-items-center flex-stack px-lg-11 mb-2" id="kt_app_header_logo">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px ms-3 me-2 d-flex d-lg-none"
                 id="kt_app_sidebar_mobile_toggle">
                <i class="ki-duotone ki-abstract-14 fs-2"><span class="path1"></span><span class="path2"></span></i>
            </div>

            <a href="#" class="app-sidebar-logo">
                <h3 class="mb-0">Siomay & Batagor</h3>
            </a>

            <div
                id="kt_app_sidebar_toggle"
                class="app-sidebar-toggle btn btn-sm btn-icon btn-color-warning me-n2 d-none d-lg-flex "
                data-kt-toggle="true"
                data-kt-toggle-state="active"
                data-kt-toggle-target="body"
                data-kt-toggle-name="app-sidebar-minimize">

                <i class="ki-duotone ki-exit-left fs-2x rotate-180"><span class="path1"></span><span
                        class="path2"></span></i></div>
        </div>

        <div class="app-navbar flex-grow-1 justify-content-end" id="kt_app_header_navbar">
            <div class="app-navbar-item d-flex align-items-stretch flex-lg-grow-1 me-2 me-lg-0">

                <div
                    id="kt_header_search"
                    class="header-search d-flex align-items-center w-lg-350px"

                    data-kt-search-keypress="true"
                    data-kt-search-min-length="2"
                    data-kt-search-enter="enter"
                    data-kt-search-layout="menu"
                    data-kt-search-responsive="true"

                    data-kt-menu-trigger="auto"
                    data-kt-menu-permanent="true"
                    data-kt-menu-placement="bottom-start">

                    <div data-kt-search-element="toggle"
                         class="search-toggle-mobile d-flex d-lg-none align-items-center">
                        <div class="d-flex ">
                            <i class="ki-duotone ki-magnifier fs-1 fs-1"><span class="path1"></span><span
                                    class="path2"></span></i></div>
                    </div>

                    <form data-kt-search-element="form"
                          class="d-none d-lg-block w-100 position-relative mb-5 mb-lg-0" autocomplete="off">
                        <input type="hidden"/>

                        <i class="ki-duotone ki-magnifier search-icon fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-5"><span
                                class="path1"></span><span class="path2"></span></i>
                        <input type="text"
                               class="search-input form-control form-control border-0 h-lg-40px  ps-13"
                               name="search" value="" placeholder="Cari Produk..."
                               data-kt-search-element="input"/>

                        <span
                            class="search-spinner  position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                            data-kt-search-element="spinner">
                            <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                        </span>

                        <span
                            class="search-reset  btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4"
                            data-kt-search-element="clear">
                            <i class="ki-duotone ki-cross fs-2 fs-lg-1 me-0"><span class="path1"></span><span
                                    class="path2"></span></i> </span>
                    </form>
                </div>


            </div>
        </div>

        <div class="app-navbar-item me-lg-1">
            <div
                class="btn btn-icon btn-custom btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px"
                data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                data-kt-menu-placement="bottom-end">
{{--                <i class="ki-duotone ki-graph-3 fs-1"><span class="path1"></span><span class="path2"></span></i>--}}
                <i class="ki-duotone ki-notification-status fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
            </div>

            <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true"
                 id="kt_menu_notifications">
                <div class="d-flex flex-column bgi-no-repeat rounded-top"
                     style="background-image:url('{{ asset('assets/media/misc/menu-header-bg.jpg') }}')">
                    <h3 class="text-white fw-semibold px-9 my-6">
                        Notifications
                    </h3>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="kt_topbar_notifications_1" role="tabpanel">
                        <div class="scroll-y mh-325px my-5 px-8" id="list_notifikasi">
                            <div class="d-flex flex-stack py-2">
                                <div class="d-flex align-items-center">
                                    <div class="mb-0 me-2">
                                        <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Tidak ada notifikasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @push('bottom')
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    $.ajax({
                                        url: "{{ route('notifikasi.index') }}",
                                        type: "GET",
                                        headers: {
                                            "X-CSRF-Token": '{{ csrf_token() }}'
                                        },
                                        success: function(response) {
                                            if(response !== '')
                                                $('#list_notifikasi').html(response);
                                        }
                                    });
                                })
                            </script>
                        @endpush
                    </div>
                </div>
            </div>
        </div>

        <div class="app-navbar-item ms-3 ms-lg-4 me-lg-2" id="kt_header_user_menu_toggle">
            <div class="cursor-pointer symbol symbol-30px symbol-lg-40px"
                 data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                 data-kt-menu-attach="parent"
                 data-kt-menu-placement="bottom-end">
                <img src="{{ asset('assets/media/svg/avatars/blank.svg') }}" alt="user"/>
            </div>

            <div
                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                data-kt-menu="true">
                <div class="menu-item px-3">
                    <div class="menu-content d-flex align-items-center px-3">
                        <div class="symbol symbol-50px me-5">
                            <img alt="Logo" src="{{ asset('assets/media/svg/avatars/blank.svg') }}"/>
                        </div>

                        <div class="d-flex flex-column">
                            <div class="fw-bold d-flex align-items-center fs-5">
                                {{ Auth::user()->name }}
                            </div>

                            <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                {{ Auth::user()->role }} </a>
                        </div>
                    </div>
                </div>

                <div class="separator my-2"></div>

                <div class="menu-item px-5">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button href="#"
                                class="btn btn-sm w-100 btn-text-primary menu-link px-5">
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="app-navbar-item ms-3 ms-lg-4 me-lg-6">
            <a href="{{ route('pembelian.keranjang') }}"
               class="btn btn-icon btn-custom btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px">
                <i class="ki-duotone ki-setting-3 fs-1"><span class="fa fa-cart-shopping fs-2"></span></i>
            </a>
        </div>
    </div>
    <div class="app-header-separator"></div>
</div>

