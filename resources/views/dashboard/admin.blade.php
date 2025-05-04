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
                    <div class="col-md-3 h-100 mb-md-5">
                        <div
                            class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10"
                            style="background-color: #080655">
                            <div class="card-header py-8">
                                <div class="card-title d-flex flex-column">
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ $count_penjualan }} Penjualan</span>
                                    <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Total Semua Penjualan</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 h-100 mb-md-5">
                        <div
                            class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10"
                            style="background-color: #080655">
                            <div class="card-header py-8">
                                <div class="card-title d-flex flex-column">
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ $count_pembelian }} Pembelian</span>
                                    <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Total Semua Pembelian</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-md-5 mb-xl-10">


                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">

                        <div class="card-header pt-5">

                            <div class="card-title d-flex flex-column">

                                <div class="d-flex align-items-center">

                                    <span
                                        class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">Rp</span>
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $total_keuntungan }},-</span>
                                </div>

                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Keuntungan di Bulan Ini</span>
                            </div>
                        </div>



                        <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                            <div class="d-flex flex-column content-justify-center flex-row-fluid">
                                <div class="d-flex fw-semibold align-items-center">
                                    <div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>
                                    <div class="text-gray-500 flex-grow-1 me-4">Siomay</div>
                                    <div class="fw-bolder text-gray-700 text-xxl-end">Rp{{ $total_penjualan_siomay }},-</div>
                                </div>

                                <div class="d-flex fw-semibold align-items-center my-3">
                                    <div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>
                                    <div class="text-gray-500 flex-grow-1 me-4">Batagor</div>
                                    <div class="fw-bolder text-gray-700 text-xxl-end">Rp{{ $total_penjualan_batagor }},-</div>
                                </div>

                                <div class="d-flex fw-semibold align-items-center">
                                    <div class="bullet w-8px h-3px rounded-2 me-3"
                                         style="background-color: #E4E6EF"></div>
                                    <div class="text-gray-500 flex-grow-1 me-4">Pengeluaran</div>
                                    <div class=" fw-bolder text-gray-700 text-xxl-end">Rp{{ $total_pembelian }},-</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="card card-flush overflow-hidden h-md-100">
                            <div class="card-header pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">Produk Terjual pada Bulan Ini</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Diambil dari semua penjualan</span>
                                </h3>
                            </div>

                            <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                                <canvas id="kt_chartjs_penjualan_bln_ini"></canvas>
                                @push('bottom')
                                    <script>
                                        var ctx = document.getElementById('kt_chartjs_penjualan_bln_ini');

                                        var primaryColor = KTUtil.getCssVariableValue('--kt-primary');
                                        var dangerColor = KTUtil.getCssVariableValue('--kt-danger');
                                        var successColor = KTUtil.getCssVariableValue('--kt-success');

                                        var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif');

                                        const data = {
                                            labels: [@foreach($tgl_penjualan as $row) {!! '"' . $row->tgl_jual . '",' !!} @endforeach],
                                            datasets: [
                                                {
                                                    label: 'Siomay',
                                                    data: [@foreach($penjualan_siomay as $row) {{ "" . $row->jumlah . "," }} @endforeach], // Add your data points here
                                                    backgroundColor: primaryColor, // Specify the background color for the dataset
                                                },
                                                {
                                                    label: 'Batagor',
                                                    data: [@foreach($penjualan_batagor as $row) {{ "" . $row->jumlah . "," }} @endforeach], // Add your data points here
                                                    backgroundColor: primaryColor, // Specify the background color for the dataset
                                                },
                                            ]
                                        };

                                        const config = {
                                            type: 'bar',
                                            data: data,
                                            options: {
                                                plugins: {
                                                    title: {
                                                        display: false,
                                                    }
                                                },
                                                responsive: true,
                                                interaction: {
                                                    intersect: false,
                                                },
                                                scales: {
                                                    x: {
                                                        stacked: false,
                                                    },
                                                    y: {
                                                        stacked: false
                                                    }
                                                }
                                            },
                                            defaults: {
                                                global: {
                                                    defaultFont: fontFamily
                                                }
                                            }
                                        };

                                        var myChart = new Chart(ctx, config);
                                    </script>
                                @endpush
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card card-flush overflow-hidden h-md-100">
                            <div class="card-header pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">Omset pada Bulan Ini</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Diambil dari semua penjualan</span>
                                </h3>
                            </div>

                            <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                                <canvas id="kt_chartjs_penjualan_harga_total"></canvas>
                                @push('bottom')
                                    <script>
                                        var ctx = document.getElementById('kt_chartjs_penjualan_harga_total');

                                        var primaryColor = KTUtil.getCssVariableValue('--kt-primary');
                                        var dangerColor = KTUtil.getCssVariableValue('--kt-danger');
                                        var successColor = KTUtil.getCssVariableValue('--kt-success');

                                        var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif');

                                        const data2 = {
                                            labels: [@foreach($tgl_penjualan as $row) {!! '"' . $row->tgl_jual . '",' !!} @endforeach],
                                            datasets: [
                                                {
                                                    label: 'Siomay',
                                                    data: [@foreach($penjualan_siomay as $row) {{ "" . $row->harga_total . "," }} @endforeach], // Add your data points here
                                                    backgroundColor: primaryColor, // Specify the background color for the dataset
                                                },
                                                {
                                                    label: 'Batagor',
                                                    data: [@foreach($penjualan_batagor as $row) {{ "" . $row->harga_total . "," }} @endforeach], // Add your data points here
                                                    backgroundColor: primaryColor, // Specify the background color for the dataset
                                                },
                                            ]
                                        };

                                        const config2 = {
                                            type: 'bar',
                                            data: data2,
                                            options: {
                                                plugins: {
                                                    title: {
                                                        display: false,
                                                    }
                                                },
                                                responsive: true,
                                                interaction: {
                                                    intersect: false,
                                                },
                                                scales: {
                                                    x: {
                                                        stacked: false,
                                                    },
                                                    y: {
                                                        stacked: false
                                                    }
                                                }
                                            },
                                            defaults: {
                                                global: {
                                                    defaultFont: fontFamily
                                                }
                                            }
                                        };

                                        var myChart = new Chart(ctx, config2);
                                    </script>
                                @endpush
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('bottom')
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
@endpush
