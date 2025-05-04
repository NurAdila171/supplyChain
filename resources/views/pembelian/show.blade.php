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
                                Pembelian
                            </li>

                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i></li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                Detail
                            </li>

                        </ul>

                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">
                            Daftar Bahan
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
                                                                                                    placeholder="Cari Bahan"/>
                            </div>
                        </div>

                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <a href="{{ route('pembelian.index') }}"
                               class="btn btn-light">
                                Kembali
                            </a>
                        </div>
                    </div>

                    <div class="card-body pt-0">

                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                               id="kt_ecommerce_products_table">
                            <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-200px">Nama Bahan</th>
                                <th class="text-start min-w-100px">Jumlah</th>
                                <th class="text-start min-w-100px">Satuan</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @foreach($pembelian_detail as $row)
                                <tr>
                                    <td class="text-start pe-0">
                                        <span class="fw-bold ms-3">{{ ($row->nama_bahan) }}</span>
                                    </td>
                                    <td class="text-start pe-0">
                                        <span class="fw-bold ms-3">{{ ($row->jumlah) }}</span>
                                    </td>
                                    <td class="text-start pe-0">
                                        <span class="fw-bold ms-3">{{ ($row->kode_satuan) }}</span>
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
