<div id="kt_app_aside" class="app-aside  flex-column "
     data-kt-drawer="true" data-kt-drawer-name="app-aside"
     data-kt-drawer-activate="{default: true, lg: false}"
     data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="end"
     data-kt-drawer-toggle="#kt_app_aside_mobile_toggle">

    <div
        id="kt_app_aside_wrapper"
        class="d-flex flex-column align-items-center hover-scroll-y py-5 py-lg-0 gap-4"
        data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}"
        data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_header"
        data-kt-scroll-wrappers="#kt_app_aside_wrapper"
        data-kt-scroll-offset="5px">
        <a href="{{ route('produk.index') }}"
           class="btn btn-icon btn-color-info bg-hover-body h-45px w-45px flex-shrink-0 mb-4"
           data-bs-toggle="tooltip" title="Produk" data-bs-custom-class="tooltip-inverse">
            <i class="ki-duotone ki-devices-2 fs-2qx"><span class="path1"></span><span
                    class="path2"></span><span class="path3"></span></i> </a>
    </div>
</div>
