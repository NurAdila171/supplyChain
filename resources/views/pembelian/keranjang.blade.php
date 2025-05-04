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
                                Keranjang
                            </li>

                        </ul>

                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">
                            Daftar Keranjang
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
                                                                                                    placeholder="Cari Keranjang"/>
                            </div>
                        </div>

                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#beli"
                               class="btn btn-primary">
                                Beli
                            </button>
                        </div>

                        @push('bottom')
                            <div class="modal fade" tabindex="-1" id="beli">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form class="modal-content" action="{{ route('pembelian.keranjang.proses') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h3 class="modal-title">Form Beli</h3>

                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                            </div>
                                        </div>

                                        <div class="modal-body">
                                            <div class="card-body pt-0">
                                                <div class="mb-0 fv-row">
                                                    <label class="required form-label">Layanan</label>
                                                    <select name="layanan" class="form-control mb-0">
                                                        <option value="online">Online</option>
                                                        <option value="offline">Offline</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class="mb-0 fv-row">
                                                    <label class="required form-label">Metode</label>
                                                    <select name="metode" class="form-control mb-0">
                                                        <option value="qris">QRIS</option>
                                                        <option value="dana">Dana</option>
                                                        <option value="shopeepay">Shopeepay</option>
                                                        <option value="cash">Cash</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Beli</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endpush
                    </div>

                    <div class="card-body pt-0">

                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                               id="kt_ecommerce_products_table">
                            <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="text-start min-w-100px">Nama Bahan</th>
                                <th class="text-start min-w-100px">Jumlah</th>
                                <th class="text-start min-w-100px">Satuan</th>
                                <th class="text-start min-w-100px">Harga Satuan Bahan</th>
                                <th class="text-start min-w-100px">Total Harga</th>
                                <th class="text-end min-w-70px">Aksi</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @php($total = 0)
                            @foreach($keranjang as $row)
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
                                    <td class="text-start pe-0">
                                        <span class="fw-bold ms-3">Rp{{ ($row->harga_satuan_bahan) }},-</span>
                                    </td>
                                    <td class="text-start pe-0">
                                        <span class="fw-bold ms-3">Rp{{ ($row->jumlah * $row->harga_satuan_bahan) }},-</span>
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
                                                <form action="{{ route('pembelian.keranjang.hapus', $row->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-text-primary w-100 menu-link px-3 btn-sm">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    @php($total += $row->jumlah * $row->harga_satuan_bahan)
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="fw-bold">
                                <td class="text-end pe-0" colspan="4">Total Keseluruhan : </td>
                                <td class="text-start" colspan="2">Rp{{ $total }},-</td>
                            </tr>
                            </tfoot>
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
