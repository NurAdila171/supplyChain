@extends('layouts.blank')

@section('content')
    <div id="layoutDefault">
        <div id="layoutDefault_content">
            <main>
                <nav class="navbar navbar-marketing navbar-expand-lg bg-transparent-dark navbar-dark">
                    <div class="container px-5 py-3">
                        <a class="navbar-brand text-800" href="{{ route('landing') }}">Batagor & Siomay AA</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation"><i data-feather="menu"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <a class="btn fw-500 btn-primary ms-auto text-center"
                               href="{{ route('login') }}">
                                Login
                            </a>
                        </div>
                    </div>
                </nav>
                <!-- Page Header-->
                <header class="page-header-ui page-header-ui-light bg-white">
                    <div class="page-header-ui-content">
                        <div class="container px-5">
                            <div class="row gx-5 align-items-center">
                                <div class="col-lg-6" data-aos="fade-up">
                                    <h1 class="page-header-ui-title">Batagor & Siomay AA,</h1>
                                    <p class="page-header-ui-text mb-5">Sisingamangaraja. Super Partner. Jajanan. Tutup.
                                        Jam buka. Jl. Sisingamangaraja (Samping BI), Lima Puluh, Pekanbar.</p>
                                    <div class="d-flex flex-column flex-sm-row">
                                        <a class="btn btn-lg btn-primary fw-500 me-sm-3 mb-3 mb-sm-0"
                                           href="{{ route('login') }}">
                                            Login
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-none d-lg-block" data-aos="fade-up" data-aos-delay="100"><img
                                        class="img-fluid rounded-5" src="{{ asset('uploads/profile2.jpg') }}" alt="..."/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="svg-border-rounded text-light">
                        <!-- Rounded SVG Border-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
                             fill="currentColor">
                            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
                        </svg>
                    </div>
                </header>
                <section class="bg-light py-10" id="explore">
                    <div class="container px-5">
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8">
                                <div class="text-center mb-10">
                                    <h2>Produk yang Dijual</h2>
                                    <p class="lead">Terdapat 2 produk yang dijual oleh kami</p>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-5" data-aos="fade-right">
                            <div class="row g-0">
                                <div class="col-md-6"><img class="img-fluid w-100"
                                                           src="{{ asset('uploads/gambar_produk/batagor.jpeg') }}"
                                                           alt="..."/></div>
                                <div class="col-md-6">
                                    <div
                                        class="card-body d-flex align-items-center justify-content-center h-100 flex-column">
                                        <h3 class="card-title fw-bold text-uppercase mb-2">Batagor</h3>
                                        <p class="card-text fw-light mb-4">Makanan</p>
                                        <a class="btn btn-outline-dark fw-500" href="{{ route('login') }}">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-5" data-aos="fade-left">
                            <div class="row g-0">
                                <div class="col-md-6 order-1 order-md-0">
                                    <div
                                        class="card-body d-flex align-items-center justify-content-center h-100 flex-column">
                                        <h3 class="card-title fw-bold text-uppercase mb-2">Siomay</h3>
                                        <p class="card-text fw-light mb-4">Makanan</p>
                                        <a class="btn btn-outline-dark fw-500" href="{{ route('login') }}">Lihat</a>
                                    </div>
                                </div>
                                <div class="col-md-6 order-0 order-md-1"><img class="img-fluid w-100"
                                                                              src="{{ asset('uploads/gambar_produk/siomay.jpeg') }}"
                                                                              alt="..."/></div>
                            </div>
                        </div>
                    </div>
                    <div class="svg-border-rounded text-white">
                        <!-- Rounded SVG Border-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
                             fill="currentColor">
                            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
                        </svg>
                    </div>
                </section>
                <section class="bg-white py-10">
                    <div class="container px-5">
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8">
                                <div class="text-center mb-10">
                                    <h2>Projek Tim</h2>
                                    <p class="lead">Projek dibuat oleh tim yang beranggotakan 3 orang</p>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-5">
                            <div class="col-md-6 col-xl-4 mb-5">
                                <div class="card card-team">
                                    <div class="card-body">
                                        <img class="card-team-img mb-3"
                                             src="{{ asset('uploads/team/Cici_Angresta.jpg') }}" alt="..."/>
                                        <div class="card-team-name">Cici Angresta</div>
                                        <div class="card-team-position mb-0">Project Development</div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i
                                                class="fab fa-instagram"></i></a>
                                        <a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i
                                                class="fab fa-google"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 mb-5">
                                <div class="card card-team">
                                    <div class="card-body">
                                        <img class="card-team-img mb-3"
                                             src="{{ asset('uploads/team/Dita_Nuraulia_Sari.jpg') }}" alt="..."/>
                                        <div class="card-team-name">Dita Nuraulia Sari</div>
                                        <div class="card-team-position mb-0">Project Development</div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i
                                                class="fab fa-instagram"></i></a>
                                        <a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i
                                                class="fab fa-google"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 mb-5">
                                <div class="card card-team">
                                    <div class="card-body">
                                        <img class="card-team-img mb-3"
                                             src="{{ asset('uploads/team/Fachran_Muhammad.jpg') }}" alt="..."/>
                                        <div class="card-team-name">Fachran Muhammad</div>
                                        <div class="card-team-position mb-0">Project Development</div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i
                                                class="fab fa-instagram"></i></a>
                                        <a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i
                                                class="fab fa-google"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="svg-border-rounded text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none"
                             fill="currentColor">
                            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
                        </svg>
                    </div>
                </section>
            </main>
        </div>
        <div id="layoutDefault_footer">
            <footer class="footer pt-10 pb-5 mt-auto bg-black footer-dark">
                <div class="container px-5">
                    <div class="row gx-5">
                        <div class="col-lg-3">
                            <div class="footer-brand">Batagor & Siomay AA</div>
                            <div class="icon-list-social mb-5">
                                <a class="icon-list-social-link" href="#!"><i class="fab fa-instagram"></i></a>
                                <a class="icon-list-social-link" href="#!"><i class="fab fa-facebook"></i></a>
                                <a class="icon-list-social-link" href="#!"><i class="fab fa-github"></i></a>
                                <a class="icon-list-social-link" href="#!"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <hr class="my-5"/>
                    <div class="row gx-5 align-items-center">
                        <div class="col-md-6 small">Copyright © Your Website 2023</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            ·
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
