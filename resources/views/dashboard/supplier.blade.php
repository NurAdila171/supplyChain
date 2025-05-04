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
                                <a href="index708f.html?page=index" class="text-gray-500">
                                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                </a>
                            </li>

                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i></li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                Dashboards
                            </li>
                        </ul>

                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">
                            Dashboard
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <div id="kt_app_content_container" class="app-container  container-fluid ">
                <div class="row g-5">
                    <div class="col-md-4 h-100 mb-md-3">
                        <div
                            class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10"
                            style="background-color: #080655">
                            <div class="card-header py-8">
                                <div class="card-title d-flex flex-column">
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ $count_pembelian }}
                                        Pembelian</span>
                                    <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Total Semua
                                        Pembelian</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 h-100 mb-md-3">
                        <div
                            class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10"
                            style="background-color: #080655">
                            <div class="card-header py-8">
                                <div class="card-title d-flex flex-column">
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ count($bahan) }}
                                        Bahan</span>
                                    <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Jumlah Bahan di Bawah Limit</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if(count($bahan) > 0)
                    <div class="row g-5">
                        <div class="card py-10 col-md-12 h-100 mb-md-3">
                            <div class="card-body pt-0">
                                <h2>5 Bahan yang Hampir Habis</h2>
                                <table class="table align-middle table-row-dashed fs-6 gy-5"
                                       id="kt_ecommerce_products_table">
                                    <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-200px">Nama Bahan</th>
                                        <th class="text-start min-w-100px">Stok Bahan</th>
                                        <th class="text-start min-w-100px">Limitasi</th>
                                        <th class="text-end min-w-100px">Satuan</th>
                                    </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                    @foreach($bahan as $row)
                                        <tr>
                                            <td class="text-start pe-0">
                                                <span class="fw-bold ms-3">{{ ($row->nama_bahan) }}</span>
                                            </td>
                                            <td class="text-start pe-0">
                                                <span class="fw-bold ms-3">{{ ($row->stok_bahan) }}</span>
                                            </td>
                                            <td class="text-start pe-0">
                                                <span class="fw-bold ms-3">{{ ($row->limit_bahan) }}</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="fw-bold ms-3">{{ ($row->kode_satuan) }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('bottom')
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
@endpush
