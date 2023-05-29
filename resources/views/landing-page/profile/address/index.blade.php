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
                                    <div class="col-md-12">
                                        <a href="{{ route('address.create') }}" class="btn mt-2 mb-3 background-tosca"><i class="fas fa-plus"></i>
                                            Tambah
                                            Alamat</a>
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Penerima</th>
                                                    <th>Alamat Pengiriman</th>
                                                    <th>Daerah Pengiriman</th>
                                                    <th>Pin Point</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left">
                                                        {{-- <span class="background-tosca text-primary btn mb-2">Utama</span> --}}
                                                        {{-- <br> --}}
                                                        <span class="text-center small">Nurul
                                                            <br>
                                                            0895333448202
                                                        </span>
                                                    </td>
                                                    <td>Rumah
                                                        Legok blok kolot, LOHEBNER
                                                        KABUPATEN INDRAMAYU,
                                                        JAWA BARAT</td>
                                                    <td>
                                                        JAWA BARAT, KABUPATEN
                                                        INDRAMAYU, LOHBENER
                                                    </td>
                                                    <td class="d-flex justify-content-between">
                                                        {{-- <img src="{{ asset('landingpage/images/Pin.png') }}" alt=""
                                                            class="img-fluid" style="max-height: 35px"> --}}

                                                        <div class="">
                                                            {{-- <button
                                                                class="btn mb-2 btn-sm text-white background-tosca small">Alamat
                                                                Utama</button> --}}
                                                            <a href="{{ route('address.edit',1) }}" class="btn btn-sm mb-2 btn-primary">
                                                                <i class="fas fa-edit"></i> Ubah
                                                            </a>
                                                            <form action="" method="post">
                                                                @csrf
                                                                <button class="btn btn-sm mb-2 btn-primary">
                                                                    <i class="fas fa-trash"></i> Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
