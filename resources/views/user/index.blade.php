@extends('layouts.main')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">

        <div id="kt_app_toolbar" class="app-toolbar  pt-5 ">
            <div id="kt_app_toolbar_container"
                 class="app-container  container-fluid d-flex align-items-stretch ">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">

                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">

                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="{{ route('dashboard') }}" class="text-gray-500">
                                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                </a>
                            </li>

                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i></li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                User
                            </li>

                        </ul>

                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">
                            Daftar User
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content  flex-column-fluid ">


            <div id="kt_app_content_container" class="app-container  container-fluid ">
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4"><span
                                        class="path1"></span><span class="path2"></span></i> <input type="text"
                                                                                                    data-kt-ecommerce-product-filter="search"
                                                                                                    class="form-control form-control-solid w-250px ps-12"
                                                                                                    placeholder="Cari User"/>
                            </div>
                        </div>

                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <a href="{{ route('user.create') }}"
                               class="btn btn-primary">
                                Tambah User
                            </a>
                        </div>
                    </div>

                    <div class="card-body pt-0">

                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                               id="kt_ecommerce_products_table">
                            <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-200px">Username</th>
                                <th class="min-w-200px">Nama User</th>
                                <th class="min-w-200px">Role</th>
                                <th class="text-end min-w-200px">Aksi</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @foreach($user as $row)
                                <tr>
                                    <td class="text-start pe-0">
                                        <span class="fw-bold ms-3">{{ ($row->username) }}</span>
                                    </td>
                                    <td class="text-start pe-0">
                                        <span class="fw-bold ms-3">{{ ($row->name) }}</span>
                                    </td>
                                    <td class="text-start pe-0">
                                        <span class="fw-bold ms-3">{{ ($row->role) }}</span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#"
                                           class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                           data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Aksi
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                        <div
                                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">

                                            <div class="menu-item px-3">
                                                <a href="{{ route('user.edit', $row->id) }}"
                                                   class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>

                                            <div class="menu-item px-3">
                                                <form action="{{ route('user.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-text-primary w-100 menu-link px-3 btn-sm">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('bottom')
    <script src="{{ asset('assets/js/custom/apps/ecommerce/catalog/products.js') }}"></script>
@endpush
