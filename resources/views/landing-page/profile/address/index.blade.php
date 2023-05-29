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
                                                    <th>Pin</th>
                                                    <th>Penerima</th>
                                                    <th>Alamat Pengiriman</th>
                                                    <th>Daerah Pengiriman</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">
                                                        <input type="radio" id="age1" name="age" value="30">
                                                    </td>
                                                    <td class="text-left">
                                                        {{-- <span class="background-tosca text-primary btn mb-2">Utama</span> --}}
                                                        {{-- <br> --}}
                                                        <span class="text-center">Nurul
                                                            <br>
                                                            0895333448202
                                                        </span>
                                                    </td>
                                                    <td>
                                                        Rumah
                                                        Legok blok kolot, LOHEBNER
                                                        KABUPATEN INDRAMAYU,
                                                        JAWA BARAT
                                                    </td>
                                                    <td>
                                                        JAWA BARAT, KABUPATEN
                                                        INDRAMAYU, LOHBENER
                                                    </td>
                                                    <td class="d-flex justify-content-between">
                                                        <div class="">
                                                            <a href="{{ route('address.edit',1) }}" class="btn btn-sm mb-2 btn-primary">
                                                                <i class="fas fa-edit"></i> Ubah
                                                            </a>
                                                            <a href="{{ route('address.edit',1) }}" class="btn btn-sm mb-2 btn-danger">
                                                                <i class="fas fa-trash"></i> Hapus
                                                            </a>
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
