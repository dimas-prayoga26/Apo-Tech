@extends('landing-page.layouts.main')

@section('title', 'Landing Page Apo Tech')
<link rel="stylesheet" href="{{ asset('assets-ui/liat_produk.css') }}">
<style>
    *{
        padding:0;
        margin: 0;
    }
</style>

@section('content')
<div class="row">
    <div class="col-md-6" style="padding-left: 200px;">
      <img class="product-image" src="{{ asset('assets-image/images-landing/icon_footer_main.png') }}" alt="Gambar Produk">
      <div class="sub-images" style="margin-left: 10px;">
        <img class="Sub-Produk" src="{{ asset('assets-image/images-landing/milk.png') }}" alt="Sub Produk 1">
        <img class="Sub-Produk" src="{{ asset('assets-image/images-landing/milk.png') }}" alt="Sub Produk 2">
        <img class="Sub-Produk" src="{{ asset('assets-image/images-landing/milk.png') }}" alt="Sub Produk 3">
      </div>
    </div>
    <div class="col-md-6" style="margin-top: 10px;">
      <div class="product-details">
        <h2 class="product-title">3M TEGADERM FILM 1626 10 X 12 CM</h2>
        <h6>Stok : <span class="product-stock">10</span></h6>
        <p class="product-type">Tipe Obat : <i class="fas fa-shield-alt" style="color: red;"></i>&nbsp;Resep Dokter&nbsp;</p>
        <p class="product-price">Rp. 500.000</p>
        <div class="product-options">
          <h5>Pilih Opsi:</h5>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-primary active">
              <input type="radio" name="options" id="option1" autocomplete="off" checked> Tablet
            </label>
            <label class="btn btn-primary">
              <input type="radio" name="options" id="option2" autocomplete="off"> Sirup
            </label>
          </div>
        </div>
        
        <form>
          <div class="form-group">
            <label class="d-flex justify-content-start" for="qty" style="font-size: 18px;">Jumlah :</label>
            <div class="input-group mt-2">
              <span class="input-group-btn">
                <button onclick="onMin()" type="button" class="btn btn-default btn-number" data-type="minus"><i class="fas fa-minus"></i></button>
              </span>
              <input type="number" id="qty" name="qty" min="1" value="1" class="form-control input-number">
              <span class="input-group-btn">
                <button onclick="onPlus()" type="button" class="btn btn-default btn-number" data-type="plus"><i  class="fas fa-plus"></i></button>
              </span>
            </div>
            <script>
                const valueAyam = document.getElementById("qty");
                const onPlus = () => {
                  valueAyam.value = parseInt(valueAyam.value) + 1;
              
                  // alert('debug geprek')
                }
                const onMin = () => {
                  
                  if(valueAyam.value > 1){
                    valueAyam.value = parseInt(valueAyam.value) - 1;
                  }
              
                  // alert('debug geprek')
                }
              </script>
              
          </div>
          <div class="d-flex justify-content-start mt-3">
            <button type="button" class="btn btn-primary" style="margin-right: 10px;"><i class="fas fa-shopping-cart"></i> Tambah ke Keranjang</button>
            <button type="button" class="btn btn-success"><i class="fas fa-money-bill-wave"></i> Beli Sekarang</button>
          </div>
          <div class="d-flex justify-content-start mt-3">
            <span style="margin-right: 10px; font-size: 18px;">Bagikan:</span>
            <a href="#" style="margin-right: 10px;"><i class="fab fa-facebook-f"></i></a>
            <a href="#" style="margin-right: 10px;"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <hr style="height: 25px; border: none; border-left: 2px solid #ccc; margin: 0 20px;">
            <div>
              <span style="margin-right: 10px; font-size: 18px;">Wishlist:</span>
              <a href="#" style="margin-right: 10px;"><i class="far fa-heart"></i></a>
            </div>
          </div>        
        </form>
      </div>
    </div>
  </div>


  <div class="container-store" style="padding: 10px; background-color: #00B9D8;">
      <div class="row">
        <div class="col-md-4" style="display: flex; align-items: center;">
          <img src="{{ asset('assets-image/images-landing/icon_footer_main.png') }}" alt="Foto Toko" style="border-radius: 50%; width: 150px; height: 150px; margin-right: 10px;">
          <div>
            <h5><i class="fa fa-shop"></i><span> Apotek Kelapa Gading</span></h5>
            <span style="padding-left: 2px;"><i class="fa fa-location-dot" style="font-size: 16px;color: aquamarine;"></i> Indramayu</span>
              <div class="section-seller-overview__item section-seller-overview__item--clickable">
                  <div class="section-seller-overview__item-text-value">
                      <span ><i class="fa fa-star fa-sm" style="display: inline-block; font-size: 15px; color: #f1c40f;"></i> 4.6 (28,8RB penilaian)</span>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4" style="display: flex; align-items: center; justify-content: flex-end;">
          <div class="store-actions" style="margin-right: 50px;display: flex;flex-direction: column;align-items: center;">
              <a href="#" class="btn btn-warning btn-md chat-button mt-2" style=" width: 125px;">Chat Penjual</a>
              <a href="{{ route('toko.index') }}" class="btn btn-primary btn-md chat-button mt-2" style=" width: 125px;">Kunjungi Toko</a>
          </div>
        </div>
      </div>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <br>
        <ul class="nav nav-tabs nav-tabs-medica" id="myTab" role="tablist">
          <li class="nav-item active">
            <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true"><i class="fa fa-search"></i> Deskripsi Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false"><i class="fa fa-star"></i> Ulasan</a>
          </li>
        </ul>
        <div class="tab-content under" id="myTabContent"><br>
          <div class="tab-pane active" id="info" role="tabpanel" aria-labelledby="info-tab">
              <strong>Golongan Obat</strong>
                <div>
                    Obat Keras<img src={{ asset('assets-image/images-landing/keras.jpg') }} alt="" height="35" width="35">
                      <div class="alert alert-info alert-dismissable" style="background-color:#EF9486;color:#333;">
                            <strong>Informasi!</strong> Pembelian produk ini wajib mengunakan resep dokter
                      </div>
                </div>
                <hr>
              <strong>Komposisi</strong>
                <div>
                    Pembelian produk ini wajib mengunakan resep dokter
                </div>
                <hr>
              <strong>Indikasi</strong>
                <div>
                    Pembelian produk ini wajib mengunakan resep dokter
                </div>
                <hr>
              <strong>Kemasan</strong>
                <div>
                    Pembelian produk ini wajib mengunakan resep dokter 
                </div>
                <hr>
              <strong>Cara Pakai / Dosis</strong>
                <div>
                    Pembelian produk ini wajib mengunakan resep dokter
                </div>
                <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-item">
    <div class="product-header" style="margin-left: 25px;margin-top: 25px; max-width: 1200px;">
      <h3 style="color: #fff;">Produk Relevan Dari Penjual Lain</h3>
    </div>
    <div class="category-item-container mt-5">  
        <div style="margin-left: 0%; height:400px; display:flex; max-width:100wh; overflow-x: scroll; white-space: nowrap;">
            <div class="col-md-3 col-sm-6 col-xs-6 pt-1">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
            <div class="col-md-3 col-sm-6 col-xs-6 pt-1">
                <div  class="item-mobile ">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
            <div class="col-md-3 col-sm-6 col-xs-6 pt-1">
                <div class="item-mobile ">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
            <div class="col-md-3 col-sm-6 col-xs-6 col-md-3 pt-1">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
            <div class="col-md-3 col-sm-6 col-xs-6 col-md-3 pt-1">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
            <div class="col-md-3 col-sm-6 col-xs-6 col-md-3 pt-1">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
            <div class="col-md-3 col-sm-6 col-xs-6 col-md-3 pt-1">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
            <div class="col-md-3 col-sm-6 col-xs-6 col-md-3 pt-1">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
    </div>
  </div>

  {{-- end --}}
  <div class="container-item" style="overflow-x: scroll; white-space: nowrap;">
    <div class="product-header" style="margin-left: 25px;margin-top: 25px;">
      <h3  style="color: #fff;">Produk Lainnya</h3>
    </div>
    <div class="category-item-container mt-5">  
        <div style="margin-left: 0%; height:350px; display:flex; max-width:100wh; overflow-x: scroll; white-space: nowrap;">
            <div class="col-md-3 col-sm-6 col-xs-6 pt-1">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
            <div class="col-md-3 col-sm-6 col-xs-6 pt-1">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
            <div class="col-md-3 col-sm-6 col-xs-6 pt-1">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
            <div class="col-md-3 col-sm-6 col-xs-6 pt-1">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
            <div class="col-md-3 col-sm-6 col-xs-6 pt-1">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
            <div class="col-md-3 col-sm-6 col-xs-6 pt-1">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
            <div class="col-md-3 col-sm-6 col-xs-6 pt-1">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
            <div class="col-md-3 col-sm-6 col-xs-6 pt-1">
                <div class="item-mobile">
                    <a href="{{ route('showProduct.index') }}" style="text-decoration:none; color:inherit;">
                        <div class="item-image-wrapper-m">
                            <figure class="item-image-container">
                                <picture>
                                    <img src="{{ asset('assets-image/images-landing/milk123.png') }}" alt="" style="object-fit: cover;width: 200px;height: 200px;">
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
    </div>
  </div>
@endsection