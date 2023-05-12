@extends('landing-page.layouts.main')

@section('title', 'Landing Page Apo Tech')
<link rel="stylesheet" href="{{ asset('assets-ui/liat_produk.css') }}">

@section('content')
<div class="container-store" style="padding: 10px; background-color: #00B9D8;">
    <div class="row">
      <div class="col-md-4" style="display: flex; align-items: center;">
        <img src="{{ asset('assets-image/images-landing/icon_footer_main.png') }}" alt="Foto Toko" style="border-radius: 50%; width: 150px; height: 150px; margin-right: 10px;">
        <div>
          <h5><i class="fa fa-shop"></i><span> Apotec Kelapa Gading</span></h5>
          <span style="padding-left: 2px;"><i class="fa fa-location-dot" style="font-size: 16px;color: aquamarine;"></i> Indramayu</span>
            <div class="section-seller-overview__item section-seller-overview__item--clickable">
                <div class="section-seller-overview__item-text-value">
                    <span ><i class="fa fa-star fa-sm" style="display: inline-block; font-size: 15px; color: #f1c40f;"></i> 4.6 (28,8RB penilaian)</span>
                </div>
            </div>
            <hr>
            <span style="margin-right: 10px; font-size: 18px;">Bagikan:</span>
            <a href="#" style="margin-right: 10px;"><i class="fab fa-facebook-f"></i></a>
            <a href="#" style="margin-right: 10px;"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="col-md-4"></div>
      <div class="col-md-4" style="display: flex; align-items: center; justify-content: flex-end;">
        <div class="store-actions" style="margin-right: 50px;display: flex;flex-direction: column;align-items: center;">
            <a href="#" class="btn btn-warning btn-md chat-button mt-2" style=" width: 125px;">Chat Toko</a>
            <a href="#" class="btn btn-primary btn-md chat-button mt-2" style=" width: 125px;">Follow Toko</a>
            <a href="#" class="btn btn-info btn-md chat-button mt-2" style=" width: 125px;">Info Toko</a>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-4 mt-12 mt-5">
        <div class="aside bg-white merchant-profile m-b-20">
            <div id="sidebarLabel" class="card" style="border-radius: 0;">
                <div id="headingLabel" class="card-header">
                    <h5 class="mb-0">
                        <a style="text-decoration: none;color:black;" data-toggle="collapse" data-target="#collapseLabel" aria-expanded="true" aria-controls="collapseLabel" class="btn btn-link f-size-12 text-bold">Katagori</a>
                    </h5>
                </div>
                <div id="collapseLabel" aria-labelledby="headingLabel" data-parent="#accordion" class="collapse show" style="">
                    <div class="card-body">
                        <form>
                            <label class="checkbox-item out-filter" style="display: block;">
                                <div>
                                    <input type="checkbox" name="checkbox-filter" value="0"> 
                                    <span class="check-toggle"></span>
                                    <span>&nbsp;Obat&nbsp;</span>
                                </div>
                            </label>
                            <label class="checkbox-item out-filter" style="display: block;">
                                <div>
                                    <input type="checkbox" name="checkbox-filter" value="1"> 
                                    <span class="check-toggle"></span>
                                    <span>&nbsp;Suplemen</span>
                                </div>
                            </label>
                            <label class="checkbox-item out-filter" style="display: block;">
                                <div>
                                    <input type="checkbox" name="checkbox-filter" value="1"> 
                                    <span class="check-toggle"></span>
                                    <span>&nbsp;Obat Herbal</span>
                                </div>
                            </label> 
                            <label class="checkbox-item out-filter" style="display: block;">
                                <div>
                                    <input type="checkbox" name="checkbox-filter" value="1"> 
                                    <span class="check-toggle"></span>
                                    <span>&nbsp;Produk Ibu Dan Bayi</span>
                                </div>
                            </label> 
                            <label class="checkbox-item out-filter" style="display: block;">
                                <div>
                                    <input type="checkbox" name="checkbox-filter" value="1"> 
                                    <span class="check-toggle"></span>
                                    <span>&nbsp;Susu</span>
                                </div>
                            </label>                      
                        </form>
                    </div>
                </div>
            </div>
            <div id="sidebarLabel" class="card" style="border-radius: 0;">
                <div id="headingLabel" class="card-header">
                    <h5 class="mb-0">
                        <a style="text-decoration: none;color:black;" data-toggle="collapse" data-target="#collapseLabel" aria-expanded="true" aria-controls="collapseLabel" class="btn btn-link f-size-12 text-bold">Katagori</a>
                    </h5>
                </div>
                <div id="collapseLabel" aria-labelledby="headingLabel" data-parent="#accordion" class="collapse show" style="">
                    <div class="card-body">
                        <form>
                            <label class="checkbox-item out-filter" style="display: block;">
                                <div>
                                    <input type="checkbox" name="checkbox-filter" value="0"> 
                                    <span class="check-toggle"></span>
                                    <span>&nbsp;Detol&nbsp;</span>
                                </div>
                            </label>
                            <label class="checkbox-item out-filter" style="display: block;">
                                <div>
                                    <input type="checkbox" name="checkbox-filter" value="1"> 
                                    <span class="check-toggle"></span>
                                    <span>&nbsp;Betadine</span>
                                </div>
                            </label>
                            <label class="checkbox-item out-filter" style="display: block;">
                                <div>
                                    <input type="checkbox" name="checkbox-filter" value="1"> 
                                    <span class="check-toggle"></span>
                                    <span>&nbsp;Insto</span>
                                </div>
                            </label> 
                            <label class="checkbox-item out-filter" style="display: block;">
                                <div>
                                    <input type="checkbox" name="checkbox-filter" value="1"> 
                                    <span class="check-toggle"></span>
                                    <span>&nbsp;Dulcolax</span>
                                </div>
                            </label> 
                            <label class="checkbox-item out-filter" style="display: block;">
                                <div>
                                    <input type="checkbox" name="checkbox-filter" value="1"> 
                                    <span class="check-toggle"></span>
                                    <span>&nbsp;Neurobion</span>
                                </div>
                            </label>                      
                        </form>
                    </div>
                </div>
            </div>
            <div id="sidebarLabel" class="card" style="border-radius: 0;">
                <div id="headingLabel" class="card-header">
                    <h5 class="mb-0">
                        <a style="text-decoration: none;color:black;" data-toggle="collapse" data-target="#collapseLabel" aria-expanded="true" aria-controls="collapseLabel" class="btn btn-link f-size-12 text-bold">Label Product</a>
                    </h5>
                </div>
                <div id="collapseLabel" aria-labelledby="headingLabel" data-parent="#accordion" class="collapse show" style="">
                    <div class="card-body">
                        <form>
                            <label class="checkbox-item out-filter">
                                <div class="d-flex">
                                    <div>
                                        <input type="checkbox" name="checkbox-filter" value="0"> 
                                            <span class="check-toggle"></span>
                                    </div>
                                    <div class="d-inline ml-2 p-t-1">
                                        <span>&nbsp;Non Resep&nbsp;</span>
                                    </div>
                                </div>
                            </label>
                            <label class="checkbox-item out-filter">
                                <div class="d-flex">
                                    <div>
                                        <input type="checkbox" name="checkbox-filter" value="1"> 
                                            <span class="check-toggle"></span>
                                    </div>
                                    <div class="d-inline ml-2 p-t-1">
                                        <span>&nbsp;Resep</span>
                                    </div>
                                </div>
                            </label>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-category border-0">
                <div id="sidebarprice" class="card" style="border-radius: 0;">
                    <div id="headingHarga" class="card-header">
                        <h5 class="mb-0">
                            <a style="text-decoration: none;color:black;" data-toggle="collapse" data-target="#collapseHarga" aria-expanded="true" aria-controls="collapseHarga" class="btn btn-link f-size-12 text-bold">Price</a>
                        </h5>
                    </div>
                    <div id="collapseHarga" aria-labelledby="headingHarga" data-parent="#accordion" class="collapse show">
                        <div class="card-body">
                            <form>
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text span-price f-size-10">Rp</span>
                                    </div>
                                    <input type="text" placeholder="Min" aria-label="Min" class="form-control border-left-0 placeholder-right only-number f-size-10">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text span-price f-size-10">Rp</span>
                                    </div>
                                    <input type="text" placeholder="Max" aria-label="Max" class="form-control border-left-0 placeholder-right only-number f-size-10">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                <div class="col-md-3"></div>
                <div class="col-md-4">
                    <ul class="list-inline text-right" style="padding: 0px;float: right;">
                        <li class="list-inline-item f-size-20 font-weight-bold" style="color: rgb(67, 67, 67);">Sort</li>
                        <li class="list-inline-item">
                            <div class="select-container">
                                <select class="custom-select">
                                  <option selected>Pilih</option>
                                  <option value="1">Nama Produk (A-Z)</option>
                                  <option value="2">Nama Produk (Z-A)</option>
                                  <option value="3">Harga Terendah</option>
                                  <option value="4">Harga Tertinggi</option>
                                </select>
                              </div>                              
                        </li>
                    </ul>
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
        <div class="row">
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
        <div class="row">
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
@endsection