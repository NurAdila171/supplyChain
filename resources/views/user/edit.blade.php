@extends('layouts.main')

@push('top')

@endpush

@section('content')
    <div class="d-flex flex-column flex-column-fluid">

        <div id="kt_app_toolbar" class="app-toolbar  pt-5 ">

            <div id="kt_app_toolbar_container"
                 class="app-container  container-fluid d-flex align-items-stretch ">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">

                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">

                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="#" class="text-gray-500">
                                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                </a>
                            </li>

                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i></li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                User
                            </li>

                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i></li>
                            <li class="breadcrumb-item text-gray-700">
                                Tambah User
                            </li>


                        </ul>

                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">
                            Form User
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <div id="kt_app_content_container" class="app-container  container-fluid ">
                <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data" method="POST" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                 role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">

                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Data</h2>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class="mb-0 fv-row">
                                                <label class="required form-label">Username</label>
                                                <input type="text" name="username" class="form-control mb-0" required
                                                       placeholder="Username" value="{{ $user->username }}"/>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class="mb-0 fv-row">
                                                <label class="required form-label">Password</label>
                                                <input type="password" name="password" class="form-control mb-0"
                                                       placeholder="Password" value=""/>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class="mb-0 fv-row">
                                                <label class="required form-label">Nama User</label>
                                                <input type="text" name="name" class="form-control mb-0" required
                                                       placeholder="Nama user" value="{{ $user->name }}"/>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class="mb-0 fv-row">
                                                <label class="required form-label">Role</label>
                                                <select name="role" class="form-control mb-0" required>
                                                    <option value="kasir" @selected($user->role == 'kasir')>Kasir</option>
                                                    <option value="supplier" @selected($user->role == 'supplier')>Supplier</option>
                                                    <option value="admin" @selected($user->role == 'admin')>Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('user.index') }}"
                               id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
                                Kembali
                            </a>

                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    Simpan Peruuser
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('bottom')
    <script src="{{ asset('assets/js/custom/apps/ecommerce/catalog/save-product.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
@endpush
