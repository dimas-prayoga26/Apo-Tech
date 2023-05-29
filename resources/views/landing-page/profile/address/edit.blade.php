@extends('landing-page.layouts.main')

@section('title', 'Landing Page Apo Tech')
<link rel="stylesheet" href="{{ asset('assets-ui/sukai_produk.css') }}">

@section('content')

    <section class="main-content">
        <div class="container-fluid container-fluid-body">
            <div class="row">
                <div class="col-md-12 content-box">
                    <div class="content-account-box-detail" style="background-color: white;">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 mb-20">
                                <x-Landingpage.SidebarProfile />
                            </div>
                            <div class="col-lg-9 col-md-8 m-t-10">
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <ul class="nav justify-content-start">
                                            <li class="nav-item mx-4">
                                                <a class="nav-link text-dark" aria-current="page"
                                                    href="{{ route('profile.index') }}">Profile</a>
                                            </li>
                                            <li class="nav-item mx-4">
                                                <a class="nav-link text-dark"
                                                    href="{{ route('address.index') }}">Address</a>
                                            </li>
                                            <li class="nav-item mx-4">
                                                <a class="nav-link text-dark" href="#">Notification</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Edit Alamat</h6>
                                        <form action="" method="post">
                                            @csrf
                                            <div class='form-group mb-3'>
                                                <label for='penerima' class='mb-2'>Penerima</label>
                                                <input type='text' name='penerima'
                                                    class='form-control @error('penerima') is-invalid @enderror'
                                                    value='{{ old('penerima') }}'>
                                                @error('penerima')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for='alamat_pengiriman' class='mb-2'>Alamat Pengiriman</label>
                                                <input type='text' name='alamat_pengiriman'
                                                    class='form-control @error('alamat_pengiriman') is-invalid @enderror'
                                                    value='{{ old('alamat_pengiriman') }}'>
                                                @error('alamat_pengiriman')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class='form-group mb-3'>
                                                <label for='daerah_pengiriman' class='mb-2'>Daerah Pengiriman</label>
                                                <input type='text' name='daerah_pengiriman'
                                                    class='form-control @error('daerah_pengiriman') is-invalid @enderror'
                                                    value='{{ old('daerah_pengiriman') }}'>
                                                @error('daerah_pengiriman')
                                                    <div class='invalid-feedback'>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="utama" name="utama">
                                                <label class="form-check-label" for="utama">
                                                    Jadikan Utama
                                                </label>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn background-tosca mt-3 text-white ">Tambah Alamat</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
