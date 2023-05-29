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
                                                <a class="nav-link text-dark" href="{{ route('address.index') }}">Address</a>
                                            </li>
                                            <li class="nav-item mx-4">
                                                <a class="nav-link text-dark" href="#">Notification</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{ asset(auth()->user()->userApotech->image ?? 'virtual/assets/img/default-user.webp') }}" alt=""
                                                    class="img-fluid">
                                                <div class="row mt-4">
                                                    <div class="col-md-6">
                                                        <span>File Size : 2 Mb</span>
                                                        <br>
                                                        <span>File Type : .jpg</span>
                                                    </div>
                                                    <div class="col-md align-self-center">
                                                        <input type="file" class="d-none" id="uploadImage">
                                                        <label for="uploadImage" class="btn background-tosca">Choose
                                                            Foto</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <p class="fw-bold mb-0">Personal Data</p>
                                       <table>
                                        <tr>
                                            <td style="width:120px">Nama</td>
                                            <td style="width:20px"> : </td>
                                            {{-- <td>{{ auth()->user()->userApotech }}</td> --}}
                                        </tr>
                                        <tr>
                                            <td style="width:120px">Jenis Kelamin</td>
                                            <td style="width:20px"> : </td>
                                            <td>{{ auth()->user()->userApotech->jeniskelamin ?? '-' }}</td>
                                        </tr>
                                       </table>
                                        <p class="fw-bold mt-3 mb-0">Kontak Personal</p>
                                        <table>
                                            <tr>
                                                <td style="width:120px">Email</td>
                                                <td style="width:20px"> : </td>
                                                <td>{{ auth()->user()->email }}</td>
                                            </tr>
                                            <tr>
                                                <td style="width:120px">Phone</td>
                                                <td style="width:20px"> : </td>
                                                <td>{{ auth()->user()->userApotech->phone_number ?? '-' }}</td>
                                            </tr>
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
