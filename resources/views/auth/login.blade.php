@extends('layouts.auth')

@section('content')
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-auto bg-dark w-xl-650px positon-xl-relative"
                 style="background-image: url({{ asset('uploads/profile2.jpg') }})">
                <div class="d-flex flex-column h-100 justify-content-center text-center p-5 bg-opacity-50">
                    <a href="{{ url('') }}" class="pb-5">
                        <h1 class="text-white fs-2qx">Batagor & Siomay AA Ade</h1>
                    </a>

                    <h1 class="d-none d-lg-block fw-bold text-white fs-2x pb-4 pb-md-5">
                        Selamat Datang,</h1>

                    <p class="d-none d-lg-block fw-semibold fs-2 p-4 text-white">
                        Batagor & Siomay AA, Sisingamangaraja. Super Partner. Jajanan. Tutup. Jam buka. Jl.
                        Sisingamangaraja (Samping BI), Lima Puluh, Pekanbaru
                    </p>

                    <div class="card-rounded bg-dark bg-opacity-25 pt-5">
                        <a href="{{ route('landing') }}"
                           class="btn btn-light-primary">Home</a>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">

                        <form class="form w-100" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="text-center mb-10">
                                <h1 class="text-dark mb-3">
                                    Masuk Dashboard</h1>
                            </div>

                            <div class="fv-row mb-10">
                                <label class="form-label fs-6 fw-bold text-dark">Username</label>
                                <input
                                    class="form-control form-control-lg form-control-solid @error('username') is-invalid @enderror"
                                    type="text" name="username" value="{{ old('username') }}" required
                                    autocomplete="username"
                                    autofocus/>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    <label class="form-label fw-bold text-dark fs-6 mb-0">Password</label>
                                </div>


                                <input
                                    class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                    type="password"
                                    name="password" required autocomplete="current-password"/>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row mb-10">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            Ingat Saya
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">
                                        Login
                                    </span>
                                    <span class="indicator-progress">
                                        Harap Menunggu... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
