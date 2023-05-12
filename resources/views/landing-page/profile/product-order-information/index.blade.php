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
                            <div class="card" style="text-decoration: none;">
                                <div class="sidebar p-3">
                                    <div class="d-block">
                                        <div class="row">
                                            <div class="col-3">
                                                <img class="profile-image" style="width:50px;height:50px" src="{{ asset('assets-image/images-landing/milk.png') }}">
                                            </div>
                                            <div class="col-9" >
                                                <a href="/profilakun" class="font-weight-bold f-size-14" style="text-decoration: none;color:black;">
                                                    <div class="text-truncate col-12 p-0 m-0">Example
    
                                                    </div>
                                                </a>
                                                <span class="col-12 text-truncate m-0 mt-1 p-0" style="font-size: 10px;">example@gmail.com</span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="margin:16px -16px 16px;border:1px solid rgba(0,0,0,.1)">
                                    <ul class="list-unstyled font-14">
                                        <p class="title-akun">Daftar Transaksi</p>
                                        <hr style="margin:16px -16px 16px;border:1px solid rgba(0,0,0,.1)">
                                        <li class="mb-2">
                                            <a href="/transaksiakunpayment" class="f-size-14">Menunggu Pembayaran</a>
                                        </li>
                                        <li>
                                            <a href="/transaksiakun" class="f-size-14">Semua Transaksi</a>
                                        </li>
                                    </ul>
                                    <hr style="margin:16px -16px 16px;border:1px solid rgba(0,0,0,.1)">
                                    <ul class="list-unstyled font-14">
                                            <p class="title-akun">Profile Saya</p>
                                            <hr style="margin:16px -16px 16px;border:1px solid rgba(0,0,0,.1)">
                                        <li class="mb-2">
                                            <a href="/favoriteseller" class="f-size-14">Pesan</a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="/favoriteseller" class="f-size-14">Whish List</a>
                                        </li>
                                        <li>
                                            <a href="/profilakun" class="f-size-14">Pengaturan</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 m-t-10" >
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <br>
                                        <ul class="nav nav-tabs nav-tabs-medica" id="myTab" role="tablist" >
                                            <li class="nav-item active">
                                                <a style="text-decoration: none;color: black;" class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true"><i class="fa fa-search"></i> Semua</a>
                                            </li>
                                            <li class="nav-item ml" style="margin-left:6px;">
                                                <a style="text-decoration: none;color: black;" class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false"><i class="fa-sharp fa-solid fa-cash-register"></i> Belum Bayar</a>
                                            </li>
                                            <li class="nav-item" style="margin-left:6px;">
                                                <a style="text-decoration: none;color: black;" class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false"><i class="fa-solid fa-boxes-packing"></i> Sedang Dikemas</a>
                                            </li>
                                            <li class="nav-item" style="margin-left:6px;">
                                                <a style="text-decoration: none;color: black;" class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false"><i class="fa-solid fa-truck-fast"></i> Sedang Dikirim</a>
                                            </li>
                                            <li class="nav-item" style="margin-left:6px;">
                                                <a style="text-decoration: none;color: black;" class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false"><i class="fa-solid fa-circle-check"></i> Selesai</a>
                                            </li>
                                            <li class="nav-item" style="margin-left:6px;">
                                                <a style="text-decoration: none;color: black;" class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false"><i class="fa-solid fa-xmark"></i> Dibatalkan</a>
                                            </li>
                                            <li class="nav-item" style="margin-left:6px;">
                                                <a style="text-decoration: none;color: black;" class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false"><i class="fa-solid fa-rotate-left"></i> Pengembalian Barang</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend" style="margin-left: 25px;">
                                  <span class="input-group-text" id="basic-addon1" style="border-radius: 0px;"><i class="fa-solid fa-magnifying-glass" style="height: 25px;padding-top: 5px;"></i></span>
                                </div>
                                <input style="width: 400px;margin-right: 25px;" type="text" class="form-control custom-input" placeholder="search" aria-label="Username" aria-describedby="basic-addon1">
                            </div>                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection