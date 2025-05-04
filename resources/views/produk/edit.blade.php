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
                                Produk
                            </li>

                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i></li>
                            <li class="breadcrumb-item text-gray-700">
                                Tambah Produk
                            </li>


                        </ul>

                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">
                            Form Produk
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <div id="kt_app_content_container" class="app-container  container-fluid ">
                <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data" method="POST" action="{{ route('produk.update', $produk->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Gambar</h2>
                                </div>
                            </div>

                            <div class="card-body text-center pt-0">
                                <style>
                                    .image-input-placeholder {
                                        background-image: url('{{ url('uploads/gambar_produk/' . $produk->gambar_produk) }}');
                                    }

                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url('{{ url('uploads/gambar_produk/' . $produk->gambar_produk) }}');
                                    }
                                </style>

                                <div
                                    class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <div class="image-input-wrapper w-150px h-150px"></div>

                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Ubah">
                                        <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                                class="path2"></span></i>
                                        <input type="file" name="gambar_produk" accept=".png, .jpg, .jpeg"/>
                                    </label>

                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        title="Batalkan">
                                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                class="path2"></span></i> </span>

                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        title="Remove avatar">
                                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                class="path2"></span></i> </span>
                                </div>

                                <div class="text-muted fs-7">Tetapkan gambar thumbnail produk. Hanya file gambar *.png, *.jpg dan *.jpeg yang diterima
                                </div>
                            </div>
                        </div>
                    </div>

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
                                                <label class="required form-label">Nama Produk</label>
                                                <input type="text" name="nama_produk" class="form-control mb-0" value="{{ $produk->nama_produk }}" required
                                                       placeholder="Nama produk" value=""/>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class="mb-0 fv-row">
                                                <label class="required form-label">Harga</label>
                                                <input type="number" name="harga_produk" class="form-control mb-0" value="{{ $produk->harga_produk }}" required
                                                       placeholder="Harga" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('produk.index') }}"
                               id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
                                Kembali
                            </a>

                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    Simpan Perubahan
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
