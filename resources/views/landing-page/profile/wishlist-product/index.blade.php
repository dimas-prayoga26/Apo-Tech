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
                        <div class="col-lg-9 col-md-8 m-t-10 mt-5">
                            <div class="content-with-aside bg-white">
                                <div class="row d-flex">
                                    <div class="col-md-4">
                                        <form class="d-flex">
                                            <input style="width: 250px;border-radius: 0px;" class="form-control" type="search" placeholder="Cari" aria-label="Cari" >
                                            <button style="border-radius: 0px;"; class="btn btn-outline-info btn-outline-dark" type="submit" ><i class="fas fa-solid fa-magnifying-glass"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-5">
                                <div class="col-md-3 col-sm-6 col-xs-6" style="min-height: 300px;">
                                    <div class="item-mobile">
                                        <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                                            <div class="item-image-wrapper-m" style="width: 200px; height: 200px;">
                                                <figure class="item-image-container">
                                                    <picture>
                                                        <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="width: 100%; height: 100%;">
                                                    </picture>
                                                </figure>
                                            </div>
                                            <div class="item-meta-container-m">
                                                <div class="item-name-m" style="background-color: #D9D9D9;">
                                                    <span style="display: inline-block;">Biovision 30’s</span>
                                                </div>
                                                <div class="item-price-m" style="background-color: #00B9D8;">
                                                    <br>
                                                    <span class="price">Rp. 555.000</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>  
                                <div class="col-md-3 col-sm-6 col-xs-6" style="min-height: 300px;">
                                    <div class="item-mobile">
                                        <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                                            <div class="item-image-wrapper-m" style="width: 200px; height: 200px;">
                                                <figure class="item-image-container">
                                                    <picture>
                                                        <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="width: 100%; height: 100%;">
                                                    </picture>
                                                </figure>
                                            </div>
                                            <div class="item-meta-container-m">
                                                <div class="item-name-m" style="background-color: #D9D9D9;">
                                                    <span style="display: inline-block;">Biovision 30’s</span>
                                                </div>
                                                <div class="item-price-m" style="background-color: #00B9D8;">
                                                    <br>
                                                    <span class="price">Rp. 555.000</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>     
                                <div class="col-md-3 col-sm-6 col-xs-6" style="min-height: 300px;">
                                    <div class="item-mobile">
                                        <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                                            <div class="item-image-wrapper-m" style="width: 200px; height: 200px;">
                                                <figure class="item-image-container">
                                                    <picture>
                                                        <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="width: 100%; height: 100%;">
                                                    </picture>
                                                </figure>
                                            </div>
                                            <div class="item-meta-container-m">
                                                <div class="item-name-m" style="background-color: #D9D9D9;">
                                                    <span style="display: inline-block;">Biovision 30’s</span>
                                                </div>
                                                <div class="item-price-m" style="background-color: #00B9D8;">
                                                    <br>
                                                    <span class="price">Rp. 555.000</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>      
                                <div class="col-md-3 col-sm-6 col-xs-6" style="min-height: 300px;">
                                    <div class="item-mobile">
                                        <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                                            <div class="item-image-wrapper-m" style="width: 200px; height: 200px;">
                                                <figure class="item-image-container">
                                                    <picture>
                                                        <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="width: 100%; height: 100%;">
                                                    </picture>
                                                </figure>
                                            </div>
                                            <div class="item-meta-container-m">
                                                <div class="item-name-m" style="background-color: #D9D9D9;">
                                                    <span style="display: inline-block;">Biovision 30’s</span>
                                                </div>
                                                <div class="item-price-m" style="background-color: #00B9D8;">
                                                    <br>
                                                    <span class="price">Rp. 555.000</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>   
                            </div>
                            <div class="d-flex justify-content-end pagination-container">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                    </ul>
                                </nav>   
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection